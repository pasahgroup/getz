<div class="sidebar {{ sidebarVariation()['selector'] }} {{ sidebarVariation()['sidebar'] }} {{ @sidebarVariation()['overlay'] }} {{ @sidebarVariation()['opacity'] }}"
     data-background="{{getImage('assets/admin/images/sidebar/2.jpg','400x800')}}">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="{{route('admin.dashboard')}}" class="sidebar__main-logo"><img
                    src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="@lang('image')"></a>
            <a href="{{route('admin.dashboard')}}" class="sidebar__logo-shape"><img
                    src="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" alt="@lang('image')"></a>
            <button type="button" class="navbar__expand"></button>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
    <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.dashboard')}}">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">@lang('Dashboard') </span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.dashboard')}} ">
                        <ul>

                <li class="sidebar-menu-item {{menuActive('admin.brand*')}}">
                    <a href="{{route('user.dashboard')}}" class="nav-link ">
                        <i class="menu-icon las la-feather"></i>
                        <span class="menu-title">@lang('Main Dashboard')</span>
                    </a>
                </li>
{{--
                <li class="sidebar-menu-item {{menuActive('admin.brand*')}}">
                    <a href="{{route('admin.pending-customer')}}" class="nav-link ">
                        <i class="menu-icon las la-feather"></i>
                        <span class="menu-title">@lang('Pending Customers')</span>
                    </a>
                </li>
--}}
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.vehicles*',3)}}">
                        <i class="menu-icon las la-skull-crossbones"></i>
                        <span class="menu-title">@lang('Incidents') </span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.vehicles*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive(['admin.vehicles.index','admin.vehicles.add','admin.vehicles.edit'])}}">
                                <a href="{{route('user.events.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Photos')</span>
                                </a>
                            </li>
                             <li class="sidebar-menu-item {{menuActive(['admin.vehicles.index','admin.vehicles.add','admin.vehicles.edit'])}}">
                                <a href="{{route('user.videos.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Videos')</span>
                                </a>
                            </li>

                              <li class="sidebar-menu-item {{menuActive(['admin.victims.index','admin.vehicles.add','admin.vehicles.edit'])}}">
                                <a href="{{route('user.victims.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Victims')</span>
                                </a>
                            </li>


                           <li class="sidebar-menu-item {{menuActive(['admin.vehicles.index','admin.vehicles.add','admin.vehicles.edit'])}}">
                                <a href="{{route('user.suspects.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Suspects')</span>
                                </a>
                            </li>
                                                  </ul>
                    </div>
                </li>


                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('ticket*',3)}}">
                        <i class="menu-icon la la-ticket"></i>
                        <span class="menu-title">@lang('Support Ticket') </span>
                        @if(0 < $pending_ticket_count)
                            <span class="menu-badge pill bg--primary ml-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>
                    {{--
                    <div class="sidebar-submenu {{menuActive('admin.ticket*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('admin.ticket')}} ">
                                <a href="{{route('ticket')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Ticket')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.ticket.pending')}} ">
                                <a href="{{route('ticket.pending')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Pending Ticket')</span>
                                    @if($pending_ticket_count)
                                        <span
                                            class="menu-badge pill bg--primary ml-auto">{{$pending_ticket_count}}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.ticket.closed')}} ">
                                <a href="{{route('ticket.closed')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Closed Ticket')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.ticket.answered')}} ">
                                <a href="{{route('ticket.answered')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Answered Ticket')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    --}}
                </li>


                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.report*',3)}}">
                        <i class="menu-icon la la-list"></i>
                        <span class="menu-title">@lang('Report') </span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.report*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive(['admin.report.login.history','admin.report.login.ipHistory'])}}">
                                <a href="{{route('admin.report.login.history')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Login History')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.report.email.history')}}">
                                <a href="{{route('admin.report.email.history')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Email History')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



       <li class="sidebar__menu-header">@lang('Settings')</li>

                 <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.vehicles*',3)}}">
                        <i class="menu-icon las la-car-side"></i>
                        <span class="menu-title">@lang('Settings') </span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.vehicles*',2)}} ">
                        <ul>
              
                  <li class="sidebar-menu-item {{menuActive('location.index')}}">
                    <a href="{{route('user.location.index')}}" class="nav-link ">
                        <i class="menu-icon las la-map-marked"></i>
                        <span class="menu-title">@lang('Regions')</span>
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
