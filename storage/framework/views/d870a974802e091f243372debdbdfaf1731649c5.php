<?php $__env->startSection('content'); ?>
    <!-- Dashboard Table -->
    <div class="pb-60 pt-60">
        <div class="table-responsive">
            <table class="table cmn--table">
                <thead>
                <tr>
                    <th><?php echo app('translator')->get('Subject'); ?></th>
                    <th><?php echo app('translator')->get('Status'); ?></th>
                    <th><?php echo app('translator')->get('Priority'); ?></th>
                    <th><?php echo app('translator')->get('Last Reply'); ?></th>
                    <th><?php echo app('translator')->get('Action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td data-label="<?php echo app('translator')->get('Subject'); ?>">
                            <div class="ticket-name-id">
                                <a href="<?php echo e(route('ticket.view', $support->ticket)); ?>" class="text--title"> [<?php echo app('translator')->get('Ticket'); ?>#<?php echo e($support->ticket); ?>] <?php echo e(__($support->subject)); ?> </a>
                            </div>
                        </td>
                        <td data-label="<?php echo app('translator')->get('Status'); ?>">
                            <?php if($support->status == 0): ?>
                                <span class="badge badge--success"><?php echo app('translator')->get('Open'); ?></span>
                            <?php elseif($support->status == 1): ?>
                                <span class="badge badge--primary"><?php echo app('translator')->get('Answered'); ?></span>
                            <?php elseif($support->status == 2): ?>
                                <span class="badge badge--warning"><?php echo app('translator')->get('Customer Reply'); ?></span>
                            <?php elseif($support->status == 3): ?>
                                <span class="badge badge--dark"><?php echo app('translator')->get('Closed'); ?></span>
                            <?php endif; ?>
                        </td>
                        <td data-label="<?php echo app('translator')->get('Priority'); ?>">
                            <?php if($support->priority == 1): ?>
                                <span class="badge badge--dark"><?php echo app('translator')->get('Low'); ?></span>
                            <?php elseif($support->priority == 2): ?>
                                <span class="badge badge--success"><?php echo app('translator')->get('Medium'); ?></span>
                            <?php elseif($support->priority == 3): ?>
                                <span class="badge badge--primary"><?php echo app('translator')->get('High'); ?></span>
                            <?php endif; ?>
                        </td>
                        <td data-label="<?php echo app('translator')->get('Last Reply'); ?>"><?php echo e(\Carbon\Carbon::parse($support->last_reply)->diffForHumans()); ?> </td>

                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                            <a href="<?php echo e(route('ticket.view', $support->ticket)); ?>" class="btn btn--primary btn--sm">
                                <i class="la la-desktop"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <?php echo e($supports->links()); ?>

    </div>
    <!-- Dashboard Table -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rentlab\resources\views/templates/basic/user/support/index.blade.php ENDPATH**/ ?>