@php
    $subscribe_content = getContent('subscribe.content', true);
    $footer_content = getContent('footer.content', true);
    $contact = getContent('contact.content', true);
    $social_icons = getContent('social_icon.element', false, null, true);
    $policy_pages = getContent('policy_pages.element', false, null, true);
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->


  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Tanzania Genocide" name="description">
  <meta content="Genocide" name="keywords">
 
    <!-- Title  -->
    <title>{{ $general->sitename(__($pageTitle)) }}</title>
           @include('partials.seo')

<!-- Don't remove the below CSS code -->
<style>
.truncate {
  width: 250px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  transition: all 0.3s ease;
}

.truncate:hover {
  white-space: normal;   
  overflow: visible;    
  text-overflow: clip;
}
</style>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">


<!-- eflyer -->
  <!-- Google Web Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">   -->
    <link href="../../../../multishop/css/fonts.css" rel="stylesheet">
     <link href="../../../../multishop/css/all.min.css" rel="stylesheet">
   
    <!-- Libraries Stylesheet -->
    <link href="../../../../multishop/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../../../multishop/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../../../multishop/css/style.css" rel="stylesheet">


 <link rel="stylesheet" href="../../../style.css">

       <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/owl.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/main.css')}}">

  @stack('style-lib')
    @stack('style')
</head>

<body>
    {{--
 @include($activeTemplate.'layouts.topmenu')
--}}


   <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="#">About</a>
                    <a class="text-body mr-3" href="#">Contact</a>
                    <a class="text-body mr-3" href="#">Help</a>
                    <a class="text-body mr-3" href="#">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                  
                  
                    <div class="btn-group mx-2">
                         <a href="{{ route('user.events.add') }}" class="cmn--btn">@lang('Upload photos')</a>
                                   <a href="{{ route('user.videos.add') }}" class="cmn--btn">@lang('Upload videos')</a>
                                           </div>
               
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">FR</button>
                            <button class="dropdown-item" type="button">AR</button>
                            <button class="dropdown-item" type="button">RU</button>
                        </div>
                    </div>

                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                                                         @auth
                              
                         
                                        <span class="navbar-user__name">Name: {{auth()->user()->username}}</span>
                                        <hr>
                                      <a href="{{ route('user.logout') }}" class="cmn--btn badge-primary float-right" style="background-color:red">@lang('Logout')</a>

                            @else
                                <a href="{{ route('user.login') }}" class="dropdown-item">@lang('Login')</a>

                                <a href="{{ route('user.register') }}" class="dropdown-item">@lang('Sign up')</a>
                            @endauth
                        </div>
                    </div>

                </div>

                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-1 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="text-primary bg-dark px-2">Tanzania General</span>
                    <span class="text-dark bg-primary px-2 ml-n1">Genocide(TGG)-(29th-Oct-2025)</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <!-- <p class="m-0">Customer Service</p> -->
                <h5 class="m-0">+000 0000 0000</h5>
            </div>
        </div>
    </div>



    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>General Summary Reports</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Incidents <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                  <a href="/event-web/Injured" class="dropdown-item">Injured(Jeruhiwa):<span class="badge badge-pill badge-warning"> {{$eventCounts->where('event_type','Injured')->count()}}</span></a>
                               <li><a href="/event-web/kidnapped" class="dropdown-item">kidnapped(Tekwa):<span class="badge badge-pill badge-warning"> {{$eventCounts->where('event_type','kidnapped')->count()}}</span></a></li>

                                            <a href="/event-web/killed" class="dropdown-item">killed(Uwawa):<span class="badge badge-pill badge-danger"> {{$eventCounts->where('event_type','killed')->count()}}</span></a>

                                            <a href="/event-web/Missed" class="dropdown-item">Missed(Potea bila Taarifa):<span class="badge badge-pill badge-info"> {{$eventCounts->where('event_type','Missed')->count()}}</span></a>


                                            <a href="/event-web/Totured" class="dropdown-item">Totured(Teswa):<span class="badge badge-pill badge-primary"> {{$eventCounts->where('event_type','Totured')->count()}}</span></a>

                                <a href="/event-web/Other" class="dropdown-item">Other(Ingineyo):<span class="badge badge-pill badge-success"> {{$eventCounts->where('event_type','Other')->count()}}</span></a>

                            </div>
                        </div>
         <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Suspects <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                  <a href="/suspect-web/Individual" class="dropdown-item">Individual(Mtu):<span class="badge badge-pill badge-danger"> {{$suspectCounts->where('category','Individual')->count()}}</span></a>

                                            <a href="/suspect-web/People" class="dropdown-item">Group of People(Kundi la Watu):<span class="badge badge-pill badge-info"> {{$suspectCounts->where('category','People')->count()}}</span></a>


                                            <a href="/suspect-web/Institute" class="dropdown-item">Institute(Taasisi):<span class="badge badge-pill badge-primary"> {{$suspectCounts->where('category','Institute')->count()}}</span></a>

                                            <a href="/suspect-web/Other" class="dropdown-item">Other(Nyingine):<span class="badge badge-pill badge-success"> {{$suspectCounts->where('category','Other')->count()}}</span></a>

                            </div>
                        </div>
                        
                        <a href="" class="nav-item nav-link">victims</a>
                               <!--  <a href="/view-photos/photos" class="nav-item nav-link">Incident Photos</a>
                                       <a href="/view-videos/videos" class="nav-item nav-link">Incident Videos</a> -->

                                         <a href="{{ route('event.search') }}" class="nav-item nav-link">Incident Photos</a>
                                       <a href="{{ route('video.search') }}" class="nav-item nav-link">Incident Videos</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="text-dark bg-light px-2">Tanzania General</span>
                        <span class="text-light bg-primary px-2 ml-n1">Genocide(TGG)</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="/" class="nav-item nav-link active">Home</a>
                            {{--
                            <a href="detail.html" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.html" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            --}}
                            <a href="#" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <span>  <a class="nav-brand" href="#"><img src="../.../../../../img/core-img/logo.png" alt=""></a></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>



@stack('fbComment')
   @if(!request()->routeIs('home'))
    @include($activeTemplate.'partials.breadcrumb')
@endif

@yield('content')

<!-- footer section start -->
@stack('script-lib')
@stack('script')
@include('partials.plugins')

 
 @include($activeTemplate.'layouts.footer')


 <!-- JavaScript Libraries -->
    <script src="../../../multishop/js/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> -->

      <script src="../../../multishop/js/bootstrap.bundle.min.js"></script>

    <script src="../../../multishop/lib/easing/easing.min.js"></script>
    <script src="../../../multishop/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../../../multishop/mail/jqBootstrapValidation.min.js"></script>
    <script src="../../../multishop/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../../../multishop/js/main.js"></script>


    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="../../../js/jquery/jquery-2.2.4.min.js"></script>
  
    <!-- Popper js -->
    <script src="../../../js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../../../js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="../../../js/plugins.js"></script>
    <script src="../../../js/classy-nav.min.js"></script>
    <script src="../../../js/jquery-ui.min.js"></script>
    <!-- Active js -->
    <script src="../../../js/active.js"></script>

    <!-- Custom2 -->
      <!-- <script src="../../../eflyer/js/jquery.min.js"></script> -->
      <script src="../../../eflyer/js/popper.min.js"></script>
      <script src="../../../eflyer/js/bootstrap.bundle.min.js"></script>
      <!-- <script src="../../../eflyer/js/jquery-3.0.0.min.js"></script> -->
     
    <!-- ?Custom Javascript -->
<script src="{{asset($activeTemplateTrue.'js/jquery-ui.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/bootstrap.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/rafcounter.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/magnific-popup.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/owl.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>

</body>
</html>