<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold"> <?php echo app('translator')->get('Site Title'); ?> </label>
                                    <input class="form-control form-control-lg" type="text" name="sitename" value="<?php echo e($general->sitename); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Currency'); ?></label>
                                    <input class="form-control form-control-lg" type="text" name="cur_text" value="<?php echo e($general->cur_text); ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Currency Symbol'); ?> </label>
                                    <input class="form-control form-control-lg" type="text" name="cur_sym" value="<?php echo e($general->cur_sym); ?>">
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-control-label font-weight-bold"> <?php echo app('translator')->get('Timezone'); ?></label>
                                <select class="select2-basic" name="timezone">
                                    <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="'<?php echo e(@$timezone); ?>'" <?php if(config('app.timezone') == $timezone): ?> selected <?php endif; ?>><?php echo e(__($timezone)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-control-label font-weight-bold"> <?php echo app('translator')->get('Site Base Color'); ?></label>
                                <div class="input-group">
                                <span class="input-group-addon ">
                                    <input type='text' class="form-control form-control-lg colorPicker" value="<?php echo e($general->base_color); ?>"/>
                                </span>
                                    <input type="text" class="form-control form-control-lg colorCode" name="base_color" value="<?php echo e($general->base_color); ?>"/>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Force Secure Password'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="secure_password" <?php if($general->secure_password): ?> checked <?php endif; ?>>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Agree policy'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="agree" <?php if($general->agree): ?> checked <?php endif; ?>>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('User Registration'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="registration" <?php if($general->registration): ?> checked <?php endif; ?>>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Force SSL'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="force_ssl" <?php if($general->force_ssl): ?> checked <?php endif; ?>>
                            </div>
                            <div class="form-group col-lg-2 col-sm-6 col-md-4">
                                <label class="form-control-label font-weight-bold"> <?php echo app('translator')->get('Email Verification'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="ev" <?php if($general->ev): ?> checked <?php endif; ?>>
                            </div>
                            <div class="form-group col-lg-2 col-sm-6 col-md-4">
                                <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Email Notification'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="en" <?php if($general->en): ?> checked <?php endif; ?>>
                            </div>
                            <div class="form-group col-lg-2 col-sm-6 col-md-4">
                                <label class="form-control-label font-weight-bold"> <?php echo app('translator')->get('SMS Verification'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="sv" <?php if($general->sv): ?> checked <?php endif; ?>>
                            </div>
                            <div class="form-group col-lg-2 col-sm-6 col-md-4">
                                <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('SMS Notification'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="sn" <?php if($general->sn): ?> checked <?php endif; ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn--primary btn-block btn-lg"><?php echo app('translator')->get('Update'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/spectrum.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/spectrum.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('style'); ?>
    <style>
        .sp-replacer {
            padding: 0;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 5px 0 0 5px;
            border-right: none;
        }

        .sp-preview {
            width: 100px;
            height: 46px;
            border: 0;
        }

        .sp-preview-inner {
            width: 110px;
        }

        .sp-dd {
            display: none;
        }
        .select2-container .select2-selection--single {
            height: 44px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 43px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 43px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";
            $('.colorPicker').spectrum({
                color: $(this).data('color'),
                change: function (color) {
                    $(this).parent().siblings('.colorCode').val(color.toHexString().replace(/^#?/, ''));
                }
            });

            $('.colorCode').on('input', function () {
                var clr = $(this).val();
                $(this).parents('.input-group').find('.colorPicker').spectrum({
                    color: clr,
                });
            });

            $('.select2-basic').select2({
                dropdownParent: $('.card-body')
            });

            $('select[name=timezone]').val();
        })(jQuery);

    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/admin/setting/general_setting.blade.php ENDPATH**/ ?>