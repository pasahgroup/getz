<?php $__env->startSection('content'); ?>
    <!-- Account Section Starts Here -->
     <div class="pt-60 pb-60">
        <div class="profile-wrapper bg--body">
         
               <div class="profile-user mb-lg-0">
                <div class="thumb">
                    <img src="<?php echo e(getImage(imagePath()['profile']['user']['path'].'/'. $user->image,imagePath()['profile']['user']['size'])); ?>" alt="user">
                </div>
                <div class="content">
                    <h6 class="title"><?php echo app('translator')->get('Name'); ?>: <?php echo e($user->fullname); ?></h6>
                    <span class="subtitle"><?php echo app('translator')->get('Username'); ?>: <?php echo e($user->username); ?></span>
                </div>
            </div>

             
             <div class="profile-form-area">
                          <form class="profile-edit-form row g-4" action="" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                            <div class="col-md-6">
                                <label for="firstname" class="form--label"><?php echo app('translator')->get('First Name'); ?></label>
                                <input id="firstname" type="text" placeholder="<?php echo app('translator')->get('First Name'); ?>" class="form-control form--control" name="firstname" value="<?php echo e($user->firstname); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="form--label"><?php echo app('translator')->get('Last Name'); ?></label>
                                <input id="lastname" type="text" class="form-control form--control" name="lastname" value="<?php echo e($user->lastname); ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form--label"><?php echo app('translator')->get('Country'); ?></label>
                                <select name="country" id="country" class="form--control">
                                       <option selected><?php echo e(@$user->address->country); ?></option>
                                   
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-mobile_code="<?php echo e($country->dial_code); ?>" value="<?php echo e(__(@$country->country)); ?>" data-code="<?php echo e($key); ?>"><?php echo e(__(@$country->country)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                     <div class="col-md-6">
                                <label class="form--label"><?php echo app('translator')->get('Mobile'); ?></label>
                                <div class="form-group">
                                    <div class="input-group ">
                                        <input type="text" name="mobile_code">
                                        <input type="text" name="country_code">
                                        <span class="input-group-text mobile-code"></span>
                                        <input type="text" name="mobile" id="mobile" value="<?php echo e($user->mobile); ?>" class="form-control form--control checkUser" placeholder="<?php echo app('translator')->get('Your Phone Number'); ?>">
                                    </div>
                                    <small class="text-danger mobileExist"></small>
                                </div>
                            </div> 

                               <div class="col-md-6">
                                <label for="nida" class="form--label"><?php echo e(__('NIDA')); ?></label>
                                <input id="nida" type="text" class="form-control form--control checkUser" name="nida" value="<?php echo e($user->nida); ?>" required>
                                <small class="text-danger usernameExist"></small>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form--label"><?php echo app('translator')->get('Driving License'); ?></label>
                                <input id="driving_license" type="text" class="form-control form--control checkUser" name="driving_license" value="<?php echo e($user->driving_license); ?>"  required>
                            </div>
                          
                            <div class="col-md-6">
                                <label for="email" class="form--label"><?php echo app('translator')->get('E-Mail Address'); ?></label>
                                <input id="email" type="email" class="form-control form--control checkUser" name="email" value="<?php echo e($user->email); ?>" required>
                            </div>


    <div class="form--group col-md-6">
                        <label class="form--label" for="country"><?php echo app('translator')->get('Address'); ?></label>
                        <input type="text" class="form-control form--control" id="address" name="address" placeholder="<?php echo app('translator')->get('Address'); ?>" value="<?php echo e(@$user->address->address); ?>">
                    </div>
                    <div class="form--group col-md-6">
                        <label class="form--label" for="city"><?php echo app('translator')->get('State'); ?></label>
                        <input type="text" class="form-control form--control" id="state" name="state" placeholder="<?php echo app('translator')->get('state'); ?>" value="<?php echo e(@$user->address->state); ?>">
                    </div>
                    <div class="form--group col-md-6">
                        <label class="form--label" for="address"><?php echo app('translator')->get('Zip Code'); ?></label>
                        <input type="text" class="form-control form--control" id="zip" name="zip" placeholder="<?php echo app('translator')->get('Zip Code'); ?>" value="<?php echo e(@$user->address->zip); ?>">
                    </div>
                    <div class="form--group col-md-6">
                        <label class="form--label" for="state"><?php echo app('translator')->get('City'); ?></label>
                        <input type="text" class="form-control form--control" id="city" name="city" placeholder="<?php echo app('translator')->get('City'); ?>" value="<?php echo e(@$user->address->city); ?>">
                    </div>

                         
                        
                    <div class="form--group col-md-6">
                        <label class="form--label" for="profile-image"><?php echo app('translator')->get('Change Profile Picture'); ?></label>
                        <input type="file" name="image" class="form-control form--control" accept="image/*">
                        <code><?php echo app('translator')->get('Image size'); ?> <?php echo e(imagePath()['profile']['user']['size']); ?></code>
                    </div>
                    <div class="form--group w-100 col-md-6 mb-0 text-end">
                        <button type="submit" class="cmn--btn"><?php echo app('translator')->get('Update Profile'); ?></button>
                    </div>
                          
                    </form>
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

<?php echo $__env->make($activeTemplate.'layouts.admin_master_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rentlab\resources\views/templates/basic/user/profile_setting.blade.php ENDPATH**/ ?>