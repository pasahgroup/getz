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
use App\Models\Seater;

use App\Http\Requests\StoretukioRequest;
use App\Http\Requests\UpdatetukioRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Rules\FileTypeValidate;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;


use App\Jobs\ConvertVideoToMp4;
use Illuminate\Support\Str;

class VideoUploadController extends Controller
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
        $videos=Video::where('status',1)  
        ->select('videos.*')
        ->paginate(getPaginate(10));

//dd($videos);

        $pageTitle = 'People who killed';
        $empty_message = 'No vehicle has been added.';
        return view('videos.index', compact('pageTitle', 'empty_message', 'vehicles','tags','videos'));
    }



     public function add()
    {
        $pageTitle = 'Add New Incidents';
           $locations = Location::where('status',1)->get();   

        $seaters = Seater::active()->orderBy('number')->get();
        return view('videos.addVideo', compact('pageTitle','locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



   public function videoDetails($id, $slug){
        // $vehicle = Vehicle::active()->where('id', $id)->with('ratings')->withCount('ratings')->withAvg('ratings', 'rating')->firstOrFail();
        $vehicle = Video::where('id', $id)->firstOrFail();
        $fullUrl = url()->full();
      
        $rental_terms = getContent('rental_terms.content', true);
            $pageTitle = $vehicle->event_type.' Details';

         //dd($event->images);
        return view($this->activeTemplate.'events.videoDetails',compact('vehicle','pageTitle', 'rental_terms','fullUrl'));
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
             'video' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi|max:120800'
        ]);
 
       
      // dd('popo');

        $fileName = $request->video->getClientOriginalName();
        $filePath = 'videos/' . $fileName;
 
        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
 
        // File URL to access the video in frontend
        $url = Storage::disk('public')->url($filePath); 
        if ($isFileUploaded) {
            $video = new Video();

             $video->name = $request->name;
         $video->event_title = $request->event_title;
         $video->event_type = $request->event_type;
          $video->event_place = $request->event_place;

         $video->region = $request->region;
        $video->district = $request->district;

         $video->date_event = $request->date_event;
           $video->details = $request->details;        
          $video->path = $filePath;
            $video->save();
 
            

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
        $event = video::findOrFail($id);
        $event->status = ($event->status ? 0 : 1);
        $event->save();

        $notify[] = ['success', ($event->status ? 'Activated!' : 'Deactivated!')];
        return back()->withNotify($notify);
    }


 public function deleteImage($id, $image)
    {
        $vehicle = video::findOrFail($id);

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
        $video = Video::findOrFail($id);
        $pageTitle = 'Edit Video';
          $locations = Location::where('status',1)->get(); 
 $locations = Location::where('status',1)->get(); 
 //dd($locations); 

        return view('videos.editVideo', compact('video','locations','pageTitle'));
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

        $video = video::findOrFail($id);
       
        $video->name = $request->name;
         $video->event_title = $request->event_title;
         $video->event_type = $request->event_type;
          $video->event_place = $request->event_place;

         $video->region = $request->region;
        $video->district = $request->district;

         $video->date_event = $request->date_event;
        $video->details = $request->details;
      



// Source - https://stackoverflow.com/q
// Posted by Ajmal Razeel
// Retrieved 2025-11-29, License - CC BY-SA 3.0

File::Delete('/storage/app/'.$video->path);


// $path = 'videos/vb.mp4'; // relative path stored in DB
// if (!file_exists(public_path($path))) {
//     unlink(public_path($path)); // delete file
// }










if ($request->hasFile('video')) {
    //$file = $request->file('video');
    //$filename = $file->getClientOriginalName();

    $fileName = $request->video->getClientOriginalName();
        $filePath = 'videos/' . $fileName;
 
        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
 
        // File URL to access the video in frontend
        $url = Storage::disk('public')->url($filePath); 
        if ($isFileUploaded) {
          $video->path = $filePath;
      }
    
  } 
   

        $video->save();
        $notify[] = ['success', 'Video Updated Successfully!'];
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
