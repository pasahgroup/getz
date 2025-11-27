<?php

namespace App\Http\Controllers;

use App\Models\eventwebreport;
use App\Http\Requests\StoreeventwebreportRequest;
use App\Http\Requests\UpdateeventwebreportRequest;
use App\Models\Event;
use App\Models\Suspect;
use Illuminate\Http\Request;

class EventwebreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('ddddd');
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
     * @param  \App\Http\Requests\StoreeventwebreportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreeventwebreportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\eventwebreport  $eventwebreport
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$event)
    {

$pageTitle=$event;
//dd($pageTitle);

           $eventWR=Event::where('status',1)  
        ->select('events.*')
        ->where('event_type',$event)
        ->paginate(getPaginate(15));
        //dd($eventWR);

$empty_message = 'No any '.$pageTitle. ' has been added';
        return view('reports.eventWebReportSummary', compact('eventWR','empty_message','pageTitle'));
    }

        public function photos(Request $request,$event)
    {

$pageTitle=$event;
//dd($pageTitle);

           $eventWR=Event::where('status',1)  
        ->select('events.*')
        ->paginate(getPaginate(15));
        //dd($eventWR);

$empty_message = 'No any '.$pageTitle. ' has been added';
        return view('reports.eventWebReportSummary', compact('eventWR','empty_message','pageTitle'));
    }


    public function suspect(Request $request,$sus)
    {
$pageTitle=$sus;
 // dd($sus);

            $suspectWR=Suspect::where('status',1)  
        ->select('suspects.*')
        ->where('category',$sus)
        ->paginate(getPaginate(15));

        $empty_message = 'No any '.$pageTitle. ' has been added';
        return view('reports.suspectWebReportSummary', compact('suspectWR','empty_message','pageTitle'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\eventwebreport  $eventwebreport
     * @return \Illuminate\Http\Response
     */
    public function edit(eventwebreport $eventwebreport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateeventwebreportRequest  $request
     * @param  \App\Models\eventwebreport  $eventwebreport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateeventwebreportRequest $request, eventwebreport $eventwebreport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\eventwebreport  $eventwebreport
     * @return \Illuminate\Http\Response
     */
    public function destroy(eventwebreport $eventwebreport)
    {
        //
    }
}
