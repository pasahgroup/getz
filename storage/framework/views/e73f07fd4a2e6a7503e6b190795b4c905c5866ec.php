<?php $__env->startSection('content'); ?>
    <!-- Account Section Starts Here -->
    <div>
              <div class="account-section pb-120">
            <div class="row justify-content-center" style="background-image: url(../../../img/bg-img/b4.jpeg)">
                <div class="col-xxl-6 col-lg-8" >
                    <div class="account__wrapper bg--section">
                        
                        <form class="account-form row g-4" method="POST" action="<?php echo e(route('user.login')); ?>" onsubmit="return submitUserForm();">
                            <?php echo csrf_field(); ?>

  <input type="hidden" name="fullurl" value="<?php echo e($fullUrl); ?>"/>


   <div class="col-md-12">
                                <label for="username" class="form--labelx" style="color:yellow;"><?php echo app('translator')->get('Username: info@tanzaniagenocide.com  pwd: infoGo'); ?></label>
                               
                            </div>


<hr>


                            <div class="col-md-12">
                                <label for="username" class="form--label" style="color:yellow;"><?php echo app('translator')->get('Username or Email'); ?></label>
                                <input type="text" name="username" value="<?php echo e(old('username')); ?>" placeholder="<?php echo app('translator')->get('Username or Email'); ?>" class="form-control form--control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="password" class="form--label" style="color:yellow;"><?php echo e(__('Password')); ?></label>
                                <input id="password" type="password" class="form-control form--control" placeholder="<?php echo app('translator')->get('Password'); ?>" name="password" required>
                            </div>

                            <div class="col-md-12 d-flex flex-wrap justify-content-center">
                                <?php echo loadReCaptcha() ?>
                            </div>
                            <?php echo $__env->make($activeTemplate.'partials.custom_captcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="col-md-12">
                                <div class="form-check form--check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="remember">
                                        <?php echo app('translator')->get('Remember Me'); ?>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" id="recaptcha" class="cmn--btn btn--lg"><?php echo app('translator')->get('Sign In'); ?></button>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex flex-wrap justify-content-between">
                                    <a href="<?php echo e(route('user.password.request')); ?>" class="text--base"><?php echo app('translator')->get('Forgot Password?'); ?></a>
                                    <div>
                                        <a href="<?php echo e(route('user.register')); ?>" class="text--base"><?php echo app('translator')->get('Create Account'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
        </div>

    <!-- Account Section Ends Here -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span class="text-danger"><?php echo app('translator')->get("Captcha field is required."); ?></span>';
                return false;
            }
            return true;
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/user/auth/login.blade.php ENDPATH**/ ?>