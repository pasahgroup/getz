<?php

namespace App\Providers;

use App\Models\AdminNotification;
use App\Models\Deposit;
use App\Models\Frontend;
use App\Models\GeneralSetting;
use App\Models\Language;
use App\Models\Page;
use App\Models\SupportTicket;
use App\Models\User;
use App\Models\cartype;
use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\service;
use App\Models\Event;

use App\Models\Suspect;
use App\Models\Video;
use App\Models\victims;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app['request']->server->set('HTTPS', true);
//check that app is local
if ($this->app->isLocal()) {
//if local register your services you require for development
    $this->app->register('Barryvdh\Debugbar\ServiceProvider');
} else {
//else register your services you require for production
    $this->app['request']->server->set('HTTPS', true);
}

   }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         
        $activeTemplate = activeTemplate();
        $general = GeneralSetting::first();
        $viewShare['general'] = $general;
        $viewShare['activeTemplate'] = $activeTemplate;
        $viewShare['activeTemplateTrue'] = activeTemplate(true);
        $viewShare['language'] = Language::all();
        $viewShare['pages'] = Page::where('tempname',$activeTemplate)->where('slug','!=','home')->get();

        $viewShare['cartypes'] = cartype::orderBy('car_body_type')->get();
    //
       $viewShare['view_brands'] = brand::join('vehicles','vehicles.brand_id','brands.id')
       ->select('brands.id','brands.name')
       ->groupby('vehicles.brand_id')
       ->get();

       $viewShare['view_vehicles'] = brand::join('vehicles','vehicles.brand_id','brands.id')
       //->groupby('vehicles.brand_id')
        ->orderBy('model')->get();

          $viewShare['view_services'] = service::where('category','!=','Main')
          ->orderBy('title','asc')->get();

// $viewShare['general'] = $eventCounts;
//  $viewShare['eventCounts'] = Event::where('status',1)->get();
     

      view()->composer('*',function($view) {
  // $view->with('userCount', Auth::user());
  //$view->with('user', Auth::user());
   //$view->with('user', Auth::user());

  $view['eventCounts'] = Event::where('status',1)->get();
  $view['eventCounts'] =collect($view->eventCounts);
         
 $view['videosCounts'] = Video::where('status',1)->get();
  $view['videosCounts'] =collect($view->videosCounts);

 $view['suspectCounts'] = Suspect::where('status',1)->get();
  $view['suspectCounts'] =collect($view->suspectCounts);

        
         $view['victimsCounts'] = victims::where('status',1)->get();
  $view['victimsCounts'] =collect($view->victimsCounts);




         //dd($view->eventCounts);

            //$view->with('user', Auth::user());
            // $view->with('userx', user::all());


            //->select('properties.property_name')->first());
             //$view->with('qnsCount', collect($qnsCount));

             // $view->with('company', myCompany::where('id',$company_id)->where('status','Active')->first());
        });









         //dd($viewShare['view_brands']);
        view()->share($viewShare);

        view()->composer('admin.partials.sidenav', function ($view) {
            $view->with([
                'banned_users_count'           => User::banned()->count(),
                'email_unverified_users_count' => User::emailUnverified()->count(),
                'sms_unverified_users_count'   => User::smsUnverified()->count(),
                'pending_ticket_count'         => SupportTicket::whereIN('status', [0,2])->count(),
                'pending_deposits_count'    => Deposit::pending()->count(),
            ]);

        });




         view()->composer('admin.partialsuser.sidenav', function ($view) {
            $view->with([
                'banned_users_count'           => User::banned()->count(),
                'email_unverified_users_count' => User::emailUnverified()->count(),
                'sms_unverified_users_count'   => User::smsUnverified()->count(),
                'pending_ticket_count'         => SupportTicket::whereIN('status', [0,2])->count(),
                'pending_deposits_count'    => Deposit::pending()->count(),
            ]);

        });

        view()->composer('admin.partials.topnav', function ($view) {
            $view->with([
                'adminNotifications'=>AdminNotification::where('read_status',0)->with('user')->orderBy('id','desc')->get(),
            ]);
        });

   view()->composer('admin.partialsuser.topnav', function ($view) {
            $view->with([
                'adminNotifications'=>AdminNotification::where('read_status',0)->with('user')->orderBy('id','desc')->get(),
            ]);
        });


        view()->composer('partials.seo', function ($view) {
            $seo = Frontend::where('data_keys', 'seo.data')->first();
            $view->with([
                'seo' => $seo ? $seo->data_values : $seo,
            ]);
        });

          view()->composer('partialsuser.seo', function ($view) {
            $seo = Frontend::where('data_keys', 'seo.data')->first();
            $view->with([
                'seo' => $seo ? $seo->data_values : $seo,
            ]);
        });


        if($general->force_ssl){
            \URL::forceScheme('https');
        }

  view()->composer('*', function ($view) {
  $view->with('userff', Auth::user());
});
        Paginator::useBootstrap();
    }
}
