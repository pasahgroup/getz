<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\employee;
use App\Http\Requests\StoredepartmentRequest;
use App\Http\Requests\UpdatedepartmentRequest;
use Illuminate\Http\Request;

class DepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // Fetch departments
         $departments['data'] = department::orderby("name","asc")
              ->select('id','name')
              ->get();

//dd( $departments['data']);
         // Load index view
         return view('index')->with("departments",$departments);
    }


// Fetch records
    public function getEmployees($departmentid=0){

         // Fetch Employees by Departmentid
         $empData['data'] = employee::orderby("name","asc")
              ->select('id','name')
              ->where('department',$departmentid)
              ->get();


 //dd( $empData['data']);
         return response()->json($empData);

    }


     public function getEmp($departmentid=0){

         // Fetch Employees by Departmentid
         $empData['data'] = employee::orderby("name","asc")
              ->select('id','name')
              ->where('department',$departmentid)
              ->get();


// dd( $empData['data']);
         return response()->json($empData);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredepartmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(department $department)
    {
        //dd('print');
       // Fetch departments
         $departments['data'] = department::orderby("name","asc")
              ->select('id','name')
              ->get();

//dd( $departments['data']);
         // Load index view
         return view('index')->with("departments",$departments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedepartmentRequest $request, department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(department $department)
    {
        //
    }
}
