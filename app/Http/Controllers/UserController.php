<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\GoogleAuthenticator;
use App\Models\AdminNotification;
use App\Models\GeneralSetting;
use App\Models\PlanLog;
use App\Models\Rating;
use App\Models\RentLog;
use App\Models\Vehicle;
use App\Models\UserLogin;

use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;



use App\Models\Deposit;
use App\Models\User;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }


  public function dashboardDetail()
    {
dd('Dashboard details');
    }



    public function home()
    {
      //   $pageTitle = 'Dashboard';

      //   //Vehicle booking
      //   $data['total_vehicle_booking'] = RentLog::active()->where('user_id', \auth()->id())->count();
      //   $data['upcoming_vehicle_booking'] = RentLog::active()->where('user_id', \auth()->id())->upcoming()->count();
      //   $data['running_vehicle_booking'] = RentLog::active()->where('user_id', \auth()->id())->running()->count();
      //   $data['completed_vehicle_booking'] = RentLog::active()->where('user_id', \auth()->id())->completed()->count();

      //   //Plan booking
      //   $data['total_plan_booking'] = PlanLog::active()->where('user_id', \auth()->id())->count();
      //   $data['upcoming_plan_booking'] = PlanLog::active()->where('user_id', \auth()->id())->upcoming()->count();
      //   $data['running_plan_booking'] = PlanLog::active()->where('user_id', \auth()->id())->running()->count();
      //   $data['completed_plan_booking'] = PlanLog::active()->where('user_id', \auth()->id())->completed()->count();

      //   $logs = auth()->user()->deposits()->with(['gateway', 'rent', 'planlog'])->orderBy('id','desc')->take(10)->get();
      // //dd($logs);
       

 $pageTitle = 'Dashboard';

        // User Info
        $widget['total_users'] = User::count();
        $widget['verified_users'] = User::where('status', 1)->count();
        $widget['email_unverified_users'] = User::where('ev', 0)->count();
        $widget['sms_unverified_users'] = User::where('sv', 0)->count();

        // Monthly Deposit & Withdraw Report Graph
        $report['months'] = collect([]);
        $report['deposit_month_amount'] = collect([]);

        //Vehicle booking
        $data['total_vehicle_booking'] = RentLog::active()->count();
        $data['upcoming_vehicle_booking'] = RentLog::active()->upcoming()->count();
        $data['running_vehicle_booking'] = RentLog::active()->running()->count();
        $data['completed_vehicle_booking'] = RentLog::active()->completed()->count();

        //Plan booking
        $data['total_plan_booking'] = PlanLog::active()->count();
        $data['upcoming_plan_booking'] = PlanLog::active()->upcoming()->count();
        $data['running_plan_booking'] = PlanLog::active()->running()->count();
        $data['completed_plan_booking'] = PlanLog::active()->completed()->count();

        $depositsMonth = Deposit::where('created_at', '>=', Carbon::now()->subYear())
            ->where('status', 1)
            ->selectRaw("SUM( CASE WHEN status = 1 THEN amount END) as depositAmount")
            ->selectRaw("DATE_FORMAT(created_at,'%M-%Y') as months")
            ->orderBy('created_at')
            ->groupBy('months')->get();

        $depositsMonth->map(function ($depositData) use ($report) {
            $report['months']->push($depositData->months);
            $report['deposit_month_amount']->push(showAmount($depositData->depositAmount));
        });

        $months = $report['months'];

        for($i = 0; $i < $months->count(); ++$i) {
            $monthVal      = Carbon::parse($months[$i]);
            if(isset($months[$i+1])){
                $monthValNext = Carbon::parse($months[$i+1]);
                if($monthValNext < $monthVal){
                    $temp = $months[$i];
                    $months[$i]   = Carbon::parse($months[$i+1])->format('F-Y');
                    $months[$i+1] = Carbon::parse($temp)->format('F-Y');
                }else{
                    $months[$i]   = Carbon::parse($months[$i])->format('F-Y');
                }
            }
        }


        // Deposit Graph
        $deposit = Deposit::where('created_at', '>=', \Carbon\Carbon::now()->subDays(30))->where('status', 1)
            ->selectRaw('sum(amount) as totalAmount')
            ->selectRaw('DATE(created_at) day')
            ->groupBy('day')->get();
        $deposits['per_day'] = collect([]);
        $deposits['per_day_amount'] = collect([]);
        $deposit->map(function ($depositItem) use ($deposits) {
            $deposits['per_day']->push(date('d M', strtotime($depositItem->day)));
            $deposits['per_day_amount']->push($depositItem->totalAmount + 0);
        });


        // user Browsing, Country, Operating Log
        $userLoginData = UserLogin::where('created_at', '>=', \Carbon\Carbon::now()->subDay(30))->get(['browser', 'os', 'country']);

        $chart['user_browser_counter'] = $userLoginData->groupBy('browser')->map(function ($item, $key) {
            return collect($item)->count();
        });
        $chart['user_os_counter'] = $userLoginData->groupBy('os')->map(function ($item, $key) {
            return collect($item)->count();
        });
        $chart['user_country_counter'] = $userLoginData->groupBy('country')->map(function ($item, $key) {
            return collect($item)->count();
        })->sort()->reverse()->take(5);


        $payment['total_deposit_amount_count'] = Deposit::where('status',1)->count();
        $payment['total_deposit_amount'] = Deposit::where('status',1)->sum('amount');
        $payment['total_deposit_charge'] = Deposit::where('status',1)->sum('charge');
        $payment['total_deposit_pending'] = Deposit::where('status',2)->count();

       


        return view('admin.dashboarduserMain', compact('pageTitle', 'widget', 'report', 'chart','payment','depositsMonth','months','deposits','data'));
       // return view($this->activeTemplate . 'user.dashboard', compact('pageTitle', 'logs', 'data'));
    }

    public function profile()
    {
        //dd('ddd');

        $pageTitle = "Profile Setting";
        $user = Auth::user();
         $countries = json_decode(file_get_contents(resource_path('views/partials/country.json')));
           //$info[]="";
          $info = json_decode(json_encode(getIpInfo()), true);
          $mobile_code = @implode(':', $info['code']);
        return view($this->activeTemplate. 'user.profile_setting', compact('pageTitle','countries','mobile_code','user'));
    }

    public function submitProfile(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'address' => 'sometimes|required|max:80',
            'state' => 'sometimes|required|max:80',
            'zip' => 'sometimes|required|max:40',
            'country' => 'sometimes|required|max:64',
             'city' => 'sometimes|required|max:50',

            'nida' => 'sometimes|required|max:64',
            'driving_license' => 'sometimes|required|max:64',

            'image' => ['image',new FileTypeValidate(['jpg','jpeg','png'])]
        ],[
            'firstname.required'=>'First name field is required',
            'lastname.required'=>'Last name field is required'
        ]);

//dd(request('country'));
        $user = Auth::user();
//dd(@$user->address);
        $in['firstname'] = $request->firstname;
        $in['lastname'] = $request->lastname;
         $in['mobile'] = $request->mobile;
          $in['country_code'] = $request->country_code;

          $in['nida'] = $request->nida;
        $in['driving_license'] = $request->driving_license;

        $in['address'] = [
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
             'country' => @$user->address->country,
             'country' => @$request->country,
            'city' => $request->city,
        ];

  //  $exist = UserLogin::where('user_ip',$ip)->first();
  //       $userLogin = new UserLogin();
  // if ($exist) {
  //           $userLogin->longitude =  $exist->longitude;
  //           $userLogin->latitude =  $exist->latitude;
  //           $userLogin->city =  $exist->city;
  //           $userLogin->country_code = $exist->country_code;
  //           $userLogin->country =  $exist->country;
  //       }else{
  //           $info = json_decode(json_encode(getIpInfo()), true);
  //           $userLogin->longitude =  @implode(',',$info['long']);
  //           $userLogin->latitude =  @implode(',',$info['lat']);
  //           $userLogin->city =  @implode(',',$info['city']);
  //           $userLogin->country_code = @implode(',',$info['code']);
  //           $userLogin->country =  @implode(',', $info['country']);
  //       }




        if ($request->hasFile('image')) {
            $location = imagePath()['profile']['user']['path'];
            $size = imagePath()['profile']['user']['size'];
            $filename = uploadImage($request->image, $location, $size, $user->image);
            $in['image'] = $filename;
        }

        $user->fill($in)->save();
        $notify[] = ['success', 'Profile updated successfully.'];
        return back()->withNotify($notify);
    }

    public function changePassword()
    {
        $pageTitle = 'Change password';
        return view($this->activeTemplate . 'user.password', compact('pageTitle'));
    }

    public function submitPassword(Request $request)
    {

        $password_validation = Password::min(6);
        $general = GeneralSetting::first();
        if ($general->secure_password) {
            $password_validation = $password_validation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        $this->validate($request, [
            'current_password' => 'required',
            'password' => ['required','confirmed',$password_validation]
        ]);


        try {
            $user = auth()->user();
            if (Hash::check($request->current_password, $user->password)) {
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                $notify[] = ['success', 'Password changes successfully.'];
                return back()->withNotify($notify);
            } else {
                $notify[] = ['error', 'The password doesn\'t match!'];
                return back()->withNotify($notify);
            }
        } catch (\PDOException $e) {
            $notify[] = ['error', $e->getMessage()];
            return back()->withNotify($notify);
        }
    }

    /*
     * Payment History
     */
    public function depositHistory()
    {
        $pageTitle = 'Payment History';
        $emptyMessage = 'No history found.';
        $logs = auth()->user()->deposits()->with(['gateway', 'rent', 'planlog'])->orderBy('id','desc')->paginate(getPaginate());
        //dd($logs);
        return view($this->activeTemplate.'user.deposit_history', compact('pageTitle', 'emptyMessage', 'logs'));
    }

    public function show2faForm()
    {
        $general = GeneralSetting::first();
        $ga = new GoogleAuthenticator();
        $user = auth()->user();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . $general->sitename, $secret);
        $pageTitle = 'Two Factor';
        return view($this->activeTemplate.'user.twofactor', compact('pageTitle', 'secret', 'qrCodeUrl'));
    }

    public function create2fa(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);
        $response = verifyG2fa($user,$request->code,$request->key);
        if ($response) {
            $user->tsc = $request->key;
            $user->ts = 1;
            $user->save();
            $userAgent = getIpInfo();
            $osBrowser = osBrowser();
            notify($user, '2FA_ENABLE', [
                'operating_system' => @$osBrowser['os_platform'],
                'browser' => @$osBrowser['browser'],
                'ip' => @$userAgent['ip'],
                'time' => @$userAgent['time']
            ]);
            $notify[] = ['success', 'Google authenticator enabled successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong verification code'];
            return back()->withNotify($notify);
        }
    }


    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $user = auth()->user();
        $response = verifyG2fa($user,$request->code);
        if ($response) {
            $user->tsc = null;
            $user->ts = 0;
            $user->save();
            $userAgent = getIpInfo();
            $osBrowser = osBrowser();
            notify($user, '2FA_DISABLE', [
                'operating_system' => @$osBrowser['os_platform'],
                'browser' => @$osBrowser['browser'],
                'ip' => @$userAgent['ip'],
                'time' => @$userAgent['time']
            ]);
            $notify[] = ['success', 'Two factor authenticator disable successfully'];
        } else {
            $notify[] = ['error', 'Wrong verification code'];
        }
        return back()->withNotify($notify);
    }

    // Rating
    public function rating(Request $request, $vehicle_id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|in:1,2,3,4,5',
            'comment' => 'nullable|string'
        ]);

        $vehicle = Vehicle::active()->where('id', $vehicle_id)->first();
        if (!$vehicle) {
            $notify[] = ['error', 'Invalid request!'];
            return back()->withNotify($notify);
        }

        $exist = Rating::where('user_id', auth()->id())->where('vehicle_id', $vehicle_id)->exists();
        if ($exist) {
            $notify[] = ['error', 'Already exist your rating!'];
            return back()->withNotify($notify);
        }

        $rating = new Rating();
        $rating->user_id = auth()->id();
        $rating->vehicle_id = $vehicle_id;
        $rating->rating = $request->rating;
        $rating->comment = $request->comment;
        $rating->save();

        $notify[] = ['success', 'Thanks for your rating!'];
        return back()->withNotify($notify);
    }

    public function vehicleBookingLog()
    {
        $pageTitle = 'Vehicle Booking Log';
        $emptyMessage = 'No history found.';
        $booking_logs = RentLog::active()->where('user_id', auth()->id())->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
        return view($this->activeTemplate.'user.vehicle_booking_log', compact('pageTitle', 'emptyMessage', 'booking_logs'));
    }

    public function planBookingLog()
    {
        $pageTitle = 'Plan Booking Log';
        $emptyMessage = 'No history found.';
        $booking_logs = PlanLog::active()->where('user_id', auth()->id())->with(['plan', 'user', 'pick_up_location'])->latest()->paginate(getPaginate());
        return view($this->activeTemplate.'user.plan_booking_log', compact('pageTitle', 'emptyMessage', 'booking_logs'));
    }
}
