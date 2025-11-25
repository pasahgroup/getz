<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Movies;
use App\Models\Genres;
use App\Language; 
use App\HomeSection;
use App\RecentlyWatched;
use App\Slider;
use App\Models\video;
use App\Models\ActorDirector;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str;

use App\Http\Requests\StoremoveRequest;
use App\Http\Requests\UpdatemoveRequest;

class VideosController extends Controller
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


   public function movies_list()
    { 
       
        // if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Normal")
        // {

        //     \Session::flash('flash_message', trans('words.access_denied'));
        //     return redirect('/');
            
        //  }
        

        $page_title=trans('words.movies_text');
        
        //$language_list = Language::orderBy('language_name')->get();
        
        $genres_list = Genres::orderBy('genre_name')->get();

        if(isset($_GET['s']))
        {
            $keyword = $_GET['s'];  
            $movies_list = video::where("video_title", "LIKE","%$keyword%")->orderBy('video_title')->paginate(12);

            $movies_list->appends(\Request::only('s'))->links();
        }    
        else if(isset($_GET['language_id']))
        {
            $language_id = $_GET['language_id'];
            $movies_list = video::where("movie_lang_id", "=",$language_id)->orderBy('id','DESC')->paginate(12);

            $movies_list->appends(\Request::only('language_id'))->links();
        }
        else if(isset($_GET['genres_id']))
        {
            $genres_id = $_GET['genres_id'];
            $movies_list = video::whereRaw("find_in_set('$genres_id',movie_genre_id)")->orderBy('id','DESC')->paginate(12);

            $movies_list->appends(\Request::only('genres_id'))->links();
        }
        else
        {
            $movies_list = video::orderBy('id','DESC')->paginate(12);
        } 

        //dd('poppp');
         $pageTitle="Page Title";
        //return view('admin.pages.movies.list',compact('page_title','movies_list','language_list','genres_list'));
        return view('videos.list',compact('page_title','pageTitle','movies_list','genres_list'));
    }




     public function addMovie()    { 
        
        // if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        // {

        //         \Session::flash('flash_message', trans('words.access_denied'));

        //         return redirect('dashboard');
                
        // }

          $page_title=trans('words.add_movie');

       // $language_list = Language::orderBy('language_name')->get();
        $genre_list = Genres::orderBy('genre_name')->get();

        $actor_list = ActorDirector::where('ad_type','actor')->orderBy('ad_name')->get();
        $director_list = ActorDirector::where('ad_type','director')->orderBy('ad_name')->get();

        return view('videos.addedit',compact('page_title','genre_list','actor_list','director_list'));
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
     * @param  \App\Http\Requests\StoremoveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremoveRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\move  $move
     * @return \Illuminate\Http\Response
     */
    public function show(move $move)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\move  $move
     * @return \Illuminate\Http\Response
     */
    public function edit(move $move)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemoveRequest  $request
     * @param  \App\Models\move  $move
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemoveRequest $request, move $move)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\move  $move
     * @return \Illuminate\Http\Response
     */
    public function destroy(move $move)
    {
        //
    }
}
