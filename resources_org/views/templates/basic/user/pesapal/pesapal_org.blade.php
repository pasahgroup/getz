@extends($activeTemplate.'layouts.frontend')
@section('content')
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

     <section class="cart-page">
    <div class="container">
      <div class="border-box">
        <div class="box-title">
           <div class="col-md-12">
             <p><strong></strong></p>
           </div>
        
<div class="col-md-12">
         @if($message = Session::get('success'))
  <div class="alert alert-success">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">&times;</span></button>
    <strong>Well!: </strong> {{$message}}
  </div>
  @endif

 @if($message = Session::get('info'))
  <div class="alert alert-warning">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">&times;</span></button>
    <strong>Ops!: </strong> {{$message}}
  </div>
  @endif   

 @if($message = Session::get('error'))
  <div class="alert alert-danger">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">&times;</span></button>
    <strong>Sorry!: </strong> {{$message}}
  </div>
  @endif
</div>
</div>

     <div class="container">
          <div class="col-sm-10">
        <em>Booking Costs Summary</em>
          <em><b>(Please finish Payment to complete you are booking)</b></em>
         
             <p><em>(From date {{date("d-M-Y", strtotime($times->pick_time)) }} to {{date("d-M-Y", strtotime($times->drop_time)) }})</em></p>
</div>
<div class="col-sm-2">
             <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#bookNow">Book Now</button> -->
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Book Now</button>
         </div>
     </div>

        
        <div class="table-responsive-wrap">
          <table class="table table-responsive cart-checkout-table">
            <thead>
              <tr>
                <th>Car model</th>
                     <th>Price</th>
                     <th>Discount</th>
                <th>No of Car</th>
                 <th>No of Day</th>
                <th class="pricex">Total Costs</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              
            
@foreach($datas as $data)

  <tr>
                <td>
              {{$data->model_name}}
                </td>
                <td>
               {{number_format($data->price,2)}}
                </td>
                <td>
 {{number_format($data->discount,2)}}               
                </td>
                <td>
                    {{$data->no_car}}
                </td>
                <td>
                    {{$data->no_day}}
                </td>
                <td class="price">{{number_format($data->total_cost,2)}} </td>
                </tr>
                @endforeach
              


            </tbody>
          </table>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
          <!--   <div class="form-group col-md-8 col-sm-10">
              <label>Have a Promotional Code</label>
              <div class="input-group">
                <div class="input-group-addon icon-tag">
                </div>
                <input type="text" class="form-control" placeholder="Code">
                <div class="input-group-btn">
                  <button class="btn btn-primary">Submit</button>
                </div>
              </div>
              <br>
              <button class="btn btn-primary hvr-sweep-to-right">Update Cart</button>
            </div> -->
          </div>
          <div class="col-sm-6">
            <table class="table table-responsive cart-checkout-table">
              <tr>
                <td>
                  Sub Total
                </td>
                <td class="price">
                
                </td>
              </tr>              

              <tr>
                <td>
                  Discount
                </td>
                <td class="price">
             555555555
                </td>
              </tr>

               <tr>
                <td>
                  VAT total
                </td>
                <td class="price">
                
                </td>
              </tr>
              <tr>
                <td class="price">Grand Total</td>
              </tr>

 <form  method="post"  action="{{ route('user.payConfirm',2) }}" enctype="multipart/form-data">
          @csrf
               
                <tr>
                <td class="price">Down Payment must not below 30% of total booking costs. not below</td>
              </tr>
              <tr class="total">
                       <input type="hidden" name="total_cost" value="" id="total_cost" /> 
                <td class="price">Amount to be Paid {{number_format($data->total_cost,2)}}</td>
                <td><input type="text" name="amount" id="amount" value="{{number_format($data->total_cost,2)}}"/>Down Payment must not below 30% of total booking costs. not below</td>
              </tr>
            </table>
 <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
   <label class="fieldlabels">Select Currency: *</label>
                          <input class="form-control" list="currencies" name="currency" id="currency" required>
    <datalist id="currencies">
         <option value="" selected></option>
                        <option value="KES">KES</option>
                          <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                              <option value="GBP">GBP</option>
                                <option value="UGX">UGX</option>

                                 <option value="TZS">TZS</option>
                                  <option value="ZMW">ZMW</option>
                                   <option value="RWF">RWF</option>
    </datalist> 
                        </div>

          </div>
        </div>

  
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"> <input type="hidden" name="first_name" value="" />
                        </div>
                                   <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <input type="hidden" name="last_name" value="" /> 
                        </div>
  
                        

                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <input type="hidden" name="reference" value="" /> 
                        </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <input type="hidden" name="type" value="MERCHANT" /> 
                        </div>
               
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">   <input type="hidden" name="email" value="" /> 
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                       <input type="hidden" name="desc" value="" /> 
                        </div>
                         <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                       <input type="hidden" name="percent_downpayment" value="" id="percent_downpayment" /> 
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                       
                            <input type="hidden" name="desc" value="" /> 
                        </div>


        <div class="clearfix">          
         <button href="/payConfirm/" class="btn btn-success pull-right hvr-sweep-to-right" type="submit">Proceed</button>        
        </div>
      </form>



<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Car</h4>
        </div>
        <div class="modal-body">
         <div class="widget border--dashed">
                    <div class="book__wrapper bg--body border--dashed mb-4">
                        <form class="book--form row gx-3 gy-4 g-md-4" method="post" action="{{ route('vehicle.booking.confirm', $vehicle->id) }}">
                            @csrf

                            <div class="col-md-6 col-sm-6">                                
                                    <label for="pick-point" class="form--label">
                                        <i class="las la-street-view"></i> @lang('Pick Up Point')
                                    </label>
                                    <div class="form-group">
                                    <select name="pick_location" id="pick-point" class="form-control form--control" required>
                                        <option value="">@lang('Pick up point')</option>
                                        @forelse($locations as $location)
                                            <option value="{{ $location->id }}">{{ @$location->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">                              
                                    <label for="drop-point" class="form--label">
                                        <i class="las la-street-view"></i> @lang('Drop of Point')
                                    </label>
                                    <div class="form-group">
                                    <select name="drop_location" id="drop-point" class="form-control form--control" required>
                                        <option value="">@lang('Drop of Point')</option>
                                        @forelse($locations as $location)
             <option value="{{ $location->id }}" selected>{{ @$location->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                               <div class="col-md-12 col-sm-12">                                
                                    <label for="drop-point" class="">
                                        <i class="las la-street-view"></i> @lang('No Car')
                                    </label>
                                    <div class="form-group">
                                   <input type="number" name="no_car" id="no_car" value="1" min="1" required>
                                </div>
                            </div>    


                             
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="start-date" class="form--label">
                                        <i class="las la-calendar-alt"></i> @lang('From Date')
                                    </label>
                                    <input type="text" name="pick_time" placeholder="@lang('Pick Up Date & Time')" id='dateAndTimePicker' autocomplete="off" data-position='top left' class="form-control form--control pick_time" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="end-date" class="form--label">
                                        <i class="las la-calendar-alt"></i> @lang('To Date')
                                    </label>
                                    <input type="text" name="drop_time" placeholder="@lang('Drop of Date & Time')" id="dateAndTimePicker2" autocomplete="off" data-position='top left' class="form-control form--control" disabled required>
                                </div>
                            </div>

            

 <div class="col-1">
 </div>
                            <div class="col-8">
                                <div class="booking-costs mb-4"><strong>
                                    @lang('  Price Total:') </strong><span class="text--danger"><span class="total_amount">{{ showAmount($vehicle->price) }}</span> {{ $general->cur_text }} </span>
                                    @lang('for') <span class="total_days text--danger">1</span> @lang('days.')
                                </div>                                
                            </div>
   <div class="col-3">
                            <div class="form-group float-right">
                                    <button class="cmn--btn justify-content-center float-right" type="submit">@lang('Book Now')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>  
</div>













<div class="modal fade modal-book-now" id="bookNow" tabindex="-1" role="dialog" style="margin-top:50px;">
 
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>


        </div>
        <div class="modal-body">

          <div class="preview-wrap">
           
            <div class="form-wrap">
                <h4 id="heading">Booking Form:<span style="color:green">{#</span></h4>
             

                <form id="msform"  method="post"  action="#" class="registration-form">
                    @csrf
                   
               <!-- progressbar -->
                    <ul id="progressbar">
                      <li class="active" id="account"><strong>Step 1:</strong></li>
                        <li id="personal"><strong>Step 2:</strong></li>
                        <li id="payment"><strong>Step 3:</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                      <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div> 
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="fs-title">Personal Details:| Step 1 - 4</h4>
                                </div>                                
                            </div> 
                           

 <div class="form-group">
              
                            
             <input type="hidden" class="form-control" name="tour_name" value="#">
            <input type="hidden" class="form-control" name="currency" value="#">
        </div>


   
           
             <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text" name="first_name" placeholder="first name" /> 
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                           <input type="text" name="last_name" placeholder="last name" /> 
                                </div>
  </div>


                              <!-- <label class="fieldlabels">Phone: *</label> -->
                               <input type="text" name="phone" placeholder="Phone(+00 00 000 000)"/>                                 
                            <input type="email" name="email" placeholder="email"/> 

                             <input type="text" name="country" placeholder="Nationality" /> 

                        </div> 
                             <button type="button" class="close float-left" data-dismiss="modal" style="background-color:#b32121;padding: 8px 30px;">Close</button>
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>

                            <div class="form-card">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="fs-title">Tour Information:|Step 2 - 4</h4>
                                </div>
                             </div>

                       
          
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                   <label for="">Travel Date:</label>
                                    <div class="form-group">
                                        <input type="date" name="travel_date" id="travel_date" class="form-control" placeholder="From" value="">
                    
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                   <label for="">Adults (>16 yrs):</label>
                                    <div class="form-group">
                                        <input type="number" class="zt-control" name="adults" min="0" value="1">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-6">
                                   <label for="">Teens (12-14 yrs):</label>
                                    <div class="form-group">
                                        <input type="number" class="zt-control" name="teens" min="0" value="0">
                                    </div>
                                 </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                   <label for="">Children (5-12 yrs):</label>
                                    <div class="form-group">
                                        <input type="number" class="zt-control" name="children" min="0" value="0">
                                    </div>
                                 </div>



                                               
            

                        </div> 

                             <button type="button" class="close float-left" data-dismiss="modal" style="background-color:#b32121;padding: 8px 30px;">Close</button>

                        <input type="button" name="previous" class="previous action-button-previous float-left" value="Previous" />
                        <input type="button" name="next" class="next action-button float-right" value="Next" /> 
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                                <div class="col-12">
                                    <h4 class="fs-title">Other Information:|Step 3 - 4</h4>                               
                        </div>


             
              <div class="col-md-6">                  
                    <label for="">Tour Addon:</label>
    <input class="form-control" list="addons" name="addon" id="addon">
    <datalist id="addons">
            
    </datalist>

                                </div>

<div class="col-md-6">                           
    <label for="">Accommodation:</label>
    <input class="form-control" list="accomodations" name="accomodation" id="accomodation">
    <datalist id="accomodations">
         <option value="0">--Select Accomodation--</option>
                                            <option>Basic</option>
                                             <option>Comfort</option>
                                              <option>Deluxe</option>
                                               <option>Mix</option>
                                                <option>Not Sure</option>
    </datalist>                                   
    </div> 



    <div class="col-md-12">
                <div class="form-group">
                    <label for="">  Additional Information we should know?</label>

         <textarea class="form-control" id="" cols="2" rows="1" name="additional_information" placeholder="Type your additional information here..."></textarea>
        </div>
     </div>


     <div class="col-md-12">
        <div class="form-group">
            <label for=""> How did you hear about us?:</label>

       <div class="form-group">
           <label for="facebook">Facebook
          <input id="facebook" type="checkbox" class="zt-control"  name="hear[]" value="Facebook">
        </label>
        <label for="instagram">Instagram
          <input id="instagram" type="checkbox" class="zt-control"  name="hear[]" value="Instagram">
        </label>
          <label for="google">Google
          <input id="google" type="checkbox" class="zt-control"  name="hear[]" value="Google">
        </label>
          <label for="mouth">Word of Mouth
          <input  id="mouth" type="checkbox" class="zt-control"  name="hear[]" value="Word of Mouth">
        </label>
        </div>
        </div>
  </div>

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <label for=""> Other Media:</label>
           <input type="text" class="form-control" name="hear_about_us">
        </div>
        </div> 
                          </div> 
                             
                                           
                        <button type="button" class="close float-left" data-dismiss="modal" style="background-color:#b32121;padding: 8px 30px;">Close</button>
                         <input type="button" name="previous" class="previous action-button-previous float-left" value="Previous" />
                           <button type="submit" class="btn btn-success float-right btn-submit" style="padding: 8px 30px;">Submit</button>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="fs-title">Finish:| Step 4 - 4</h4>
                                </div>
                            </div> <br>
                            <h2 class="purple-text text-center"><strong>Success!</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">You Have Successfully submitted</h5>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                        
                </form>
            </div>
        </div>   
      </div>
    </div>
  </div>
</div>




      </div>                
  </section>
 
@endsection
@push('style')
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/datepicker.min.css')}}">
@endpush

@push('script')
    <script src="{{asset($activeTemplateTrue.'js/datepicker.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'js/datepicker.en.js')}}"></script>
     <script src="../../assetff/js/jquery/jquery-2.2.4.min.js"></script>
     
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


