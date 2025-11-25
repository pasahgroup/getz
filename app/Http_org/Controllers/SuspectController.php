<?php

namespace App\Http\Controllers;

use App\Models\Suspect;
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

class SuspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

$vehicles = Vehicle::join('tags','tags.id','vehicles.tag_id')
        ->join('cartypes','cartypes.id','vehicles.car_body_type_id')
        ->with(['brand', 'seater','cartype'])->latest()
        ->select('vehicles.*','tags.tag','cartypes.car_body_type')
        ->paginate(getPaginate(15));
        
        $tags = Tag::where('status',1)->get();     
      
     //dd($vehicles);
        $suspects=Suspect::where('status',1)  
        ->select('suspects.*')
        ->paginate(getPaginate(15));



        $pageTitle = 'Suspected People,Group or Institute';
        $empty_message = 'No vehicle has been added.';
        return view('suspects.index', compact('pageTitle', 'empty_message','tags','suspects'));
    }



     public function add()
    {
        $pageTitle = 'Add New Events';
        $brands = Brand::where('status','1')
        ->active()->orderBy('name')->get();
        $cartypes = Cartype::where('status','1')
        ->orderBy('car_body_type')->get();
         $colors = Color::where('status','1')
         ->orderBy('color')->get();
          $modelbs = modelb::where('status','1')
          ->orderBy('car_model')->get();


          $tags = Tag::where('status',1)->get(); 
           $locations = Location::where('status',1)->get();   

        $seaters = Seater::active()->orderBy('number')->get();
        return view('suspects.add', compact('pageTitle', 'brands', 'seaters','cartypes','tags','colors','locations','modelbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
             //'color' => 'details|string',
             'category' => 'required|string',
              'title' => 'required|string',

            'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
            // 'icon' => 'required|array',
            // 'icon.*' => 'required|string',
            // 'label' => 'required|array',
            // 'label.*' => 'required|string',
            // 'value' => 'required|array',
            // 'value.*' => 'required|string',
        ]);
        $suspect = new Suspect();
        $suspect->name = $request->name;
         $suspect->title = $request->title;
         $suspect->category = $request->category;
        
           $suspect->details = $request->details;
      
       
        // Upload image
        foreach ($request->images as $image) {
            $path = imagePath()['vehicles']['path'];
            $size = imagePath()['vehicles']['size'];
            $images[] = uploadImage($image, $path, $size);
        }
     
        $suspect->images = $images;     
        $suspect->save();

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
        $event = Suspect::findOrFail($id);
        $event->status = ($event->status ? 0 : 1);
        $event->save();

        $notify[] = ['success', ($event->status ? 'Activated!' : 'Deactivated!')];
        return back()->withNotify($notify);
    }


 public function deleteImage($id, $image)
    {
        $suspect = Suspect::findOrFail($id);

        $images = $suspect->images;
        $path = imagePath()['vehicles']['path'];

        if (($old_image = array_search($image, $images)) !== false){
            removeFile($path.'/' . $old_image);
            unset($images[$old_image]);
        }

        $suspect->images = $images;
        $suspect->save();

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
        $suspect = Suspect::findOrFail($id);
        $pageTitle = 'Edit Suspect';
          $locations = Location::where('status',1)->get(); 
 $locations = Location::where('status',1)->get();  

        return view('suspects.edit', compact('suspect','locations','pageTitle'));
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
               'category' => 'required|string',
              'title' => 'required|string',

            'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
        ]);

        $event = Suspect::findOrFail($id);
       
        $event->name = $request->name;
         $event->title = $request->title;
         $event->category = $request->category;    
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
