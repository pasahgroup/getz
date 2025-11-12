<?php
    $subscribe_content = getContent('subscribe.content', true);
    $footer_content = getContent('footer.content', true);
    $contact = getContent('contact.content', true);
    $social_icons = getContent('social_icon.element', false, null, true);
    $policy_pages = getContent('policy_pages.element', false, null, true);
?>
 <script type="text/javascript" src="../js/jquery360.min.js"></script>
<link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/bootstrap.min.css')); ?>">

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Eflyer</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="../../../eflyer/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="../../../eflyer/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../../../eflyer/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="../../../eflyer/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="../../../eflyer/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="../../../eflyer/css/owl.carousel.min.css">
      <link rel="stylesoeet" href="../../../eflyer/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  


<!-- Custom css -->


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

    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/line-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/magnific-popup.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/owl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/main.css')); ?>">


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

    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/line-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/magnific-popup.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/owl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/main.css')); ?>">


   <link rel="stylesheet" href="../../../assetstaxio/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/animate.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/magnific-popup.min.css">
  <?php echo $__env->yieldPushContent('style-lib'); ?>
    <?php echo $__env->yieldPushContent('style'); ?>

   </head>
   <body>
      <!-- banner bg main start -->
      <div class="">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="#">Best Sellers</a></li>
                           <li><a href="#">Gift Ideas</a></li>
                           <li><a href="#">New Releases</a></li>
                           <li><a href="#">Today's Deals</a></li>
                           <li><a href="#">Customer Service</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="index.html"><img src="../../eflyer/images/logo.png"></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="/">Home</a>
                     <a href="fashion.html">Fashion</a>
                     <a href="electronic.html">Electronic</a>
                     <a href="jewellery.html">Jewellery</a>
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="../../../eflyer/images/toggle-icon.png"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                  </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search this blog">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>


 <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Incident reporting 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <a class="dropdown-item" href="<?php echo e(route('user.events.index')); ?>"><?php echo app('translator')->get('Event recording'); ?>(Rikodi Tukio)</a>
                        <a class="dropdown-item" href="<?php echo e(route('user.suspects.index')); ?>"><?php echo app('translator')->get('Suspected people'); ?>(Watuhumiwa)</a>
                     </div>
                  </div>

                              <div class="dropdown">
                      <div class="lang_box ">
                          <?php if(auth()->guard()->check()): ?> 
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">Sign out<i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
    <?php else: ?> 
                         <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">Sign in<i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
 <?php endif; ?>

                        <div class="dropdown-menu ">
                           <?php if(auth()->guard()->check()): ?>   
                             
                                <a href="/logout" class="#"><?php echo app('translator')->get('Sign out'); ?></a>
                            <?php else: ?> 

                           <a href="<?php echo e(route('user.login')); ?>" class="dropdown-item">
                           Sign in
                           </a>
                           <a href="<?php echo e(route('user.register')); ?>" class="dropdown-item">
                           Sign up
                           </a>
                              <?php endif; ?>
                        </div>                     


                     </div> 
                  </div>

               </div>
            </div>
         </div>
      </div>


<?php echo $__env->yieldPushContent('fbComment'); ?>
   <?php if(!request()->routeIs('home')): ?>
    <?php echo $__env->make($activeTemplate.'partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->yieldContent('content'); ?>

<!-- footer section start -->
<?php echo $__env->yieldPushContent('script-lib'); ?>
<?php echo $__env->yieldPushContent('script'); ?>
<?php echo $__env->make('partials.plugins', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <!-- jewellery  section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.html"><img src="../../../eflyer/images/footer-logo.png"></a></div>
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
               <ul>
                  <li><a href="#">Best Sellers</a></li>
                  <li><a href="#">Gift Ideas</a></li>
                  <li><a href="#">New Releases</a></li>
                  <li><a href="#">Today's Deals</a></li>
                  <li><a href="#">Customer Service</a></li>
               </ul>
            </div>
            <div class="location_main">Help Line  Number : <a href="#">+1 1800 1200 1200</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="../../../eflyer/js/jquery.min.js"></script>
      <script src="../../../eflyer/js/popper.min.js"></script>
      <script src="../../../eflyer/js/bootstrap.bundle.min.js"></script>
      <script src="../../../eflyer/js/jquery-3.0.0.min.js"></script>
      <script src="../../../eflyer/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="../../../eflyer/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../../../eflyer/js/custom.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>




<!-- custom JS -->
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
            window.location.href = "<?php echo e(route('home')); ?>/change/"+$(this).val() ;
        });

        //Cookie
        $(document).on('click', '.acceptPolicy', function () {
            $.ajax({
                url: "<?php echo e(route('cookie.accept')); ?>",
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
                url:'<?php echo e(route('subscribe')); ?>',
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
<script src="<?php echo e(asset($activeTemplateTrue.'js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/rafcounter.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/owl.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/main.js')); ?>"></script>


<!-- custo jss -->
  <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/bootstrap.min.js')); ?>"></script>

    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/jquery.nice-select.min.js')); ?>"></script>


    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/mixitup.min.js')); ?>"></script>

    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/jquery.slicknav.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/main.js')); ?>"></script>

<!-- custom2 -->
  <!-- JavaScript Libraries -->
  <script src="<?php echo e(asset($activeTemplateTrue.'custom/lib/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset($activeTemplateTrue.'custom/lib/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue.'custom/lib/jetmenu/jetmenu.js')); ?>"></script>
  <script src="<?php echo e(asset($activeTemplateTrue.'custom/cjs/main.js')); ?>"></script>

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
            window.location.href = "<?php echo e(route('home')); ?>/change/"+$(this).val() ;
        });

        //Cookie
        $(document).on('click', '.acceptPolicy', function () {
            $.ajax({
                url: "<?php echo e(route('cookie.accept')); ?>",
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
                url:'<?php echo e(route('subscribe')); ?>',
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


<!-- custom Js-->
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
            window.location.href = "<?php echo e(route('home')); ?>/change/"+$(this).val() ;
        });

        //Cookie
        $(document).on('click', '.acceptPolicy', function () {
            $.ajax({
                url: "<?php echo e(route('cookie.accept')); ?>",
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
                url:'<?php echo e(route('subscribe')); ?>',
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
<script src="<?php echo e(asset($activeTemplateTrue.'js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/rafcounter.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/owl.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/main.js')); ?>"></script>


<!-- custo jss -->
  <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/bootstrap.min.js')); ?>"></script>

    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/jquery.nice-select.min.js')); ?>"></script>


    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/mixitup.min.js')); ?>"></script>

    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/jquery.slicknav.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue.'custom/js/main.js')); ?>"></script>

<!-- custom2 -->
  <!-- JavaScript Libraries -->
  <script src="<?php echo e(asset($activeTemplateTrue.'custom/lib/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset($activeTemplateTrue.'custom/lib/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue.'custom/lib/jetmenu/jetmenu.js')); ?>"></script>
  <script src="<?php echo e(asset($activeTemplateTrue.'custom/cjs/main.js')); ?>"></script>

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
            window.location.href = "<?php echo e(route('home')); ?>/change/"+$(this).val() ;
        });

        //Cookie
        $(document).on('click', '.acceptPolicy', function () {
            $.ajax({
                url: "<?php echo e(route('cookie.accept')); ?>",
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
                url:'<?php echo e(route('subscribe')); ?>',
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
</html><?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/layouts/frontend.blade.php ENDPATH**/ ?>