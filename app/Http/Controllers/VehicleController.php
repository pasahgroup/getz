<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Location;
use App\Models\RentLog;
use App\Models\Seater;
use App\Models\Vehicle;
use App\Models\color;

use App\Models\multibooking;
use App\Models\Deposit;
use App\Models\Gateway;

use App\Models\Tag;
use App\Models\cartype;

use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
include_once(app_path().'/pesapal/oauth.php');

class VehicleController extends Controller
{
     // include_once(app_path().'/pesapal/oauth.php');

    public function __construct(){
        $this->activeTemplate = activeTemplate();
    }

    public function vehicles(){
        $brands = Brand::active()->withCount('vehicles')->orderBy('name')->get();
        $seats = Seater::active()->withCount('vehicles')->orderBy('number')->get();

//dd($brands);
        $vehicles = Vehicle::active()->latest()->paginate(getPaginate());
        $pageTitle = 'All Vehicles';
        return view($this->activeTemplate.'vehicles.index',compact('vehicles','pageTitle', 'brands', 'seats'));
    }


    public function vehicleDetails($id, $slug){
        $vehicle = Vehicle::active()->where('id', $id)->with('ratings')->withCount('ratings')->withAvg('ratings', 'rating')->firstOrFail();

$fullUrl = url()->full();
      

        $rental_terms = getContent('rental_terms.content', true);
        $pageTitle = 'Vehicle Details';

         // dd($vehicle);
        return view($this->activeTemplate.'vehicles.details',compact('vehicle','pageTitle', 'rental_terms','fullUrl'));
    }

    public function vehicleBooking($id, $slug){
        if (!auth()->check()){
            $notify[] = ['error', 'Please login to continue!'];
            return back()->withNotify($notify);
        }

//dd($this->activeTemplate);

        $vehicle = Vehicle::active()->where('id', $id)->firstOrFail();
        $locations = Location::active()->orderBy('name')->get();
        $pageTitle = 'Vehicle Booked by '.auth()->user()->firstname .' '.auth()->user()->lastname;
        return view($this->activeTemplate.'vehicles.booking',compact('vehicle','pageTitle', 'locations'));
    }


 public function addBooking(Request $request,$id){
        if (!auth()->check()){
            $notify[] = ['error', 'Please login to continue!'];
            return back()->withNotify($notify);
        }

//dd($id);

// if($id==1){
// $id=1;
// }else{
// $id=request('carModel');
// }

  //dd(request('bookingID'));

  $bookingID=request('bookingID');
  // $bookID=$bookingID;
  $bookedID=$bookingID;
  //dd($bookID);
 if(request('carModel')!=null)
 {
   $vehicle = Vehicle::active()->where('id',request('carModel'))->firstOrFail();
 }else{
       $vehicle = Vehicle::active()->where('id',1)->firstOrFail();

       }


         $vehicles = Vehicle::groupby('model')->get();
              //dd($vehicle);
        $locations = Location::active()->orderBy('name')->get();
        $pageTitle = 'Vehicle Booked by '.auth()->user()->firstname .' '.auth()->user()->lastname;
        return view($this->activeTemplate.'user.pesapal.addcar',compact('vehicle','vehicles','pageTitle', 'locations','bookingID','bookedID'));
    }


 public function addCar(Request $request,$id){
        if (!auth()->check()){
            $notify[] = ['error', 'Please login to continue!'];
            return back()->withNotify($notify);
        }
  $bookingID=request('bookingID');
  $bookID=request('bookID');
  $bookedID=request('bookID');
  //dd($bookID);
if(request('carModel')!=null)
 {
   // $vehicle = Vehicle::active()->where('id',request('carModel'))->firstOrFail();
   $vehicle = Vehicle::active()->where('model',request('carModel'))->first();

   if($vehicle==null)
    {
   $notify[] = ['error', 'No car model was set!'];
             return back()->withNotify($notify);
         }

 }else{
       $vehicle = Vehicle::active()->where('id',1)->firstOrFail();

       }

         $vehicles = Vehicle::groupby('model')->get();
     //dd($vehicle);
        $locations = Location::active()->orderBy('name')->get();
        $pageTitle = 'Vehicle Booked by '.auth()->user()->firstname .' '.auth()->user()->lastname;
        return view($this->activeTemplate.'user.pesapal.addcar',compact('vehicle','vehicles','pageTitle', 'locations','bookingID','bookID','bookedID'));
    }

    public function vehicleBookingConfirm(Request $request, $id)
    {
//dd(request('bookingID'));

 if(request('multi-booking')){
     //dd('popo');

            $request->validate([
            'pick_location' => 'required|integer|in:'.join(',', Location::active()->orderBy('name')->pluck('id')->toArray()),
            //'drop_location' => 'required|integer|in:'.join(',', Location::active()->orderBy('name')->pluck('id')->toArray()).'|not_in:'.$request->pick_location,

             'drop_location' => 'required|integer|in:'.join(',', Location::active()->orderBy('name')->pluck('id')->toArray()),
             'pick_time' => 'required|integer',
             'pick_time' => 'required|after_or_equal:today',
            'drop_time' => 'required|date_format:m/d/Y h:i a|after_or_equal:'. $request->pick_time,
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


    $pick_time = new Carbon($request->pick_time);
    $drop_time = new Carbon($request->drop_time);

if(request('multi-booking'))
{
    $total_days = $pick_time->diffInDays($drop_time) +1;
   $pin=rand(111111,999999);

 $rent = new RentLog();
        $rent->user_id = auth()->id();
        $rent->vehicle_id = $pin;
        $rent->model_name = $vehicle->model;
           $rent->no_car =request('no_car');

        $rent->pick_location = $request->pick_location;
        $rent->drop_location = $request->drop_location;
        $rent->pick_time = $pick_time;
        $rent->drop_time = $drop_time;
          $rent->no_day =$total_days;

        $rent->unit_price =$vehicle->price;
        $rent->price = getAmount(request('total_costs'));
        $rent->discount =0.00;
        $rent->balance =getAmount(request('total_costs'))-$rent->discount;

        $rent->save();

}else
{
 $vehicle = Vehicle::active()->where('id', $id)->firstOrFail();
        $total_days = $pick_time->diffInDays($drop_time) +1;
        $total_price = $vehicle->price*$total_days* request('no_car');

        $rent = new RentLog();
        $rent->user_id = auth()->id();
        $rent->vehicle_id = $vehicle->id;

         $rent->model_name = $vehicle->model;

         $rent->no_car =request('no_car');

        $rent->pick_location = $request->pick_location;
        $rent->drop_location = $request->drop_location;
        $rent->pick_time = $pick_time;
        $rent->drop_time = $drop_time;
         $rent->no_day =$total_days;


        $rent->unit_price =$vehicle->price;
         $rent->price = getAmount($total_price);
         $rent->discount =0.00;
        $rent->balance =getAmount($total_price)-$rent->discount;
        $rent->save();

}
   session(['rent_id' => $rent->id]);
      // dd(session(['rent_id' =>18]));

        if (!session()->has('rent_id') && !session()->has('plan_id')){
            $notify[] = ['error', 'Invalid request!'];
            return back()->withNotify($notify);
        }

        $user = auth()->user();


        if (session()->has('rent_id')){
            $rent_log = RentLog::findOrFail(session('rent_id'));
            $amount = $rent_log->price;
        } elseif(session()->has('plan_id')) {
            $plan_log = PlanLog::findOrFail(session('plan_id'));
            $amount = $plan_log->price;
        }

      $down_payment=0.00;
       // $charge = $gate->fixed_charge + ($amount * $gate->percent_charge / 100);
        // $payable = $amount + $charge;
          $payable = $amount;
        // // $final_amo = $payable * $gate->rate;
         $final_amo = $payable;


if(request('bookingID')!=null)
{
    // dd('printq');
 $updateBookingColumn = RentLog::where('id',$rent->id)
->update([
        'booking_id'=>request('bookingID')
            ]);


 $vehicle = Vehicle::active()->where('id', $id)->firstOrFail();
        $total_days = $pick_time->diffInDays($drop_time) +1;
        $total_price = $vehicle->price*$total_days* request('no_car');
//dd($id);
$deposits=Deposit::where('booking_id',request('bookingID'))->first();
//dd($deposits);
//dd($deposits->final_amo);
// dd($deposits->remain_balance);


 $updateData = Deposit::where('booking_id',request('bookingID'))
->update([
      // 'user_id' => $user->id,
      //  'rent_id' => session('rent_id') ?? 0,
      //  'plan_id' => session('plan_id') ?? 0,
      //   'booking_id' =>$rent->id,

      //      'method_code' => 999,
      //   'method_currency' =>"USD",
      // // 'amount' => $amount,
        // $data->charge = $charge;
        // $data->rate = $gate->rate;

       // 'charge' =>10,
       // 'rate' =>2300,
        'final_amo' =>$total_price+$deposits->remain_balance,
        'remain_balance' =>$total_price+$deposits->remain_balance,
        'status' =>4

            ]);

//dd('print1');

}
else{
       $updateBookingColumn = RentLog::where('id',$rent->id)
->update([
        'booking_id'=>$rent->id
            ]);

 $vehicle = Vehicle::active()->where('id', $id)->firstOrFail();
        $total_days = $pick_time->diffInDays($drop_time) +1;
        $total_price = $vehicle->price*$total_days* request('no_car');


  $data = new Deposit();
        $data->user_id = $user->id;
        // $data->rent_id = session('rent_id') ?? 0;
        // $data->plan_id = session('plan_id') ?? 0;
          $data->rent_id=$rent->id;
        $data->plan_id =0;
        $data->booking_id =$rent->id;

        // $data->method_code = $gate->method_code;
        // $data->method_currency = strtoupper($gate->currency);
          $data->method_code = 999;
        $data->method_currency ="USD";
        $data->amount = $amount;
        // $data->charge = $charge;
        // $data->rate = $gate->rate;

          $data->charge =10;
        $data->rate =2300;
        $data->final_amo = $total_price;

  $data->paid =0.00;
  $data->remain_balance = $total_price;

        $data->btc_amo = 0;
        $data->btc_wallet = "";
        $data->trx = getTrx();
        $data->try = 0;
        $data->status = 0;
        $data->save();
        //dd('print2');
}

//dd('print2');
 // return redirect()->route('user.pesapal',$data->id);
 return redirect()->route('user.payment',$rent->id);

        // return redirect()->route('user.deposit.manual.confirm');
    }



 public function payment(Request $request,$id)
    {
          //dd($id);
         //$track = session()->get('Track');
        // dd($track);
        // $data = Deposit::where('trx', $track)->where('status',0)->orderBy('id', 'DESC')->firstOrFail();
    //$data = Deposit::get();
        //dd($data);

        $gateways= Gateway::where('status',1)
        ->orderBy('name')->get();

        //dd($gateways);

        $locations = Location::active()->orderBy('name')->get();
        $times=RentLog::findOrFail($id);
            //dd($times);
        $vehicle = Vehicle::active()->where('id', $times->vehicle_id)->firstOrFail();
         //dd($vehicle);
       // $times=RentLog::findOrFail($id);
         //dd($times);

         $datas=RentLog::join('vehicles','vehicles.id','rent_logs.vehicle_id')
         ->where('rent_logs.booking_id',$times->booking_id)
         ->select('vehicles.name','rent_logs.pick_time','rent_logs.drop_time','rent_logs.model_name','rent_logs.unit_price','rent_logs.discount','rent_logs.no_car','rent_logs.no_day','rent_logs.price')
         ->get();

         //dd($datas);


 // $totals = RentLog::select(['rent_logs.*',
 // DB::raw('SUM(total_cost) as total_revenue'),
 // DB::raw('SUM(discount) as total_cash')
 // ])->get();


  $totals = RentLog::select(DB::raw('SUM(price) as total_cost'),DB::raw('SUM(discount) as Discount'),DB::raw('SUM(price)-SUM(discount)+sum(price)*0.18 as Grant_total'),DB::raw('sum(price)*0.18 as VAT'))
  ->where('booking_id',$times->booking_id)
  ->first();

        //$answerPerc=DB::select('select sum(total_cost)toc,sum(discount)disc from rent_logs');
        //dd($totals);

        $pageTitle = 'Payment Preview';
          return view($this->activeTemplate . 'user.pesapal.pesapal', compact('datas', 'pageTitle','times','vehicle','locations','totals','gateways'));
    }


 public function payConfirmx(Request $request,$id)
    {
         //dd($id);
         //$track = session()->get('Track');
        // dd($track);
        // $data = Deposit::where('trx', $track)->where('status',0)->orderBy('id', 'DESC')->firstOrFail();
    //$data = Deposit::get();
        //dd($data);
        $times=RentLog::findOrFail($id);

         $datas=RentLog::join('vehicles','vehicles.id','rent_logs.vehicle_id')
         ->where('rent_logs.id',$id)
         ->select('vehicles.name','rent_logs.pick_time','rent_logs.drop_time','rent_logs.model_name','rent_logs.price','rent_logs.discount','rent_logs.no_car','rent_logs.no_day','rent_logs.total_cost')
         ->get();
 //dd($datas);

        $pageTitle = 'Payment Preview';
          return view($this->activeTemplate . 'user.pesapal.pesapal', compact('datas', 'pageTitle','times'));
    }


  public function curl_get_file_contents($URL)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) return $contents;
        else return FALSE;
    }


    public function payConfirm(Request $request,$id)
    {
$amount = preg_replace("/[^0-9\.]/", "",request('amount'));
$amount_percent=preg_replace("/[^0-9\.]/", "",request('total_cost'));
//dd($amount_percent);

$amount_percent=request('percent_downpayment')*$amount;

if($amount<$amount_percent)
{
 return redirect()->back()->with('error','Down Payment must not below 30% of total booking costs.');
}



// Fetching JSON
$req_url = "https://api.exchangerate-api.com/v4/latest/USD";
//dd($req_url);
 //ini_set("allow_url_fopen", 1);
// curl_get_file_contents($req_url);

 //return $this->curl_get_file_contents($req_url);
 $response_json=$this->curl_get_file_contents($req_url);

if(false !== $response_json) {
    try {
    // Decoding
    $response_object = json_decode($response_json);
$first_name=request('first_name');
$last_name=request('last_name');
$desc=request('desc');
$email=request('email');
$phone=request('phone');

$reference=$id;
$type=request('type');
$amount=$amount;
$currency=request('currency');
$status=1;

  //dd($amount);

// dd(number_format($amount, 2));
    // YOUR APPLICATION CODE HERE, e.g.
    //$base_price =$amount; // Your price in USD
    $amount = (float)$amount;

$base_price=($response_object->rates->TZS/$response_object->rates->$currency);
 // $defaultCurrency2=($response_object->rates->$currency);
    

    $to_bepaid = round(($amount * $base_price), 2);
   // $amount = round(($amount * $base_price), 2);
 //dd($to_bepaid);


$gateways = Gateway::where('id',request('gateway'))->first();
//dd($gateways->code);
$toupdate = Deposit::where('rent_id',$id)->update([
            'method_code'=>$gateways->code,
        ]);

    }
    catch(Exception $e) {
        // Handle JSON parse error...
    }
}
else {
  return redirect()->back()->with('info','No Internet connection');
}

//dd($amount);

    //dd('print');
 //return response()->json(['url' => redirect('https://payments.pesapal.com/palatialtours',compact(['first_name','status']));
//return redirect('https://payments.pesapal.com/palatialtours',compact('status'));
$pageTitle="Payment";
return view($this->activeTemplate . 'user.pesapal.pesapal_payment',compact('first_name','last_name','currency','to_bepaid','desc','email','phone','reference','type','pageTitle'));

    }



    public function show(color $department)
  {
     // Fetch departments
     $pageTitle="Title";
       $departments['data'] = color::orderby("color","asc")
            ->select('id','color')
            ->get();

// dd( $departments['data']);
       // Load index view
       return view('indexf')->with("departments",$departments);
  }

    public function getEmployees($departmentid=0){

           // Fetch Employees by Departmentid
           $empData['data'] = color::orderby("color","asc")
                ->select('id','color')
                ->where('id',$departmentid)
                ->get();
           return response()->json($empData);
      }

      public function getEmp($departmentid=0){
      // Fetch Employees by Departmentid
      $empData['data'] = color::orderby("color","asc")
           ->select('id','color')
           ->where('id',$departmentid)
           ->get();


  // dd( $empData['data']);
      return response()->json($empData);
  }



    public function vehicleSearch(Request $request)
    {

      $vehicles=[];
  $models=[];
  $brand_data="";
    $model_data="";
      $model_datas="";
      $seat_data="";

        $carbody_data="";
          $cartag_data="";
          $cartag_datas="";
          $cartype_datas="";
              $car_name="";
              $max_price="";

        $pageTitle="";
        $brands = Brand::active()->withCount('vehicles')->orderBy('name')->get();
        $seats = Seater::active()->withCount('vehicles')->orderBy('number')->get();


         $brandss=Vehicle::join('brands','brands.id','vehicles.brand_id')
         ->select('vehicles.*','brands.name')
         ->where('brands.status','1')
         ->groupby('brands.name')
         ->get();

 //         $brandss=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.opt_answer_id=o.id and a.datex="'.$current_date.'"');
 // $dataDaily = collect($reportDailyData);

  $vehicles = Vehicle::active();       //$pageTitle = 'Vehicle Search';

if(request('search'))
{
  if ($request->brand) {
      $vehicles->where('brand_id',"$request->brand");
        $pageTitle=$request->name;
  }

  if ($request->modeldata) {
      $vehicles->where('model',"$request->modeldata");
        $pageTitle=$request->name;
  }
//dd($vehicles);
  //$brand_data = brand::where('brand_id',$request->brand)->first();
    $brand_data=brand::where('id',"$request->brand")->first();

    $model_data=$vehicles->where('brand_id',"$request->brand")->first();
      $model_datas=Vehicle::where('brand_id',"$request->brand")->get();
  //dd($model_datas);

  $vehicles = $vehicles->latest()->paginate(8)->withQueryString();
}else {

 // if(request('save')){
//  dd('ddd');
 // }

        if ($request->name) {
            $vehicles->where('name', 'LIKE', "%{$request->name}%");
              $pageTitle=$request->name;
              $car_name=$request->name;
        }

        if ($request->brand !=null) {
            $vehicles->where('brand_id',$request->brand);
        //  $brands=brand::where('id',$request->brand)->first();
             //dd($brands->name);
             $pageTitle=$request->brand;
        }

 //dd($request->brand);

        if ($request->model){
          // $vehicles->Where('model', 'LIKE', "%$request->model%");
            $vehicles->Where('model', "$request->model");
            $models=$vehicles;
              $pageTitle=$request->model;
             //dd($request->mode);
        }

        if ($request->seats){
            $vehicles = $vehicles->Where('seater_id', $request->seats);
              $pageTitle=$request->seats. ' Seats';
              $seat_data=seater::where('id',"$request->seats")->first();

        }

        //dd($seat_data);

        if ($request->min_price){
            $vehicles->where('price', '>=', $request->min_price);
              $pageTitle="Minimum Price ".$request->min_price;
        }

        if ($request->max_price){
            $vehicles->where('price', '<=', $request->max_price);
              $pageTitle="Maximum Price ".$request->max_price;
                $max_price=$request->max_price;
        }

        //Get vehicles

        if ($request->carbody!=null){
            $vehicles->Where('car_body_type_id', '=', "$request->carbody");
            $cartype_datas=cartype::where('id',$request->carbody)->first();
            $pageTitle=$cartype_datas->car_body_type;
          //dd($cartypes->car_body_type);
        }

        if ($request->cartag!=null){
            $vehicles->Where('tag_id', '=', "$request->cartag");
            $cartag_datas=Tag::where('id',$request->cartag)->first();
            $pageTitle=$cartag_datas->tag;
          //dd($pageTitle);
        }

        $vehicles = $vehicles->latest()->paginate(8)->withQueryString();
      //    $brandss = $brandss->latest()->paginate(4)->withQueryString();
//dd($vehicles);
            }

      $carBodies = vehicle::join('cartypes','vehicles.car_body_type_id','cartypes.id')
      ->select('vehicles.*','cartypes.car_body_type')
      ->groupby('vehicles.car_body_type_id')
           ->get();

           $cartags = vehicle::join('tags','vehicles.tag_id','tags.id')
           ->select('vehicles.*','tags.tag')
           ->groupby('vehicles.tag_id')
            ->get();

      //  $pageTitle="Title";
        $departments['data'] = vehicle::orderby("name","asc")
             ->select('id','name')
             ->get();


        return view($this->activeTemplate.'vehicles.index',compact('departments','max_price','car_name','cartags','cartype_datas','cartag_datas','seat_data','model_data','model_datas','brand_data','vehicles','pageTitle', 'brands','brandss','models', 'seats','carBodies'));
    }


    public function getModel($brand_id=0){ //dd($departmentid);

               $empData['data'] = Vehicle::orderby("brand_id","asc")
                    ->select('id','brand_id','model')
                    ->where('brand_id',$brand_id)
                    ->get();
              // dd($empData['data']);
          return response()->json($empData);
     }

         public function getSeater($model=0){ //dd($departmentid);
                    $empData['data'] = Vehicle::orderby("model","asc")
                         ->select('id','brand_id','seater_id')
                         ->where('model',$model)
                         ->get();
                   // dd($empData['data']);
               return response()->json($empData);
          }





    public function brandVehicles($brand_id, $slug)
    {
        $brands = Brand::active()->withCount('vehicles')->orderBy('name')->get();
        $seats = Seater::active()->withCount('vehicles')->orderBy('number')->get();

        $vehicles = Vehicle::active()->where('brand_id', $brand_id)->latest()->paginate(8);

//dd($vehicles);
        $pageTitle = 'Brand Vehicles';
        return view($this->activeTemplate.'vehicles.index',compact('vehicles','pageTitle', 'brands', 'seats'));
    }

    public function seaterVehicles($seat_id)
    {
        $brands = Brand::active()->withCount('vehicles')->orderBy('name')->get();
        $seats = Seater::active()->withCount('vehicles')->orderBy('number')->get();

        $vehicles = Vehicle::active()->where('seater_id', $seat_id)->latest()->paginate(8);
        $pageTitle = 'Vehicles Seating';

        return view($this->activeTemplate.'vehicles.index',compact('vehicles','pageTitle', 'brands', 'seats'));
    }
}
