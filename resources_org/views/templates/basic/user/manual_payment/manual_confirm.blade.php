@extends($activeTemplate.'layouts.master')

@section('content')
 
     <div class="pb-60 pt-60">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="deposit-preview bg--body">
                    <div class="deposit-thumb">
                        <img src="{{ $data->gatewayCurrency()->methodImage() }}" alt="payment">
                    </div>
                    <div class="deposit-content">

                        
  <form action="{{ route('user.deposit.manual.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <ul>
                            <li>
                                @lang('Costs'):
                                <span class="text--success">{{showAmount($data->amount)}} {{__($general->cur_text)}}</span>
                            </li>
                            <li>
                                @lang('Charge'):
                                <span class="text--danger">{{showAmount($data->charge)}} {{__($general->cur_text)}}</span>
                            </li>
                            <li>
                                @lang('Total payable amount'): <span class="text--warning"> {{showAmount($data->amount + $data->charge)}} {{__($general->cur_text)}}</span>
                            </li>
                            <li>
                                @lang('Amount to paid:') {{$data->baseCurrency()}}:
                                <span class="text--primary">{{showAmount($data->paid)}}</span>
                            </li>

                            @if($data->gateway->crypto==1)
                                <li>
                                    @lang('Conversion with')
                                    <b> {{ __($data->method_currency) }}</b> @lang('and final value will Show on next step')
                                </li>
                            @endif
                        </ul>


                            <div class="row">
                              {{--  <div class="col-md-12 text-center">
                                    <p class="text-center mt-2">@lang('You have requested') <b class="text-success">{{ showAmount($data['amount'])  }} {{__($general->cur_text)}}</b> , @lang('Please pay')
                                        <b class="text-success">{{showAmount($data['final_amo']) .' '.$data['method_currency'] }} </b> @lang('for successful payment')
                                    </p>                                   
                                                                  </div> --}}

                                @if($method->gateway_parameter)
                                    @foreach(json_decode($method->gateway_parameter) as $k => $v)

                                        @if($v->type == "text")
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><strong>{{__(inputTitle($v->field_level))}} @if($v->validation == 'required') <span class="text-danger">*</span>  @endif</strong></label>
                                                    <input type="text" class="form-control form--control" name="{{$k}}" value="{{old($k)}}" placeholder="{{__($v->field_level)}}">
                                                </div>
                                            </div>
                                        @elseif($v->type == "textarea")
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><strong>{{__(inputTitle($v->field_level))}} @if($v->validation == 'required') <span class="text-danger">*</span>  @endif</strong></label>
                                                        <textarea name="{{$k}}"  class="form-control form--control"  placeholder="{{__($v->field_level)}}" rows="3">{{old($k)}}</textarea>
                                                    </div>
                                                </div>
                                        @elseif($v->type == "file")
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><strong>{{__($v->field_level)}} @if($v->validation == 'required') <span class="text-danger">*</span>  @endif</strong></label>
                                                    <input type="file" name="{{$k}}" class="form-control form--control" accept="image/*" >
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group mt-3">
                                        <button type="submit" class="cmn--btn">@lang('Confirm payment')</button>                               
                                    </div>
                                </div>

                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('style')
<style>
    .withdraw-thumbnail{
        max-width: 220px;
        max-height: 220px
    }
</style>
@endpush
@push('script-lib')
<script src="{{asset($activeTemplateTrue.'/js/bootstrap-fileinput.js')}}"></script>
@endpush
@push('style-lib')
<link rel="stylesheet" href="{{asset($activeTemplateTrue.'/css/bootstrap-fileinput.css')}}">
@endpush

<script>
function myFunction() {
  let amount_paid = prompt("Please enter your name", "Harry Potter");
  if (amount_paid != null) {
    // document.getElementById("demo").innerHTML =
    // "Hello " + person + "! How are you today?";

     document.getElementById('demo').value =amount_paid;
  }
}
</script>

