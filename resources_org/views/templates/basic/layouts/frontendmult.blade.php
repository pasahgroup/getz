<!doctype html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ $general->sitename(__($pageTitle)) }}</title>
    @include('partials.seo')

     <link rel="stylesheet" href="{{asset($activeTemplateTrue.'mold/assets/font/iconfont/iconstyle.css')}}">
     <link rel="stylesheet" href="{{asset($activeTemplateTrue.'mold/vendor/animate-css/animate.css')}}">
       <link rel="stylesheet" href="{{asset($activeTemplateTrue.'mold/assets/font/font-awesome/css/font-awesome.css')}}">
         <link rel="stylesheet" href="{{asset($activeTemplateTrue.'mold/assets/css/main.css')}}">
         

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/owl.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/main.css')}}">

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/color.php?color='.$general->base_color.'&secondColor='.$general->secondary_color)}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/bootstrap-fileinput.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/custom.css')}}">


<!-- Custom2 header menu css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'custom/ccss/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'custom/ccss/colors/blue.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'custom/ccss/bbpres.css')}}" type="text/css">

    <link href="{{asset($activeTemplateTrue.'custom/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset($activeTemplateTrue.'custom/lib/prettyphoto/css/prettyphoto.css')}}" rel="stylesheet">
  <link href="{{asset($activeTemplateTrue.'custom/lib/hover/hoverex-all.css')}}" rel="stylesheet">
  <link href="{{asset($activeTemplateTrue.'custom/lib/jetmenu/jetmenu.css')}}" rel="stylesheet">
  <link href=".{{asset($activeTemplateTrue.'custom/lib/owl-carousel/owl-carousel.css')}}" rel="stylesheet">

   <link href="{{asset($activeTemplateTrue.'custom/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Ruda:400,900,700" rel="stylesheet">

<!-- Custom css -->

 <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'custom/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'custom/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'custom/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'custom/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'custom/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'custom/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'custom/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'custom/css/style.css')}}" type="text/css">

<!--End of custom css -->


<!-- POPUM bootstrap -->
    <!-- bootstrap toggle css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/bootstrap-toggle.min.css')}}">
    <!-- fontawesome 5  -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/all.min.css')}}">
    <!-- line-awesome webfont -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/line-awesome.min.css')}}">

    @stack('style-lib')

    <!-- custom select box css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/nice-select.css')}}">
    <!-- code preview css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/prism.css')}}">
    <!-- select 2 css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/select2.min.css')}}">
    <!-- jvectormap css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/jquery-jvectormap-2.0.5.css')}}">
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/datepicker.min.css')}}">
    <!-- timepicky for time picker css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/jquery-timepicky.css')}}">
    <!-- bootstrap-clockpicker css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/bootstrap-clockpicker.min.css')}}">
    <!-- bootstrap-pincode css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/bootstrap-pincode-input.css')}}">
    <!-- dashdoard main css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/app.css')}}">

    @stack('style-lib')
    <!-- @stack('style') -->
</head>


<div class="header-top py-2" style="background-color:#698c68;">
    <div class="container-fluid">
        <div class="d-flex flex-wrap justify-content-between mx--10">
            <div class="header-top-item meta-list">
                <a href="Mailto:{{ getContent('contact.content', true)->data_values->email }}"><i class="lar la-envelope"></i>{{ getContent('contact.content', true)->data_values->email }}</a>
            </div>
            <div class="d-flex flex-wrap meta-list">
                @auth
                    <div class="header-top-item ml-sm-auto">
                        <a href="{{ route('user.home') }}"><i class="las la-tachometer-alt"></i>@lang('Dashboard')</a>
                    </div>
                    <div class="header-top-item">
                        <a href="{{ route('user.logout') }}"><i class="las la-sign-out-alt"></i>@lang('Logout')</a>
                    </div>
                @else
                    <div class="header-top-item ml-sm-auto">
                        <a href="{{ route('user.login') }}"><i class="las la-user"></i>@lang('Login')</a>
                    </div>
                    <div class="header-top-item">
                        <a href="{{ route('user.register') }}"><i class="las la-user-plus"></i>@lang('Register')</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>

<header class="header">
    <div class="container">
        <div class="col-lg-3 col-md-2 col-sm-12 title-area">      
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{getImage(imagePath()['logoIcon']['path'].'/logo.png')}}" alt="logo" style="width:140px;"></a>
            </div>
          </div>

                
        <!-- title area -->
        <div class="col-lg-9 col-md-12 col-sm-12">
           
          <div id="nav" class="float-right">
            <div class="container clearfix">
              <ul id="jetmenu" class="jetmenu blue">
               
                <li class="active"><a href="{{ route('home') }}">Home</a>
                </li>

                <li><a href="{{ route('vehicles') }}">Vehicles</a>
                  <ul class="dropdown">
                   @foreach($cartypes as $cartype)
                    <li><a href="/cartype-page/{{$cartype->car_body_type}}">{{$cartype->car_body_type}}</a></li>
                   @endforeach
                   
                  </ul>
                </li>
                          <li><a href="{{ route('user.multibooking.index') }}">Multi-Booking</a>
                </li>
                
                         <li><a href="{{ route('plans') }}">Plan</a>
                </li>
                              
                  <li><a href="{{ route('blogs') }}">Blog</a>
                </li>
                
                  @foreach($pages as $k => $data)
                    <li><a href="{{route('pages',[$data->slug])}}">{{__($data->name)}}</a></li>
                @endforeach
                  <li><a href="{{ route('contact') }}">Contact</a>
                </li>


                  <li class="py-3">
                    <select class="langSel language-select ms-3">
                        @foreach($language as $item)
                            <option value="{{$item->code}}"
                                    @if(session('lang') == $item->code) selected @endif>{{ __($item->name) }}</option>
                        @endforeach
                    </select>
                </li>

              </ul>
            </div>
          </div>
          <!-- nav -->
        </div>
        <!-- title area -->

      <!-- site header -->
    </div>
    <!-- end container -->
  </header>
<body>

@stack('fbComment')

<div class="overlay"></div>
<a href="#" class="scrollToTop"><i class="las la-angle-up"></i></a>

<!-- Preloader -->
{{--
<div class="preloader">
    <figure class="loader">
        <div class="car">
            <span class="car-body"></span>
            <span class="wheels"></span>
        </div>
        <div class="strikes">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </figure>
</div>
--}}
<!-- Breadcrumb section start -->
@if(!request()->routeIs('home'))
    @include($activeTemplate.'partials.breadcrumb')
@endif
<!-- Breadcrumb section end -->

@yield('content')


<!-- footer section start -->
@include($activeTemplate.'partials.footer')
<!-- footer section end -->

{{--Cookie--}}
@php
    $cookie = App\Models\Frontend::where('data_keys','cookie.data')->first();
@endphp
@if(@$cookie->data_values->status && !session('cookie_accepted'))
    <div class="cookie__wrapper">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <p class="txt my-2">

                    @php echo @$cookie->data_values->description @endphp

                    <a href="{{ @$cookie->data_values->link }}" target="_blank" class="text--base">@lang('Read Policy')</a>
                </p>
                <button class="btn btn--base btn-md my-2 acceptPolicy">@lang('Accept')</button>
            </div>
        </div>
    </div>
@endif

<script src="{{asset($activeTemplateTrue.'js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/jquery-ui.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/bootstrap.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/rafcounter.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/magnific-popup.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/owl.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>


<!-- custo jss -->
  <script src="{{asset($activeTemplateTrue.'custom/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'custom/js/bootstrap.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'custom/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'custom/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'custom/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'custom/js/mixitup.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'custom/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'custom/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'custom/js/main.js')}}"></script>

<!-- custom2 -->
  <!-- JavaScript Libraries -->
  <script src="{{asset($activeTemplateTrue.'custom/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset($activeTemplateTrue.'custom/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'custom/lib/jetmenu/jetmenu.js')}}"></script>
  <!-- <script src="{{asset($activeTemplateTrue.'custom/cjs/main.js')}}"></script> -->

  

<script>
    $( function() {
        $( "#start-date" ).datepicker();
        $( "#end-date" ).datepicker();
    });
</script>

@stack('script-lib')

@stack('script')

@include('partials.plugins')

@include('partials.notify')


<script>
    (function ($) {
        "use strict";
        $(".langSel").on("change", function() {
            window.location.href = "{{route('home')}}/change/"+$(this).val() ;
        });

        //Cookie
        $(document).on('click', '.acceptPolicy', function () {
            $.ajax({
                url: "{{ route('cookie.accept') }}",
                method:'GET',
                success:function(data){
                    if (data.success){
                        $('.cookie__wrapper').addClass('d-none');
                        notify('success', data.success)
                    }
                },
            });
        });

        //Subscribe
        $(document).on("submit", "#subscribeForm", function(e) {
            e.preventDefault();

            var data = $('#subscribeForm').serialize();

            $.ajax({
                url:'{{ route('subscribe') }}',
                method:'post',
                data:data,
                success:function(response){
                    if(response.success){
                        $('.subscribe_email').val('');
                        notify('success', response.message);
                    }else{
                        $.each(response.error, function( key, value ) {
                            notify('error', value);
                        });
                    }
                },
                error:function(error){
                    console.log(error)
                }
            });
        });
    })(jQuery);
</script>

</body>
</html>