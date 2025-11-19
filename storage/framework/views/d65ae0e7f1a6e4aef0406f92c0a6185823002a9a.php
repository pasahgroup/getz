<?php
    $subscribe_content = getContent('subscribe.content', true);
    $footer_content = getContent('footer.content', true);
    $contact = getContent('contact.content', true);
    $social_icons = getContent('social_icon.element', false, null, true);
    $policy_pages = getContent('policy_pages.element', false, null, true);
?>

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
    <title><?php echo e($general->sitename(__($pageTitle))); ?></title>
           <?php echo $__env->make('partials.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">


<!-- eflyer -->

   <link rel="stylesheet" type="text/css" href="../../../eflyer/css/bootstrap.min.css">
      <!-- style css -->
      <!-- <link rel="stylesheet" type="text/css" href="../../../eflyer/css/style.css"> -->
      <!-- Responsive-->
      <link rel="stylesheet" href="../../../eflyer/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="../../../eflyer/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="../../../eflyer/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> -->

  <!-- <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet"> -->
      <link rel="stylesheet" href="../../../eflyer/css/owl.carousel.min.css">
      <link rel="stylesoeet" href="../../../eflyer/css/owl.theme.default.min.css">
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen"> -->
  

<!-- Style CSS -->
    <link rel="stylesheet" href="../../../style.css">

     <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/line-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/magnific-popup.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/owl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/main.css')); ?>">


  <!-- <link rel="stylesheet" href="../../../sonamaster/style.css"> -->
   <link rel="stylesheet" href="../../../assetstaxio/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/animate.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/magnific-popup.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/jquery-ui.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/jquery.timepicker.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/nice-select.min.css">
    <link rel="stylesheet" href="../../../assetstaxio/css/style.css">

  <?php echo $__env->yieldPushContent('style-lib'); ?>
    <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body>
     <!-- ##### Header Area Start ##### -->

    <!-- ##### Header Area End ##### -->

 <?php echo $__env->make($activeTemplate.'layouts.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldPushContent('fbComment'); ?>
   <?php if(!request()->routeIs('home')): ?>
    <?php echo $__env->make($activeTemplate.'partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>

<!-- footer section start -->
<?php echo $__env->yieldPushContent('script-lib'); ?>
<?php echo $__env->yieldPushContent('script'); ?>
<?php echo $__env->make('partials.plugins', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 
 <?php echo $__env->make($activeTemplate.'layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- ##### Footer Area End ##### -->

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
      <script src="../../../eflyer/js/jquery-3.0.0.min.js"></script>
      <!-- <script src="../../../eflyer/js/plugin.js"></script> -->
   
      <script src="../../../eflyer/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../../../eflyer/js/custom.js"></script>

    <!-- ?Custom Javascript -->

<script src="<?php echo e(asset($activeTemplateTrue.'js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/rafcounter.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/owl.min.js')); ?>"></script>
<script src="<?php echo e(asset($activeTemplateTrue.'js/main.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/layouts/frontend.blade.php ENDPATH**/ ?>