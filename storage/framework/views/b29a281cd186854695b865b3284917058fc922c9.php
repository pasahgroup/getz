
<?php $__env->startSection('panel'); ?>
<div class="row mb-none-30">
  <div class="col-md-12">
    <div class="card b-radius--10 ">
      <div class="card-body p-0">
        <div class="table-responsive--md  table-responsive">
          <table class="table table--light style--two">
            <thead>
              <tr>
                <th><?php echo app('translator')->get('Type'); ?></th>
                <th><?php echo app('translator')->get('Message'); ?></th>
                <th><?php echo app('translator')->get('Status'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $__empty_1 = true; $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <tr>
                <td><?php echo e(@$report->req_type); ?></td>
                <td class="text-center white-space-wrap"><?php echo e(@$report->message); ?></td>
                <td><span class="badge badge--<?php echo e(@$report->status_class); ?>"><?php echo e(@$report->status_text); ?></span></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <tr>
                <td colspan="100%" class="text-center"><?php echo app('translator')->get('Data not found'); ?></td>
              </tr>
              <?php endif; ?>
            </tbody>
          </table><!-- table end -->
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="bugModal" tabindex="-1" role="dialog" aria-labelledby="bugModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bugModalLabel"><?php echo app('translator')->get('Report & Request'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action method="post">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <div class="form-group">
            <label><?php echo app('translator')->get('Type'); ?></label>
            <select class="form-control" name="type">
              <option value="bug"><?php echo app('translator')->get('Report Bug'); ?></option>
              <option value="feature"><?php echo app('translator')->get('Feature Request'); ?></option>
            </select>
          </div>
          <div class="form-group">
            <label><?php echo app('translator')->get('Message'); ?></label>
            <textarea class="form-control" name="message"><?php echo e(old('message')); ?></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
          <button type="submit" class="btn btn--primary"><?php echo app('translator')->get('Report'); ?></button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('breadcrumb-plugins'); ?>
<button class="btn btn--primary" data-toggle="modal" data-target="#bugModal"><?php echo app('translator')->get('Report a bug'); ?></button>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/admin/reports.blade.php ENDPATH**/ ?>