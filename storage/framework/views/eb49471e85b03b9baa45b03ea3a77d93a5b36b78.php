<?php $__env->startSection('content'); ?>
    <div class="faq-section pt-120 pb-120 bg--section position-relative overflow-hidden">
        <div class="shape"><?php echo app('translator')->get('pricing'); ?></div>
        <div class="shape right-side"><?php echo app('translator')->get('plan'); ?></div>
        <div class="container">
            <div class="row g-4 justify-content-center">

                <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-sm-10 col-md-6 col-xl-3">
                        <div class="plan__item">
                            <div class="plan__header">
                                <h5 class="plan__title"><?php echo e(__(@$plan->name)); ?></h5>
                                <div class="plan__header-price">
                                    <div class="price">
                                        <span
                                            class="d-block title"><?php echo e($general->cur_sym); ?><?php echo e(getAmount($plan->price)); ?></span>
                                        <span class="info d-block">/ <?php echo app('translator')->get('per ride'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="plan__body">
                                <ul>

                                    <?php $__empty_2 = true; $__currentLoopData = $plan->included; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <li><i class="las la-check"></i> <?php echo e(__(@$item)); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <?php endif; ?>

                                    <?php $__empty_2 = true; $__currentLoopData = $plan->excluded; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <li><i class="las la-times"></i> <?php echo e(__(@$item)); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <?php endif; ?>

                                </ul>
                                <?php if(auth()->guard()->check()): ?>
                                    <button type="button" class="cmn--btn plan_modal" data-bs-toggle="modal"
                                            data-bs-target="#planModal" data-url="<?php echo e(route('plan.booking', $plan->id)); ?>"><?php echo app('translator')->get('Book Now'); ?></button>
                                <?php else: ?>
                                    <a href="<?php echo e(route('user.login')); ?>" class="cmn--btn"><?php echo app('translator')->get('book now'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade custom--modal" id="planModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('Fill the form'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <form action="" method="post" class="planForm">
                    <?php echo csrf_field(); ?>

                    <div class="modal-body">
                        <div class="form--group">
                            <label for="priority" class="form--label"><?php echo app('translator')->get('Pick Up Point'); ?></label>
                            <select name="pick_location" class="form-control form--control">
                                <?php $__empty_1 = true; $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($location->id); ?>"><?php echo app('translator')->get($location->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <br>

                              <div class="form--group">
                                        <div class="input-group">
                            <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                            <span class="las la-car"></span>
                            <span class="ms-1"><?php echo app('translator')->get('Number of Car'); ?></span>
                                                            </div>
            <input class="form-control" type="number" aria-label="#" name="no_car" id="no_car" value="1" min="1" required>
                                                                    </div>
                                                                </div>
 <br>
                        <div class="form--group">
                            <label for="priority" class="form--label"><?php echo app('translator')->get('Pick Up Date & Time'); ?></label>
                            <input type="text" name="pick_time" placeholder="<?php echo app('translator')->get('Pick Up Date & Time'); ?>" id="planDateAndTimePicker" autocomplete="off" data-position='top right' class="form-control form--control"  required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--primary"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/datepicker.min.css')); ?>">
    <style>
        .datepicker{
            z-index: 9999999999999999;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset($activeTemplateTrue.'js/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue.'js/datepicker.en.js')); ?>"></script>
    <script>
        // date and time picker
        $('#planDateAndTimePicker').datepicker({
            timepicker: true,
            language: 'en'
        })



        $(document).on('click', '.plan_modal', function () {
            var url = $(this).data('url');
            alert(url);
            $('.planForm').attr('action', url);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/plans/index.blade.php ENDPATH**/ ?>