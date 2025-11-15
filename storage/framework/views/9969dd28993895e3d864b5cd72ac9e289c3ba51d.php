    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="h-100 d-md-flex justify-content-between align-items-center">
                <div class="email-address">
                    <a href="mailto:contact@southtemplate.com">No Email</a>
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
                    <a class="nav-brand" href="index.html"><img src="../.../../img/core-img/logo.png" alt=""></a>

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
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="#">Listings</a>
                                            <ul class="dropdown">
                                                <li><a href="listings.html">Listings</a></li>
                                                <li><a href="single-listings.html">Single Listings</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Blog</a>
                                            <ul class="dropdown">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Single Blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                    </ul>
                                </li>
                                                             <li><a href="#">Reports</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">--Events report summary--</li>

                                               <li><a href="/event-web/Injured">Injured(Jeruhiwa):<span class="badge badge-pill badge-warning"> <?php echo e($eventCounts->where('event_type','Injured')->count()); ?></span></a></li>

                                            <li><a href="/event-web/kidnapped">kidnapped(Tekwa):<span class="badge badge-pill badge-warning"> <?php echo e($eventCounts->where('event_type','kidnapped')->count()); ?></span></a></li>

                                            <li><a href="/event-web/killed">killed(Uwawa):<span class="badge badge-pill badge-danger"> <?php echo e($eventCounts->where('event_type','killed')->count()); ?></span></a></li>

                                            <li><a href="/event-web/Missed">Missed(Potea bila Taarifa):<span class="badge badge-pill badge-info"> <?php echo e($eventCounts->where('event_type','Missed')->count()); ?></span></a></li>


                                            <li><a href="/event-web/Totured">Totured(Teswa):<span class="badge badge-pill badge-primary"> <?php echo e($eventCounts->where('event_type','Totured')->count()); ?></span></a></li>

                                            <li><a href="/event-web/Other">Other(Ingineyo):<span class="badge badge-pill badge-success"> <?php echo e($eventCounts->where('event_type','Other')->count()); ?></span></a></li>
                                        </ul>
                                        
                                        <ul class="single-mega cn-col-4">
                                               <li class="title">--Suspected report summary--</li>
                                                                                             <li><a href="/suspect-web/Individual">Individual(Mtu):<span class="badge badge-pill badge-danger"> <?php echo e($suspectCounts->where('category','Individual')->count()); ?></span></a></li>

                                            <li><a href="/suspect-web/People">Group of People(Kundi la Watu):<span class="badge badge-pill badge-info"> <?php echo e($suspectCounts->where('category','People')->count()); ?></span></a></li>


                                            <li><a href="/suspect-web/Institute">Institute(Taasisi):<span class="badge badge-pill badge-primary"> <?php echo e($suspectCounts->where('category','Institute')->count()); ?></span></a></li>

                                            <li><a href="/suspect-web/Other">Other(Nyingine):<span class="badge badge-pill badge-success"> <?php echo e($suspectCounts->where('category','Other')->count()); ?></span></a></li>


                                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Headline 3</li>
                                            <li><a href="#">Mega Menu Item 1</a></li>
                                            <li><a href="#">Mega Menu Item 2</a></li>
                                            <li><a href="#">Mega Menu Item 3</a></li>
                                            <li><a href="#">Mega Menu Item 4</a></li>
                                            <li><a href="#">Mega Menu Item 5</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Headline 4</li>
                                            <li><a href="#">Mega Menu Item 1</a></li>
                                            <li><a href="#">Mega Menu Item 2</a></li>
                                            <li><a href="#">Mega Menu Item 3</a></li>
                                            <li><a href="#">Mega Menu Item 4</a></li>
                                            <li><a href="#">Mega Menu Item 5</a></li>
                                        </ul>
                                    </div>
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
    </header><?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/layouts/topmenu.blade.php ENDPATH**/ ?>