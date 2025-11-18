<div class="sidebar <?php echo e(sidebarVariation()['selector']); ?> <?php echo e(sidebarVariation()['sidebar']); ?> <?php echo e(@sidebarVariation()['overlay']); ?> <?php echo e(@sidebarVariation()['opacity']); ?>"
     data-background="<?php echo e(getImage('assets/admin/images/sidebar/2.jpg','400x800')); ?>">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar__main-logo"><img
                    src="<?php echo e(getImage(imagePath()['logoIcon']['path'] .'/logo.png')); ?>" alt="<?php echo app('translator')->get('image'); ?>"></a>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar__logo-shape"><img
                    src="<?php echo e(getImage(imagePath()['logoIcon']['path'] .'/favicon.png')); ?>" alt="<?php echo app('translator')->get('image'); ?>"></a>
            <button type="button" class="navbar__expand"></button>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
    <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.dashboard')); ?>">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Dashboard'); ?> </span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.dashboard')); ?> ">
                        <ul>

                             <li class="sidebar-menu-item <?php echo e(menuActive('admin.brand*')); ?>">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link ">
                        <i class="menu-icon las la-feather"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Main Dashboard'); ?></span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?php echo e(menuActive('admin.brand*')); ?>">
                    <a href="<?php echo e(route('admin.pending-customer')); ?>" class="nav-link ">
                        <i class="menu-icon las la-feather"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Pending Customers'); ?></span>
                    </a>
                </li>

                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.vehicles*',3)); ?>">
                        <i class="menu-icon las la-skull-crossbones"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Incidents'); ?> </span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.vehicles*',2)); ?> ">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive(['admin.vehicles.index','admin.vehicles.add','admin.vehicles.edit'])); ?>">
                                <a href="<?php echo e(route('user.events.index')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Photos'); ?></span>
                                </a>
                            </li>
                             <li class="sidebar-menu-item <?php echo e(menuActive(['admin.vehicles.index','admin.vehicles.add','admin.vehicles.edit'])); ?>">
                                <a href="<?php echo e(route('user.videos.index')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Videos'); ?></span>
                                </a>
                            </li>

                           <li class="sidebar-menu-item <?php echo e(menuActive(['admin.vehicles.index','admin.vehicles.add','admin.vehicles.edit'])); ?>">
                                <a href="<?php echo e(route('user.suspects.index')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Suspected'); ?></span>
                                </a>
                            </li>
                                                  </ul>
                    </div>
                </li>


                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.ticket*',3)); ?>">
                        <i class="menu-icon la la-ticket"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Support Ticket'); ?> </span>
                        <?php if(0 < $pending_ticket_count): ?>
                            <span class="menu-badge pill bg--primary ml-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        <?php endif; ?>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.ticket*',2)); ?> ">
                        <ul>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket')); ?> ">
                                <a href="<?php echo e(route('admin.ticket')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('All Ticket'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.pending')); ?> ">
                                <a href="<?php echo e(route('admin.ticket.pending')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Pending Ticket'); ?></span>
                                    <?php if($pending_ticket_count): ?>
                                        <span
                                            class="menu-badge pill bg--primary ml-auto"><?php echo e($pending_ticket_count); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.closed')); ?> ">
                                <a href="<?php echo e(route('admin.ticket.closed')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Closed Ticket'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.answered')); ?> ">
                                <a href="<?php echo e(route('admin.ticket.answered')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Answered Ticket'); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.report*',3)); ?>">
                        <i class="menu-icon la la-list"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Report'); ?> </span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.report*',2)); ?> ">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive(['admin.report.login.history','admin.report.login.ipHistory'])); ?>">
                                <a href="<?php echo e(route('admin.report.login.history')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Login History'); ?></span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.report.email.history')); ?>">
                                <a href="<?php echo e(route('admin.report.email.history')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Email History'); ?></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



       <li class="sidebar__menu-header"><?php echo app('translator')->get('Settings'); ?></li>

                 <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.vehicles*',3)); ?>">
                        <i class="menu-icon las la-car-side"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Settings'); ?> </span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.vehicles*',2)); ?> ">
                        <ul>
              
                  <li class="sidebar-menu-item <?php echo e(menuActive('location.index')); ?>">
                    <a href="<?php echo e(route('user.location.index')); ?>" class="nav-link ">
                        <i class="menu-icon las la-map-marked"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Regions'); ?></span>
                    </a>
                </li>

                        </ul>
                    </div>
                </li>
                       </ul>
            <div class="text-center mb-3 text-uppercase">
                <span class="text--primary">We need Freedom</span>
            </div>
        </div>
    </div>
</div>
<!-- sidebar end -->
<?php /**PATH C:\xampp\htdocs\getz\resources\views/admin/partialsuser/sidenav.blade.php ENDPATH**/ ?>