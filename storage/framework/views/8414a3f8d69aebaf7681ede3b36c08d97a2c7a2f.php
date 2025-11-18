
<script src="<?php echo e(asset('assets/admin/js/vendor/jquery-3.6.0.min.js')); ?>"></script>
<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="<?php echo e(route('user.events.update', $event->id)); ?>" method="post"
                      enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="card-body">
                        <div class="row">

                        <div class="row">                         

                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="name"><?php echo app('translator')->get('Incident title(Kichwa cha Tukio)'); ?></label>
                                    <input type="text" id="event_title" name="event_title" class="form-control"
                                           value="<?php echo e($event->event_title); ?>">
                                </div>
                            </div>

                         <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name"><?php echo app('translator')->get('Date(Tarehe ya Tukio)'); ?></label>
                                    <input type="date" id="date_event" name="date_event" class="form-control"
                                            value="<?php echo e($event->date_event); ?>">
                                </div>
                            </div>
 

                               <div class="col-md-7">
                                <div class="form-group">
                                    <label for="category"><?php echo app('translator')->get('Incident type(Aina ya tukio)'); ?></label>
                                    <select class="form-control" id="event_type" name="event_type" required="">
                                        <option
                                                value="<?php echo e($event->event_type); ?>" selected><?php echo e($event->event_type); ?></option>

                                  <option value="Injured">Injured(Jeruhiwa)</option>
                                        <option value="kidnapped">kidnapped(Tekwa)</option>
                                         <option value="killed">killed(Uwawa)</option>
                                         <option value="Missed">Missed(Potea bila Taarifa)</option>
                                          <option value="Totured">Totured(Teswa)</option>
                                            <option value="Other">Other(Ingineyo)</option>
                                    </select>
                                </div>
                            </div>

                               <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name"><?php echo app('translator')->get('Full name(Jina la aliouwawa/Tekwa/Potea)'); ?></label>
                                    <input type="text" id="name" name="name" class="form-control"
                                           value="<?php echo e($event->name); ?>">
                                </div>
                            </div>

                             <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name"><?php echo app('translator')->get('Sehemu Ya Tukio'); ?></label>
                                    <input type="text" id="event_place" name="event_place" class="form-control"
                                          value="<?php echo e($event->event_place); ?>">
                                </div>
                            </div>

                               <div class="col-md-4">
                                <div class="form-group">
                                    <label for="seater"><?php echo app('translator')->get('Region/State(Mkoa)'); ?></label>
                                    <select class="form-control" id="region" name="region" required="">
                                       <option
                                                value="<?php echo e($event->region); ?>" selected><?php echo e($event->region); ?></option>
                                                  <option>--- ----- --</option>
                                  
                                        <?php $__empty_1 = true; $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option value="<?php echo e($location->name); ?>"><?php echo e(__(@$location->name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>                                    
                                    </select>
                                </div>
                            </div>

                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category"><?php echo app('translator')->get('District(Wilaya)'); ?></label>
                                      <input type="text" id="district" name="district" class="form-control"
                                          value="<?php echo e($event->district); ?>">
                                </div>
                            </div>




                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nicEditor0"><?php echo app('translator')->get('Incident details(Maelezo ya Tukio)'); ?></label>
                                    <textarea rows="10" name="details" class="form-control nicEdit"
                                               id="nicEditor0"><?php echo e($event->details); ?></textarea>
                                </div>
                            </div>
                              </div>

                          
                            <div class="col-md-12">
                                <div class="card border--dark mb-4">
                                    <div class="card-header bg--dark d-flex justify-content-between">
                                            <h5 class="text-white"><?php echo app('translator')->get('Images-(Picha za Tukio Weka za kutosha)'); ?></h5>
                                        <button type="button" class="btn btn-sm btn-outline-light addBtn"><i
                                                class="fa fa-fw fa-plus"></i><?php echo app('translator')->get('Add New'); ?>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <p><small class="text-facebook"><?php echo app('translator')->get('Images will be resize into'); ?>
                                                <?php echo e(imagePath()['vehicles']['size']); ?>px</small></p>
                                        <div class="row element">

                                            <?php $__empty_1 = true; $__currentLoopData = $event->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <div class="col-md-2 imageItem" id="imageItem<?php echo e($loop->iteration); ?>">
                                                    <div class="payment-method-item">
                                                        <div class="payment-method-header d-flex flex-wrap">
                                                            <div class="thumb" style="position: relative;">
                                                                <div class="avatar-preview">
                                                                    <div class="profilePicPreview"
                                                                         style="background-image: url('<?php echo e(getImage(imagePath()["vehicles"]["path"] . "/" . $image)); ?>')">

                                                                    </div>
                                                                </div>

                                                                <div class="avatar-remove">
<button class="bg-danger deleteOldImage"onclick="return false"
 data-removeindex="imageItem<?php echo e($loop->iteration); ?>"
data-deletelink="<?php echo e(route('user.events.image.delete', [$event->id, $image])); ?>">
<i class="la la-close"></i></button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                
                      <div class="card-footer row">
                             <div class="col-md-9">
                                <div class="form-group">
                                  
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                   <button class="btn btn--primary w-100"><?php echo app('translator')->get('Update(Sahihisha)'); ?></button>
                                </div>
                            </div>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>
   
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <a href="<?php echo e(route('user.events.index')); ?>" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward"></i><?php echo app('translator')->get('Go Back'); ?></a>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .avatar-remove {
            position: absolute;
            bottom: 180px;
            right: 0;
        }

        .avatar-remove label {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            font-size: 15px;
            cursor: pointer;
        }

        .avatar-remove button {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            text-align: center;
            line-height: 15px;
            font-size: 15px;
            cursor: pointer;
            padding-left: 6px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap-iconpicker.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/bootstrap-iconpicker.bundle.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";

            $(document).ready(function () {
                $(window).keydown(function (event) {
                    if (event.keyCode == 13) {
                        event.preventDefault();
                        return false;
                    }
                });
            });

            //Delete Old Image
            $('.deleteOldImage').on('click', function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var url = $(this).data('deletelink');
                var removeindex = $(this).data('removeindex');

                $.ajax({
                    type: "POST",
                    url: url,
                    success: function (data) {
                        if (data.success) {
                            $('#' + removeindex).remove();
                            notify('success', data.message);
                        } else {
                            notify('error', 'Failed to delete the image!')
                        }
                    }
                });
            });

            var counter = 0;
            $('.addBtn').click(function () {
                counter++;
                $('.element').append(`<div class="col-md-2 imageItem"><div class="payment-method-item"><div class="payment-method-header d-flex flex-wrap"><div class="thumb" style="position: relative;"><div class="avatar-preview"><div class="profilePicPreview" style="background-image: url('<?php echo e(asset('assets/images/default.png')); ?>')"></div></div><div class="avatar-edit"><input type="file" name="images[]" class="profilePicUpload" required id="image${counter}" accept=".png, .jpg, .jpeg" /><label for="image${counter}" class="bg-primary"><i class="la la-pencil"></i></label></div>
                <div class="avatar-remove">
                    <label class="bg-danger removeBtn">
                        <i class="la la-close"></i>
                    </label>
                </div>
                </div></div></div></div>`);
                remove()
                upload()
            });

            function remove() {
                $('.removeBtn').on('click', function () {
                    $(this).parents('.imageItem').remove();
                });
            }

            function upload() {
                function proPicURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var preview = $(input).parents('.thumb').find('.profilePicPreview');
                            $(preview).css('background-image', 'url(' + e.target.result + ')');
                            $(preview).addClass('has-image');
                            $(preview).hide();
                            $(preview).fadeIn(65);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $(".profilePicUpload").on('change', function () {
                    proPicURL(this);
                });
            }

            //----- Add Information fields-------//
            $('.addNewInformation').on('click', function () {
                var icon = $('#icon').val();
                var label = $('#label').val();
                var value = $('#value').val();

                var html = `
                <div class="col-md-12 other-info-data">
                    <div class="form-group">
                        <div class="input-group mb-md-0 mb-4">
                            <div class="col-md-4">
                                <div class="input-group has_append">
                                    <input type="text" name="icon[]" class="form-control icon" value='${icon}' required readonly>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary iconPicker" data-icon="las la-home" role="iconpicker">${icon}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input name="label[]" class="form-control" type="text" value="${label}" required placeholder="<?php echo app('translator')->get('Label'); ?>" readonly>
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <input name="value[]" class="form-control" value="${value}" type="text" required placeholder="<?php echo app('translator')->get('Value'); ?>" readonly>
                            </div>
                            <div class="col-md-1 mt-md-0 mt-2 text-right">
                                <span class="input-group-btn">
                                    <button class="btn btn--danger btn-lg removeInfoBtn w-100" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>`;

                if (icon && label && value){
                    $('.addedField').append(html);

                    $('#icon').val('');
                    $('#label').val('');
                    $('#value').val('');
                }
            });

            $(document).on('click', '.removeInfoBtn', function () {
                $(this).closest('.other-info-data').remove();
            });

            function scrol() {
                var bottom = $(document).height() - $(window).height();
                $('html, body').animate({
                    scrollTop: bottom
                }, 200);
            }

            // Icon picker
            $('.iconPicker').iconpicker({
                align: 'center', // Only in div tag
                arrowClass: 'btn-danger',
                arrowPrevIconClass: 'fas fa-angle-left',
                arrowNextIconClass: 'fas fa-angle-right',
                cols: 10,
                footer: true,
                header: true,
                icon: 'fas fa-bomb',
                iconset: 'fontawesome5',
                labelHeader: '{0} of {1} pages',
                labelFooter: '{0} - {1} of {2} icons',
                placement: 'bottom', // Only in button tag
                rows: 5,
                search: false,
                searchText: 'Search icon',
                selectedClass: 'btn-success',
                unselectedClass: ''
            }).on('change', function (e) {
                $(this).parent().siblings('.icon').val(`<i class="${e.icon}"></i>`);
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layoutsuser.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/events/edit.blade.php ENDPATH**/ ?>