a @extends('admin.layoutsuser.master')

@section('content')
    <!-- page-wrapper start -->
    <div class="page-wrapper default-version">
        @include('admin.partialsuser.sidenav')
        @include('admin.partialsuser.topnav')

        <div class="body-wrapper">
            <div class="bodywrapper__inner">

                @include('admin.partialsuser.breadcrumb')
                @yield('panel')

            </div><!-- bodywrapper__inner end -->
        </div><!-- body-wrapper end -->
    </div>
@endsection
