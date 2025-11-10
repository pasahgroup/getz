@extends('admin.layouts.masterm')

@section('content')
    <!-- page-wrapper start -->
    <div class="page-wrapper default-version" style="padding-left:20px;padding-right:20;">
     
                @include('admin.partials.breadcrumbm')
                @yield('panel')

    </div>
@endsection
