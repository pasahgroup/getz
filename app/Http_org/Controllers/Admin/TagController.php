<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\RentLog;
use App\Models\Seater;
// use App\Models\cartype;
use App\Models\Vehicle;

use App\Models\Tag;

use App\Rules\FileTypeValidate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
     //   $vehicles = Vehicle::with(['brand', 'seater'])->latest()->paginate(getPaginate());

        $tags = Tag::latest()->paginate(getPaginate());
        //dd($Tags);

        $pageTitle = 'Car Tags';
        $empty_message = 'No Car tag has been added.';
        return view('admin.tags.index', compact('pageTitle', 'empty_message', 'tags'));
    }

    public function add()
    {
        $pageTitle = 'Add car Tag';
        $brands = Brand::active()->orderBy('name')->get();
        $seaters = Seater::active()->orderBy('number')->get();
        return view('admin.tags.add', compact('pageTitle', 'brands', 'seaters'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required|string',
            'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
                  ]);


        $tag = new Tag();
        $tag->tag = $request->tag;
        
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


        $tag->images = $imageToStore;
        $tag->save();

        $notify[] = ['success', 'Car Tag Added Successfully!'];
        return back()->withNotify($notify);
    }

    public function edit($id)
    {
        $vehicle = Tag::findOrFail($id);
        $pageTitle = 'Edit Car body type';
        // $brands = Brand::active()->orderBy('name')->get();
        // $seaters = Seater::active()->orderBy('number')->get();

        //dd($vehicle);
        return view('admin.tags.edit', compact('pageTitle', 'vehicle'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'tag' => 'required|string',
            'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
        ]);

           $tag = Tag::findOrFail($id);
           $tag->tag = $request->tag;

       

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


                     $tag->images = $imageToStore;

         }
    }

    //dd('print');


$tag->save();

        $notify[] = ['success', 'Car body type Updated Successfully!'];
        // return back()->withNotify($notify);
        return redirect()->route('admin.tag.index')->withNotify($notify);
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

      // dd($id);

        $vehicle = Color::findOrFail($id);

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
         $tags = Tag::where('id',$id)->first();
        if($tags){
            $tags->delete();
             $notify[] = ['success', 'Car Tag Removed Successfully!'];
              return redirect()->route('admin.tag.index')->withNotify($notify);
        }
        else{
            $notify[] = ['error', 'Car Tag added Successfully!'];
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
