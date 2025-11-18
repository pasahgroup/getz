<?php

namespace App\Http\Controllers;

use App\Models\victims;
use App\Http\Requests\StorevictimsRequest;
use App\Http\Requests\UpdatevictimsRequest;

class VictimsController extends Controller
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
     * @param  \App\Http\Requests\StorevictimsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorevictimsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\victims  $victims
     * @return \Illuminate\Http\Response
     */
    public function show(victims $victims)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\victims  $victims
     * @return \Illuminate\Http\Response
     */
    public function edit(victims $victims)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevictimsRequest  $request
     * @param  \App\Models\victims  $victims
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatevictimsRequest $request, victims $victims)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\victims  $victims
     * @return \Illuminate\Http\Response
     */
    public function destroy(victims $victims)
    {
        //
    }
}
