<?php

namespace App\Http\Controllers;

use App\Models\cartype;
use App\Http\Requests\StorecartypeRequest;
use App\Http\Requests\UpdatecartypeRequest;

class CartypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $vehicles = Vehicle::with(['brand', 'seater'])->latest()->paginate(getPaginate(10));
        $pageTitle = 'Vehicles';
        $empty_message = 'No vehicle has been added.';
        return view('admin.vehicle.index', compact('pageTitle', 'empty_message', 'vehicles'));
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
     * @param  \App\Http\Requests\StorecartypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecartypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cartype  $cartype
     * @return \Illuminate\Http\Response
     */
    public function show(cartype $cartype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cartype  $cartype
     * @return \Illuminate\Http\Response
     */
    public function edit(cartype $cartype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecartypeRequest  $request
     * @param  \App\Models\cartype  $cartype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecartypeRequest $request, cartype $cartype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cartype  $cartype
     * @return \Illuminate\Http\Response
     */
    public function destroy(cartype $cartype)
    {
        //
    }
}
