<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\service;
use App\Models\Brand;
use App\Models\RentLog;
use App\Models\Seater;
use App\Models\cartype;
use App\Models\Vehicle;

use App\Rules\FileTypeValidate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
  public function index()
  {
   //   $vehicles = Vehicle::with(['brand', 'seater'])->latest()->paginate(getPaginate());
//dd('print');
      $services = service::latest()->paginate(getPaginate());
      //dd($services);

      $pageTitle = 'Services';
      $empty_message = 'No Service has been added.';
      return view('admin.services.index', compact('pageTitle', 'empty_message', 'services'));
  }

  public function add()
  {
      $pageTitle = 'Add Service';
      $brands = Brand::active()->orderBy('name')->get();
      $seaters = Seater::active()->orderBy('number')->get();
      return view('admin.services.add', compact('pageTitle', 'brands', 'seaters'));
  }


  public function store(Request $request)
  {
      $request->validate([
        'service_name' => 'required|string',
          'title' => 'required|string',
            'category' => 'required|string',
              'content' => 'required|string',
          'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
        ]);

                  $service = new service();
             $service->service_name = $request->service_name;
                $service->title = $request->title;
                   $service->category = $request->category;
                      $service->content = $request->content;
                      $service->status = $request->status;

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
                   $path =$attached->storeAs('public/services/', $imageToStore);

       }
  }


      $service->images = $imageToStore;
      $service->save();

      $notify[] = ['success', 'Service Added Successfully!'];
      return back()->withNotify($notify);
  }

  public function edit($id)
  {
      $service = service::findOrFail($id);
      $pageTitle = 'Edit Service';
      // $brands = Brand::active()->orderBy('name')->get();
      // $seaters = Seater::active()->orderBy('number')->get();

      return view('admin.services.edit', compact('pageTitle', 'service'));
  }


  public function update(Request $request,$id)
  {
      $request->validate([
          'service_name' => 'required|string',
            'title' => 'required|string',
              'category' => 'required|string',
                'content' => 'required|string',

          'images.*' => ['required', 'max:10000', new FileTypeValidate(['jpeg','jpg','png','gif'])],
      ]);

         // $cartype = service::findOrFail($id);
            $service = service::findOrFail($id);
         $service->service_name = $request->service_name;
            $service->title = $request->title;
               $service->category = $request->category;
                  $service->content = $request->content;
                    $service->status = $request->status;


     // $vehicle->specifications = $specifications;
//dd($request->status);

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
                   $path =$attached->storeAs('public/services/', $imageToStore);
                   $service->images = $imageToStore;

       }
  }
$service->save();
      $notify[] = ['success', 'Service Updated Successfully!'];
      // return back()->withNotify($notify);
      return redirect()->route('admin.service.index')->withNotify($notify);
  }


public function recovery($id)
  {
      $service = service::findOrFail($id);

      $images = $service->images;
      $path = imagePath()['vehicles']['path'];

      if (($old_image = array_search($image, $images)) !== false){
          removeFile($path.'/' . $old_image);
          unset($images[$old_image]);
      }

      $vehicle->images = $images;
      $vehicle->save();

      return response()->json(['success' => true, 'message' => 'Service image deleted!']);
  }


 public function deleteImage($id, $image)
  {
    // dd($id);
      $vehicle = service::findOrFail($id);
        return response()->json(['success' => true, 'message' => 'Service image deleted!']);
      }


public function delete($id)
  {
       $services = service::where('id',$id)->first();
      if($services){
          $services->delete();
           $notify[] = ['success', 'Services Removed Successfully!'];
            return redirect()->route('admin.service.index')->withNotify($notify);
      }
      else{
          $notify[] = ['error', 'Services added Successfully!'];
      return back()->withNotify($notify);
      }
  }


  public function status($id)
  {
      $service = service::findOrFail($id);
      $service->status = ($service->status ? 0 : 1);
      $service->save();

      $notify[] = ['success', ($service->status ? 'Activated!' : 'Deactivated!')];
      return back()->withNotify($notify);
  }

}
