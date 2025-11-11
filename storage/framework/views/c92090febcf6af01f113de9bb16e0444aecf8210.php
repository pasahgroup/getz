<?php
    $plan_content = getContent('plan.content', true);
    $plans = \App\Models\Plan::active()->take(3)->get();
?>

<!-- Pricing Section -->
<section class="pricing-section position-relative overflow-hidden" style="background-color:#fff;">
    <div class="shape right-side"><?php echo e(__(@$plan_content->data_values->stylish_text_right)); ?></div>
    <div class="shape"><?php echo e(__(@$plan_content->data_values->stylish_text_left)); ?></div>
    <div class="container-fluid">
        <div class="section__header section__header__center">
            <span class="section__category"><?php echo e(__(@$plan_content->data_values->sub_heading)); ?></span>
            <h2 class="section__title"><?php echo e(__(@$plan_content->data_values->heading)); ?></h2>
        </div>
        <div class="row g-4 justify-content-center">

            <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-sm-10 col-md-3 col-xl-3">
                    <div class="plan__item">
                        <div class="plan__header">
                            <h5 class="plan__title"><?php echo e(__(@$plan->name)); ?></h5>
                            <div class="plan__header-price">
                                <div class="price">
                                    <span class="d-block title"><?php echo e($general->cur_sym); ?><?php echo e(getAmount($plan->price)); ?></span>
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
                            <a href="/plans" class="cmn--btn"><?php echo app('translator')->get('book now'); ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>

        </div>
    </div>
</section>
<!-- Pricing Section -->
<?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/sections/plan.blade.php ENDPATH**/ ?>