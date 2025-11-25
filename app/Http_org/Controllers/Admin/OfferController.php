<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Brand;
use App\Models\Seater;

use App\Models\Cartype;
use App\Models\modelb;
 use App\Models\Color;

  use App\Models\Vehicle;

  use App\Models\Location;
use App\Models\Tag;

use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $vehicles = Vehicle::with(['brand', 'seater'])->latest()->paginate(getPaginate());

        // $offersx = Offer::where('status',1)->orderBy('id')
        // ->latest()->paginate(getPaginate());
       

        $offers = Offer::join('vehicles','vehicles.model','offers.car_model')
             ->select('offers.*','vehicles.images')
             ->orderBy('offers.id')
            ->latest()->paginate(getPaginate());

 //dd($offers);
        $pageTitle = 'Discount';
        $empty_message = 'No Offer has been added.';
        return view('admin.offer.index', compact('pageTitle', 'empty_message', 'offers'));
    }


    public function add()
    {
        $pageTitle = 'Add vehicle';
        $brands = Brand::where('status','1')
        ->active()->orderBy('name')->get();
        $cartypes = Cartype::where('status','1')
        ->orderBy('car_body_type')->get();
         $colors = Color::where('status','1')
         ->orderBy('color')->get();
        
          $modelbsx = modelb::where('status','1')
          ->orderBy('car_model')->get();

$modelbs = Vehicle::where('status','1')
          ->select('vehicles.model')
          ->distinct()
          ->orderBy('model')->get();

//dd($modelbs);

          $tags = Tag::where('status',1)->get(); 
           $locations = Location::where('status',1)->get();   

        $seaters = Seater::active()->orderBy('number')->get();
        return view('admin.offer.add', compact('pageTitle', 'brands', 'seaters','cartypes','tags','colors','locations','modelbs'));
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
     * @param  \App\Http\Requests\StoreOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
  $request->validate([
            // 'name' => 'required|string',
            // 'brand' => 'required|integer|gt:0',
            // 'seater' => 'required|integer|gt:0',
            // 'price' => 'required|numeric|gt:0',
            // 'details' => 'required|string',
            'model' => 'required|string',
               'start_date' => 'required|date_format:m/d/Y h:i a|after_or_equal:today',
             'end_date' => 'required|date_format:m/d/Y h:i a|after_or_equal:'. $request->end_date,
         // 'percent' => 'required|numeric',

            // 'doors' => 'required|integer|gt:0',
            // 'transmission' => 'required|string',
            // 'fuel_type' => 'required|string',
            //  'car_body_type' => 'required|string',
            //  'tag' => 'required|string',
            //  'color' => 'required|string',
            //  'location' => 'required|string',
        ]);



$start_date = $request->start_date; //we got DD/MM/YYYY format date from form post data
$start_date = date('Y-m-d', strtotime($start_date)); 

$end_date = $request->end_date; //we got DD/MM/YYYY format date from form post data
$end_date = date('Y-m-d', strtotime($end_date)); 

//dd($end_date);

        $offers = new Offer();
        $offers->car_model = $request->model;
           $offers->percent = $request->percent;
            $offers->start_date = $start_date;
             $offers->end_date = $end_date;

              $offers->status = $request->status;

           
       $offers->save();
        $notify[] = ['success', 'Offer Added Successfully!'];
        return back()->withNotify($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfferRequest  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
