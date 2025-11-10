
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="d-md-flex justify-content-between align-items-center">
             

                  <div class="phone-number d-flex">
                    <div class="icon">
                        <img src="img/icons/phone-call.png" alt="">
                    </div>
                    <div class="number">
                        <a href="#">(+000)000 000 000</a>
                    </div>

                     <div class="email-address_no">
                    <a href="#">
                      <i class="fa fa-envelope" style="color:#F2C107;"></i><b style="color:#F2C107;"> No Email</b></a>
                       <a href="#" style="padding-left:10px">
                            </a>
                </div>
                </div>
      


                <div class="phone-numberx d-flexx">
                           <div class="d-flex align-items-center justify-content-end float-right">
                                      <ul class="footer-social">
                         
                         <div class="footer__widget widget__about">
                                       <ul class="social-icons">
 

    <?php if(auth()->guard()->check()): ?>
                                                               <a href="<?php echo e(route('user.events.index')); ?>" class="btn btn-secondary btn-md-square rounded-circle me-3"><?php echo app('translator')->get('Upload Photos'); ?></a>
                                
                                <a href="/logout" class="btn btn-secondary btn-md-square rounded-circle me-3"><?php echo app('translator')->get('Logout'); ?></a>


                            <?php else: ?>
                              
                    <form  method="GET"  action="<?php echo e(route('user.login')); ?>" enctype="multipart/form-data">
                             <?php echo csrf_field(); ?>
    <input type="hidden" name="_method" value="GET">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                
                <button type="submit" class="btn btn-secondary btn-md-square rounded-circle me-3"><?php echo app('translator')->get('Login'); ?></button>
                                </form>

                                <a href="<?php echo e(route('user.register')); ?>" class="btn btn-secondary btn-md-square rounded-circle me-3"><?php echo app('translator')->get('Sign Up'); ?></a>
                           



                            <?php endif; ?>













                    
                    </ul>
                </div>
                 </ul>
            </div>
                </div>



                <div class="phone-numberx d-flexx">
                           <div class="d-flex align-items-center justify-content-end float-right">
                                      <ul class="footer-social">
                         
                         <div class="footer__widget widget__about">
                                       <ul class="social-icons">

                          <?php $__empty_1 = true; $__currentLoopData = $social_icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <a href="<?php echo e($item->data_values->url); ?>" class="btn btn-secondary btn-md-square rounded-circle me-3">
                                    <?php echo @$item->data_values->social_icon ?>
                                </a>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>

                    </ul>
                </div>
                 </ul>
            </div>
                </div>

            </div>
        </div>




        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">
                      <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(getImage(imagePath()['logoIcon']['path'].'/logo.png')); ?>" alt="logo" style="width:120px;"></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>

                                 <li><a href="/">
       <?php if(auth()->guard()->check()): ?>
                     <a class="nav-link" href="<?php echo e(route('user.home')); ?>">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <div class="badge badge-primary"><span class="menu-title">Dashboard</span></div>
            </a>
                             <?php endif; ?>

                                 </a></li>
                                <li><a href="/">Home</a></li>

                                <li><a href="#">Vehicles</a>
                                    <ul class="dropdown">

                                          <?php $__currentLoopData = $view_brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="#"><?php echo e($brand->name); ?></a>                                           
                                         
                                            <ul class="dropdown">
                                                   <?php $__currentLoopData = $view_vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li style="padding-left:10px;">

                                                     <?php if($vehicle->brand_id==$brand->id): ?>
      <form action="<?php echo e(route('vehicle.search')); ?>" method="get" class="priceForm">
<input type="hidden" name="model" id="model" value="<?php echo e($vehicle->model); ?>" class="form-control form--control" required>
  <button  class="dropdown-item"><?php echo e($vehicle->model); ?></button>
                                          </form>
  <?php endif; ?>

                                                </li>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>                                            

                                        </li>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>



  <li><a href="#">Services</a>
                                            <ul class="dropdown">
                                             <?php $__currentLoopData = $view_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view_service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <form action="<?php echo e(route('web-service',$view_service->service_name)); ?>" method="get" class="priceForm">
            <button  class="dropdown-item"><?php echo e($view_service->title); ?></button>
                                                  </form>
           


  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
  </li>
                                          
                                     

                            <li><a href="<?php echo e(route('plans')); ?>">Plans</a></li>
                            <li><a href="<?php echo e(route('blogs')); ?>">Blog</a></li>
                            <li><a href="/about">About Us</a></li>
                                <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header><?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/layouts/topmenu.blade.php ENDPATH**/ ?>