<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\RentLog;
use App\Models\Seater;
use App\Models\cartype;
use App\Models\Vehicle;
use App\Models\modelb;

use App\Rules\FileTypeValidate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ModelbController extends Controller
{
    public function index()
    {
     //   $vehicles = Vehicle::with(['brand', 'seater'])->latest()->paginate(getPaginate());

        $vehicles = modelb::join('brands','brands.id','modelbs.brand_id')
        ->select('brands.name','modelbs.*')
        ->latest()->paginate(getPaginate(10));
       // dd($vehicles);

        $pageTitle = 'Car Models';
        $empty_message = 'No Car model has been added.';
        return view('admin.models.index', compact('pageTitle', 'empty_message', 'vehicles'));
    }

    public function add()
    {
        $pageTitle = 'Add car model';
        $brands = Brand::active()->orderBy('name')->get();
        $vehicles = modelb::join('brands','brands.id','modelbs.brand_id')
        ->select('brands.name','modelbs.*')
        ->latest()->paginate(getPaginate());

       // dd($vehicles);
        $seaters = Seater::active()->orderBy('number')->get();
        return view('admin.models.add', compact('pageTitle', 'brands', 'seaters','vehicles'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string',
         'modelb' => 'required|string',
                  ]);

        $car_modelb = new modelb();
        $car_modelb->brand_id = $request->brand;
          $car_modelb->car_model = $request->modelb;
        $car_modelb->save();

        $notify[] = ['success', 'Car model Added Successfully!'];
        return back()->withNotify($notify);
    }

    public function edit($id)
    {

        //dd($id);
        $modelbs = modelb::findOrFail($id);
        $pageTitle = 'Edit Car model';
         $brands = Brand::active()->orderBy('name')->get();
        $seaters = Seater::active()->orderBy('number')->get();

        //dd($modelbs);
        return view('admin.models.edit', compact('pageTitle','brands','modelbs','id'));
    }


    public function update(Request $request,$id)
    {
          $request->validate([
            'brand' => 'required|string',
         'modelb' => 'required|string',
                  ]);


   // $update = modelb::where('id',$id)->update([
   //              'from'=>$from,
   //              'to'=>$from + $paid
   //          ]);

 // $car_modelb = modelb::where('id',$id)->first();
 //  dd($car_modelb);
        //   $car_modelb = modelb::findOrFail($id);
        
 $car_modelb = modelb::findOrFail($id);
            // $rent_log->status = 1;
            // $rent_log->trx = $deposit->trx;
            // $rent_log->save();

        $car_modelb->brand_id = $request->brand;
          $car_modelb->car_model = $request->modelb;        
        $car_modelb->save();

        $notify[] = ['success', 'Car model Updated Successfully!'];
        // return back()->withNotify($notify);
        return redirect()->route('admin.modelb.index')->withNotify($notify);
    }


public function recovery($id)
    {

        $vehicle = modelb::findOrFail($id);

        $images = $vehicle->images;
        $path = imagePath()['vehicles']['path'];

        if (($old_image = array_search($image, $images)) !== false){
            removeFile($path.'/' . $old_image);
            unset($images[$old_image]);
        }

        $vehicle->images = $images;
        $vehicle->save();

        return response()->json(['success' => true, 'message' => 'Car body type image deleted!']);
    }


   public function deleteImage($id, $image)
    {

        //dd($id);

        $vehicle = modelb::findOrFail($id);

        // $images = $vehicle->images;
        // $path = imagePath()['vehicles']['path'];

        // if (($old_image = array_search($image, $images)) !== false){
        //     removeFile($path.'/' . $old_image);
        //     unset($images[$old_image]);
        // }

        // $vehicle->images = $images;
        // $vehicle->save();

          return response()->json(['success' => true, 'message' => 'Car body type image deleted!']);
        }

    
 public function delete($id)
    {
       // dd('print');

        //dd($id);
         $cartypes = modelb::where('id',$id)->first();
        if($cartypes){
            $cartypes->delete();
             $notify[] = ['success', 'Car model Removed Successfully!'];
              return redirect()->route('admin.modelb.index')->withNotify($notify);
        }
        else{
            $notify[] = ['error', 'Car Car type added Successfully!'];
        return back()->withNotify($notify);
        }
    }

  
    public function status($id)
    {

        $vehicle = modelb::findOrFail($id);
        $vehicle->status = ($vehicle->status ? 0 : 1);
        $vehicle->save();

        $notify[] = ['success', ($vehicle->status ? 'Activated!' : 'Deactivated!')];
        return back()->withNotify($notify);
    }

    //Booking Log
    public function bookingLog()
    {

        //dd($id);
        $booking_logs = RentLog::active()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
        $pageTitle = 'Vehicle Booking Log';
        $empty_message = 'No data found.';
        return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    }
    public function upcomingBookingLog()
    {
        $booking_logs = RentLog::active()->upcoming()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
        $pageTitle = 'Vehicle Upcoming Booking Log';
        $empty_message = 'No data found.';
        return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    }
    public function runningBookingLog()
    {
        $booking_logs = RentLog::active()->running()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
        $pageTitle = 'Vehicle Running Booking Log';
        $empty_message = 'No data found.';
        return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    }
    public function completedBookingLog()
    {
        $booking_logs = RentLog::active()->completed()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
        $pageTitle = 'Vehicle Completed Booking Log';
        $empty_message = 'No data found.';
        return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    }

    public function userBookingLog($id)
    {
        $booking_logs = RentLog::active()->where('user_id', $id)->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
        $pageTitle = 'User Vehicle Booking Log';
        $empty_message = 'No data found.';
        return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    }
    public function userUpcomingBookingLog($id)
    {
        $booking_logs = RentLog::active()->where('user_id', $id)->upcoming()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
        $pageTitle = 'User Vehicle Upcoming Booking Log';
        $empty_message = 'No data found.';
        return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    }
    public function userRunningBookingLog($id)
    {
        $booking_logs = RentLog::active()->where('user_id', $id)->running()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
        $pageTitle = 'User Vehicle Running Booking Log';
        $empty_message = 'No data found.';
        return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    }
    public function userCompletedBookingLog($id)
    {
        $booking_logs = RentLog::active()->where('user_id', $id)->completed()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
        $pageTitle = 'User Vehicle Completed Booking Log';
        $empty_message = 'No data found.';
        return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    }
}
