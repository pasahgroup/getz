@extends('admin.layouts.app')
@section('panel')
@push('breadcrumb-plugins')
    <a href="{{ route('admin.offer.index') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Go Back')</a>
@endpush



   <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('admin.offer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                               
                                   <div class="col-md-3 col-sm-12">
                                                        <div class="input-group">
                                                    <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                    <span class="las fa-calendar"></span><span class="ms-1">@lang('Model')</span>
                                                                        </div>
                                    <select class="form-control" id="model" name="model" required="">
                                      <option value="">-- @lang('Select car model') --</option>
                                        @forelse($modelbs as $modelb)
                                            <option value="{{ $modelb->model }}">{{ __(@$modelb->model) }}</option>
                                        @empty
                                        @endforelse
                                    </select>


                                                                    </div>
                                                                </div> 



                        
   <div class="col-md-3 col-sm-12">
                             <div class="input-group">
                                     <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                 <span class="las fa-pe"></span><span class="ms-1">@lang('Percent')</span>
                                                             </div>
                                    <input class="form-control" type="number" name="percent" id='percent'  min=0 max=100 required>

                                </div>
                            </div>
                        </div>
                        <br>

  <div class="row">

                             <div class="col-md-3 col-sm-12">
                             <div class="input-group">
                                     <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                 <span class="las fa-calendar"></span><span class="ms-1">From Date</span>
                                                             </div>
                                    <input class="form-control" type="text" name="start_date" id='dateAndTimePicker' class="form-control form--control start_date" required>

                                </div>
                            </div>

                                                               <div class="col-md-3 col-sm-12">
                                                        <div class="input-group">
                                                    <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                    <span class="las fa-calendar"></span><span class="ms-1">To Date</span>
                                                                        </div>
                                                   <input type="text" name="end_date" id='dateAndTimePicker2' autocomplete="off" data-position='top left' class="form-control" required>

                                                                    </div>
                                                                </div>  


                                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="input-group">
                                                    <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                    <span class="las fa-calendar"></span><span class="ms-1">Status</span>
                                                                        </div>
                                                       <select name="status" id="pick-status" class="form-select" aria-label="Default select example" required>

                                                                    <option value="">@lang('-- select status--')</option>
                                                                                      <option value="0">0</option>
                                                                                      <option value="1">1</option>
                                                                               
                                                                                                </select>


                                                                    </div>
                                                                </div>                       


                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9">
                      </div>

                       <div class="col-md-1">                                                    
                            <button class="btn btn--primary w-100">@lang('Save')</button>
                            </div>

                                                               <div class="col-md-2">  
                                                <button class="btn btn-primary rounded-pill d-flex justify-content-center btn-light py-1 float-right" type="submit" style="margin-bottom:0px;">Book Now</button>
                                                                </div>
                        </div>
                </form>
            </div><!-- card end -->
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

@push('style')
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/datepicker.min.css')}}">
@endpush

@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-iconpicker.min.css') }}">
@endpush
@push('script-lib')
    <script src="{{ asset('assets/admin/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
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
                var start_date = fd;
                var price = parseFloat(8900);
                 $('.total_days').text(1);
                 var no_car = $('#no_car').val();


                if (start_date){
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
                        var end_date = fd;

                        const date1 = new Date(start_date);
                        const date2 = new Date(end_date);
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
