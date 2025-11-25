@extends($activeTemplate.'layouts.frontend')
@section('content')

   <div class="search-section pt-120 pb-120 bg--section position-relative overflow-hidden">
        <div class="shape right-side">@lang('Rent')</div>
        <div class="shape">@lang('Vehicles')</div>
        <div class="container-fluid">
            <div class="row">               
                <div class="col-lg-12">
                    <div class="filter-in d-lg-none" style="margin-top:-80px">
                        <i class="las la-filter"></i>
                    </div>

                    <div class="book__wrapper bg--body border--dashed mb-4">
                        <form class="book--form row gx-3 gy-4 g-md-4" action="{{ route('vehicle.search') }}" method="get" class="priceForm">
                            <div class="col-md-3 col-sm-4">
                                <div class="form-group">
                                    <label for="car-type" class="form--label">
                                        <i class="las la-car-side"></i> @lang('--Select Brand--')
                                    </label>
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">@lang('--Select Brand--')</option>

                                        @if(!empty($brand_data))
                                          <option value="{{$brand_data->id}}" selected>{{$brand_data->name}}</option>
                                          @endif
                                        <option value="0">All</option>
                                        @forelse($brandss as $brand)
                                            <option value="{{ $brand->brand_id }}">{{ __(@$brand->name) }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-4">
                                <div class="form-group">
                                    <label for="car-type" class="form--label">
                                        <i class="las la-car-side"></i> @lang('--Select Model--')
                                    </label>
                                    <select name="modeldata" id="modeldata" class="form-control">
                                                                            @if(!empty($model_data))
                                        <option value="{{$model_data->model}}" selected>{{$model_data->model}}</option>
                                        @endif
                                            <option value="0">All</option>
                                              @if(!empty($brand_data))
                                            @forelse($model_datas as $m_data)
                                                <option value="{{ $m_data->model }}">{{ __(@$m_data->model) }}</option>
                                            @empty
                                            @endforelse
                                            @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-1 col-sm-3">
                                <div class="form-group">
                                    <label class="form--label d-none d-sm-block">&nbsp;</label>
                                    <button class="cmn--btn form--control bg--base w-100 justify-content-center" type="submit" value="search" name="search">@lang('Search')</button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="row g-4" style="margin-top:-42px">
                        @forelse($vehicles as $vehicle)
                        <div class="col-md-3">
                       <div class="categories-item">
                           <div class="rent__item">
                               <div class="blog-item">
                               <div class="rent__thumb" style="background-color:#9ca494">
                                           <a href="{{ route('vehicle.details', [$vehicle->id, slug($vehicle->name)]) }}">
                                               <img src="{{ getImage(imagePath()['vehicles']['path']. '/'. @$vehicle->images[0], imagePath()['vehicles']['size']) }}" class="first-look" alt="rent-vehicle">
                                               <img src="{{ getImage(imagePath()['vehicles']['path']. '/'. @$vehicle->images[1], imagePath()['vehicles']['size']) }}" class="hover-look" alt="rent-vehicle">
                                           </a>
                                       </div>
                               <div class="categories-content rounded-bottom p-2 text-center" style="margin:-10px">
                                       <!-- <div class="blog-img">
                                           <img src="../../frontendp/img/blog-1.jpg" class="img-fluid rounded-top w-100" alt="Image">
                                       </div> -->

                                       <div class="blog-content rounded-bottom p-2">
                                           <div class="blog-date"><span class="">{{ showAmount($vehicle->price) }}({{ $general->cur_sym }}) <sub>/@lang('day')</span></div>


                                             <div class="rent__content text-center mt-n1">
                                                  <ul class="d-flex car-info text-center">

                                                  </ul>
                                          </div>

                                           <strong>{{$vehicle->name}}</strong>

                                              <div class="rent__content text-center mt-n1">
                                                   <ul class="d-flex car-info text-center">
                                                        <li class="pr-3 text-center">
                                                           <span class="">{{ __(@$vehicle->model) }} ({{ __(@$vehicle->car_model_no?? 1) }})</span>
                                                       </li>
                                                   </ul>
                                           </div>


                                           <div class="rent__content text-center mt-n1">
                                                <ul class="d-flex_org car-info text-center">
                                                     <li class="pr-1 text-center">
                                                         <div class="row gy-2 gx-0 text-center mb-2">
                                                              <div class="col-4 border-end border-white">
                                                                  <i class="fa fa-users text-dark"></i> <span class="text-body ms-1">{{ __(@$vehicle->seat) }} Seat</span>
                                                              </div>
                                                              <div class="col-4 border-end border-white">
                                                                  <i class="fa fa-car text-dark"></i> <span class="text-body ms-1">{{ __(@$vehicle->transmission) }}</span>
                                                              </div>
                                                              <div class="col-4">
                                                                  <i class="las la-gas-pump"></i> <span class="text-body ms-1">{{ __(@$vehicle->fuel_type) }}</span>
                                                              </div>
                                                          </div>

                                                    </li>
                                                </ul>
                                          </div>
                                       </div>
                                         <a href="{{ route('vehicle.details', [$vehicle->id, slug($vehicle->name)]) }}" class="">Read More  <i class="fa fa-arrow-right"></i></a>
                                   </div>
                               </div>
                    <!-- <a href="{{ route('vehicle.details', [$vehicle->id, slug($vehicle->name)]) }}" class="btn btn-primary rounded-pill d-flex justify-content-center py-1 px-4" style="margin-bottom:0px;">Book</a> -->
                             </div>
                       </div>
                   </div>

                        @empty
                        @endforelse
{!! $vehicles->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type='text/javascript'>
      $(document).ready(function(){

          // Department Change
          $('#brand').change(function(){

//alert('sasa');
               // Department id
               var id = $(this).val();

               // Empty the dropdown
               $('#model').find('option').not(':first').remove();
              $('#seats').find('option').not(':first').remove();
   //alert(id);
               // AJAX request
               $.ajax({
                   url: 'getModel/'+id,
                   type: 'get',
                   dataType: 'json',
                   success: function(response){
                       var len = 0;
                       if(response['data'] != null){
                            len = response['data'].length;
                       }

   //alert(len);
                       if(len > 0){
                            // Read data and create <option >
                            for(var i=0; i<len; i++){

                                 var id = response['data'][i].id;
                                 var name = response['data'][i].model;

                                 var option = "<option value='"+name+"'>"+name+"</option>";

                                 $("#modeldata").append("All");
                                  $("#modeldata").append(option);
                            }
                       }

                   }
               });
          });
      });
      </script>


<!--
      <script type='text/javascript'>
        $(document).ready(function(){

            // Department Change
            $('#model').change(function(){

    //alert('sasa');
                 // Department id
                 var id = $(this).val();

                 // Empty the dropdown
                $('#seats').find('option').not(':first').remove();
     //alert(id);
                 // AJAX request
                 $.ajax({
                     url: 'getSeater/'+id,
                     type: 'get',
                     dataType: 'json',
                     success: function(response){
                         var len = 0;
                         if(response['data'] != null){
                              len = response['data'].length;
                         }

    //alert(len);
                         if(len > 0){
                              // Read data and create <option >
                              for(var i=0; i<len; i++){

                                   var id = response['data'][i].id;
                                   var name = response['data'][i].seater_id;
                                   var option = "<option value='"+name+"'>"+name+"</option>";

                                   $("#seats").append(option);
                              }
                         }

                     }
                 });
            });
        });
        </script> -->




      <script type='text/javascript'>
      $(document).ready(function(){

          // Department Change
          $('#sel_depart').change(function(){
               // Department id
               var id = $(this).val();
               // Empty the dropdown
                  $('#sel_emp').find('option').not(':first').remove();
                  $('#seats').find('option').not(':first').remove();
  // alert(id);
               // AJAX request
               $.ajax({
                   url: 'Employee/'+id,
                   type: 'get',
                   dataType: 'json',
                   success: function(response){

                       var len = 0;
                       if(response['data'] != null){
                            len = response['data'].length;
                       }

                       alert(len);

                       if(len > 0){
                            // Read data and create <option >
                            for(var i=0; i<len; i++){

                                 var id = response['data'][i].id;
                                 var name = response['data'][i].color;

                                 var option = "<option value='"+id+"'>"+name+"</option>";

                                 $("#sel_emp").append(option);
                            }
                       }

                   }
               });
          });
      });


       $(document).ready(function(){
          // Department Change
          $('#sel_emp').change(function(){

               // Department id
               var id = $(this).val();

  //alert(id);
               // Empty the dropdown
               $('#seats').find('option').not(':first').remove();

               // AJAX request
               $.ajax({
                   url: 'getEmp/'+id,
                   type: 'get',
                   dataType: 'json',
                   success: function(response){

                       var len = 0;
                       if(response['data'] != null){
                            len = response['data'].length;
                       }
  //alert(len);

                       if(len > 0){
                            // Read data and create <option >
                            for(var i=0; i<len; i++){

                                 var id = response['data'][i].id;
                                 var name = response['data'][i].color;

                                 var option = "<option value='"+id+"'>"+name+"</option>";

                                 $("#sel_emp2").append(option);
                            }
                       }

                   }
               });
          });
      });
      </script>
@endsection


@push('script')
    <script>
        (function ($) {
            "use strict";

            $('.min_price').keypress(function (e) {
                if (e.which == 13) {
                    $('.priceForm').submit();
                    return false;
                }
            });

            $('.max_price').keypress(function (e) {
                if (e.which == 13) {
                    $('.priceForm').submit();
                    return false;
                }
            });
        })(jQuery);
    </script>
@endpush
