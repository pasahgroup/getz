<?php

namespace App\Http\Controllers;

use App\Models\carmodel;
use App\Http\Requests\StorecarmodelRequest;
use App\Http\Requests\UpdatecarmodelRequest;

class CarmodelController extends Controller
{
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
     * @param  \App\Http\Requests\StorecarmodelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecarmodelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carmodel  $carmodel
     * @return \Illuminate\Http\Response
     */
    public function show(carmodel $carmodel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carmodel  $carmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(carmodel $carmodel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecarmodelRequest  $request
     * @param  \App\Models\carmodel  $carmodel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecarmodelRequest $request, carmodel $carmodel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carmodel  $carmodel
     * @return \Illuminate\Http\Response
     */
    public function destroy(carmodel $carmodel)
    {
        //
    }
}
