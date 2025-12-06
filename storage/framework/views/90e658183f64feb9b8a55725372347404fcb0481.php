
<?php $__env->startSection('content'); ?>
    <!-- page-wrapper start -->
    <div class="page-wrapper default-version">
            <div class="body-wrapper">
            <div class="bodywrapper__inner">
                <?php echo $__env->make('admin.partialsuser.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldContent('panel'); ?>
            </div><!-- bodywrapper__inner end -->
        </div><!-- body-wrapper end -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layoutsuser.masterweb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/admin/layoutsuser/appweb.blade.php ENDPATH**/ ?>