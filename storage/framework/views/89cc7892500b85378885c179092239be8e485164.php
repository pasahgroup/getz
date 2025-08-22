<!-- Hero Section -->
<section class="hero-section" style="padding:8px;">
    <div class="container">
        <div class="hero-content">
            <div class="row">
            <h4 class="#" data-value="<?php echo app('translator')->get($pageTitle); ?>"><?php echo app('translator')->get($pageTitle); ?></h4>
            <ul class="breadcrumb" style="padding:1px;">
                <li>
                    <a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('Home'); ?></a>
                </li>
                <li>
                    <?php echo app('translator')->get($pageTitle); ?>
                </li>
            </ul>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section -->
<?php /**PATH C:\xampp\htdocs\rentlab\resources\views/templates/basic/partials/breadcrumb.blade.php ENDPATH**/ ?>