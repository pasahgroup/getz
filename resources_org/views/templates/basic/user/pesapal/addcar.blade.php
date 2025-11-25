@extends($activeTemplate.'layouts.admin_master_panel')
@section('content')


<div class="search-section pt-120 pb-120 bg--section position-relative overflow-hidden">
        <div class="shape right-side">@lang('Rent')</div>
        <div class="shape">@lang('Vehicles')</div>


        <div class="container">
    <div class="widget border--dashed">

    <div class="single-section pt-120 pb-120 bg--section">
        <div class="container">
          <div class="col-md-4">
                  <h4 class="mb-4">@lang('You are booking'): {{ $vehicle->model }}</h4>
                </div>

            <div class="row gy-5">
                <div class="col-lg-4">
                    <hr>
                    <div class="slider-top owl-theme owl-carousel border--dashed">
                        @forelse($vehicle->images as $image)
                            <div class="car__rental-thumb w-100 bg--body p-0">
                                <img src="{{ getImage(imagePath()['vehicles']['path'].'/'. $image, imagePath()['vehicles']['size']) }}" alt="rent-vehicle">
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="slider-bottom owl-theme owl-carousel mt-4">
                        @forelse($vehicle->images as $image)
                            <div class="rental__thumbnails bg--body">
                                <img src="{{ getImage(imagePath()['vehicles']['path'].'/'. $image, imagePath()['vehicles']['size']) }}" alt="rent-vehicle">
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-7">
                    <hr>
                    <div class="widget border--dashed">
<form method="post" action="{{ route('user.addCar',1) }}">
 @csrf
<input class="form-control" type="hidden" name="bookID" id="bookID" value="{{$bookedID}}">
<div class="input-group">
<input class="form-control" list="carModels" name="carModel" id="carModel"  placeholder="@lang('--search car model--')" style="border:1px solid">
    <datalist id="carModels">
         <option value="0">--Select car Model--</option>

          @forelse($vehicles as $veh)
                                            <option value="{{ $veh->model }}">{{ @$veh->model }}</option>
                                        @empty
                                        @endforelse
    </datalist>



                            <button type="submit" class="input-group-text cmn--btn">@lang('Search New Car')</button>

                        </div>
                    </form>
                        <hr>

                    <div class="book__wrapper bg--body border--dashed mb-4">
                                            <div class="col-lg-12 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s;">
                                                                          <div class="bg-secondary rounded p-3">
                                                            <form class="book--form row gx-3 gy-4 g-md-4" method="post" action="{{ route('vehicle.booking.confirm',$vehicle->id) }}">
                                                              @csrf
                                                                                  <div class="row g-3">
                                                                                    <input type="hidden" class="form-control" name="car_id" id="car_id" value="{{$vehicle->id}}">
                                                                                     <input type="hidden" class="form-control" name="bookingID" id="bookingID" value="{{$bookedID}}">


                                                                 <div class="col-md-6 col-sm-12">
                                                              <div class="input-group">
                                                  <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                  <span class="fas fa-map-marker-alt"></span>
                                                  <span class="ms-1"><i class="las la-street-view"></i>@lang('Pick Up Point')</span>
                                                                                  </div>
                                                                                  <select name="pick_location" id="pick-point" class="form-select" aria-label="Default select example" required>

                                                                                          <option value="">@lang('--Pick up point--')</option>
                                                                                                        @forelse($locations as $location)
                                                                                                            <option value="{{ $location->id }}">{{ @$location->name }}</option>
                                                                                                        @empty
                                                                                                        @endforelse
                                                                                                                      </select>

                                                                                          </div>
                                                                                      </div>

                                                                                       <div class="col-md-6 col-sm-12">
                                                              <div class="input-group">
                                                  <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                  <span class="fas fa-map-marker-alt"></span>
                                                  <span class="ms-1"><i class="las la-street-view"></i>@lang('Drop Of Point')</span>
                                                                                  </div>
                                                                                  <select name="drop_location" id="pick-drop_location" class="form-select" aria-label="Default select example" required>

                                                                                     <option value="">@lang('--Pick up point--')</option>
                                                                                                        @forelse($locations as $location)
                                                                                                            <option value="{{ $location->id }}">{{ @$location->name }}</option>
                                                                                                        @empty
                                                                                                        @endforelse
                                                                                                                      </select>
                                                                                          </div>
                                                                                      </div>

                                                                                        <div class="col-12">
                                                              <div class="input-group">
                                                  <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                  <span class="las la-car"></span>
                                                  <span class="ms-1">@lang('Number of Car')</span>
                                                                                  </div>
                                  <input class="form-control" type="number" aria-label="Enter a City or Airport" name="no_car" id="no_car" value="1" min="1" required>
                                                                                          </div>
                                                                                      </div>

                                                                                      <div class="col-md-6 col-sm-12">
                                                                                          <div class="input-group">
                                                           <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                       <span class="las la-calendar"></span><span class="ms-1">From Date</span>
                                                                                   </div>
                                                          <input class="form-control" type="text" name="pick_time" id='dateAndTimePicker' class="form-control form--control pick_time" required>

                                                      </div>
                                                                                      </div>
                                                                                      <div class="col-md-6 col-sm-12">
                                                                              <div class="input-group">
                                                                          <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                                          <span class="las la-calendar"></span><span class="ms-1">To Date</span>
                                                                                              </div>
                                                                         <input type="text" name="drop_time" id='dateAndTimePicker2' autocomplete="off" data-position='top left' class="form-control" required>

                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="col-8">
                                                                                                                                    </div>
                                                                                      <div class="col-4">
                                                                      <button class="btn btn-primary rounded-pill py-2 px-4 float-right" type="submit" style="margin-bottom:0px;">Book Now</button>
                                                                                                                                                          </div>
                                                                                  </div>

                                                                                  <div class="col-12">
                                                                                      <div class="booking-costs mb-4"><strong>
                                                                                          @lang('  Price Total:') </strong><span class="text--danger"><span class="total_amount">{{ showAmount($vehicle->price) }}</span> {{ $general->cur_text }} </span>
                                                                                          @lang('for') <span class="total_days text--danger">1</span> @lang('days.')
                                                                                      </div>
                                                                                  </div>
                                                                              </form>

                                                                          </div>
                                                                  </div>

                    </div>
                </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
@push('style')
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/datepicker.min.css')}}">
@endpush

@push('script')
    <script src="{{asset($activeTemplateTrue.'js/datepicker.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'js/datepicker.en.js')}}"></script>
    <script>
        // date and time picker
        $('#dateAndTimePicker').datepicker({
            timepicker: true,
            language: 'en',
            onSelect: function (fd, d, picker) {
                var pick_time = fd;
                var price = parseFloat("{{ $vehicle->price }}");
                 $('.total_days').text(1);
                 var no_car = $('#no_car').val();


                if (pick_time){
                    $('#dateAndTimePicker2').removeAttr('disabled');
                }else{
                    $('#dateAndTimePicker2').attr('disabled', 'disabled');

                    $('.total_amount').text(price);
                    $('.total_days').text(1);
                }


                $('#dateAndTimePicker2').datepicker({
                    timepicker: true,
                    language: 'en',
                    onSelect: function (fd, d, picker) {
                        var drop_time = fd;

                        const date1 = new Date(pick_time);
                        const date2 = new Date(drop_time);
                        const diffTime = Math.abs(date2 - date1);
                        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) +1;


                           $("#no_car").on('change keydown paste input', function(){
                     no_car = $('#no_car').val();
 $('.total_amount').text(price*diffDays*no_car);

                    //alert(no_car);
});


if(no_car>0)
{
   $('.total_amount').text(price*diffDays*no_car);
   $('.total_days').text(diffDays);

}else{
     alert('Car number is Empty');
}



                    }
                })
            }
        })
    </script>
@endpush
