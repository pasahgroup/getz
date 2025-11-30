

<?php $__env->startSection('panel'); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <a href="<?php echo e(route('user.videos.add')); ?>" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i class="fa fa-fw fa-plus"></i><?php echo app('translator')->get('New Incident video (Sajili Picha Mjongeo)'); ?></a>
<?php $__env->stopPush(); ?>
  <script src="../../../../appweb/jquery171.min.js"></script>
    <link rel="stylesheet" href="../../../../appweb/bootstrap320.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="../../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<?php $__env->startSection('panel'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Main content -->
             <div class="card">
        <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                                <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Incident type'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Incident Place'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Region'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('District'); ?></th>
                           <th scope="col"><?php echo app('translator')->get('Event Date'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Videos'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Incident Details'); ?></th>
                                 <th scope="col"><?php echo app('translator')->get('Elapsed time'); ?></th>
                                  <th scope="col"><?php echo app('translator')->get('Last update'); ?></th>
                                     <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Actions'); ?></th>
                            </tr>
                  </thead>
                  <tbody>
              
       <?php $__empty_1 = true; $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>                   
                                     <td data-label="<?php echo app('translator')->get('Name'); ?>"><?php echo e(__($item->name)); ?></td>
                                    
                                    <td data-label="<?php echo app('translator')->get('Event_type'); ?>"><?php echo e(__($item->event_type)); ?></td>
                                    <td data-label="<?php echo app('translator')->get('Event_place'); ?>"><?php echo e(__($item->event_place)); ?></td>
                                     <td data-label="<?php echo app('translator')->get('Region'); ?>"><?php echo e(__($item->region)); ?></td>
                                      <td data-label="<?php echo app('translator')->get('District'); ?>"><?php echo e(__($item->district)); ?></td>

                                    <td data-label="<?php echo app('translator')->get('Date event'); ?>"><?php echo e(__($item->date_event)); ?></td>
                                   
                                        <td data-label="<?php echo app('translator')->get('Videos'); ?>"> 

                                                                           <video controls width="140" height="120">
    <source src="<?php echo e(Storage::url($item->path)); ?>" type="video/mp4" style="object-fit: cover;">
    Your browser does not support the video tag.
</video> 
</td>                                                   
 <td data-label="<?php echo app('translator')->get('Event details'); ?>"><textarea rows="10" cols="100%" name="details" class="form-control"
                                               id="nicEditor0" readonly><?php echo e($item->details); ?></textarea></td>


     <td data-label="<?php echo app('translator')->get('Event details'); ?>"><?php echo e(__($item->elapsed_time)); ?></td>
       <td data-label="<?php echo app('translator')->get('Event details'); ?>"><?php echo e(__($item->last_update)); ?></td>


                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                        <?php if($item->status === 1): ?>
                                            <span class="text--small badge font-weight-normal badge--success"><?php echo app('translator')->get('Active'); ?></span>
                                        <?php else: ?>
                                            <span class="text--small badge font-weight-normal badge--warning"><?php echo app('translator')->get('Deactive'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                

                                    <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                       <?php if(auth()->user()->email =="buruwawa@gmail.com"): ?>                                     
                                        <a href="<?php echo e(route('user.videos.edit', $item->id)); ?>" class="icon-btn ml-1" data-original-title="<?php echo app('translator')->get('Edit'); ?>">
                                            <i class="la la-edit"></i>
                                        </a>                                   
                                       

                                        <a href="javascript:void(0)" class="icon-btn <?php echo e($item->status ? 'btn--danger' : 'btn--success'); ?> ml-1 statusBtn" data-original-title="<?php echo app('translator')->get('Status'); ?>" data-toggle="tooltip" data-url="<?php echo e(route('user.events.status', $item->id)); ?>">
                                            <i class="la la-eye<?php echo e($item->status ? '-slash' : null); ?>"></i>
                                        </a>
                                            <?php endif; ?>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-muted text-center" colspan="100%"><?php echo e(__($empty_message)); ?></td>
                                </tr>
                            <?php endif; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                         
                                <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Incident type'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Incident Place'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Region'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('District'); ?></th>
                           <th scope="col"><?php echo app('translator')->get('Event Date'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Videos'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Incident Details'); ?></th>
                                 <th scope="col"><?php echo app('translator')->get('Elapsed time'); ?></th>
                                  <th scope="col"><?php echo app('translator')->get('Last update'); ?></th>
                                     <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Actions'); ?></th>
                            </tr>
                  </tfoot>
                </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      
  </div>

     
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('Update Status'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form method="post" action="">
                    <?php echo csrf_field(); ?>

                    <div class="modal-body">
                        <p class="text-muted"><?php echo app('translator')->get('Are you sure to change status?'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('No'); ?></button>
                        <button type="submit" class="btn btn--danger deleteButton"><?php echo app('translator')->get('Yes'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php $__env->startPush('script'); ?>
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
<?php $__env->stopPush(); ?>

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
<?php echo $__env->make('admin.layoutsuser.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/videos/index.blade.php ENDPATH**/ ?>