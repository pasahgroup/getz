<?php

namespace App\Http\Controllers;

use App\Models\multibooking;
use App\Models\Brand;
use App\Models\RentLog;
use App\Models\Seater;
use App\Models\Vehicle;
use App\Models\Cartype;
use App\Models\Tag;
use App\Models\color;
use App\Models\Location;
use App\Models\modelb;
use App\Models\model;
use App\Models\user;
// use App\Models\user;

use Carbon\Carbon;
use DB;
use App\Http\Requests\StoremultibookingRequest;
use App\Http\Requests\UpdatemultibookingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Collection;
use Illuminate\Database\Schema\Blueprint;

class MultibookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Carbon::now()->addDays(5));

     $vehicles = multibooking::join('modelbs','modelbs.id','multibookings.model_id')
    // ->join('locations','location.id','multibookings.')
     ->select('multibookings.*','modelbs.car_model')
     ->where('multibookings.status',1)
     ->where('booked_by',auth()->id())
     ->latest()->paginate(getPaginate());
        

     // $vehicles_count=collect($vehicles);
     // dd($vehicles_count::select('id')->where('status',1));
      // $vehicles_count=($vehicles->where('status',1)->count());
      //dd($vehicles);

$user = user::where('id',auth()->id())->first();      
$datex=$vehicles->max('pick_time');
$multibookings=collect($vehicles);
   
    //dd($vehicles);

 $tags = Tag::where('status',1)->get();
  $locations = Location::where('status',1)->get();

        $pageTitle = 'Multibooking';
        $empty_message = 'No vehicle has been added.';
        return view('admin.multibookings.index', compact('pageTitle','locations','user', 'empty_message', 'vehicles','tags','datex'));
  
    }

  public function add()
    {
        $pageTitle = 'Add Multibooking';
        $brands = Brand::active()->orderBy('name')->get();
        $modelbs = modelb::orderBy('car_model')->get();
         $colors = color::orderBy('color')->get();
        //dd($colors);
          $tags = Tag::where('status',1)->get(); 
           $locations = Location::where('status',1)->get();   

        $seaters = Seater::active()->orderBy('number')->get();
        return view('admin.multibookings.add', compact('pageTitle', 'brands', 'seaters','modelbs','tags','colors','locations'));
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
     * @param  \App\Http\Requests\StoremultibookingRequest  $request
     * @return \Illuminate\Http\Response
     */
   

    public function store(Request $request)
    {
      
   //dd(($request->pick_time)->addDays(60));
   //$start_dx = substr(request('pick_time'),0,10);
       
    

        //dd($drop_time);
    
   
     //$currentDateTime = Carbon::now();
       // $newDateTime = Carbon::now()->addDays(8);
             
       // dd($currentDateTime);
        //print_r($newDateTime);

         // dd(request('pick_location'));

        $request->validate([
            'brand_id' => 'required|integer|gt:0',
            'model_id' => 'required|integer|gt:0',
            'price' => 'required|numeric|gt:0',
            'no_days' => 'required|integer|gt:0',
            // 'total_costs' => 'required|numeric|gt:0',

            'pick_location' => 'required|integer|gt:0',
            'drop_location' => 'required|integer|gt:0',
           
            // 'pick_time' => 'required|date',
            //  'drop_time' => 'required|date',

             'pick_time' => 'required|date_format:m/d/Y h:i a|after_or_equal:today',
             // 'drop_time' => 'required|date_format:m/d/Y h:i a|after_or_equal:'. $request->pick_time,
        ]);


  $pick_time = new Carbon(request('pick_time'));
        $drop_time = $pick_time->addDays(request('no_days'));
    //dd($pick_time);

        $multibooking = new multibooking();
        $multibooking->name ="multi-booking";
        $multibooking->brand_id = $request->brand_id;
        $multibooking->model_id = $request->model_id;
        $multibooking->price = $request->price;
         $multibooking->no_car = $request->no_car;

        $multibooking->no_days = $request->no_days;
        $multibooking->booked_by = $request->booked_by;
        $multibooking->total_costs = $request->price * $request->no_days*$request->no_car;
        
         $multibooking->pick_location = $request->pick_location;
         $multibooking->drop_location = $request->drop_location;

          $multibooking->pick_time =$pick_time;
         $multibooking->drop_time =$drop_time;
    
        $multibooking->booked_by =auth()->id();

        // $multibooking->car_body_type_id = $request->car_body_type;
        //   $multibooking->tag_id = $request->tag;
        //    $multibooking->color_id = $request->color;
        //     $multibooking->location_id = $request->location;


        $multibooking->save();

        $notify[] = ['success', 'Order Added Successfully!'];
        return back()->withNotify($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\multibooking  $multibooking
     * @return \Illuminate\Http\Response
     */
    public function showx($multibooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\multibooking  $multibooking
     * @return \Illuminate\Http\Response
     */
    public function edit(multibooking $multibooking,$id)
    {
        $pageTitle = 'Edit Booking with Serial No '.$id;
        $brands = Brand::active()->orderBy('name')->get();
        $modelbs = modelb::orderBy('car_model')->get();
         $colors = color::orderBy('color')->get();
 //dd($colors );
          $tags = Tag::where('status',1)->get(); 
           $locations = Location::where('status',1)->get(); 

        $seaters = Seater::active()->orderBy('number')->get();
          $multibooking = multibooking::where('id',$id)->first();
          //dd($multibooking);   
       
        return view('admin.multibookings.edit', compact('pageTitle', 'brands', 'seaters','modelbs','tags','colors','locations','multibooking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemultibookingRequest  $request
     * @param  \App\Models\multibooking  $multibooking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemultibookingRequest $request, multibooking $multibooking)
    {
        //
    }


 public function getModel($p){
       // Fetch Employees by Departmentid
       $aData['dataA'] = vehicle::getModell($p);
       echo json_encode($aData);
       exit;
     }

 public function show($brand=0){

         // Fetch Employees by Departmentid
         $empData['data'] = modelb::orderby("car_model","asc")
              ->select('id','brand_id','car_model')
              ->where('brand_id',$brand)
               // ->where('status',1)
              ->get();

 //dd( $empData['data']);
         return response()->json($empData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\multibooking  $multibooking
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request,$id)
    {
         $asset = multibooking::where('id',$id)->first();
        if($asset){
            $asset->delete();
             return redirect()->back()->with('success','Asset permanent deleted successfully');
        }
    }
}
