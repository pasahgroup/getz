@extends($activeTemplate.'layouts.frontend')
@section('content')

   <div class="search-section">
        <div class="shape right-side">@lang('Rent')</div>
        <div class="shape">@lang('Vehicles')</div>
        <div class="container-fluid">
            <div class="row">               
                <div class="col-lg-12">
                    <div class="filter-in d-lg-none" style="margin-top:-80px">
                        <i class="las la-filter"></i>
                    </div>


  <div style="padding-top:2px;"><marquee><a href="{{ route('user.events.add') }}" class="cmn--btn">@lang('Upload New Photos')</a></marquee></div>

                    <div class="book__wrapper bg--body border--dashed mb-4">
                        <form class="book--form row gx-3 gy-4 g-md-4" action="{{ route('event.search') }}" method="get" class="priceForm">
                            <div class="col-md-3 col-sm-4">
                                <div class="form-group">
                                    <label for="car-type" class="form--label">
                                        <i class="las la-car-side"></i> @lang('--Select category--')
                                    </label>
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">@lang('--Select category--')</option>
                                           <option value="1">1</option>
                                              <option value="2">2</option>

                                        @if(!empty($brand_data))
                                          <option value="{{$brand_data->id}}" selected>{{$brand_data->name}}</option>
                                          @endif
                                        <option value="0">All</option>
                                        {{--
                                        @forelse($brandss as $brand)
                                            <option value="{{ $brand->brand_id }}">{{ __(@$brand->name) }}</option>
                                        @empty
                                        @endforelse
                                        --}}
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
                        @forelse($events as $event)              
         <div class="col-md-3">
                    <div class="categories-item">
                        <div class="rent__item">
                            <div class="blog-item">
                            <div class="rent__thumb" style="background-color:#9ca494">
                                        <a href="{{ route('event.details', [$event->id, slug($event->name)]) }}">
                                            <img src="{{ getImage(imagePath()['vehicles']['path']. '/'. @$event->images[0], imagePath()['vehicles']['size']) }}" class="first-look" alt="rent-vehicle">
                                            <img src="{{ getImage(imagePath()['vehicles']['path']. '/'. @$event->images[1], imagePath()['vehicles']['size']) }}" class="hover-look" alt="rent-vehicle">
                                        </a>
                                    </div>
                            <div class="categories-content rounded-bottom p-4 text-center" style="margin:-42px">
                                
                                    <div class="blog-content rounded-bottom p-3">
                                        <div class="blog-date"><span class="">{{$event->name}} 
                                              {{--
                                            <sub>/@lang('day')</span>
                                            --}}
                                            </div>
                                                


                                          <div class="rent__content text-center mt-n1">
                                               <ul class="d-flex car-info text-center">
                                               </ul>
                                       </div>

                                        <strong>({{$event->event_type}})</strong>
                                           <div class="rent__content mt-n1">
                                                <ul class="d-flex car-info center">
                                                     <!-- <li class="pr-3 text-center"> -->
                                                      <li class="text-center center">
                                                         <span class="truncate" onclick="this.classList.toggle('expanded')">Region:{{ $event->region }} ({{ $event->district }})</span>
                                                    
                                                    </li>
                                                </ul>
                                        </div>

                                       <div class="truncate" onclick="this.classList.toggle('expanded')">
  ({{$event->event_title}})
</div>

                                      </br>
                                      <a href="{{ route('event.details', [$event->id, slug($event->name)]) }}" class="">Read More  <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                
                          </div>
                    </div>
                      <br>
                </div>
                        @empty
                        @endforelse
{!! $events->links() !!}

                    </div>


                </div>
            </div>
        </div>
    </div>
<div style="padding-top:2px;"><marquee>Upload more Photos</marquee></div>

    <script type='text/javascript'>
      $(document).ready(function(){

          // Department Change
          $('#brand').change(function(){

//alert('sasa');
               // Department id
               var id = $(this).val();

               // Empty the dropdown
               $('#model').find('option').not(':first').remove();
              // $('#seats').find('option').not(':first').remove();
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
               // $('#seats').find('option').not(':first').remove();

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
