<?php $__env->startSection('content'); ?>
    <div class="pb-60 pt-60">
        <div class="table-responsive">
            <table class="table cmn--table">
                <thead>
                <tr>
                    <th scope="col"><?php echo app('translator')->get('Vehicle'); ?></th>
                    <th scope="col"><?php echo app('translator')->get('Pick - Drop Location'); ?></th>
                    <th scope="col"><?php echo app('translator')->get('Pick - Drop Time'); ?></th>
                    <th scope="col"><?php echo app('translator')->get('Price - TRX'); ?></th>
                    <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($booking_logs) > 0): ?>
                    <?php $__currentLoopData = $booking_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td data-label="<?php echo app('translator')->get('Vehicle'); ?>">
                                <div><?php echo e(__($log->vehicle->name)); ?></div>
                            </td>
                            <td data-label="<?php echo app('translator')->get('Pick - Drop Location'); ?>">
                                <div>
                                    <?php echo e(__(@$log->pick_up_location->name)); ?> <br>
                                    <strong><?php echo e(__(@$log->drop_up_location->name)); ?></strong>
                                </div>
                            </td>
                            <td data-label="<?php echo app('translator')->get('Pick - Drop Time'); ?>">
                                <div>
                                    <?php echo e(showDateTime($log->pick_time)); ?><br><strong><?php echo e(showDateTime($log->drop_time)); ?></strong>
                                </div>
                            </td>
                            <td data-label="<?php echo app('translator')->get('Price - TRX'); ?>">
                                <div>
                                    <?php echo e(showAmount($log->price)); ?> <?php echo e($general->cur_text); ?><br> <strong><?php echo e(@$log->trx); ?></strong>
                                </div>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                <div>
                                    <?php if($log->pick_time > now()): ?>
                                        <span class="text--small badge font-weight-normal badge--primary"><?php echo app('translator')->get('Upcoming'); ?></span>
                                    <?php elseif($log->pick_time < now() && $log->drop_time > now()): ?>
                                        <span class="text--small badge font-weight-normal badge--warning"><?php echo app('translator')->get('Running'); ?></span>
                                    <?php elseif($log->drop_time < now()): ?>
                                        <span class="text--small badge font-weight-normal badge--success"><?php echo app('translator')->get('Completed'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php echo e($booking_logs->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate.'layouts.admin_master_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rentlab\resources\views/templates/basic/user/vehicle_booking_log.blade.php ENDPATH**/ ?>