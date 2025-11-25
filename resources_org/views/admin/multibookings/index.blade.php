
@extends($activeTemplate.'layouts.frontendmult')
@extends('admin.layouts.appm')
@push('style')
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/datepicker.min.css')}}">
@endpush
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">

                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light tabstyle--two">
                            <thead>                                
                            <tr>
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Brand')</th>
                                <th scope="col">@lang('Model')</th>
                                <th scope="col">@lang('Price')</th>
                                <th scope="col">@lang('No of Days')</th>
                                 <th scope="col">@lang('No of Car')</th>
                                <th scope="col">@lang('Total Costs')</th>
                                <th scope="col">@lang('Pick Location')</th>
                                <th scope="col">@lang('Drop Location')</th>
                                 <th scope="col">@lang('Pick Date')</th>
                                <th scope="col">@lang('Drop Date')</th>
                                 <th scope="col">@lang('Booked By')</th>
                                <th scope="col">@lang('Actions')</th>
                            </tr>
                            </thead>

                            <tbody>
                             
                            @forelse ($vehicles as $item)
                                <tr>
                                    <td data-label="@lang('Name')"><strong>{{ __($item->name) }}</strong></td>
                                    <td data-label="@lang('Brand')">{{ __($item->brand->name) }}</td>
                                    <td data-label="@lang('modelb')">{{ __($item->car_model) }}</td>
                                      <td data-label="@lang('Price')"><strong>{{ $general->cur_sym }} {{ __(showAmount($item->price)) }}</strong></td>
                                    <td data-label="@lang('Car Body Type')">{{ __($item->no_days) }}</td>

                                  
                                    <td data-label="@lang('Model')">{{ __($item->no_car) }}</td>
                                      <td data-label="@lang('Price')"><strong>{{ $general->cur_sym }} {{ __(showAmount($item->total_costs)) }}</strong></td>

                                     <td data-label="@lang('pick_location')">
                                    
                                             @forelse($locations as $location)
                                             @if($location->id== $item->pick_location)
                                             {{ __(@$location->name) }}
                                             @endif

          @empty
                                        @endforelse
                                                
                              


                                     </td>
                                      <td data-label="@lang('drop_location')">
                                             @forelse($locations as $location)
                                             @if($location->id== $item->drop_location)
                                             {{ __(@$location->name) }}
                                             @endif

          @empty
                                        @endforelse
                                                
                              
                                      </td>
                                       <td data-label="@lang('pick_time')">{{ __($item->pick_time) }}</td>
                                        <td data-label="@lang('drop_time')">{{ __($item->drop_time) }}</td>
                                         <td data-label="@lang('Booked by')">{{ __($user->firstname) }} {{ __($user->lastname) }}</td>                                       
                                  
                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('user.multibooking.edit', $item->id) }}" class="icon-btn ml-1" data-original-title="@lang('Edit')">
                                            <i class="la la-edit"></i>
                                        </a>



                                        <a href="javascript:void(0)" class="icon-btn {{ $item->status ? 'btn--danger' : 'btn--success' }} ml-1 statusBtn"  data-toggle="modal" data-target="#deleteModal_{{ __($item->id) }}">
  <i class="la la-eye{{ $item->status ? '-slash' : null }}"></i>
</a>


                                    </td>



<!-- Modal -->
<div class="modal fade" id="deleteModal_{{ __($item->id) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="{{ route('user.multibooking.remove',$item->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETING MODAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Delete: {{ __($item->brand->name) }}->{{ __($item->car_model) }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn--danger">Delete</button>
      </div>
    </div>
  </div>
</form>
</div>



                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                                </tr>
                            @endforelse


                                                        </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                  
    @if($vehicles->where('status',1)->count()>0)                 
  <div class="row">                          
                            <div class="col-md-1"></div>
<div class="col-md-11">
 <form class="book--form row gx-3 gy-4 g-md-4" method="post" action="{{ route('vehicle.booking.confirm',5) }}">
                            @csrf


<div class="col-md-3 col-sm-6">

                                <div class="form-group">
                                    <label for="end-date" class="form--label">
                                        <i class="las la-calendar-alt"></i> @lang('Total costs')
                                    </label>
                                    <input type="text" name="total_costs" placeholder="@lang('Drop of Date & Time')" id="total_costs" autocomplete="off" data-position='top left' value="{{$vehicles->sum('total_costs')}}" class="form-control form--control" required>
                                </div>
                            </div>

  <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for="start-date" class="form--label">
                                        <i class="las la-calendar-alt"></i> @lang('Pick Up Date & Time')
                                    </label>
                                    <input type="text" name="pick_time" placeholder="@lang('Pick Up Date & Time')" id='dateAndTimePicker' autocomplete="off" data-position='top left' class="form-control form--control" value="{{$vehicles->min('pick_time')}}"  required>
                                </div>
                            </div>

                      
                                <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for="end-date" class="form--label">
                                        <i class="las la-calendar-alt"></i> @lang('Location1')
                                    </label>
                                     <select name="pick_location" id="drop-point" class="form-control form--control" required>
                                        <option value="">@lang('--Pick Point--')</option>
                                        @forelse($locations as $location)
             <option value="{{ $location->id }}" selected>{{ @$location->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>


                                <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for="end-date" class="form--label">
                                        <i class="las la-calendar-alt"></i> @lang('Location2')
                                    </label>                                
                                      <select name="drop_location" id="drop-point" class="form-control form--control" required>
                                        <option value="">@lang('--Drop of Point--')</option>
                                        @forelse($locations as $location)
             <option value="{{ $location->id }}" selected>{{ @$location->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
    <button class="btn btn--primary w-100" style="padding:.8rem 1.75rem;" name="multi-booking" value="multi-booking">@lang('Submit booking request')</button> 

</form>
</div>

                        </div>
                        @endif

                <div class="card-footer">
                    {{ $vehicles->links('admin.partials.paginate') }}                    
                </div>
            </div><!-- card end -->
        </div>
    </div>
@endsection


@push('breadcrumb-plugins')
    <a href="{{ route('user.multibooking.add') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i class="fa fa-fw fa-plus"></i>@lang('Add New Car')</a>
@endpush

@push('script')
    <script>
        (function($){
            "use strict";

            //Status
            $('.statusBtn').on('click', function () {
                var modal = $('#statusModal');
                var url = $(this).data('url');

                modal.find('form').attr('action', url);
                modal.modal('show');
            });

        })(jQuery);
    </script>
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
                   if (pick_time){
                    $('#dateAndTimePicker2').removeAttr('disabled');
                }else{
                    $('#dateAndTimePicker2').attr('disabled', 'disabled');
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


                        $('.total_amount').text(price*diffDays);
                        $('.total_days').text(diffDays);
                    }
                })
               
            }
        })
    </script>

    <script type="text/javascript">
        $('#test').click(function(){
            alert('pop');
   // $('#your_form').attr('action', 'http://uri-for-button1.com');
});
    </script>
@endpush