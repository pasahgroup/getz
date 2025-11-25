<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\RentLog;
use App\Models\Seater;
// use App\Models\cartype;
use App\Models\Vehicle;

use App\Models\Tag;
use App\Models\Color;

use App\Rules\FileTypeValidate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
     //   $vehicles = Vehicle::with(['brand', 'seater'])->latest()->paginate(getPaginate());

        $colors = Color::latest()->paginate(getPaginate());
        //dd($Tags);

        $pageTitle = 'Colors';
        $empty_message = 'No Car Color has been added.';
        return view('admin.colors.index', compact('pageTitle', 'empty_message', 'colors'));
    }

    public function add()
    {
        $pageTitle = 'Add Car color';
        $brands = Brand::active()->orderBy('name')->get();
        $seaters = Seater::active()->orderBy('number')->get();
        return view('admin.colors.add', compact('pageTitle', 'brands', 'seaters'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'color' => 'required|string',
            // 'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
                  ]);


        $color = new Color();
        $color->color = $request->color;
        
      // dd($color);


        $color->save();

        $notify[] = ['success', 'Car color added Successfully!'];
        return back()->withNotify($notify);
    }

    public function edit($id)
    {
        $vehicle = Color::findOrFail($id);
        $pageTitle = 'Edit Car Color';
        // $brands = Brand::active()->orderBy('name')->get();
        // $seaters = Seater::active()->orderBy('number')->get();

        //dd($vehicle);
        return view('admin.colors.edit', compact('pageTitle', 'vehicle'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'color' => 'required|string',
            // 'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
        ]);

           $color = Color::findOrFail($id);
           $color->color = $request->color;
           $color->save();

        $notify[] = ['success', 'Car body type Updated Successfully!'];
        // return back()->withNotify($notify);
        // return redirect()->back()->withNotify($notify);
        return redirect()->route('admin.color.index')->withNotify($notify);
    }


public function recovery($id)
    {

     //   dd('print');

        $vehicle = Tag::findOrFail($id);

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
         $color = Color::where('id',$id)->first();
        if($color){
            $color->delete();
             $notify[] = ['success', 'Car color Removed Successfully!'];
              return redirect()->route('admin.color.index')->withNotify($notify);
        }
        else{
            $notify[] = ['error', 'Car color added Successfully!'];
        return back()->withNotify($notify);
        }
    }

  
    public function status($id)
    {

        $vehicle = Tag::findOrFail($id);
        $vehicle->status = ($vehicle->status ? 0 : 1);
        $vehicle->save();

        $notify[] = ['success', ($vehicle->status ? 'Activated!' : 'Deactivated!')];
        return back()->withNotify($notify);
    }

    // //Booking Log
    // public function bookingLog()
    // {

    //     //dd($id);
    //     $booking_logs = RentLog::active()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
    //     $pageTitle = 'Vehicle Booking Log';
    //     $empty_message = 'No data found.';
    //     return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    // }
    // public function upcomingBookingLog()
    // {
    //     $booking_logs = RentLog::active()->upcoming()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
    //     $pageTitle = 'Vehicle Upcoming Booking Log';
    //     $empty_message = 'No data found.';
    //     return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    // }
    // public function runningBookingLog()
    // {
    //     $booking_logs = RentLog::active()->running()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
    //     $pageTitle = 'Vehicle Running Booking Log';
    //     $empty_message = 'No data found.';
    //     return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    // }
    // public function completedBookingLog()
    // {
    //     $booking_logs = RentLog::active()->completed()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
    //     $pageTitle = 'Vehicle Completed Booking Log';
    //     $empty_message = 'No data found.';
    //     return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    // }

    // public function userBookingLog($id)
    // {
    //     $booking_logs = RentLog::active()->where('user_id', $id)->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
    //     $pageTitle = 'User Vehicle Booking Log';
    //     $empty_message = 'No data found.';
    //     return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    // }
    // public function userUpcomingBookingLog($id)
    // {
    //     $booking_logs = RentLog::active()->where('user_id', $id)->upcoming()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
    //     $pageTitle = 'User Vehicle Upcoming Booking Log';
    //     $empty_message = 'No data found.';
    //     return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    // }
    // public function userRunningBookingLog($id)
    // {
    //     $booking_logs = RentLog::active()->where('user_id', $id)->running()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
    //     $pageTitle = 'User Vehicle Running Booking Log';
    //     $empty_message = 'No data found.';
    //     return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    // }
    // public function userCompletedBookingLog($id)
    // {
    //     $booking_logs = RentLog::active()->where('user_id', $id)->completed()->with(['vehicle', 'user', 'pick_up_location', 'drop_up_location'])->latest()->paginate(getPaginate());
    //     $pageTitle = 'User Vehicle Completed Booking Log';
    //     $empty_message = 'No data found.';
    //     return view('admin.vehicle.bookinglog', compact('pageTitle', 'empty_message', 'booking_logs'));
    // }
}
