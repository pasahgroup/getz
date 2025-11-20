    <header class="header-area">
<style>
    wider {
  width: 300px; /* Full width of parent */
}
.element {
  padding-left: 80px; /* Adds space inside the element before its content */
}
</style>


        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="h-100 d-md-flex justify-content-between align-items-center">
                <div class="email-address">
                    <a href="mailto:contact@southtemplate.com">Email: info@tanzaniagenocide.com</a>
                      <a href="mailto:contact@southtemplate.com"  class="element"></a>
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(route('user.events.add')); ?>" class="cmn--btn"><?php echo app('translator')->get('Upload Incident photos'); ?></a>
                                   <a href="<?php echo e(route('user.videos.add')); ?>" class="cmn--btn"><?php echo app('translator')->get('Upload Incident videos'); ?></a>

                                          <a href="#" class="cmn--btn"><?php echo app('translator')->get('Victims'); ?></a>
                                   <a href="#" class="cmn--btn"><?php echo app('translator')->get('Suspects'); ?></a>
                                      <a href="<?php echo e(route('user.logout')); ?>" class="cmn--btn badge-primary" style="background-color:red"><?php echo app('translator')->get('Logout'); ?></a>

                            <?php else: ?>
                                <a href="<?php echo e(route('user.login')); ?>" class="cmn--btn"><?php echo app('translator')->get('Login'); ?></a>

                                <a href="<?php echo e(route('user.register')); ?>" class="cmn--btn"><?php echo app('translator')->get('Sign up'); ?></a>
                            <?php endif; ?>
                </div>
     <div class="email-address">
                     <marquee style="color:yellow;float: right">Tanzania general genocide(TGG)</marquee>
                </div>
               
                <div class="phone-number d-flex">
                    <div class="icon">
                        <img src="img/icons/phone-call.png" alt="" style="height:50px;">
                    </div>
                    <div class="number">
                        <a href="tel:+45 677 8993000 223">+000 000 000</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">

                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="#"><img src="../.../../img/core-img/logo.png" alt=""></a>

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
                                <li><a href="/">Home</a></li>
                                <li><a href="#">Incidents</a>
                                    <ul class="dropdown">
                                        <li><a href="/view-photos/photos">Incident Photos</a></li>
                                       <li><a href="/view-videos/videos">Incident Videos</a></li>
                                    </ul>
                           </li>


  <li><a href="#">Reports</a>
                                    <ul class="dropdown"  style="width:240px">
                                        <li><a href="#">Events report summary</a>
                                            <ul class="dropdown" style="width:250px">
                                               <li><a href="/event-web/Injured">Injured(Jeruhiwa):<span class="badge badge-pill badge-warning"> <?php echo e($eventCounts->where('event_type','Injured')->count()); ?></span></a></li>

                                            <li><a href="/event-web/kidnapped">kidnapped(Tekwa):<span class="badge badge-pill badge-warning"> <?php echo e($eventCounts->where('event_type','kidnapped')->count()); ?></span></a></li>

                                            <li><a href="/event-web/killed">killed(Uwawa):<span class="badge badge-pill badge-danger"> <?php echo e($eventCounts->where('event_type','killed')->count()); ?></span></a></li>

                                            <li><a href="/event-web/Missed">Missed(Potea bila Taarifa):<span class="badge badge-pill badge-info"> <?php echo e($eventCounts->where('event_type','Missed')->count()); ?></span></a></li>


                                            <li><a href="/event-web/Totured">Totured(Teswa):<span class="badge badge-pill badge-primary"> <?php echo e($eventCounts->where('event_type','Totured')->count()); ?></span></a></li>

                                            <li><a href="/event-web/Other">Other(Ingineyo):<span class="badge badge-pill badge-success"> <?php echo e($eventCounts->where('event_type','Other')->count()); ?></span></a></li>
                                            </ul>
                                        </li>


 <li><a href="#">Suspected report summary</a>
                                         <ul class="dropdown" style="width:280px">
                                              <li><a href="/suspect-web/Individual">Individual(Mtu):<span class="badge badge-pill badge-danger"> <?php echo e($suspectCounts->where('category','Individual')->count()); ?></span></a></li>

                                            <li><a href="/suspect-web/People">Group of People(Kundi la Watu):<span class="badge badge-pill badge-info"> <?php echo e($suspectCounts->where('category','People')->count()); ?></span></a></li>


                                            <li><a href="/suspect-web/Institute">Institute(Taasisi):<span class="badge badge-pill badge-primary"> <?php echo e($suspectCounts->where('category','Institute')->count()); ?></span></a></li>

                                            <li><a href="/suspect-web/Other">Other(Nyingine):<span class="badge badge-pill badge-success"> <?php echo e($suspectCounts->where('category','Other')->count()); ?></span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li><a href="#">Contact</a></li>
                            </ul>

                            <!-- Search Form -->
                            <div class="south-search-form">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Search Anything ...">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

                            <!-- Search Button -->
                            <a href="#" class="searchbtn"><i class="fa" aria-hidden="true"></i></a>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
<?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/layouts/topmenu.blade.php ENDPATH**/ ?>