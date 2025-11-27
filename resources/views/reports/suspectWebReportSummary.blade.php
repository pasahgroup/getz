@extends('admin.layoutsuser.appweb')
@section('panel')

@push('breadcrumb-plugins')
    <a href="{{ route('user.events.add') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i class="fa fa-fw fa-plus"></i>@lang('New Event (Sajili Tukio)')</a>
@endpush


  <script src="../../../../appweb/jquery171.min.js"></script>
  <link rel="stylesheet" href="../../../../appweb/bootstrap320.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="../../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">



<!-- <div class="content-wrapper">
        <div class="card-body">
</div>
</div>
 -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Main content -->
                  <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                                <th scope="col">@lang('Suspect name')</th>                               
                                      <th scope="col">@lang('Category')</th>
                                       <th scope="col">@lang('Titles')</th>
                                <th scope="col">@lang('Photos')</th>
                                <th scope="col">@lang('Crime Details')</th>
                                     <th scope="col">@lang('Status')</th>
                            </tr>
                  </thead>
                  <tbody>
              
@isset($suspectWR)
       @forelse ($suspectWR as $item)
                                <tr>                                    
                                    <td data-label="@lang('Name')">{{ __($item->name) }}</td>
                                    
                                    <td data-label="@lang('Titles')">{{ __($item->title) }}</td>
                                    <td data-label="@lang('Category')">{{ __($item->category) }}</td>
                                    <td>                                                                                
      <img class="" src="{{ getImage(imagePath()['vehicles']['path']. '/'. @$item->images[0], imagePath()['vehicles']['size']) }}" style="object-fit: cover;">
                                        </td>

   <td data-label="@lang('Event details')">{{ __($item->details) }}</td>
                                    <td data-label="@lang('Status')">
                                        @if($item->status === 1)
                                            <span class="text--small badge font-weight-normal badge--success">@lang('Active')</span>
                                        @else
                                            <span class="text--small badge font-weight-normal badge--warning">@lang('Deactive')</span>
                                        @endif
                                    </td>
                                                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                                </tr>
                            @endforelse
                             @endisset
                  </tbody>
                  <tfoot>
                    <tr>
                                  <th scope="col">@lang('Suspected name')</th>                               
                                      <th scope="col">@lang('Category')</th>
                                       <th scope="col">@lang('Titles')</th>
                                <th scope="col">@lang('Photos')</th>
                                <th scope="col">@lang('Crime Details')</th>
                                     <th scope="col">@lang('Status')</th>
                            </tr>
                  </tfoot>
                </table>
        
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