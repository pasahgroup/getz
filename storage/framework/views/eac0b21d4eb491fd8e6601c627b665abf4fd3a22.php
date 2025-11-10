<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-5 col-md-5 mb-30">

            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body p-0">
                    <div class="p-3 bg--white">
                        <div class="">
                            <img src="<?php echo e(getImage(imagePath()['profile']['user']['path'].'/'.$user->image,imagePath()['profile']['user']['size'])); ?>" alt="<?php echo app('translator')->get('Profile Image'); ?>" class="b-radius--10 w-100">
                        </div>
                        <div class="mt-15">
                            <h4 class=""><?php echo e($user->fullname); ?></h4>
                            <span class="text--small"><?php echo app('translator')->get('Joined At'); ?> <strong><?php echo e(showDateTime($user->created_at,'d M, Y h:i A')); ?></strong></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
                <div class="card-body">
                    <h5 class="mb-20 text-muted"><?php echo app('translator')->get('User information'); ?></h5>
                    <ul class="list-group">

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Username'); ?>
                            <span class="font-weight-bold"><?php echo e($user->username); ?></span>
                        </li>


                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Status'); ?>
                            <?php if($user->status == 1): ?>
                                <span class="badge badge-pill bg--success"><?php echo app('translator')->get('Active'); ?></span>
                            <?php elseif($user->status == 0): ?>
                                <span class="badge badge-pill bg--danger"><?php echo app('translator')->get('Banned'); ?></span>
                            <?php endif; ?>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Total Payments'); ?>
                            <span class="font-weight-bold"><a href="<?php echo e(route('admin.users.deposits',$user->id)); ?>"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($totalDeposit)); ?></a></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
                <div class="card-body">
                    <h5 class="mb-20 text-muted"><?php echo app('translator')->get('User action'); ?></h5>
                    <a href="<?php echo e(route('admin.users.login.history.single', $user->id)); ?>"
                       class="btn btn--primary btn--shadow btn-block btn-lg">
                        <?php echo app('translator')->get('Login Logs'); ?>
                    </a>
                    <a href="<?php echo e(route('admin.users.email.single',$user->id)); ?>"
                       class="btn btn--info btn--shadow btn-block btn-lg">
                        <?php echo app('translator')->get('Send Email'); ?>
                    </a>
                    <a href="<?php echo e(route('admin.users.login',$user->id)); ?>" target="_blank" class="btn btn--dark btn--shadow btn-block btn-lg">
                        <?php echo app('translator')->get('Login as User'); ?>
                    </a>
                    <a href="<?php echo e(route('admin.users.email.log',$user->id)); ?>" class="btn btn--warning btn--shadow btn-block btn-lg">
                        <?php echo app('translator')->get('Email Log'); ?>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-7 col-md-7 mb-30">

            <div class="row mb-none-30">
                <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                    <div class="dashboard-w1 bg--indigo b-radius--10 box-shadow has--link">
                        <a href="<?php echo e(route('admin.user.vehicles.booking.log', $user->id)); ?>" class="item--link"></a>
                        <div class="icon">
                            <i class="las la-car-side"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="amount"><?php echo e(@$data['total_vehicle_booking']); ?></span>
                            </div>
                            <div class="desciption">
                                <span><?php echo app('translator')->get('Total Vehicle Booking'); ?></span>
                            </div>
                        </div>
                    </div>
                </div><!-- dashboard-w1 end -->

                <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                    <div class="dashboard-w1 bg--13 b-radius--10 box-shadow has--link">
                        <a href="<?php echo e(route('admin.user.vehicles.booking.log.upcoming', $user->id)); ?>" class="item--link"></a>
                        <div class="icon">
                            <i class="las la-hourglass-half"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="amount"><?php echo e(@$data['upcoming_vehicle_booking']); ?></span>
                            </div>
                            <div class="desciption">
                                <span><?php echo app('translator')->get('Upcoming Vehicle Booking'); ?></span>
                            </div>
                        </div>
                    </div>
                </div><!-- dashboard-w1 end -->

                <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                    <div class="dashboard-w1 bg--14 b-radius--10 box-shadow has--link">
                        <a href="<?php echo e(route('admin.user.vehicles.booking.log.running', $user->id)); ?>" class="item--link"></a>
                        <div class="icon">
                            <i class="las la-spinner"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="amount"><?php echo e(@$data['running_vehicle_booking']); ?></span>
                            </div>
                            <div class="desciption">
                                <span><?php echo app('translator')->get('Running Vehicle Booking'); ?></span>
                            </div>
                        </div>
                    </div>
                </div><!-- dashboard-w1 end -->

                <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                    <div class="dashboard-w1 bg--success b-radius--10 box-shadow has--link">
                        <a href="<?php echo e(route('admin.user.vehicles.booking.log.completed', $user->id)); ?>" class="item--link"></a>
                        <div class="icon">
                            <i class="las la-check-circle"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="amount"><?php echo e(@$data['completed_vehicle_booking']); ?></span>
                            </div>
                            <div class="desciption">
                                <span><?php echo app('translator')->get('Completed Vehicle Booking'); ?></span>
                            </div>
                        </div>
                    </div>
                </div><!-- dashboard-w1 end -->

                <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                    <div class="dashboard-w1 bg--16 b-radius--10 box-shadow has--link">
                        <a href="<?php echo e(route('admin.user.plans.booking.log', $user->id)); ?>" class="item--link"></a>
                        <div class="icon">
                            <i class="lab la-product-hunt"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="amount"><?php echo e(@$data['total_plan_booking']); ?></span>
                            </div>
                            <div class="desciption">
                                <span><?php echo app('translator')->get('Total Plan Booking'); ?></span>
                            </div>
                        </div>
                    </div>
                </div><!-- dashboard-w1 end -->

                <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                    <div class="dashboard-w1 bg--17 b-radius--10 box-shadow has--link">
                        <a href="<?php echo e(route('admin.user.plans.booking.log.upcoming', $user->id)); ?>" class="item--link"></a>
                        <div class="icon">
                            <i class="las la-hourglass-half"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="amount"><?php echo e(@$data['upcoming_plan_booking']); ?></span>
                            </div>
                            <div class="desciption">
                                <span><?php echo app('translator')->get('Upcoming Plan Booking'); ?></span>
                            </div>
                        </div>
                    </div>
                </div><!-- dashboard-w1 end -->

                <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                    <div class="dashboard-w1 bg--18 b-radius--10 box-shadow has--link">
                        <a href="<?php echo e(route('admin.user.plans.booking.log.running', $user->id)); ?>" class="item--link"></a>
                        <div class="icon">
                            <i class="las la-spinner"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="amount"><?php echo e(@$data['running_plan_booking']); ?></span>
                            </div>
                            <div class="desciption">
                                <span><?php echo app('translator')->get('Running Plan Booking'); ?></span>
                            </div>
                        </div>
                    </div>
                </div><!-- dashboard-w1 end -->

                <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
                    <div class="dashboard-w1 bg--19 b-radius--10 box-shadow has--link">
                        <a href="<?php echo e(route('admin.user.plans.booking.log.completed', $user->id)); ?>" class="item--link"></a>
                        <div class="icon">
                            <i class="las la-check-circle"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="amount"><?php echo e(@$data['completed_plan_booking']); ?></span>
                            </div>
                            <div class="desciption">
                                <span><?php echo app('translator')->get('Completed Plan Booking'); ?></span>
                            </div>
                        </div>
                    </div>
                </div><!-- dashboard-w1 end -->


            </div>


            <div class="card mt-50">
                <div class="card-body">
                    <h5 class="card-title border-bottom pb-2"><?php echo app('translator')->get('Information of'); ?> <?php echo e($user->fullname); ?></h5>

                    <form action="<?php echo e(route('admin.users.update',[$user->id])); ?>" method="POST"
                          enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('First Name'); ?><span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="firstname" value="<?php echo e($user->firstname); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold"><?php echo app('translator')->get('Last Name'); ?> <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="lastname" value="<?php echo e($user->lastname); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Email'); ?> <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" value="<?php echo e($user->email); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold"><?php echo app('translator')->get('Mobile Number'); ?> <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="mobile" value="<?php echo e($user->mobile); ?>">
                                </div>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Address'); ?> </label>
                                    <input class="form-control" type="text" name="address" value="<?php echo e(@$user->address->address); ?>">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('City'); ?> </label>
                                    <input class="form-control" type="text" name="city" value="<?php echo e(@$user->address->city); ?>">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('State'); ?> </label>
                                    <input class="form-control" type="text" name="state" value="<?php echo e(@$user->address->state); ?>">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Zip/Postal'); ?> </label>
                                    <input class="form-control" type="text" name="zip" value="<?php echo e(@$user->address->zip); ?>">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Country'); ?> </label>
                                    <select name="country" class="form-control">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>" <?php if($country->country == @$user->address->country ): ?> selected <?php endif; ?>><?php echo e(__($country->country)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-xl-4 col-md-6  col-sm-3 col-12">
                                <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Status'); ?> </label>
                                <input type="checkbox" data-onstyle="-success" data-offstyle="-danger"
                                       data-toggle="toggle" data-on="<?php echo app('translator')->get('Active'); ?>" data-off="<?php echo app('translator')->get('Banned'); ?>" data-width="100%"
                                       name="status"
                                       <?php if($user->status): ?> checked <?php endif; ?>>
                            </div>

                            <div class="form-group  col-xl-4 col-md-6  col-sm-3 col-12">
                                <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Email Verification'); ?> </label>
                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                       data-toggle="toggle" data-on="<?php echo app('translator')->get('Verified'); ?>" data-off="<?php echo app('translator')->get('Unverified'); ?>" name="ev"
                                       <?php if($user->ev): ?> checked <?php endif; ?>>

                            </div>

                            <div class="form-group  col-xl-4 col-md-6  col-sm-3 col-12">
                                <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('SMS Verification'); ?> </label>
                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                       data-toggle="toggle" data-on="<?php echo app('translator')->get('Verified'); ?>" data-off="<?php echo app('translator')->get('Unverified'); ?>" name="sv"
                                       <?php if($user->sv): ?> checked <?php endif; ?>>

                            </div>
                            <div class="form-group  col-md-6  col-sm-3 col-12">
                                <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('2FA Status'); ?> </label>
                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                       data-toggle="toggle" data-on="<?php echo app('translator')->get('Active'); ?>" data-off="<?php echo app('translator')->get('Deactive'); ?>" name="ts"
                                       <?php if($user->ts): ?> checked <?php endif; ?>>
                            </div>

                            <div class="form-group  col-md-6  col-sm-3 col-12">
                                <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('2FA Verification'); ?> </label>
                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                       data-toggle="toggle" data-on="<?php echo app('translator')->get('Verified'); ?>" data-off="<?php echo app('translator')->get('Unverified'); ?>" name="tv"
                                       <?php if($user->tv): ?> checked <?php endif; ?>>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg"><?php echo app('translator')->get('Save Changes'); ?>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/admin/users/detail.blade.php ENDPATH**/ ?>