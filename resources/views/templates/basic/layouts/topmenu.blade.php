
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
                             


    @auth
                                                               <a href="{{ route('user.events.index') }}" class="btn btn-secondary btn-md-square rounded-circle me-3">@lang('Event recording')</a>

                                                                 <a href="{{ route('user.suspects.index') }}" class="btn btn-secondary btn-md-square rounded-circle me-3">@lang('Suspected people')</a>
                                
                                <a href="/logout" class="btn btn-secondary btn-md-square rounded-circle me-3">@lang('Sign out')</a>


                            @else
                              
                    <form  method="GET"  action="{{ route('user.login') }}" enctype="multipart/form-data">
                             @csrf
    <input type="hidden" name="_method" value="GET">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <button type="submit" class="btn btn-secondary btn-md-square rounded-circle me-3">@lang('Sign in')</button>
                                </form>

                                <a href="{{ route('user.register') }}" class="btn btn-secondary btn-md-square rounded-circle me-3">@lang('Sign Up')</a>
                           



                            @endauth


                </div>
                </div>
      


                <div class="phone-numberx d-flexx">
                           <div class="d-flex align-items-center justify-content-end float-right">
                                      <ul class="footer-social">
                         
                         <div class="footer__widget widget__about">
                                       <ul class="social-icons">
 
                    
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

                          @forelse($social_icons as $item)
                                <a href="{{ $item->data_values->url }}" class="btn btn-secondary btn-md-square rounded-circle me-3">
                                    @php echo @$item->data_values->social_icon @endphp
                                </a>
                       @empty
                        @endforelse

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
                      <a href="{{ route('home') }}"><img src="{{getImage(imagePath()['logoIcon']['path'].'/logo.png')}}" alt="logo" style="width:120px;"></a>

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
       @auth
                     <a class="nav-link" href="{{ route('user.home') }}">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <div class="badge badge-primary"><span class="menu-title">Dashboard</span></div>
            </a>
                             @endauth

                                 </a></li>
                                <li><a href="/">Home</a></li>

                                <li><a href="#">Vehicles</a>
                                    <ul class="dropdown">

                                          @foreach($view_brands as $brand)
                                        <li><a href="#">{{$brand->name}}</a>                                           
                                         
                                            <ul class="dropdown">
                                                   @foreach($view_vehicles as $vehicle)
                                                <li style="padding-left:10px;">

                                                     @if($vehicle->brand_id==$brand->id)
      <form action="{{ route('vehicle.search') }}" method="get" class="priceForm">
<input type="hidden" name="model" id="model" value="{{$vehicle->model}}" class="form-control form--control" required>
  <button  class="dropdown-item">{{$vehicle->model}}</button>
                                          </form>
  @endif

                                                </li>
                                                 @endforeach
                                            </ul>                                            

                                        </li>
                                           @endforeach
                                    </ul>
                                </li>


                                          
                                     

                            <li><a href="{{route('plans')}}">Plans</a></li>
                            <li><a href="{{ route('blogs') }}">Blog</a></li>
                            <li><a href="/about">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>