<?php
    $testimonial_content = getContent('testimonial.content', true);
    $testimonial_elements = getContent('testimonial.element');
?>

<!-- Clients Say Section -->
<section class="clients-section pt-120 pb-120 bg--section position-relative overflow-hidden">
    <div class="shape right-side"><?php echo e(__(@$testimonial_content->data_values->stylish_text_right)); ?></div>
    <div class="shape"><?php echo e(__(@$testimonial_content->data_values->stylish_text_left)); ?></div>
    <div class="container-fluid">
        <div class="section__header section__header__center">
            <span class="section__category"><?php echo e(__(@$testimonial_content->data_values->sub_heading)); ?></span>
            <h2 class="section__title"><?php echo e(__(@$testimonial_content->data_values->heading)); ?></h2>
        </div>
        <div class="client-slider owl-theme owl-carousel">

            <?php $__empty_1 = true; $__currentLoopData = $testimonial_elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="client__item">
                    <div class="client__header">
                        <div class="thumb">
                            <img
                                src="<?php echo e(getImage('assets/images/frontend/testimonial/' . @$item->data_values->image, '120x120')); ?>"
                                alt="client">
                        </div>
                        <div class="name__area">
                            <h6 class="name text--base"><?php echo e(__(@$item->data_values->name)); ?></h6>
                            <span class="designation"><?php echo e(__(@$item->data_values->designation)); ?></span>
                        </div>
                    </div>
                    <div class="client__content">
                        <p><?php echo e(__(@$item->data_values->review)); ?></p>
                        <div class="ratings">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <?php if($i <= $item->data_values->rating): ?>
                                    <span><i class="las la-star"></i></span>
                                <?php else: ?>
                                    <span><i class="lar la-star"></i></span>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>

        </div>
    </div>
</section>
<!-- Clients Say Section -->
<?php /**PATH C:\xampp\htdocs\rentlab\resources\views/templates/basic/sections/testimonial.blade.php ENDPATH**/ ?>