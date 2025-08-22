<?php $__env->startSection('content'); ?>
    <!-- New Ticket -->
    <div class="pb-60 pt-60">
        <div class="message__chatbox bg--body">
            <div class="message__chatbox__header">
                <h5 class="title"><?php echo app('translator')->get('Create New Ticket'); ?></h5>
                <a href="<?php echo e(route('ticket')); ?>" class="cmn--btn btn--sm"><?php echo app('translator')->get('All Tickets'); ?></a>
            </div>
            <div class="message__chatbox__body">
                <form class="message__chatbox__form row g-4" action="<?php echo e(route('ticket.store')); ?>"  method="post" enctype="multipart/form-data" onsubmit="return submitUserForm();">
                    <?php echo csrf_field(); ?>

                    <div class="form--group col-sm-6">
                        <label for="fname" class="form--label"><?php echo app('translator')->get('Name'); ?></label>
                        <input type="text" name="name" value="<?php echo e(@$user->firstname . ' '.@$user->lastname); ?>" class="form-control form--control" placeholder="<?php echo app('translator')->get('Enter your name'); ?>" readonly>
                    </div>
                    <div class="form--group col-sm-6">
                        <label for="username" class="form--label"><?php echo app('translator')->get('Email address'); ?></label>
                        <input type="email"  name="email" value="<?php echo e(@$user->email); ?>" class="form-control form--control" placeholder="<?php echo app('translator')->get('Enter your email'); ?>" readonly>
                    </div>
                    <div class="form--group col-sm-6">
                        <label for="subject" class="form--label"><?php echo app('translator')->get('Subject'); ?></label>
                        <input type="text" name="subject" value="<?php echo e(old('subject')); ?>" class="form-control form--control" placeholder="<?php echo app('translator')->get('Subject'); ?>" >
                    </div>
                    <div class="form--group col-sm-6">
                        <label for="priority" class="form--label"><?php echo app('translator')->get('Priority'); ?></label>
                        <select name="priority" class="form-control form--control">
                            <option value="3"><?php echo app('translator')->get('High'); ?></option>
                            <option value="2"><?php echo app('translator')->get('Medium'); ?></option>
                            <option value="1"><?php echo app('translator')->get('Low'); ?></option>
                        </select>
                    </div>
                    <div class="form--group col-sm-12">
                        <label for="priority" class="form--label"><?php echo app('translator')->get('Message'); ?></label>
                        <textarea name="message" id="inputMessage" rows="6" class="form-control form--control"><?php echo e(old('message')); ?></textarea>
                    </div>
                    <div class="form--group col-sm-12">
                        <div class="d-flex">
                            <div class="left-group col p-0">
                                <label for="file2" class="form--label"><?php echo app('translator')->get('Attachments'); ?></label>
                                <input type="file" name="attachments[]" id="inputAttachments" class="form-control form--control mb-2" />
                                <div id="fileUploadsContainer"></div>
                                <span class="info fs--14"><?php echo app('translator')->get('Allowed File Extensions'); ?>: .<?php echo app('translator')->get('jpg'); ?>, .<?php echo app('translator')->get('jpeg'); ?>, .<?php echo app('translator')->get('png'); ?>, .<?php echo app('translator')->get('pdf'); ?>, .<?php echo app('translator')->get('doc'); ?>, .<?php echo app('translator')->get('docx'); ?></span>
                            </div>
                            <div class="add-area">
                                <label class="form--label d-block">&nbsp;</label>
                                <button class="cmn--btn bg--primary ms-2 ms-md-4 py-3 addFile" type="button"><i class="las la-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form--group col-sm-12 mb-0">
                        <button type="submit" class="cmn--btn"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- New Ticket -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";
            $('.addFile').on('click',function(){
                $("#fileUploadsContainer").append(`
                       <input type="file" name="attachments[]" class="form-control form--control my-3" required />
                `)
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.admin_master_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rentlab\resources\views/templates/basic/user/support/create.blade.php ENDPATH**/ ?>