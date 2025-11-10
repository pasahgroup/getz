<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\RentLog;
use App\Models\Seater;
use App\Models\Vehicle;
use App\Models\Cartype;
use App\Models\Tag;
use App\Models\Color;
use App\Models\Location;
use App\Models\modelb;

use App\Rules\FileTypeValidate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::join('tags','tags.id','vehicles.tag_id')
        ->join('cartypes','cartypes.id','vehicles.car_body_type_id')
        ->with(['brand', 'seater','cartype'])->latest()
        ->select('vehicles.*','tags.tag','cartypes.car_body_type')
        ->paginate(getPaginate(15));
        $tags = Tag::where('status',1)->get();      
      
     //dd($vehicles);

        $pageTitle = 'Vehicles';
        $empty_message = 'No vehicle has been added.';
        return view('admin.vehicle.index', compact('pageTitle', 'empty_message', 'vehicles','tags'));
    }


    public function add()
    {
        $pageTitle = 'Add vehicle';
        $brands = Brand::where('status','1')
        ->active()->orderBy('name')->get();
        $cartypes = Cartype::where('status','1')
        ->orderBy('car_body_type')->get();
         $colors = Color::where('status','1')
         ->orderBy('color')->get();
          $modelbs = modelb::where('status','1')
          ->orderBy('car_model')->get();
 //dd($modelbs);

          $tags = Tag::where('status',1)->get(); 
           $locations = Location::where('status',1)->get();   

        $seaters = Seater::active()->orderBy('number')->get();
        return view('admin.vehicle.add', compact('pageTitle', 'brands', 'seaters','cartypes','tags','colors','locations','modelbs'));
    }



 public function pesapal(Request $request,$id)
    {
          //dd('print');

         //$track = session()->get('Track');
        // dd($track);
        // $data = Deposit::where('trx', $track)->where('status',0)->orderBy('id', 'DESC')->firstOrFail();
    //$data = Deposit::get();
        //dd($data);
         $data=RentLog::findOrFail($id);
 //dd($data);

        $pageTitle = 'Payment Preview';
          return view($this->activeTemplate . 'user.pesapal.preview', compact('data', 'pageTitle'));
    }



   public function getModel($p){
       // Fetch Employees by Departmentid
       $aData['dataA'] = vehicle::getModell($p);
       echo json_encode($aData);
       exit;
     }


    public function store(Request $request)
    {      
        $request->validate([
            'name' => 'required|string',
            'brand' => 'required|integer|gt:0',
            'seater' => 'required|integer|gt:0',
            'price' => 'required|numeric|gt:0',
            'details' => 'required|string',
            'model' => 'required|string',
            'car_model_no' => 'required|integer',

            'doors' => 'required|integer|gt:0',
            'transmission' => 'required|string',
            'fuel_type' => 'required|string',
             'car_body_type' => 'required|string',
             'tag' => 'required|string',
             'color' => 'required|string',
             'location' => 'required|string',

            'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
            'icon' => 'required|array',
            'icon.*' => 'required|string',
            'label' => 'required|array',
            'label.*' => 'required|string',
            'value' => 'required|array',
            'value.*' => 'required|string',
        ]);

//dd($car_body_type);
        $vehicle = new Vehicle();
        $vehicle->name = $request->name;
        $vehicle->brand_id = $request->brand;
        $vehicle->seater_id = $request->seater;
        $vehicle->price = $request->price;
        $vehicle->details = $request->details;
        $vehicle->model = $request->model;
        $vehicle->car_model_no = $request->car_model_no;

        $vehicle->doors = $request->doors;
        $vehicle->transmission = $request->transmission;
        $vehicle->fuel_type = $request->fuel_type;
         $vehicle->car_body_type_id = $request->car_body_type;
          $vehicle->tag_id = $request->tag;
           $vehicle->color_id = $request->color;
            $vehicle->location_id = $request->location;


        foreach ($request->label as $key => $item) {
            $specifications[$item] = [
                $request->icon[$key],
                $request->label[$key],
                $request->value[$key]
            ];
        }
        $vehicle->specifications = $specifications;

        // Upload image
        foreach ($request->images as $image) {
            $path = imagePath()['vehicles']['path'];
            $size = imagePath()['vehicles']['size'];
            $images[] = uploadImage($image, $path, $size);
        }
        $vehicle->images = $images;

        $vehicle->save();

        $notify[] = ['success', 'Vehicle Added Successfully!'];
        return back()->withNotify($notify);
    }


    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $pageTitle = 'Edit Vehicle';
        $brands = Brand::active()->orderBy('name')->get();
        $cartypes = Cartype::orderBy('car_body_type')->where('status',1)->get();
        $modelbs = modelb::where('status','1')
          ->orderBy('car_model')->get();

         $tags = Tag::where('status',1)->get();
          $colors = Color::orderBy('color')->get();
          $locations = Location::where('status',1)->get(); 

        $seaters = Seater::active()->orderBy('number')->get();
        return view('admin.vehicle.edit', compact('pageTitle', 'brands', 'seaters', 'vehicle','cartypes','tags','colors','locations','modelbs'));
    }

    public function update(Request $request,$id)
    {

        $request->validate([
            'name' => 'required|string',
            'brand' => 'required|integer|gt:0',
            'seater' => 'required|integer|gt:0',
            'price' => 'required|numeric|gt:0',
            'details' => 'required|string',
            'model' => 'required|string',
            'car_model_no' => 'required|integer',

            'doors' => 'required|integer|gt:0',
            'transmission' => 'required|string',
            'fuel_type' => 'required|string',
             'car_body_type' => 'required|string',
              'tag' => 'required|string',
                'color' => 'required|string',
                'location' => 'required|string',


            'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
            'icon' => 'required|array',
            'icon.*' => 'required|string',
            'label' => 'required|array',
            'label.*' => 'required|string',
            'value' => 'required|array',
            'value.*' => 'required|string',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->name = $request->name;
        $vehicle->brand_id = $request->brand;
        $vehicle->seater_id = $request->seater;
        $vehicle->price = $request->price;
        $vehicle->details = $request->details;
        $vehicle->model = $request->model;
         $vehicle->car_model_no = $request->car_model_no;

        $vehicle->doors = $request->doors;
        $vehicle->transmission = $request->transmission;
        $vehicle->fuel_type = $request->fuel_type;
 $vehicle->car_body_type_id = $request->car_body_type;
 $vehicle->tag_id = $request->tag;
  $vehicle->color_id = $request->color;
    $vehicle->location_id = $request->location;

        foreach ($request->label as $key => $item) {
            $specifications[$item] = [
                $request->icon[$key],
                $request->label[$key],
                $request->value[$key]
            ];
        }
        $vehicle->specifications = $specifications;

        // Upload and Update image
        if ($request->images){
            foreach ($request->images as $image) {
                $path = imagePath()['vehicles']['path'];
                $size = imagePath()['vehicles']['size'];

                $images[] = uploadImage($image, $path, $size);
            }
            $vehicle->images = array_merge($vehicle->images, $images);
        }

        $vehicle->save();

        $notify[] = ['success', 'Vehicle Updated Successfully!'];
        return back()->withNotify($notify);
    }

    public function deleteImage($id, $image)
    {
        $vehicle = Vehicle::findOrFail($id);

        $images = $vehicle->images;
        $path = imagePath()['vehicles']['path'];

        if (($old_image = array_search($image, $images)) !== false){
            removeFile($path.'/' . $old_image);
            unset($images[$old_image]);
        }

        $vehicle->images = $images;
        $vehicle->save();

        return response()->json(['success' => true, 'message' => 'Vehicle image deleted!']);
    }

    public function status($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->status = ($vehicle->status ? 0 : 1);
        $vehicle->save();

        $notify[] = ['success', ($vehicle->status ? 'Activated!' : 'Deactivated!')];
        return back()->withNotify($notify);
    }

    //Booking Log
    public function bookingLog()
    {
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


    
       public function destroy(Request $request)
    {
       //dd('remove');
    }
}
