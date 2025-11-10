<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light tabstyle--two">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Price Per Ride'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Number Of Days'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Actions'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-label="<?php echo app('translator')->get('Name'); ?>"><strong><?php echo e(__($item->name)); ?></strong></td>
                                    <td data-label="<?php echo app('translator')->get('Price Per Ride'); ?>"><strong><?php echo e($general->cur_sym); ?><?php echo e(__(showAmount($item->price))); ?></strong></td>
                                    <td data-label="<?php echo app('translator')->get('Price Per Ride'); ?>"><?php echo e($item->days); ?></td>
                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                        <?php if($item->status === 1): ?>
                                            <span class="text--small badge font-weight-normal badge--success"><?php echo app('translator')->get('Active'); ?></span>
                                        <?php else: ?>
                                            <span class="text--small badge font-weight-normal badge--warning"><?php echo app('translator')->get('Deactive'); ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                        <a href="<?php echo e(route('admin.plans.edit', $item->id)); ?>" class="icon-btn ml-1" data-original-title="<?php echo app('translator')->get('Edit'); ?>">
                                            <i class="la la-edit"></i>
                                        </a>

                                        <a href="javascript:void(0)" class="icon-btn <?php echo e($item->status ? 'btn--danger' : 'btn--success'); ?> ml-1 statusBtn" data-original-title="<?php echo app('translator')->get('Status'); ?>" data-toggle="tooltip" data-url="<?php echo e(route('admin.plans.status', $item->id)); ?>">
                                            <i class="la la-eye<?php echo e($item->status ? '-slash' : null); ?>"></i>
                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-muted text-center" colspan="100%"><?php echo e(__($empty_message)); ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer">
                    <?php echo e($plans->links('admin.partials.paginate')); ?>

                </div>
            </div><!-- card end -->
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


<?php $__env->startPush('breadcrumb-plugins'); ?>
    <a href="<?php echo e(route('admin.plans.add')); ?>" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i class="fa fa-fw fa-plus"></i><?php echo app('translator')->get('Add New'); ?></a>
<?php $__env->stopPush(); ?>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/admin/plan/index.blade.php ENDPATH**/ ?>