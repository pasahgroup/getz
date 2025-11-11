<?php
    $faq_content = getContent('faq.content', true);
    $faq_elements = getContent('faq.element', false, null, true);
?>

<!-- Faqs Section -->
<section class="faq-section pt-120 pb-120 position-relative overflow-hidden">
    <div class="shape right-side"><?php echo e(__(@$faq_content->data_values->stylish_text_right)); ?></div>
    <div class="shape"><?php echo e(__(@$faq_content->data_values->stylish_text_left)); ?></div>
    <div class="container">
        <div class="section__header section__header__center">
            <span class="section__category"><?php echo e(__(@$faq_content->data_values->sub_heading)); ?></span>
            <h2 class="section__title"><?php echo e(__(@$faq_content->data_values->heading)); ?></h2>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="faq__wrapper">

                    <?php $__empty_1 = true; $__currentLoopData = $faq_elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($loop->even) continue; ?>
                        <div class="faq__item">
                            <div class="faq__title">
                                <h6 class="title"><?php echo e(__(@$item->data_values->question)); ?></h6>
                                <span class="right__icon"></span>
                            </div>
                            <div class="faq__content">
                                <p><?php echo e(__(@$item->data_values->answer)); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="faq__wrapper">
                    <?php $__empty_1 = true; $__currentLoopData = $faq_elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($loop->odd) continue; ?>
                        <div class="faq__item">
                            <div class="faq__title">
                                <h6 class="title"><?php echo e(__(@$item->data_values->question)); ?></h6>
                                <span class="right__icon"></span>
                            </div>
                            <div class="faq__content">
                                <p><?php echo e(__(@$item->data_values->answer)); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Faqs Section -->
<?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/sections/faq.blade.php ENDPATH**/ ?>