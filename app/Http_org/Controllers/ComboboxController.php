<?php

namespace App\Http\Controllers;

use App\Models\combobox;
use App\Models\color;

use App\Http\Requests\StorecomboboxRequest;
use App\Http\Requests\UpdatecomboboxRequest;


use App\Models\Brand;
use App\Models\Location;
use App\Models\RentLog;
use App\Models\Seater;
use App\Models\Vehicle;

use App\Models\multibooking;
use App\Models\Deposit;

use App\Models\Tag;
use App\Models\cartype;

use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
include_once(app_path().'/pesapal/oauth.php');




class ComboboxController extends Controller
{

  public function __construct(){
      $this->activeTemplate = activeTemplate();
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
     * @param  \App\Http\Requests\StorecomboboxRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecomboboxRequest $request)
    {
        //
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
     * Display the specified resource.
     *
     * @param  \App\Models\combobox  $combobox
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\combobox  $combobox
     * @return \Illuminate\Http\Response
     */
    public function edit(combobox $combobox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecomboboxRequest  $request
     * @param  \App\Models\combobox  $combobox
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecomboboxRequest $request, combobox $combobox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\combobox  $combobox
     * @return \Illuminate\Http\Response
     */
    public function destroy(combobox $combobox)
    {
        //
    }
}
