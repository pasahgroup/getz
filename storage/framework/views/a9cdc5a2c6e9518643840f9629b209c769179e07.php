<?php $__env->startSection('content'); ?>
    <!-- Dashboard -->
    <div class="pb-60 pt-60">
        <div class="row justify-content-center g-4">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="dashboard__item">
                    <div class="dashboard__thumb">
                        <i class="las la-car-side"></i>
                    </div>
                    <div class="dashboard__content">
                        <h4 class="dashboard__title"><?php echo e(@$data['total_vehicle_booking']); ?></h4>
                        <span class="subtitle"><?php echo app('translator')->get('Total Vehicle Booking'); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="dashboard__item">
                    <div class="dashboard__thumb">
                        <i class="las la-hourglass-half"></i>
                    </div>
                    <div class="dashboard__content">
                        <h4 class="dashboard__title"><?php echo e(@$data['upcoming_vehicle_booking']); ?></h4>
                        <span class="subtitle"><?php echo app('translator')->get('Upcoming Vehicle Booking'); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="dashboard__item">
                    <div class="dashboard__thumb">
                        <i class="las la-spinner"></i>
                    </div>
                    <div class="dashboard__content">
                        <h4 class="dashboard__title"><?php echo e(@$data['running_vehicle_booking']); ?></h4>
                        <span class="subtitle"><?php echo app('translator')->get('Running Vehicle Booking'); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="dashboard__item">
                    <div class="dashboard__thumb">
                        <i class="las la-check-circle"></i>
                    </div>
                    <div class="dashboard__content">
                        <h4 class="dashboard__title"><?php echo e(@$data['completed_vehicle_booking']); ?></h4>
                        <span class="subtitle"><?php echo app('translator')->get('Completed Vehicle Booking'); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="dashboard__item">
                    <div class="dashboard__thumb">
                        <i class="lab la-product-hunt"></i>
                    </div>
                    <div class="dashboard__content">
                        <h4 class="dashboard__title"><?php echo e(@$data['total_plan_booking']); ?></h4>
                        <span class="subtitle"><?php echo app('translator')->get('Total Plan Booking'); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="dashboard__item">
                    <div class="dashboard__thumb">
                        <i class="las la-hourglass-half"></i>
                    </div>
                    <div class="dashboard__content">
                        <h4 class="dashboard__title"><?php echo e(@$data['upcoming_plan_booking']); ?></h4>
                        <span class="subtitle"><?php echo app('translator')->get('Upcoming Plan Booking'); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="dashboard__item">
                    <div class="dashboard__thumb">
                        <i class="las la-spinner"></i>
                    </div>
                    <div class="dashboard__content">
                        <h4 class="dashboard__title"><?php echo e(@$data['running_plan_booking']); ?></h4>
                        <span class="subtitle"><?php echo app('translator')->get('Running Plan Booking'); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="dashboard__item">
                    <div class="dashboard__thumb">
                        <i class="las la-check-circle"></i>
                    </div>
                    <div class="dashboard__content">
                        <h4 class="dashboard__title"><?php echo e(@$data['completed_plan_booking']); ?></h4>
                        <span class="subtitle"><?php echo app('translator')->get('Completed Plan Booking'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard -->

    <div class="pb-60">
        <div class="table-responsive">
            <table class="table cmn--table">
                <thead>
                <tr>
                    <th><?php echo app('translator')->get('Transaction ID'); ?></th>
                    <th><?php echo app('translator')->get('Gateway'); ?></th>
                    <th><?php echo app('translator')->get('Vehicle'); ?></th>
                    <th><?php echo app('translator')->get('Plan'); ?></th>
                    <th><?php echo app('translator')->get('Amount'); ?></th>
                    <th><?php echo app('translator')->get('Status'); ?></th>
                    <th><?php echo app('translator')->get('Time'); ?></th>
                    <th> <?php echo app('translator')->get('MORE'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($logs) >0): ?>
                    <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td data-label="#<?php echo app('translator')->get('Trx'); ?>"><?php echo e($data->trx); ?></td>
                            <td data-label="<?php echo app('translator')->get('Gateway'); ?>"><?php echo e(__(@$data->gateway->name)); ?></td>
                            <td data-label="<?php echo app('translator')->get('Vehicle'); ?>"><?php echo e(__(@$data->rent->vehicle->name) ?? '-'); ?></td>
                            <td data-label="<?php echo app('translator')->get('Plan'); ?>"><?php echo e(__(@$data->planlog->plan->name) ?? '-'); ?></td>
                            <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                <strong><?php echo e(showAmount($data->amount)); ?> <?php echo e(__($general->cur_text)); ?></strong>
                            </td>
                            
                            <td>
                                <?php if($data->status == 1): ?>
                                    <span class="badge badge--success"><?php echo app('translator')->get('Complete'); ?></span>
                                <?php elseif($data->status == 2): ?>
                                    <span class="badge badge--warning"><?php echo app('translator')->get('Pending'); ?></span>
                                <?php elseif($data->status == 3): ?>
                                    <span class="badge badge--danger"><?php echo app('translator')->get('Cancel'); ?></span>
                                <?php endif; ?>

                                <?php if($data->admin_feedback != null): ?>
                                    <button class="btn--info btn-rounded badge detailBtn" data-admin_feedback="<?php echo e($data->admin_feedback); ?>"><i class="la la-info"></i></button>
                                <?php endif; ?>

                            </td>
                            <td data-label="<?php echo app('translator')->get('Time'); ?>">
                                <i class="la la-calendar"></i> <?php echo e(showDateTime($data->created_at)); ?>

                            </td>

                            <?php
                                $details = ($data->detail != null) ? json_encode($data->detail) : null;
                            ?>

                            <td data-label="<?php echo app('translator')->get('Details'); ?>">
                                <a href="javascript:void(0)" class="btn btn--primary btn--sm approveBtn"
                                   data-info="<?php echo e($details); ?>"
                                   data-id="<?php echo e($data->id); ?>"
                                   data-amount="<?php echo e(showAmount($data->amount)); ?> <?php echo e(__($general->cur_text)); ?>"
                                   data-charge="<?php echo e(showAmount($data->charge)); ?> <?php echo e(__($general->cur_text)); ?>"
                                   data-after_charge="<?php echo e(showAmount($data->amount + $data->charge)); ?> <?php echo e(__($general->cur_text)); ?>"
                                   data-rate="<?php echo e(showAmount($data->rate)); ?> <?php echo e(__($data->method_currency)); ?>"
                                   data-payable="<?php echo e(showAmount($data->final_amo)); ?> <?php echo e(__($data->method_currency)); ?>">
                                    <i class="la la-desktop"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="100%"><?php echo app('translator')->get('Data not found'); ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


    
    <div id="approveModal" class="modal fade custom--modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Details'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item bg-transparent"><?php echo app('translator')->get('Amount'); ?> : <span class="withdraw-amount "></span></li>
                        <li class="list-group-item bg-transparent"><?php echo app('translator')->get('Charge'); ?> : <span class="withdraw-charge "></span></li>
                        <li class="list-group-item bg-transparent"><?php echo app('translator')->get('After Charge'); ?> : <span class="withdraw-after_charge"></span></li>
                        <li class="list-group-item bg-transparent"><?php echo app('translator')->get('Conversion Rate'); ?> : <span class="withdraw-rate"></span></li>
                        <li class="list-group-item bg-transparent"><?php echo app('translator')->get('Payable Amount'); ?> : <span class="withdraw-payable"></span></li>
                    </ul>
                    <ul class="list-group withdraw-detail mt-1">
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                </div>
            </div>
        </div>
    </div>

    
    <div id="detailModal" class="modal fade custom--modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Details'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <div class="withdraw-detail"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";
            $('.approveBtn').on('click', function() {
                var modal = $('#approveModal');
                modal.find('.withdraw-amount').text($(this).data('amount'));
                modal.find('.withdraw-charge').text($(this).data('charge'));
                modal.find('.withdraw-after_charge').text($(this).data('after_charge'));
                modal.find('.withdraw-rate').text($(this).data('rate'));
                modal.find('.withdraw-payable').text($(this).data('payable'));
                var list = [];
                var details =  Object.entries($(this).data('info'));

                var ImgPath = "<?php echo e(asset(imagePath()['verify']['deposit']['path'])); ?>/";
                var singleInfo = '';
                for (var i = 0; i < details.length; i++) {
                    if (details[i][1].type == 'file') {
                        singleInfo += `<li class="list-group-item">
                                            <span class="font-weight-bold "> ${details[i][0].replaceAll('_', " ")} </span> : <img src="${ImgPath}/${details[i][1].field_name}" alt="<?php echo app('translator')->get('Image'); ?>" class="w-100">
                                        </li>`;
                    }else{
                        singleInfo += `<li class="list-group-item">
                                            <span class="font-weight-bold "> ${details[i][0].replaceAll('_', " ")} </span> : <span class="font-weight-bold ml-3">${details[i][1].field_name}</span>
                                        </li>`;
                    }
                }

                if (singleInfo)
                {
                    modal.find('.withdraw-detail').html(`<br><strong class="my-3"><?php echo app('translator')->get('Payment Information'); ?></strong>  ${singleInfo}`);
                }else{
                    modal.find('.withdraw-detail').html(`${singleInfo}`);
                }
                modal.modal('show');
            });

            $('.detailBtn').on('click', function() {
                var modal = $('#detailModal');
                var feedback = $(this).data('admin_feedback');
                modal.find('.withdraw-detail').html(`<p> ${feedback} </p>`);
                modal.modal('show');
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.admin_master_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rentlab\resources\views/templates/basic/user/dashboard.blade.php ENDPATH**/ ?>