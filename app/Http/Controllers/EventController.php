<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Vehicle;
use App\Models\Tag;
use App\Models\Brand;
use App\Models\Cartype;
use App\Models\Color;
use App\Models\modelb;
use App\Models\Location;
use App\Models\Seater;

use App\Http\Requests\StoretukioRequest;
use App\Http\Requests\UpdatetukioRequest;
use Illuminate\Http\Request;

use App\Rules\FileTypeValidate;
use Carbon\Carbon;

class EventController extends Controller
{
    public function __construct(){
        $this->activeTemplate = activeTemplate();
    }


    public function index()
    {        
$vehicles = Vehicle::join('tags','tags.id','vehicles.tag_id')
        ->join('cartypes','cartypes.id','vehicles.car_body_type_id')
        ->with(['brand', 'seater','cartype'])->latest()
        ->select('vehicles.*','tags.tag','cartypes.car_body_type')
        ->paginate(getPaginate(15));
        
        $tags = Tag::where('status',1)->get();     
      
     //dd($vehicles);
        $events=Event::where('status',1)  
        ->select('events.*')
        ->paginate(getPaginate(15));

//dd($events);

        $pageTitle = 'People who killed';
        $empty_message = 'No vehicle has been added.';
        return view('events.index', compact('pageTitle', 'empty_message', 'vehicles','tags','events'));
    }



     public function add()
    {
        $pageTitle = 'Add New Incidents';

           $locations = Location::where('status',1)->get();

        $seaters = Seater::active()->orderBy('number')->get();
        return view('events.add', compact('pageTitle','locations'));
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
    public function store(Request $request)
    {

        $request->validate([
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
            // 'icon' => 'required|array',
            // 'icon.*' => 'required|string',
            // 'label' => 'required|array',
            // 'label.*' => 'required|string',
            // 'value' => 'required|array',
            // 'value.*' => 'required|string',
        ]);



        $event = new Event();
        $event->name = $request->name;
         $event->event_title = $request->event_title;
         $event->event_type = $request->event_type;
          $event->event_place = $request->event_place;

         $event->region = $request->region;
        $event->district = $request->district;

         $event->date_event = $request->date_event;
           $event->details = $request->details;
      
       
        // Upload image
        foreach ($request->images as $image) {
            $path = imagePath()['vehicles']['path'];
            $size = imagePath()['vehicles']['size'];
            $images[] = uploadImage($image, $path, $size);
        }

     
        $event->images = $images;      

        $event->save();

        $notify[] = ['success', 'Report submitted Successfully!'];
        return back()->withNotify($notify);
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
        $event = Event::findOrFail($id);
        $pageTitle = 'Edit Event';
          $locations = Location::where('status',1)->get(); 
 $locations = Location::where('status',1)->get();  

        return view('events.edit', compact('event','locations','pageTitle'));
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

        $request->validate([
             'name' => 'required|string',
             'region' => 'required|string',
              'district' => 'required|string',

            'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
        ]);

        $event = Event::findOrFail($id);
       
        $event->name = $request->name;
         $event->event_title = $request->event_title;
         $event->event_type = $request->event_type;
          $event->event_place = $request->event_place;

         $event->region = $request->region;
        $event->district = $request->district;

         $event->date_event = $request->date_event;
           $event->details = $request->details;

      

        // Upload and Update image
        if ($request->images){
            foreach ($request->images as $image) {
                $path = imagePath()['vehicles']['path'];
                $size = imagePath()['vehicles']['size'];

                $images[] = uploadImage($image, $path, $size);
            }
            $event->images = array_merge($event->images, $images);
        }

        $event->save();

        $notify[] = ['success', 'Event Updated Successfully!'];
        return back()->withNotify($notify);
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
