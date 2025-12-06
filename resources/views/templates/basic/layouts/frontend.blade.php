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

<style>
  .text-style{
    white-space: pre-wrap
}
</style>


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
 @include($activeTemplate.'layouts.topmenu')


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