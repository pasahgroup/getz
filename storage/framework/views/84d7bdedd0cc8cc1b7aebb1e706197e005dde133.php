<?php $__env->startSection('content'); ?>
    <div class="single-section pt-120 pb-120 bg--section position-relative overflow-hidden">
        <div class="shape"><?php echo app('translator')->get('Book Now'); ?></div>
        <div class="container">
             <div class="widget border--dashed" style="background-color:#fff">
            <div class="row gy-3">
                <!-- 6d846c -->
               
                <div class="col-md-4">
                    <div class="slider-top owl-theme owl-carousel border--dashed">

                       
                                                    <a href="<?php echo e(route('event.details', [$vehicle->id, slug($vehicle->name)])); ?>">                                                                                

                                                                       <video controls width="250" height="150">
    <source src="<?php echo e(Storage::url($vehicle->path)); ?>" type="video/mp4" style="object-fit: cover;">
    Your browser does not support the video tag.
</video>
</a>



                        

                    </div>
                    
                </div>
              
                      <div class="col-md-8">
                    <div class="rent__single border--dashed" style="padding:35px">
                      <br>
                            <h4><span class="text--body"><?php echo e(__(@$vehicle->event_type)); ?> details</span></h4>
<div class="row">
                     <div class="col-lg-9">
                        <h3 class="title"><?php echo e(__(@$vehicle->name)); ?>

</h3>
</div>
<div class="col-lg-3">
<div class="btn__grp">
                            <?php if(auth()->guard()->check()): ?>
                                                                   <a href="<?php echo e(route('user.events.index')); ?>" class="cmn--btn"><?php echo app('translator')->get('Upload photos'); ?></a>
                                   <a href="<?php echo e(route('user.videos.index')); ?>" class="cmn--btn"><?php echo app('translator')->get('Upload videos'); ?></a>
                            <?php else: ?>
                              
                    <form  method="GET"  action="<?php echo e(route('user.login')); ?>" enctype="multipart/form-data">
                             <?php echo csrf_field(); ?>
    <input type="hidden" name="_method" value="GET">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="hidden" name="fullurl" value="<?php echo e($fullUrl); ?>"/>

                <button type="submit" class="cmn--btn"><?php echo app('translator')->get('Login'); ?></button>
                                </form>

                                <a href="<?php echo e(route('user.register')); ?>" class="cmn--btn"><?php echo app('translator')->get('Sign up'); ?></a>
                            <?php endif; ?>
                        </div>
                         </div>
                     </div>

                        <div class="ratings mb-4">
                            <span><i class="las la-star"></i></span>
                            <span>(<?php echo e(@$vehicle->ratings_avg_rating+0); ?>)</span>
                            <span class="text--body"><?php echo app('translator')->get('Other Summary'); ?></span>
                                                        
                            
                        </div>
                        <div class="price-area mb-4">
                            <h5 class="item"><?php echo e($general->cur_sym); ?><?php echo e(showAmount($vehicle->price)); ?> <sub>/<?php echo app('translator')->get('day'); ?></sub></h5>
                        </div>
                        <div class="content">
                            <?php echo @$vehicle->details ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="single__details mt-2" style="background-color:#6d846c">
                <ul class="nav nav-tabs nav--tabs">
                    <li class="nav-item">
                        <a href="#specifications" data-bs-toggle="tab" class="nav-link active"><?php echo app('translator')->get('All Specifications'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="#image-gallery" data-bs-toggle="tab" class="nav-link"><?php echo app('translator')->get('Image Gallery'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="#terms" data-bs-toggle="tab" class="nav-link"><?php echo app('translator')->get('Rental Terms'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="#review" data-bs-toggle="tab" class="nav-link"><?php echo app('translator')->get('Review'); ?>(<?php echo e($vehicle->ratings_count); ?>)</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="specifications">
                        <h5 class="single__title"><?php echo app('translator')->get('All Specifications'); ?></h5>
                        <div class="single__details-content">


                        </div>
                    </div>
                    <div class="tab-pane" id="image-gallery">
                        <h5 class="single__title"><?php echo app('translator')->get('Our Gallery'); ?></h5>
                        <div class="single__details-content p-4">
                            <div class="row g-4">


                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="terms">
                        <h5 class="single__title"><?php echo e(__(@$rental_terms->data_values->title)); ?></h5>
                        <div class="single__details-content p-4 py-5">
                            <?php echo @$rental_terms->data_values->content ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="review">
                        <h5 class="single__title mt-4"><?php echo app('translator')->get('Leave a Review'); ?></h5>
                        <div class="single__details-content p-4 mb-4">
                            <?php if(auth()->check()): ?>
                                <form class="review-form rating row" action="<?php echo e(route('user.rating', $vehicle->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>

                                    <div class="review-form-group mb-3 mt-3 col-md-6 d-flex flex-wrap">
                                        <label class="review-label mb-0 mr-3"><?php echo app('translator')->get('Your Ratings'); ?> :</label>
                                        <div class="rating-form-group">
                                            <label class="star-label">
                                                <input type="radio" name="rating" value="1"/>
                                                <span class="icon"><i class="las la-star"></i></span>
                                            </label>
                                            <label class="star-label">
                                                <input type="radio" name="rating" value="2"/>
                                                <span class="icon"><i class="las la-star"></i></span>
                                                <span class="icon"><i class="las la-star"></i></span>
                                            </label>
                                            <label class="star-label">
                                                <input type="radio" name="rating" value="3"/>
                                                <span class="icon"><i class="las la-star"></i></span>
                                                <span class="icon"><i class="las la-star"></i></span>
                                                <span class="icon"><i class="las la-star"></i></span>
                                            </label>
                                            <label class="star-label">
                                                <input type="radio" name="rating" value="4"/>
                                                <span class="icon"><i class="las la-star"></i></span>
                                                <span class="icon"><i class="las la-star"></i></span>
                                                <span class="icon"><i class="las la-star"></i></span>
                                                <span class="icon"><i class="las la-star"></i></span>
                                            </label>
                                            <label class="star-label">
                                                <input type="radio" name="rating" value="5"/>
                                                <span class="icon"><i class="las la-star"></i></span>
                                                <span class="icon"><i class="las la-star"></i></span>
                                                <span class="icon"><i class="las la-star"></i></span>
                                                <span class="icon"><i class="las la-star"></i></span>
                                                <span class="icon"><i class="las la-star"></i></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="review-form-group mb-3 col-12 d-flex flex-wrap">
                                        <label class="form--label" for="review-comments"><?php echo app('translator')->get('Say Something'); ?></label>
                                        <textarea name="comment" class="form-control form--control" id="review-comments"></textarea>
                                    </div>
                                    <div class="review-form-group col-12 d-flex flex-wrap">
                                        <button type="submit" class="cmn--btn"><?php echo app('translator')->get('Submit Review'); ?></button>
                                    </div>
                                </form>
                            <?php else: ?>
                                <h4><?php echo app('translator')->get('Please login to add your review!'); ?></h4>
                            <?php endif; ?>
                        </div>

                        <h5 class="single__title"><?php echo app('translator')->get('Review'); ?></h5>
                        <div class="single__details-content px-sm-4">
                            <ul class="content">


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/events/videoDetails.blade.php ENDPATH**/ ?>