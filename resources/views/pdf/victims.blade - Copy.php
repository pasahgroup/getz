
@extends('admin.layoutsuser.app')
@section('panel')

@push('breadcrumb-plugins')
    <a href="{{ route('user.victims.add') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i class="fa fa-fw fa-plus"></i>@lang('New Victim Photos(Sajili Picha ya Tukio)')</a>
@endpush



  <script src="../../../../appweb/jquery171.min.js"></script>
    <link rel="stylesheet" href="../../../../appweb/bootstrap320.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="../../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

@section('panel')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Main content -->
        <div class="card">
        <div class="card-body">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                             <th scope="col">@lang('SN')</th>
                                <th scope="col">@lang('First Name')</th>
                                <th scope="col">@lang('Last Name')</th>
                                 <th scope="col">@lang('Age')</th>
                                <th scope="col">@lang('Incident type')</th>
                                <th scope="col">@lang('Incident Place')</th>
                                <th scope="col">@lang('Region')</th>
                                <th scope="col">@lang('District')</th>
                               <th scope="col">@lang('Event Date')</th>
                                <th scope="col">@lang('Photos')</th>
                                <th scope="col">@lang('Videos')</th>
                                <th scope="col">@lang('Incident Details')</th>
                                 <th scope="col">@lang('Elapsed time')</th>
                                  <th scope="col">@lang('Last update')</th>

                                     <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Actions')</th>
                            </tr>
                  </thead>
                  <tbody>
              
       @forelse ($victims as $item)
                                <tr>   
                                 <td data-label="@lang('Name')">{{ __($item->id) }}</td>                                 
                                    <td data-label="@lang('Name')">{{ __($item->first_name) }}</td>
                                     <td data-label="@lang('Name')">{{ __($item->last_name) }}</td>
                                    
                                      <td data-label="@lang('Event_type')">{{ __($item->age) }}</td>
                                    <td data-label="@lang('Event_type')">{{ __($item->event_type) }}</td>
                                    <td data-label="@lang('Event_place')">{{ __($item->event_place) }}</td>
                                     <td data-label="@lang('Region')">{{ __($item->region) }}</td>
                                      <td data-label="@lang('District')">{{ __($item->district) }}</td>

                                    <td data-label="@lang('Date event')">{{ __($item->date_event) }}</td>
                                   
                                        <td data-label="@lang('Date event')"> 

      <img class="" src="{{ getImage(imagePath()['vehicles']['path']. '/'. @$item->images[0], imagePath()['vehicles']['size']) }}" style="object-fit: cover;">
                                        </td>

                                                                        <td data-label="@lang('Videos')"> 

                                                                           <video controls width="120" height="120">
    <source src="{{ Storage::url($item->path) }}" type="video/mp4" style="object-fit: cover;">
    Your browser does not support the video tag.
</video>                                                    
</td>

   <td data-label="@lang('Event details')">
 <div class="content">
                          {{ __($item->details) }}
                        </div>

   </td>
    <td data-label="@lang('Event details')">{{ __($item->elapsed_time) }}</td>
       <td data-label="@lang('Event details')">{{ __($item->last_update) }}</td>

                                    <td data-label="@lang('Status')">
                                        @if($item->status === 1)
                                            <span class="text--small badge font-weight-normal badge--success">@lang('Active')</span>
                                        @else
                                            <span class="text--small badge font-weight-normal badge--warning">@lang('Deactive')</span>
                                        @endif
                                    </td>
                                

                                    <td data-label="@lang('Action')">
                                           @if(auth()->user()->email =="buruwawa@gmail.com")  
                                        <a href="{{ route('user.victims.edit', $item->id) }}" class="icon-btn ml-1" data-original-title="@lang('Edit')">
                                            <i class="la la-edit"></i>
                                        </a>

                                        <a href="javascript:void(0)" class="icon-btn {{ $item->status ? 'btn--danger' : 'btn--success' }} ml-1 statusBtn" data-original-title="@lang('Status')" data-toggle="tooltip" data-url="{{ route('user.victims.status', $item->id) }}">
                                            <i class="la la-eye{{ $item->status ? '-slash' : null }}"></i>
                                        </a>
                                        @endif
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                                </tr>
                            @endforelse
                  </tbody>
                  <tfoot>
                    <tr>
                        <th scope="col">@lang('SN')</th>
                                 <th scope="col">@lang('First Name')</th>
                                <th scope="col">@lang('Last Name')</th>
                                <th scope="col">@lang('Age')</th>
                                <th scope="col">@lang('Incident type')</th>
                                <th scope="col">@lang('Incident Place')</th>
                                <th scope="col">@lang('Region')</th>
                                <th scope="col">@lang('District')</th>
                           <th scope="col">@lang('Event Date')</th>
                            <th scope="col">@lang('Photos')</th>
                                <th scope="col">@lang('Videos')</th>
                                <th scope="col">@lang('Incident Details')</th>
                                 <th scope="col">@lang('Elapsed time')</th>
                                  <th scope="col">@lang('Last update')</th>
                                     <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Actions')</th>
                            </tr>
                  </tfoot>
                </table>
              </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
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

  <script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
    })
    $(function () {
      // Summernote
      $('#summernote1').summernote()
    })
    $(function () {
      // Summernote
      $('#summernote2').summernote()
    })
    $(function () {
      // Summernote
      $('#summernote3').summernote()
    })
  </script>




<!-- DataTables  & Plugins -->
<script src="../../../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script src="../../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="../../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../../plugins/jszip/jszip.min.js"></script>
<script src="../../../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../../plugins/pdfmake/vfs_fonts.js"></script>


<script src="../../../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
  <script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
    })
    $(function () {
      // Summernote
      $('#summernote1').summernote()
    })
    $(function () {
      // Summernote
      $('#summernote2').summernote()
    })
    $(function () {
      // Summernote
      $('#summernote3').summernote()
    })

  </script>  
