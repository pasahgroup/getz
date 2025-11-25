<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Deposit;
use App\Models\GatewayCurrency;
use App\Models\GeneralSetting;
use App\Models\PlanLog;
use App\Models\RentLog;
use App\Models\Transaction;
use App\Models\multibooking;
use App\Models\Location;

use App\Models\User;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        return $this->activeTemplate = activeTemplate();
    }

    public function deposit()
    {


        if (!session()->has('rent_id') && !session()->has('plan_id')){
            $notify[] = ['error', 'Invalid request!'];
            return back()->withNotify($notify);
        }


        if (session()->has('rent_id')){
            $rent_log = RentLog::findOrFail(session('rent_id'));
            $total_cost = $rent_log->price;
        } elseif(session()->has('plan_id')) {
            $plan_log = PlanLog::findOrFail(session('plan_id'));
            $total_cost = $plan_log->price;
        }

//dd('depositv bnm');
        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();
        $pageTitle = 'Payment Methods';

             
         return view($this->activeTemplate . 'user.payment.deposit', compact('gatewayCurrency', 'pageTitle','total_cost'));

              // return view($this->activeTemplate . 'user.manual_payment.manual_confirm', compact('data', 'pageTitle', 'method'));
    }



    public function depositInsert(Request $request)
    {

      //dd(request('down_payment'));


        $request->validate([
            'method_code' => 'required',
            'currency' => 'required',
        ]);

        if (!session()->has('rent_id') && !session()->has('plan_id')){
            $notify[] = ['error', 'Invalid request!'];
            return back()->withNotify($notify);
        }

        $user = auth()->user();
        $gate = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->where('method_code', $request->method_code)->where('currency', $request->currency)->first();
        if (!$gate) {
            $notify[] = ['error', 'Invalid gateway'];
            return back()->withNotify($notify);
        }

        if (session()->has('rent_id')){
            $rent_log = RentLog::findOrFail(session('rent_id'));
            $amount = $rent_log->price;
        } elseif(session()->has('plan_id')) {
            $plan_log = PlanLog::findOrFail(session('plan_id'));
            $amount = $plan_log->price;
        }

        if ($gate->min_amount > $amount || $gate->max_amount < $amount) {
            $notify[] = ['error', 'Please follow payment limit'];
            return back()->withNotify($notify);
        }

       


         $down_payment=request('down_payment');

        $charge = $gate->fixed_charge + ($amount * $gate->percent_charge / 100);
        $payable = $amount + $charge;
        $final_amo = $payable * $gate->rate;

        $data = new Deposit();
        $data->user_id = $user->id;
        $data->rent_id = session('rent_id') ?? 0;
        $data->plan_id = session('plan_id') ?? 0;
        $data->method_code = $gate->method_code;
        $data->method_currency = strtoupper($gate->currency);
        $data->amount = $amount;
        $data->charge = $charge;
        $data->rate = $gate->rate;
        $data->final_amo = $final_amo;
  
  $data->paid = $down_payment;
  $data->remain_balance = $amount-$down_payment;

        $data->btc_amo = 0;
        $data->btc_wallet = "";
        $data->trx = getTrx();
        $data->try = 0;
        $data->status = 0;
        $data->save();
        session()->put('Track', $data->trx);
      
                  //Update multibooking table
$account = multibooking::where('booked_by',auth()->id())
->where('status',1)
->update([
        'status'=>0
            ]);

        return redirect()->route('user.deposit.manual.confirm');
                // return redirect()->route('user.deposit.preview');
    }


    public function depositPreview()
    {
        //dd('payment preview');

        if (!session()->has('rent_id') && !session()->has('plan_id')){
            $notify[] = ['error', 'Invalid request!'];
            return back()->withNotify($notify);
        }

        $track = session()->get('Track');
        $data = Deposit::where('trx', $track)->where('status',0)->orderBy('id', 'DESC')->firstOrFail();
        $pageTitle = 'Payment Preview';
        return view($this->activeTemplate . 'user.payment.preview', compact('data', 'pageTitle'));
    }


    public function depositConfirm()
    {
        $track = session()->get('Track');
        $deposit = Deposit::where('trx', $track)->where('status',0)->orderBy('id', 'DESC')->with('gateway')->firstOrFail();

        if ($deposit->method_code >= 1000) {
            $this->userDataUpdate($deposit);
            $notify[] = ['success', 'Your payment request is queued for approval.'];
            return back()->withNotify($notify);
        }


        $dirName = $deposit->gateway->alias;
        $new = __NAMESPACE__ . '\\' . $dirName . '\\ProcessController';

        $data = $new::process($deposit);
        $data = json_decode($data);


        if (isset($data->error)) {
            $notify[] = ['error', $data->message];
            return redirect()->route(gatewayRedirectUrl())->withNotify($notify);
        }
        if (isset($data->redirect)) {
            return redirect($data->redirect_url);
        }

        // for Stripe V3
        if(@$data->session){
            $deposit->btc_wallet = $data->session->id;
            $deposit->save();
        }

        $pageTitle = 'Payment Confirm';
        return view($this->activeTemplate . $data->view, compact('data', 'pageTitle', 'deposit'));
    }


    public static function userDataUpdate($trx)
    {
        $general = GeneralSetting::first();
        $data = Deposit::where('trx', $trx)->first();
        if ($data->status == 0) {
            $data->status = 1;
            $data->save();

            $user = User::find($data->user_id);

            //update status
            if (session()->has('rent_id')){
                $rent_log = RentLog::findOrFail(session('rent_id'));
                $rent_log->status = 1;
                $rent_log->trx = $data->trx;
                $rent_log->save();
            } else {
                $plan_log = PlanLog::findOrFail(session('plan_id'));
                $plan_log->status = 1;
                $plan_log->trx = $data->trx;
                $plan_log->save();
            }

            $adminNotification = new AdminNotification();
            $adminNotification->user_id = $user->id;
            $adminNotification->title = 'Payment successful via '.$data->gatewayCurrency()->name;
            $adminNotification->click_url = urlPath('admin.deposit.successful');
            $adminNotification->save();

            notify($user, 'PAYMENT_COMPLETE', [
                'method_name' => $data->gatewayCurrency()->name,
                'method_currency' => $data->method_currency,
                'method_amount' => showAmount($data->final_amo),
                'amount' => showAmount($data->amount),
                'charge' => showAmount($data->charge),
                'currency' => $general->cur_text,
                'rate' => showAmount($data->rate),
                'trx' => $data->trx
            ]);

            //Forget session
            session()->forget(['rent_id', 'plan_id']);
        }
    }

    public function manualDepositConfirm(Request $request)
    {
        //dd('print testing');

        dd(request('drop_time'));
if(request('multi-booking')){
    //dd('popo');
             
            $request->validate([
            'pick_location' => 'required|integer|in:'.join(',', Location::active()->orderBy('name')->pluck('id')->toArray()),
            //'drop_location' => 'required|integer|in:'.join(',', Location::active()->orderBy('name')->pluck('id')->toArray()).'|not_in:'.$request->pick_location,

             'drop_location' => 'required|integer|in:'.join(',', Location::active()->orderBy('name')->pluck('id')->toArray()),
             'pick_time' => 'required|integer',           
             'pick_time' => 'required|after_or_equal:today',
             // 'drop_time' => 'required|date_format:Y-m-d h:i|after_or_equal:'. $request->pick_time,
        ],[
            'drop_location.not_in' => 'Please choose different location!'
        ]);
         }
         else{
               $request->validate([
            'pick_location' => 'required|integer|in:'.join(',', Location::active()->orderBy('name')->pluck('id')->toArray()),
            //'drop_location' => 'required|integer|in:'.join(',', Location::active()->orderBy('name')->pluck('id')->toArray()).'|not_in:'.$request->pick_location,

             'drop_location' => 'required|integer|in:'.join(',', Location::active()->orderBy('name')->pluck('id')->toArray()),
             'pick_time' => 'required|integer',           
             'pick_time' => 'required|date_format:m/d/Y h:i a|after_or_equal:today',
             'drop_time' => 'required|date_format:m/d/Y h:i a|after_or_equal:'. $request->pick_time,
                     ],[
            'drop_location.not_in' => 'Please choose different location!'
        ]);
    }


dd(request('drop_time'));

      $pick_time = new Carbon($request->pick_time);
    $drop_time = new Carbon($request->drop_time);

if(request('multi-booking'))
{

   $pin=rand(111111,999999);

 $rent = new RentLog();
        $rent->user_id = auth()->id();
        $rent->vehicle_id = $pin;
        $rent->pick_location = $request->pick_location;
        $rent->drop_location = $request->drop_location;
        $rent->pick_time = $pick_time;
        $rent->drop_time = $drop_time;
       
        $rent->price = getAmount(request('total_costs'));
        $rent->save();

}else

{

 $vehicle = Vehicle::active()->where('id', $id)->firstOrFail(); 

        $total_days = $pick_time->diffInDays($drop_time) +1;
        $total_price = $vehicle->price*$total_days* request('no_car');

        $rent = new RentLog();
        $rent->user_id = auth()->id();
        $rent->vehicle_id = $vehicle->id;
        $rent->pick_location = $request->pick_location;
        $rent->drop_location = $request->drop_location;
        $rent->pick_time = $pick_time;
        $rent->drop_time = $drop_time;
       

        $rent->price = getAmount($total_price);
        $rent->save();

}

        session(['rent_id' => $rent->id]);
        //Origin Route
        //dd('Inserted');
        // return redirect()->route('user.deposit');
       // dd('print testxx');
         
         return redirect()->route('user.deposit.manual.confirm');



   // End of Renting   
       
//dd('payment Confirm');

        if (!session()->has('rent_id') && !session()->has('plan_id')){
            $notify[] = ['error', 'Invalid request!'];
            return back()->withNotify($notify);
        }

     
//dd(gatewayRedirectUrl());

        // if (!$data) {
        //     return redirect()->route(gatewayRedirectUrl());
        // }

        // Insert into deposits form



//dd('print fh');


        // $request->validate([
        //     'method_code' => 'required',
        //     'currency' => 'required',
        // ]);

 //dd('print');

        if (!session()->has('rent_id') && !session()->has('plan_id')){
            $notify[] = ['error', 'Invalid request!'];
            return back()->withNotify($notify);
        }

//dd('pppp3');
        $user = auth()->user();
        $gate = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->where('method_code', $request->method_code)->where('currency', $request->currency)->first();
       
 //dd($gate);

        // if (!$gate) {
        //     $notify[] = ['error', 'Invalid gateway'];
        //     return back()->withNotify($notify);
        // }
        //    dd('pppp1');

        // if (session()->has('rent_id')){
        //     $rent_log = RentLog::findOrFail(session('rent_id'));
        //     $amount = $rent_log->price;
        // } elseif(session()->has('plan_id')) {
        //     $plan_log = PlanLog::findOrFail(session('plan_id'));
        //     $amount = $plan_log->price;
        // }

        // if ($gate->min_amount > $amount || $gate->max_amount < $amount) {
        //     $notify[] = ['error', 'Please follow payment limit'];
        //     return back()->withNotify($notify);
        // }

      //dd('pppp');


         // $down_payment=request('down_payment');
        $down_payment=45000;
$amount=50000;
        // $charge = $gate->fixed_charge + ($amount * $gate->percent_charge / 100);
        // $payable = $amount + $charge;
        // $final_amo = $payable * $gate->rate;

        $data = new Deposit();
        $data->user_id = $user->id;
        $data->rent_id = session('rent_id') ?? 0;
        $data->plan_id = session('plan_id') ?? 0;
        // $data->method_code = $gate->method_code;
        // $data->method_currency = strtoupper($gate->currency);
        // $data->amount =2000;
           $data->amount = $amount;
        // $data->charge = $charge;
          $data->charge = 6000;
        // $data->rate = $gate->rate;
          $data->rate = 1000;
        // $data->final_amo = $final_amo;
          $data->final_amo =4000;
  
  $data->paid = $down_payment;
  $data->remain_balance = $amount-$down_payment;

        $data->btc_amo = 0;
        $data->btc_wallet = "";
        $data->trx = getTrx();
        $data->try = 0;
        $data->status = 0;
        $data->save();
        

//         session()->put('Track', $data->trx);
      
//                   //Update multibooking table
// $account = multibooking::where('booked_by',auth()->id())
// ->where('status',1)
// ->update([
//         'status'=>0
//             ]);


//    $track = session()->get('Track');
//         $data = Deposit::with('gateway')->where('status', 0)->where('trx', $track)->first();
 
//$id= $data;
 return redirect()->route('user.pesapal',$data->id);
//dd('print');




 return redirect()->route('user.deposit.manual.confirm');

        dd($data->gatewayCurrency());
        // if ($data->method_code > 999) {

            $pageTitle = 'Payment Confirm';
            $method = $data->gatewayCurrency();
            return view($this->activeTemplate . 'user.manual_payment.manual_confirm', compact('data', 'pageTitle', 'method'));
        // }
        abort(404);
    }

    public function manualDepositUpdate(Request $request)
    {

       // dd('payment update');

        $track = session()->get('Track');
        $data = Deposit::with('gateway')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return redirect()->route(gatewayRedirectUrl());
        }

        $params = json_decode($data->gatewayCurrency()->gateway_parameter);
   //dd('print2');

        $rules = [];
        $inputField = [];
        $verifyImages = [];
//   dd('print2');

        if ($params != null) {
            foreach ($params as $key => $custom) {
                $rules[$key] = [$custom->validation];
                if ($custom->type == 'file') {
                    array_push($rules[$key], 'image');
                    array_push($rules[$key], new FileTypeValidate(['jpg','jpeg','png']));
                    array_push($rules[$key], 'max:2048');

                    array_push($verifyImages, $key);
                }
                if ($custom->type == 'text') {
                    array_push($rules[$key], 'max:191');
                }
                if ($custom->type == 'textarea') {
                    array_push($rules[$key], 'max:300');
                }
                $inputField[] = $key;
            }
        }
        $this->validate($request, $rules);
  
        $directory = date("Y")."/".date("m")."/".date("d");
        $path = imagePath()['verify']['deposit']['path'].'/'.$directory;
        $collection = collect($request);
        $reqField = [];
        if ($params != null) {
            foreach ($collection as $k => $v) {
                foreach ($params as $inKey => $inVal) {
                    if ($k != $inKey) {
                        continue;
                    } else {
                        if ($inVal->type == 'file') {
                            if ($request->hasFile($inKey)) {
                                try {
                                    $reqField[$inKey] = [
                                        'field_name' => $directory.'/'.uploadImage($request[$inKey], $path),
                                        'type' => $inVal->type,
                                    ];
                                } catch (\Exception $exp) {
                                    $notify[] = ['error', 'Could not upload your ' . $inKey];
                                    return back()->withNotify($notify)->withInput();
                                }
                            }
                        } else {
                            $reqField[$inKey] = $v;
                            $reqField[$inKey] = [
                                'field_name' => $v,
                                'type' => $inVal->type,
                            ];
                        }
                    }
                }
            }
            $data->detail = $reqField;
        } else {
            $data->detail = null;
        }

   //dd('print3');

        $data->status = 2; // pending
        $data->save();



        $adminNotification = new AdminNotification();
       
        $adminNotification->user_id = $data->user->id;
        $adminNotification->title = 'Payment request from '.$data->user->username;
        $adminNotification->click_url = urlPath('admin.deposit.details',$data->id);
        $adminNotification->save();


        $general = GeneralSetting::first();
        
        // notify($data->user, 'PAYMENT_REQUEST', [
        //     'method_name' => $data->gatewayCurrency()->name,
        //     'method_currency' => $data->method_currency,
        //     'method_amount' => showAmount($data->final_amo),
        //     'amount' => showAmount($data->amount),
        //     'charge' => showAmount($data->charge),
        //     'currency' => $general->cur_text,
        //     'rate' => showAmount($data->rate),
        //     'trx' => $data->trx
        // ]);


//      dd('print2');
        //Forget session
        session()->forget(['rent_id', 'plan_id']);

        $notify[] = ['success', 'You\'r payment request has been taken.'];
        return redirect()->route('user.deposit.history')->withNotify($notify);
    }


}
