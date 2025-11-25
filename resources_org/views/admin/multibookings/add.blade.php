@extends($activeTemplate.'layouts.frontendm')
@extends('admin.layouts.appm')
@section('panel')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('user.multibooking.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">                          
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="category">@lang('Brand')</label>
                                    <select class="form-control" id="brand_id" name="brand_id">
                                        <option value="" required>-- @lang('Select One') --</option>
                                        @forelse($brands as $item)
                                            <option value="{{ $item->id }}">{{ __(@$item->name) }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label for="category">@lang('Model')</label>
                                    <select class="form-control" id="model_id" name="model_id" required="">                                    
                                  @forelse($modelbs as $model)
                                            <option value="{{ $model->id }}">{{ __(@$model->car_model) }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                          
                           <div class="col-md-2">
                                <div class="form-group">
                                    <label for="price">@lang('Price Per Day')</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="price" name="price"
                                               value="{{ old('price') }}" min="10000" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">{{ $general->cur_text }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="doors">@lang('No of Car')</label>
                                    <input type="number" id="no_car" class="form-control" value="{{ old('doors') }}"
                                           autocomplete="off" name="no_car" min="1" required>
                                </div>
                            </div>
                             <div class="col-md-1">
                                <div class="form-group">
                                    <label for="doors">@lang('No of Days')</label>
                                    <input type="number" id="no_days" class="form-control" value="{{ old('doors') }}"
                                           autocomplete="off" name="no_days" min="1" required>
                                </div>
                            </div>

                             <div class="col-md-2">
                                <div class="form-group">
                                    <label for="price">@lang('Total costs')</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="total_costs" name="total_costs"
                                               value="{{ old('total_costs') }}" readonly>
                                        <div class="input-group-append">
                                            <div class="input-group-text">{{ $general->cur_text }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                                                       

                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="seater">@lang('Pick Location')</label>
                                    <select class="form-control" id="pick_location" name="pick_location" required="">
                                        <option value="">-- @lang('Select One') --</option>
                                        @forelse($locations as $location)
                                            <option value="{{ $location->id }}">{{ __(@$location->name) }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>


                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="seater">@lang('Drop location')</label>
                                    <select class="form-control" id="drop_location" name="drop_location" required="">
                                        <option value="">-- @lang('Select One') --</option>
                                        @forelse($locations as $location)
                                            <option value="{{ $location->id }}">{{ __(@$location->name) }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                       
                      
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label for="start-date" class="form--label">
                                        <i class="las la-calendar-alt"></i> @lang('Pick Up Date & Time')
                                    </label>
                                    <input type="text" name="pick_time" placeholder="@lang('Pick Up Date & Time')" id='dateAndTimePicker' autocomplete="off" data-position='top left' class="form-control form--control pick_time" required>
                                </div>
                            </div>


                              <div class="col-md-2 col-sm-2">
                            <!--  
                              <div class="form-group">
                                    <label for="start-date" class="form--label">
                                        <i class="las la-calendar-alt"></i> @lang('Pick Up Date & Time')
                                    </label>
                                    <input type="text" name="drop_time" placeholder="@lang('Pick Up Date & Time')" id='dateAndTimePicker2' autocomplete="off" data-position='top left' class="form-control form--control pick_time" required>                                  
                                </div> -->

                        <button class="btn btn--primary w-100" style="padding: 1.4rem 1.75rem;">@lang('Add car')</button>
                  
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div><!-- card end -->
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Add New Specification')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body specification">
                    <div class="form-group">
                        <label for="icon" class="font-weight-bold">@lang('Select Icon')</label>
                        <div class="input-group has_append">
                            <input type="text" class="form-control icon" id="icon" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary iconPicker" data-icon="las la-home" role="iconpicker"></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="label" class="font-weight-bold">@lang('Label')</label>
                        <input class="form-control" id="label" type="text" required placeholder="@lang('Label')">
                    </div>
                    <div class="form-group">
                        <label for="label" class="font-weight-bold">@lang('Value')</label>
                        <input class="form-control" id="value" type="text" required placeholder="@lang('Value')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                    <button type="button" class="btn btn--primary addNewInformation">@lang('Add')</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('breadcrumb-plugins')
    <a href="{{ route('user.multibooking.index') }}" class="btn btn-sm btn-secondary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward" style="padding: 1.4rem 1.75rem;"></i>@lang('Ok')</a>
@endpush

@push('style')
    <style>
        .avatar-remove {
            position: absolute;
            bottom: 180px;
            right: 0;
        }

        .avatar-remove label {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            font-size: 15px;
            cursor: pointer;
        }
    </style>

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/datepicker.min.css')}}">
@endpush
@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-iconpicker.min.css') }}">
@endpush
@push('script-lib')
    <script src="{{ asset('assets/admin/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
@endpush

@push('script')

 <script type="text/javascript" src="../../js/jquery360.min.js"></script>

    <script src="{{asset($activeTemplateTrue.'js/datepicker.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'js/datepicker.en.js')}}"></script>
    <script>
        // date and time picker
        $('#dateAndTimePicker').datepicker({
            timepicker: true,
            language: 'en',
            onSelect: function (fd, d, picker) {
                var pick_time = fd;
              
                // if (pick_time){
                //     $('#dateAndTimePicker2').removeAttr('disabled');
                // }else{
                //     $('#dateAndTimePicker2').attr('disabled', 'disabled');
                // }

                // $('#dateAndTimePicker2').datepicker({
                //     timepicker: true,
                //     language: 'en',
                //     onSelect: function (fd, d, picker) {
                //         var drop_time = fd;

                //         const date1 = new Date(pick_time);
                //         const date2 = new Date(drop_time);
                //         const diffTime = Math.abs(date2 - date1);
                //         const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) +1;


                //         $('.total_amount').text(price*diffDays);
                //         $('.total_days').text(diffDays);
                //     }
                // })
            }
        })
    </script>


    <script>
        (function ($) {
            "use strict";

            var counter = 0;
            $('.addBtn').click(function () {
                counter++;
                $('.element').append(`<div class="col-md-2 imageItem"><div class="payment-method-item"><div class="payment-method-header d-flex flex-wrap"><div class="thumb" style="position: relative;"><div class="avatar-preview"><div class="profilePicPreview" style="background-image: url('{{asset('assets/images/default.png')}}')"></div></div><div class="avatar-edit"><input type="file" name="images[]" class="profilePicUpload" required id="image${counter}" accept=".png, .jpg, .jpeg" /><label for="image${counter}" class="bg-primary"><i class="la la-pencil"></i></label></div>
                <div class="avatar-remove">
                    <label class="bg-danger removeBtn">
                        <i class="la la-close"></i>
                    </label>
                </div>
                </div></div></div></div>`);
                remove()
                upload()
            });

            function scrol() {
                var bottom = $(document).height() - $(window).height();
                $('html, body').animate({
                    scrollTop: bottom
                }, 200);
            }

            function remove() {
                $('.removeBtn').on('click', function () {
                    $(this).parents('.imageItem').remove();
                });
            }

            function upload() {
                function proPicURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var preview = $(input).parents('.thumb').find('.profilePicPreview');
                            $(preview).css('background-image', 'url(' + e.target.result + ')');
                            $(preview).addClass('has-image');
                            $(preview).hide();
                            $(preview).fadeIn(65);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $(".profilePicUpload").on('change', function () {
                    proPicURL(this);
                });

                $(".remove-image").on('click', function () {
                    $(this).parents(".profilePicPreview").css('background-image', 'none');
                    $(this).parents(".profilePicPreview").removeClass('has-image');
                    $(this).parents(".thumb").find('input[type=file]').val('');
                });
            }

            //----- Add Information fields-------//
            $('.addNewInformation').on('click', function () {
                var icon = $('#icon').val();
                var label = $('#label').val();
                var value = $('#value').val();

                var html = `
                <div class="col-md-12 other-info-data">
                    <div class="form-group">
                        <div class="input-group mb-md-0 mb-4">
                            <div class="col-md-4">
                                <div class="input-group has_append">
                                    <input type="text" name="icon[]" class="form-control icon" value='${icon}' required readonly>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary iconPicker" data-icon="las la-home" role="iconpicker">${icon}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input name="label[]" class="form-control" type="text" value="${label}" required placeholder="@lang('Label')" readonly>
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <input name="value[]" class="form-control" value="${value}" type="text" required placeholder="@lang('Value')" readonly>
                            </div>
                            <div class="col-md-1 mt-md-0 mt-2 text-right">
                                <span class="input-group-btn">
                                    <button class="btn btn--danger btn-lg removeInfoBtn w-100" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>`;

                if (icon && label && value){
                    $('.addedField').append(html);

                    $('#icon').val('');
                    $('#label').val('');
                    $('#value').val('');
                }
            });

            $(document).on('click', '.removeInfoBtn', function () {
                $(this).closest('.other-info-data').remove();
            });


            $('select[name=brand]').val('{{old('brand')}}');
            $('select[name=seater]').val('{{old('seater')}}');

            // Icon picker
            $('.iconPicker').iconpicker({
                align: 'center', // Only in div tag
                arrowClass: 'btn-danger',
                arrowPrevIconClass: 'fas fa-angle-left',
                arrowNextIconClass: 'fas fa-angle-right',
                cols: 10,
                footer: true,
                header: true,
                icon: 'fas fa-bomb',
                iconset: 'fontawesome5',
                labelHeader: '{0} of {1} pages',
                labelFooter: '{0} - {1} of {2} icons',
                placement: 'bottom', // Only in button tag
                rows: 5,
                search: false,
                searchText: 'Search icon',
                selectedClass: 'btn-success',
                unselectedClass: ''
            }).on('change', function (e) {
                $(this).parent().siblings('.icon').val(`<i class="${e.icon}"></i>`);
            });
        })(jQuery);
    </script>

 <script type="text/javascript">
       $(document).ready(function(){
      // Department Change
      $('#price').change(function(){
     
alert('price');
      }
  }
</script>

   <script> 
        $("#price").on("change", function() {         
 var price = $('#price').val();
  var no_days = $('#no_days').val();
   var no_car = $('#no_car').val();
   document.getElementById("total_costs").value =price*no_days*no_car;
 //alert(value);

        }); 

  $("#no_days").on("change", function() {         
 var price = $('#price').val();
  var no_days = $('#no_days').val();
   var no_car = $('#no_car').val();
   document.getElementById("total_costs").value =price*no_days*no_car;
        }); 

   $("#no_car").on("change", function() {         
 var price = $('#price').val();
  var no_days = $('#no_days').val();
   var no_car = $('#no_car').val();
   document.getElementById("total_costs").value =price*no_days*no_car;
        });
    </script> 



      <script type="text/javascript">
       $(document).ready(function(){
      // Department Change
      $('#brand_id').change(function(){
         // ward

  //alert('changed');

         var v = $(this).val();
             // alert(v);
           // Empty the dropdown
          $('#model_id').find('option').not(':first').remove();
            // document.getElementById("classgf").value =v;
         // $('#village').find('option').not(':first').remove();
         // $('#project_name').find('option').not(':first').remove();
         // $('#project_activities').find('option').not(':first').remove();

  //alert(v);
         // AJAX request

         $.ajax({
          url: 'user/getP/'+v,            
           type: 'get',
           dataType: 'json',
           success: function(response){
      //alet('fffff');

             var len = 0;            
             if(response['dataA'] != null){
               len = response['dataA'].length;
             }
         alet(len);

                       if(len > 0){
               // Read data and create <option >
               for(var i=0; i<len; i++){

                 var id = response['dataA'][i].id;
                 var name = response['dataA'][i].car_model;
                 var option = "<option value='"+id+"'>"+name+"</option>";
                 $("#model_id").append(option);
               }
             }
             //DAta are here

           }
        });
      });
    });
     </script>




  <script type='text/javascript'>
    $(document).ready(function(){

        // Department Change
        $('#brand_idx').change(function(){

             // Department id
             var id = $(this).val();
//alert(id);
             // Empty the dropdown
             $('#model_idx').find('option').not(':first').remove();
//alert(id);
             // AJAX request 
             $.ajax({
                 url: 'user/multibooking/model/'+id,
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
                               var name = response['data'][i].car_model;

                               var option = "<option value='"+id+"'>"+name+"</option>";

                               $("#model_idx").append(option); 
                          }
                     }

                 }
             });
        });
    });


     $(document).ready(function(){

        // Department Change
        $('#brand_idx').change(function(){

             // Department id
             var id = $(this).val();

//alert(id);
             // Empty the dropdown
             $('#model_idx').find('option').not(':first').remove();

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

alert(len);

                     if(len > 0){
                          // Read data and create <option >
                          for(var i=0; i<len; i++){

                               var id = response['data'][i].id;
                               var name = response['data'][i].name;

                               var option = "<option value='"+id+"'>"+name+"</option>";

                               $("#sel_emp2").append(option); 
                          }
                     }

                 }
             });
        });
    });
    </script>




@endpush
