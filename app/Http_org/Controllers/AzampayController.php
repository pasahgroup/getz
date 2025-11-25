<?php

namespace App\Http\Controllers;

use App\Models\azampay;
use App\Http\Requests\StoreazampayRequest;
use App\Http\Requests\UpdateazampayRequest;

class AzampayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('print');
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
     * @param  \App\Http\Requests\StoreazampayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreazampayRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\azampay  $azampay
     * @return \Illuminate\Http\Response
     */
    public function show(azampay $azampay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\azampay  $azampay
     * @return \Illuminate\Http\Response
     */
    public function edit(azampay $azampay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateazampayRequest  $request
     * @param  \App\Models\azampay  $azampay
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateazampayRequest $request, azampay $azampay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\azampay  $azampay
     * @return \Illuminate\Http\Response
     */
    public function destroy(azampay $azampay)
    {
        //
    }
}
