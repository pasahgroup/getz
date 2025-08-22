<?php $__env->startSection('content'); ?>
    <section class="faq-section pt-120 pb-120 position-relative bg--section overflow-hidden">
        <div class="shape right-side"><?php echo app('translator')->get('Posts'); ?></div>
        <div class="shape"><?php echo app('translator')->get('Blog'); ?></div>
        <div class="container-fluid">
            <div class="row justify-content-center g-4">
                <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-3 col-md-6 col-sm-10">
                        <div class="post__item">
                            <div class="post__thumb">
                                <a href="<?php echo e(route('blog.details', [$item->id, slug($item->data_values->title)])); ?>">
                                    <img src="<?php echo e(getImage('assets/images/frontend/blog/' . @$item->data_values->image, '900x600')); ?>" alt="blog">
                                </a>
                            </div>
                            <div class="post__content">
                                <h6 class="post__title">
                                    <a href="<?php echo e(route('blog.details', [$item->id, slug($item->data_values->title)])); ?>"><?php echo e(__(@$item->data_values->title)); ?></a>
                                </h6>
                                <div class="meta__date text-white">
                                    <div class="meta__item">
                                        <i class="las la-calendar"></i>
                                        <?php echo e(showDateTime($item->created_at)); ?>

                                    </div>
                                    <div class="meta__item">
                                        <i class="las la-eye"></i>
                                        <?php echo e(__(@$item->views)); ?>

                                    </div>
                                </div>
                                <a href="<?php echo e(route('blog.details', [$item->id, slug($item->data_values->title)])); ?>" class="post__read"><?php echo app('translator')->get('Read More'); ?> <i class="las la-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>
            <?php echo e($blogs->links()); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rentlab\resources\views/templates/basic/blogs/all.blade.php ENDPATH**/ ?>