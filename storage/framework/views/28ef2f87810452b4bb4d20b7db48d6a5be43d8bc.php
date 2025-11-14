<?php
	$captcha = loadCustomCaptcha();
?>
<?php if($captcha): ?>
    <div class="col-md-<?php echo e(request()->routeIs('user.login') ? 12 : 6); ?>">
        <?php echo $captcha ?>
    </div>
    <div class="col-md-<?php echo e(request()->routeIs('user.login') ? 12 : 6); ?>">
        <input type="text" name="captcha" placeholder="<?php echo app('translator')->get('Enter Code'); ?>" class="form-control">
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/partials/custom_captcha.blade.php ENDPATH**/ ?>