@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light tabstyle--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('ID')</th>
                                   <th scope="col">@lang('Car Model')</th>
                                       <th scope="col">@lang('Percent')</th>
                                <th scope="col">@lang('Images')</th>
                                      <th scope="col">@lang('Start Date')</th>
                                       <th scope="col">@lang('End Date')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($offers as $item)
                                <tr>
                                    <td data-label="@lang('Car body type')"><strong>{{ __($item->id) }}</strong></td>                                  
                                    <td data-label="@lang('car_model')">{{ __($item->car_model) }}</td>
                                     <td data-label="@lang('percent')">{{ __($item->percent) }}</td>
                                      <td data-label="@lang('Images')">
                                     

                                       <div class="row element">                                        
                                                <div class="col-md-2 imageItem" id="ddd">
                                                    <div class="payment-method-item">
                                                        <div class="payment-method-header d-flex flex-wrap">
                                                            <div class="thumb" style="position: relative;">
                                                                <div class="avatar-preview">
                                                                    <div class="profilePicPreview"
                                                                         style="background-image: url('{{ URL::asset('/storage/cartypes/'.$item->images) }}')">

                                                                    </div>

  <div class="rent__thumb" style="background-color:#9ca494">
                                        <a href="{{ route('vehicle.details', [$item->id, slug($item->name)]) }}">
                                            <img src="{{ getImage(imagePath()['vehicles']['path']. '/'. @$item->images[0], imagePath()['vehicles']['size']) }}" class="first-look" alt="rent-vehicle">
                                        </a>
                                    </div>



                                                                </div>

                                                                 <div class="avatar-remove">
                                                                        <i class="la la-close">
                                                                            <a href="{{ route('admin.cartype.image.delete',$item->id) }}" class="btn btn--danger btn-lg removeInfoBtn w-100" type="button">x</a>
                                                                        </i>
                                                                        
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                 
                                        </div>

                                      </td>
                                       <td data-label="@lang('start_date')">{{ __($item->start_date) }}</td>
                                        <td data-label="@lang('end_date')">{{ __($item->end_date) }}</td>

                                    <td data-label="@lang('Status')">
                                        @if($item->status === 1)
                                            <span class="text--small badge font-weight-normal badge--success">@lang('Active')</span>
                                        @else
                                            <span class="text--small badge font-weight-normal badge--warning">@lang('Deactive')</span>
                                        @endif
                                    </td>

                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('admin.tag.edit', $item->id) }}" class="icon-btn ml-1" data-original-title="@lang('Edit')">
                                            <i class="la la-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="icon-btn {{ $item->status ? 'btn--primary' : 'btn--success' }} ml-1 statusBtn" data-original-title="@lang('Status')" data-toggle="tooltip" data-url="{{ route('admin.tag.status', $item->id) }}">
                                            <i class="la la-eye{{ $item->status ? '-slash' : null }}"></i>
                                        </a>
                                      
                                         <a href="{{ route('admin.tag.delete',$item->id) }}" id="click-edit1" onclick="return confirm(id='Are you sure you want to delete this  {{$item->id}}')"><i class="la la-eye{{ $item->status ? '-slash' : null }}"></i></a>
                                    </td>

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
                <div class="card-footer">
                    {{ $offers->links('admin.partials.paginate') }}
                </div>
            </div><!-- card end -->
        </div>
    </div>



    {{-- Status MODAL --}}
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">@lang('Update Status')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form method="post" action="">
                    @csrf

                    <div class="modal-body">
                        <p class="text-muted">@lang('Are you sure to change status?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('No')</button>
                        <button type="submit" class="btn btn--danger deleteButton">@lang('Yes')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('breadcrumb-plugins')
    <a href="{{ route('admin.offer.add') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i class="fa fa-fw fa-plus"></i>@lang('Add Offer')</a>
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
