<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\RentLog;
use App\Models\Seater;
use App\Models\cartype;
use App\Models\Vehicle;

use App\Rules\FileTypeValidate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartypeController extends Controller
{
    public function index()
    {
     //   $vehicles = Vehicle::with(['brand', 'seater'])->latest()->paginate(getPaginate());

        $vehicles = Cartype::latest()->paginate(getPaginate());
       // dd($vehicles);

        $pageTitle = 'Car body type';
        $empty_message = 'No Car body type has been added.';
        return view('admin.cartype.index', compact('pageTitle', 'empty_message', 'vehicles'));
    }

    public function add()
    {
        $pageTitle = 'Add car body type';
        $brands = Brand::active()->orderBy('name')->get();
        $seaters = Seater::active()->orderBy('number')->get();
        return view('admin.cartype.add', compact('pageTitle', 'brands', 'seaters'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'car_body_type' => 'required|string',
            'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
                  ]);
        $cartype = new Cartype();
        $cartype->car_body_type = $request->car_body_type;

       // dd($cartype);
 if(request('images')){
            $attach = request('images');
            foreach($attach as $attached){

  // Get filename with extension
                     $fileNameWithExt =$attached->getClientOriginalName();
                     // Just Filename
                     $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                     // Get just Extension
                     $extension = $attached->getClientOriginalExtension();
                     //Filename to store
                     $imageToStore = $filename.'_'.time().'.'.$extension;
                     //upload the image
                     $path =$attached->storeAs('public/cartypes/', $imageToStore);


         }
    }


        $cartype->images = $imageToStore;
        $cartype->save();

        $notify[] = ['success', 'Car body type Added Successfully!'];
        return back()->withNotify($notify);
    }

    public function edit($id)
    {
        $vehicle = Cartype::findOrFail($id);
        $pageTitle = 'Edit Car body type';
        // $brands = Brand::active()->orderBy('name')->get();
        // $seaters = Seater::active()->orderBy('number')->get();

        //dd($vehicle);
        return view('admin.cartype.edit', compact('pageTitle', 'vehicle'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'car_body_type' => 'required|string',
            'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
        ]);

           $cartype = Cartype::findOrFail($id);
           $cartype->car_body_type = $request->car_body_type;


       // $vehicle->specifications = $specifications;
 //dd('print');
        // Upload and Update image
       if(request('images')){
         //dd('print2');
            $attach = request('images');
            foreach($attach as $attached){

  // Get filename with extension
                     $fileNameWithExt =$attached->getClientOriginalName();
                     // Just Filename
                     $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                     // Get just Extension
                     $extension = $attached->getClientOriginalExtension();
                     //Filename to store
                     $imageToStore = $filename.'_'.time().'.'.$extension;
                     //upload the image
                     $path =$attached->storeAs('public/cartypes/', $imageToStore);


                     $cartype->images = $imageToStore;

         }
    }

    //dd('print');


$cartype->save();

        $notify[] = ['success', 'Car body type Updated Successfully!'];
        // return back()->withNotify($notify);
        return redirect()->route('admin.cartype.index')->withNotify($notify);
    }


public function recovery($id)
    {

     //   dd('print');

        $vehicle = Cartype::findOrFail($id);

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

        $vehicle = Vehicle::findOrFail($id);

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
         $cartypes = Cartype::where('id',$id)->first();
        if($cartypes){
            $cartypes->delete();
             $notify[] = ['success', 'Car Car type Removed Successfully!'];
              return redirect()->route('admin.cartype.index')->withNotify($notify);
        }
        else{
            $notify[] = ['error', 'Car Car type added Successfully!'];
        return back()->withNotify($notify);
        }
    }


    public function status($id)
    {

        $vehicle = Cartype::findOrFail($id);
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
