<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light tabstyle--two">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo app('translator')->get('User'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Plan'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Price - TRX'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Pick Location'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Pick - Drop Time'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $plan_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-label="<?php echo app('translator')->get('User'); ?>">
                                        <span class="font-weight-bold"><?php echo e($log->user->fullname); ?></span>
                                        <br>
                                        <span class="small"> <a href="<?php echo e(route('admin.users.detail', $log->user_id)); ?>"><span>@</span><?php echo e($log->user->username); ?></a> </span>
                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Plan'); ?>"><?php echo e(__($log->plan->name)); ?></td>
                                    <td data-label="<?php echo app('translator')->get('Price - TRX'); ?>"><?php echo e(showAmount($log->price)); ?> <?php echo e($general->cur_text); ?><br>
                                        <strong><?php echo e(@$log->trx); ?></strong>
                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Pick Location'); ?>"><?php echo e(__($log->pick_up_location->name)); ?></td>
                                    <td data-label="<?php echo app('translator')->get('Pick - Drop Time'); ?>">
                                        <?php echo e(showDateTime($log->pick_time)); ?><br><?php echo e(showDateTime($log->drop_time)); ?>

                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                        <?php if($log->pick_time > now()): ?>
                                            <span class="text--small badge font-weight-normal badge--primary"><?php echo app('translator')->get('Upcoming'); ?></span>
                                        <?php elseif($log->pick_time < now() && $log->drop_time > now()): ?>
                                            <span class="text--small badge font-weight-normal badge--warning"><?php echo app('translator')->get('Running'); ?></span>
                                        <?php elseif($log->drop_time < now()): ?>
                                            <span class="text--small badge font-weight-normal badge--success"><?php echo app('translator')->get('Completed'); ?></span>
                                        <?php endif; ?>
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
                    <?php echo e($plan_logs->links('admin.partials.paginate')); ?>

                </div>
            </div><!-- card end -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/admin/plan/bookinglog.blade.php ENDPATH**/ ?>