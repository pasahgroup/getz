@php
    $subscribe_content = getContent('subscribe.content', true);
    $footer_content = getContent('footer.content', true);
    $contact = getContent('contact.content', true);
    $social_icons = getContent('social_icon.element', false, null, true);
    $policy_pages = getContent('policy_pages.element', false, null, true);
@endphp
 <script type="text/javascript" src="../js/jquery360.min.js"></script>
<link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/bootstrap.min.css')}}">

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
         <title>{{ $general->sitename(__($pageTitle)) }}</title>
           @include('partials.seo')

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


          <link rel="icon" href="../../../img/core-img/favicon.ico">

 
        <!-- Libraries Stylesheet -->

        <style type="text/css">
           .wrapper {
          padding: 5px;
           background-color: rgba(0,0,0,0.1);
          max-width: 100%;
          margin: 2px auto;
        }

        .demo-1 {
          /* overflow: hidden; */
          display: -webkit-box;
          -webkit-line-clamp: 2;
          -webkit-box-orient: vertical;
        }
        .demo-3 {
          /* overflow: hidden; */
          display: -webkit-box;
          -webkit-line-clamp: 3;
          -webkit-box-orient: vertical;
        }
        .demo-6 {
          /* overflow: hidden; */
          display: -webkit-box;
          -webkit-line-clamp: 6;
          -webkit-box-orient: vertical;
        }
        </style>

  <link href="../../../frontendp/lib/animate/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="../../../frontendp/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
           <link href="../../../frontendp/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

           <!-- Custom library  -->
   <link rel="icon" type="image/png" href="../../../mold/assets/img/favicon.png" />
 <link rel="stylesheet" href="../../../mold/assets/css/min/bootstrap.min.css" media="all">

<link rel="stylesheet" href="../../../assetf/style.css">
<!-- Original custom css -->
<!-- //New Added style -->
<link rel="stylesheet" href="../../../styleMain.css">

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/owl.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/main.css')}}">


  <link rel="stylesheet" href="../../../sonamaster/style.css">
   <link rel="stylesheet" href="../../../assetstaxio/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/animate.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/magnific-popup.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/jquery-ui.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/jquery.timepicker.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/nice-select.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/style.css">


    <link href="../../../frontendp/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <link rel="icon" type="image/png" href="../../../mold/assets/img/favicon.png" />

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/owl.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/main.css')}}">


   <link rel="stylesheet" href="../../../assetstaxio/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/animate.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/magnific-popup.min.css">
   
    @stack('style-lib')
    @stack('style')
    </head>
    <body>

    <!-- ##### Header Area End ##### -->
@include($activeTemplate.'layouts.topmenu')
 <section class="hero-area" style="padding-top:80px;">

@stack('fbComment')
   @if(!request()->routeIs('home'))
    @include($activeTemplate.'partials.breadcrumb')
@endif
@yield('content')

<!-- footer section start -->
@stack('script-lib')
@stack('script')
@include('partials.plugins')
@include('partials.notify')
</section>

   <section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(img/bg-img/p2.jpeg)">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-12">
                    <div class="cta-content text-center">
                        <h5 class="wow fadeInUp" data-wow-delay="300ms" style="color:fff"><span>The Rhonds Company Ltd</span></h5>
                        <h6 class="wow fadeInUp" data-wow-delay="400ms">The best Car Rental Dealers in Tanzania</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>


  @include($activeTemplate.'partials.footer')  
  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../../frontendp/lib/wow/wow.min.js" type="text/javascript"></script>
<script src="../../frontendp/lib/easing/easing.min.js" type="text/javascript"></script>
<script src="../../frontendp/lib/waypoints/waypoints.min.js" type="text/javascript"></script>
<script src="../../frontendp/lib/counterup/counterup.min.js" type="text/javascript"></script>
          <script src="../../frontendp/lib/owlcarousel/owl.carousel.min.js" type="text/javascript"></script>

    <!-- Template Javascript -->
    <!-- <script src="../../frontendp/js/main.js" type="text/javascript"></script> -->
    <script src="../../frontendp/js/main.js" type="text/javascript"></script>

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

<!-- ?Custom Javascript -->
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
  <script src="{{asset($activeTemplateTrue.'custom/cjs/main.js')}}"></script>

<script>
    $( function() {
        $( "#start-date" ).datepicker();
        $( "#end-date" ).datepicker();
    });
</script>
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



  <!-- Current Page JS -->
  <!-- <script src="../../../mold/assets/js/min/home.min.js"></script> -->
  <script>
    $(document).ready(function(){
            $('.equal-height > div').deasil_equalHeight();
            $('#carousel').carousel({
              interval: 10000
            })
          });
          $(window).resize(function(){
            $('.equal-height > div').deasil_equalHeight();
          });
  </script>


    <script src="../../../assetf/js/plugins.js"></script>
    <script src="../../../assetf/js/classy-nav.min.js"></script>
    <script src="../../../assetf/js/jquery-ui.min.js"></script>

    <script src="../../../assetf/js/active.js"></script>
     <script src="../../../assets2/js/main.js"></script>

<!-- Custom Javascript -->
 <script src="../../../img_library/scripts.js" type="text/javascript"></script>
 <!-- End of custom Javascript -->
    </body>
</html>