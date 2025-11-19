<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Vehicle;
use App\Models\Tag;
use App\Models\Brand;
use App\Models\Cartype;
use App\Models\Color;
use App\Models\modelb;
use App\Models\Location;
use App\Models\victims;

use App\Http\Requests\StoretukioRequest;
use App\Http\Requests\UpdatetukioRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Rules\FileTypeValidate;
use Carbon\Carbon;

class VictimsController extends Controller
{
    public function __construct(){
        $this->activeTemplate = activeTemplate();
    }


    public function index()
    {        

        $victims=victims::where('status',1)  
        ->select('victims.*')
        ->paginate(getPaginate(10));

//dd($events);

        $pageTitle = 'Victims';
        $empty_message = 'No Victim has been added.';
        return view('victims.indexVictims', compact('pageTitle','victims','empty_message'));
    }



     public function add()
    {
        $pageTitle = 'Add New Victims';
           $locations = Location::where('status',1)->get();  
        return view('victims.addVictims', compact('pageTitle','locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function eventDetails($id, $slug){
        // $vehicle = Vehicle::active()->where('id', $id)->with('ratings')->withCount('ratings')->withAvg('ratings', 'rating')->firstOrFail();
        $vehicle = Event::where('id', $id)->firstOrFail();
        $fullUrl = url()->full();
      

        $rental_terms = getContent('rental_terms.content', true);
        $pageTitle = 'Vehicle Details';

         //dd($event->images);
        return view($this->activeTemplate.'events.details',compact('vehicle','pageTitle', 'rental_terms','fullUrl'));
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretukioRequest  $request
     * @return \Illuminate\Http\Response
     */



protected function validator(array $data, $table)
{
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.$table],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
}


    public function store(Request $request)
   {
        $this->validate($request, [
           // 'title' => 'required|string|max:255',
            //'video' => 'required|file|mimetypes:video/mp4|max:5128',
             //'video' => 'required|file|mimes:mp4,mov,avi|max:51200', 
          
            'name' => 'required|string',
            // 'brand' => 'required|integer|gt:0',
            // 'seater' => 'required|integer|gt:0',
            // 'price' => 'required|numeric|gt:0',
            // 'details' => 'required|string',
            // 'model' => 'required|string',
            // 'car_model_no' => 'required|integer',

            // 'doors' => 'required|integer|gt:0',
            // 'transmission' => 'required|string',
            // 'fuel_type' => 'required|string',
            //  'car_body_type' => 'required|string',
            //  'tag' => 'required|string',
            //  'color' => 'required|string',
             'region' => 'required|string',
              'district' => 'required|string',

            'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
        ]);
 
       
       //dd('popo');

        $fileName = $request->video->getClientOriginalName();
        $filePath = 'videos/' . $fileName;
 
        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
 
        // File URL to access the video in frontend
        $url = Storage::disk('public')->url($filePath); 
        if ($isFileUploaded) {
            $victims = new victims();



             $victims->name = $request->name;
         $victims->event_title = $request->event_title;
         $victims->event_type = $request->event_type;
          $victims->event_place = $request->event_place;

         $victims->region = $request->region;
        $victims->district = $request->district;

         $victims->date_event = $request->date_event;
           $victims->details = $request->details;        
          $victims->path = $filePath;


           // Upload image
        foreach ($request->images as $image) {
            $path = imagePath()['vehicles']['path'];
            $size = imagePath()['vehicles']['size'];
            $images[] = uploadImage($image, $path, $size);        }     
            $victims->images = $images; 

            $victims->save();
 
            
    $notify[] = ['success', 'Video has been successfully uploaded!'];
        return back()->withNotify($notify);

            // return back()
            // ->with('success','Video has been successfully uploaded.');
        }
 
        return back()
            ->with('error','Unexpected error occured');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tukio  $tukio
     * @return \Illuminate\Http\Response
     */


  public function status($id)
    {
        $event = Event::findOrFail($id);
        $event->status = ($event->status ? 0 : 1);
        $event->save();

        $notify[] = ['success', ($event->status ? 'Activated!' : 'Deactivated!')];
        return back()->withNotify($notify);
    }


 public function deleteImage($id, $image)
    {
        $vehicle = Event::findOrFail($id);

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



    public function show(tukio $tukio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tukio  $tukio
     * @return \Illuminate\Http\Response
     */

       public function edit($id)
    {
        $victim = victims::findOrFail($id);
        $pageTitle = 'Edit Victim';
          $locations = Location::where('status',1)->get(); 
          $locations = Location::where('status',1)->get(); 
 //dd($locations); 

        return view('victims.editVictims', compact('victim','locations','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetukioRequest  $request
     * @param  \App\Models\tukio  $tukio
     * @return \Illuminate\Http\Response
     */


  public function update(Request $request,$id)
    {

        $this->validate($request, [
           // 'title' => 'required|string|max:255',
            //'video' => 'required|file|mimetypes:video/mp4|max:5128',
             //'video' => 'required|file|mimes:mp4,mov,avi|max:51200', 
          
            'name' => 'required|string',
            // 'brand' => 'required|integer|gt:0',
            // 'seater' => 'required|integer|gt:0',
            // 'price' => 'required|numeric|gt:0',
            // 'details' => 'required|string',
            // 'model' => 'required|string',
            // 'car_model_no' => 'required|integer',

            // 'doors' => 'required|integer|gt:0',
            // 'transmission' => 'required|string',
            // 'fuel_type' => 'required|string',
            //  'car_body_type' => 'required|string',
            //  'tag' => 'required|string',
            //  'color' => 'required|string',
             'region' => 'required|string',
              'district' => 'required|string',

            'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
        ]);
 
       
       //dd('popo');

        $fileName = $request->video->getClientOriginalName();
        $filePath = 'videos/' . $fileName;
 
        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
 
        // File URL to access the video in frontend
        $url = Storage::disk('public')->url($filePath); 
        


        $victims = new victims();
        if ($isFileUploaded) {         

        $victims->name = $request->name;
         $victims->event_title = $request->event_title;
         $victims->event_type = $request->event_type;
          $victims->event_place = $request->event_place;

         $victims->region = $request->region;
        $victims->district = $request->district;

         $victims->date_event = $request->date_event;
           $victims->details = $request->details;        
          $victims->path = $filePath;

          
           // Upload image
        foreach ($request->images as $image) {
            $path = imagePath()['vehicles']['path'];
            $size = imagePath()['vehicles']['size'];
            $images[] = uploadImage($image, $path, $size);       
             }     
            $victims->images = $images; 
 $victims->last_update = $request->last_update;  
 
            $victims->save(); 
            
    $notify[] = ['success', 'Video has been Updated successfully uploaded!'];
        return back()->withNotify($notify);
        }


        return back()
            ->with('error','Unexpected error occured');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tukio  $tukio
     * @return \Illuminate\Http\Response
     */
    public function destroy(tukio $tukio)
    {
        //
    }
}
