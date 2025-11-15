<?php $__env->startSection('content'); ?>
    <!-- Account Section Starts Here -->
    <div class="account-section pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                   <p for="username" class="form--label">Don't write your Mobile number any where</p>
                                <div for="username" class="form--label"></div>   
                                <p for="username" class="form--label">Everything is Encrypted and confidential. Don't share your user name with any one</p>

                <div class="col-lg-10">
                    <div class="account__wrapper bg--section" style="background-image: url(../../../img/bg-img/b3.jpg)">
                       
                        <form class="account-form row g-4" action="<?php echo e(route('user.register')); ?>" method="POST" onsubmit="return submitUserForm();">
                            <?php echo csrf_field(); ?>

                                     
                           <br>
                            <div class="col-md-6">
                                <label for="username" class="form--label text--base"><?php echo e(__('Username')); ?></label>
                                <input id="username" type="text" class="form-control checkUser" name="username" value="<?php echo e(old('username')); ?>" placeholder="<?php echo e(__('Username')); ?>" required>
                                <small class="text-danger usernameExist"></small>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form--label text--base"><?php echo app('translator')->get('E-Mail Address'); ?></label>
                                <input id="email" type="email" class="form-control checkUser" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->get('E-Mail Address'); ?>" required>
                            </div>
                            <div class="col-md-6 hover-input-popup">
                                <label for="password" class="form--label text--base"><?php echo app('translator')->get('Password'); ?></label>
                                <input id="password" type="password" class="form-control " name="password" placeholder="<?php echo app('translator')->get('Password'); ?>" required>
                                <?php if($general->secure_password): ?>
                                    <div class="input-popup">
                                        <p class="error lower"><?php echo app('translator')->get('1 small letter minimum'); ?></p>
                                        <p class="error capital"><?php echo app('translator')->get('1 capital letter minimum'); ?></p>
                                        <p class="error number"><?php echo app('translator')->get('1 number minimum'); ?></p>
                                        <p class="error special"><?php echo app('translator')->get('1 special character minimum'); ?></p>
                                        <p class="error minimum"><?php echo app('translator')->get('6 character password'); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="select" class="form--label text--base"><?php echo app('translator')->get('Confirm Password'); ?></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="<?php echo app('translator')->get('Confirm Password'); ?>" required autocomplete="new-password">
                            </div>
<br><br>

                            <div class="col-md-12 d-flex justify-content-center">
                                  <?php echo $__env->make($activeTemplate.'partials.custom_captcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo loadReCaptcha() ?>
                            </div>
<br><br>
                            <div class="col-md-12">
                                <button type="submit" id="recaptcha" class="cmn--btn btn--lg"><?php echo app('translator')->get('Sign Up'); ?></button>
                            </div>

  <div>
                            <div class="col-md-12">
                                <div class="d-flex flex-wrap justify-content-between">
                                    <?php if($general->agree): ?>
                                        <div class="form-check form--check">
                                            <input class="form-check-input" type="checkbox" name="agree" id="tos" required>
                                            <label class="form-check-label" for="tos">
                                                <?php echo app('translator')->get('I agree with'); ?>
                                                <?php $__empty_1 = true; $__currentLoopData = getContent('policy_pages.element'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <a href="<?php echo e(route('policy.pages', [$item->id, slug($item->data_values->title)])); ?>" class="text--base"><?php echo e(__(@$item->data_values->title)); ?></a> <?php echo e($loop->last ? '' : ','); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <?php endif; ?>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                     <a href="<?php echo e(route('user.login')); ?>" class="text--base"> <?php echo app('translator')->get('Already have an account?'); ?> | <?php echo app('translator')->get('Sign In'); ?></a>
                                    </div>
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


<div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="existModalLongTitle"><?php echo app('translator')->get('You are with us'); ?></h5>
        <button type="button" class="close" data-ds-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="text-center"><?php echo app('translator')->get('You already have an account please Sign in '); ?></h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-ds-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
        <a href="<?php echo e(route('user.login')); ?>" class="btn btn-primary"><?php echo app('translator')->get('Login'); ?></a>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
<style>
    .input-group-text {
        color: white;
        background-color: transparent;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }
    .country-code select{
        border: none;
    }
    .country-code select:focus{
        border: none;
        outline: none;
    }
    .hover-input-popup {
        position: relative;
    }
    .hover-input-popup:hover .input-popup {
        opacity: 1;
        visibility: visible;
    }
    .input-popup {
        position: absolute;
        bottom: 72%;
        left: 53%;
        width: 280px;
        background-color: #1a1a1a;
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }
    .input-popup::after {
        position: absolute;
        content: '';
        bottom: -19px;
        left: 50%;
        margin-left: -5px;
        border-width: 10px 10px 10px 10px;
        border-style: solid;
        border-color: transparent transparent #1a1a1a transparent;
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .input-popup p {
        padding-left: 20px;
        position: relative;
    }
    .input-popup p::before {
        position: absolute;
        content: '';
        font-family: 'Line Awesome Free';
        font-weight: 900;
        left: 0;
        top: 4px;
        line-height: 1;
        font-size: 18px;
    }
    .input-popup p.error {
        text-decoration: line-through;
    }
    .input-popup p.error::before {
        content: "\f057";
        color: #ea5455;
    }
    .input-popup p.success::before {
        content: "\f058";
        color: #28c76f;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-lib'); ?>
<script src="<?php echo e(asset('assets/global/js/secure_password.js')); ?>"></script>
<?php $__env->stopPush(); ?>
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
        (function ($) {
            <?php if($mobile_code): ?>
            $(`option[data-code=<?php echo e($mobile_code); ?>]`).attr('selected','');
            <?php endif; ?>

            $('select[name=country]').change(function(){
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            <?php if($general->secure_password): ?>
                $('input[name=password]').on('input',function(){
                    secure_password($(this));
                });
            <?php endif; ?>

            $('.checkUser').on('focusout',function(e){
                var url = '<?php echo e(route('user.checkUser')); ?>';
                var value = $(this).val();
                var token = '<?php echo e(csrf_token()); ?>';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {mobile:mobile,_token:token}
                }
                if ($(this).attr('name') == 'email') {
                    var data = {email:value,_token:token}
                }
                if ($(this).attr('name') == 'username') {
                    var data = {username:value,_token:token}
                }
                $.post(url,data,function(response) {
                  if (response['data'] && response['type'] == 'email') {
                    $('#existModalCenter').modal('show');
                  }else if(response['data'] != null){
                    $(`.${response['type']}Exist`).text(`${response['type']} already exist`);
                  }else{
                    $(`.${response['type']}Exist`).text('');
                  }
                });
            });

        })(jQuery);

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/user/auth/register.blade.php ENDPATH**/ ?>