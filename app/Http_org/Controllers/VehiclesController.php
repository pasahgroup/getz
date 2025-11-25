<?php

namespace App\Http\Controllers;

use App\Models\vehicles;

use App\Http\Requests\StorevehiclesRequest;
use App\Http\Requests\UpdatevehiclesRequest;


use App\Models\Brand;
use App\Models\Location;
use App\Models\RentLog;
use App\Models\Seater;
use App\Models\Vehicle;
use App\Models\color;

use App\Models\multibooking;
use App\Models\Deposit;

use App\Models\Tag;
use App\Models\cartype;

use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
include_once(app_path().'/pesapal/oauth.php');

class VehiclesController extends Controller
{

     // include_once(app_path().'/pesapal/oauth.php');

    public function __construct(){
        $this->activeTemplate = activeTemplate();
    }

    public function vehicles(){
        $brands = Brand::active()->withCount('vehicles')->orderBy('name')->get();
        $seats = Seater::active()->withCount('vehicles')->orderBy('number')->get();

//dd($brands);
        $vehicles = Vehicle::active()->latest()->paginate(getPaginate());
        $pageTitle = 'All Vehicles';
        return view($this->activeTemplate.'vehicles.select',compact('vehicles','pageTitle', 'brands', 'seats'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorevehiclesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorevehiclesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */




     public function show(color $department)
   {
       //dd('print');
      // Fetch departments
      $pageTitle="Title";
        $departments['data'] = color::orderby("color","asc")
             ->select('id','color')
             ->get();

//dd($departments['data']);
        // Load index view

        return view($this->activeTemplate.'vehicles.select',compact('departments'));
        // return view('index')->with("departments",$departments);
        //return view('index',compact('departments'));
   }


  public function vehicleSearch(Request $request)
    {
      $vehicles=[];
  $models=[];

        $pageTitle="";
        $brands = Brand::active()->withCount('vehicles')->orderBy('name')->get();
        $seats = Seater::active()->withCount('vehicles')->orderBy('number')->get();


         $brandss=Vehicle::join('brands','brands.id','vehicles.brand_id')
         ->select('vehicles.*','brands.name')
         ->where('brands.status','1')
         ->groupby('brands.name')
         ->get();

 //         $brandss=DB::select('select a.property_id,a.metaname_id,m.metaname_name,a.indicator_id,a.asset_id, a.opt_answer_id,a.answer,o.answer_classification from answers a,optional_answers o,metanames m where a.indicator_id=o.indicator_id and a.metaname_id=m.id and a.opt_answer_id=o.id and a.datex="'.$current_date.'"');
 // $dataDaily = collect($reportDailyData);


       //dd($brandss);

        $vehicles = Vehicle::active();       //$pageTitle = 'Vehicle Search';

if(request('search'))
{
  dd('request is');
}else {


 // if(request('save')){
 //   dd('ddd');
 // }


        if ($request->name) {
            $vehicles->where('name', 'LIKE', "%{$request->name}%");
              $pageTitle=$request->name;
        }

        if ($request->brand !=null) {
            $vehicles->where('brand_id',$request->brand);
            //$brands=brand::where('id',$request->brand)->first();
$pageTitle="Page Page";
        }


        if ($request->model){
          // $vehicles->Where('model', 'LIKE', "%$request->model%");
            $vehicles->Where('model', "$request->model");
            $models=$vehicles;
              $pageTitle=$request->model;
            //  dd($models);
        }



        if ($request->seats){
            $vehicles = $vehicles->Where('seater_id', $request->seats);
              $pageTitle=$request->seats;
        }

        if ($request->min_price){
            $vehicles->where('price', '>=', $request->min_price);
              $pageTitle="Minimum Price ".$request->min_price;
        }

        if ($request->max_price){
            $vehicles->where('price', '<=', $request->max_price);
              $pageTitle="Maximum Price ".$request->max_price;
        }

        //Get vehicles

        if ($request->carbody!=null){
            $vehicles->Where('car_body_type_id', '=', "$request->carbody");
            $cartypes=cartype::where('id',$request->carbody)->first();
            $pageTitle=$cartypes->car_body_type;
           //dd($cartypes);

        }

        if ($request->cartag!=null){
            $vehicles->Where('tag_id', '=', "$request->cartag");
            $cartags=Tag::where('id',$request->cartag)->first();
            $pageTitle=$cartags->tag;
          //dd($pageTitle);
        }

//dd($request->carbody);


        $vehicles = $vehicles->latest()->paginate(4)->withQueryString();
      //    $brandss = $brandss->latest()->paginate(4)->withQueryString();
//dd($vehicles);

        $carBodies = vehicle::join('cartypes','vehicles.car_body_type_id','cartypes.id')
        ->select('vehicles.*','cartypes.car_body_type')
        ->groupby('vehicles.car_body_type_id')
             ->get();

             $carTags = vehicle::join('tags','vehicles.tag_id','tags.id')
             ->select('vehicles.*','tags.tag')
             ->groupby('vehicles.tag_id')
              ->get();
            }
      //  $carBodies = vehicle::join('vehicles.car_body_type_id','cartypes.id')->get();
// dd($carBodies);
        //Filter by Car body or Car Tag

   //$vehicle = Vehicle::active()->where('model',request('carModel'))->first();

      //dd($brandss);
      //Combo textBox

      //  $pageTitle="Title";
        $departments['data'] = color::orderby("color","asc")
             ->select('id','color')
             ->get();

        return view($this->activeTemplate.'vehicles.select',compact('departments','vehicles','pageTitle', 'brands','brandss','models', 'seats','carTags','carBodies'));
    }



    public function getEmployees($departmentid=0){

           // Fetch Employees by Departmentid
           $empData['data'] = color::orderby("color","asc")
                ->select('id','color')
                ->where('id',$departmentid)
                ->get();
           return response()->json($empData);
      }

      public function getEmp($departmentid=0){
      // Fetch Employees by Departmentid
      $empData['data'] = color::orderby("color","asc")
           ->select('id','color')
           ->where('id',$departmentid)
           ->get();
//dd( $empData['data']);
      return response()->json($empData);
 }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function edit(vehicles $vehicles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevehiclesRequest  $request
     * @param  \App\Models\vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatevehiclesRequest $request, vehicles $vehicles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function destroy(vehicles $vehicles)
    {
        //
    }
}
