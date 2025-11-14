
<?php $__env->startSection('content'); ?>
<br>
  <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
                      <!-- Single Hero Slide -->
                   <!-- Single Hero Slide -->
              <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="single-hero-slide bg-img" style="background-image: url(<?php echo e(getImage(imagePath()['vehicles']['path']. '/'. @$event->images[0], imagePath()['vehicles']['size'])); ?>);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-contentx">
                                <h2 data-animation="fadeInUp" data-delay="100ms"><?php echo e($event->event_type); ?></h2>
                            </div>
                      <ul class="#">
                          <li class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Name: <strong><?php echo e($event->name); ?></strong></li>
                            <li class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Event Type: <strong><?php echo e($event->event_type); ?></strong></li>

                      </ul>
                      <div>
                        <strong><?php echo e($event->details); ?></strong>
                      </div>
 <a class="btn btn-outline-light py-1 px-4 mt-3 animate__animated animate__fadeInUp" href="<?php echo e(route('vehicle.details', [$event->id, slug($event->name)])); ?>">View More</a>
                        </div>
                    </div>
                </div>
            </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                              

        </div>
    </section>




 <section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(img/bg-img/p2.jpeg)">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-12">
                    <div class="cta-content text-center">
                        <h5 class="wow fadeInUp" data-wow-delay="300ms" style="color:fff"><span>The Rhonds Company Ltd</span></h5>
                        <h6 class="wow fadeInUp" data-wow-delay="400ms">The best Car Rental Dealers in Tanzania</h6>
                    </div>


    <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                          
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                                 
                            <img class="position-absolute w-100 h-100" src="<?php echo e(getImage(imagePath()['vehicles']['path']. '/'. @$metaFirstEvent->images[0], imagePath()['vehicles']['size'])); ?>" style="object-fit: cover;">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                  <div class="p-3" style="max-width: 700px;">
                      <h2 class="display-4 text-white mb-3 animate__animated animate__fadeInDown"></h2>
                      <ul class="#">
                         <li class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Name: <strong><?php echo e($metaFirstEvent->name); ?></strong></li>
                            <li class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Event Type: <strong><?php echo e($metaFirstEvent->event_type); ?></strong></li>
                      </ul>


                      <a class="btn btn-outline-light py-1 px-4 mt-3 animate__animated animate__fadeInUp" href="<?php echo e(route('vehicle.details', [$metaFirstEvent->id, slug($metaFirstEvent->name)])); ?>">View More</a>
                  </div>
              </div>

                        </div>
                     </div>


                       
                       <?php $__empty_2 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                         <div class="carousel-item">
                        <div class="row">                          
                              <strong class="banner_taital">Get Start <br>Your favriot shoping</strong>                                                 
                          <img class="position-absolute w-100 h-100" src="<?php echo e(getImage(imagePath()['vehicles']['path']. '/'. @$event->images[0], imagePath()['vehicles']['size'])); ?>" style="object-fit: cover;">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                  <div class="p-3" style="max-width: 700px;">
                      <strong class="display-4 text-white mb-3 animate__animated animate__fadeInDown">#</strong>
                      <ul class="#">
                          <li class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Name: <strong><?php echo e($event->name); ?></strong></li>
                            <li class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Event Type: <strong><?php echo e($event->event_type); ?></strong></li>
                      </ul>


                      <a class="btn btn-outline-light py-1 px-4 mt-3 animate__animated animate__fadeInUp" href="<?php echo e(route('vehicle.details', [$event->id, slug($event->name)])); ?>">View More</a>
                  </div>
              </div>
               </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                

                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
 </div>






                </div>
            </div>
        </div>
    </section>


<hr>
 <!-- Car categories Start -->
        <div class="container categories blog pb-5" id="section3">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">List of Tanzanian People who <span class="text-primary">Killed,Kidnapped Or</span> <span class="text-primary">Missing</span></h1>
                    <p class="mb-0">Book your appropriate Car Type
                    </p>
                </div>

      <div class="row">
<?php $__empty_3 = true; $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_3 = false; ?>
                     <div class="col-md-3">
                    <div class="categories-item">
                        <div class="rent__item">
                            <div class="blog-item">
                            <div class="rent__thumb" style="background-color:#9ca494">
                                        <a href="<?php echo e(route('vehicle.details', [$vehicle->id, slug($vehicle->name)])); ?>">
                                            <img src="<?php echo e(getImage(imagePath()['vehicles']['path']. '/'. @$vehicle->images[0], imagePath()['vehicles']['size'])); ?>" class="first-look" alt="rent-vehicle">
                                            <img src="<?php echo e(getImage(imagePath()['vehicles']['path']. '/'. @$vehicle->images[1], imagePath()['vehicles']['size'])); ?>" class="hover-look" alt="rent-vehicle">
                                        </a>
                                    </div>
                            <div class="categories-content rounded-bottom p-4 text-center" style="margin:-42px">
                                    <!-- <div class="blog-img">
                                        <img src="../../frontendp/img/blog-1.jpg" class="img-fluid rounded-top w-100" alt="Image">
                                    </div> -->

                                    <div class="blog-content rounded-bottom p-3">
                                        <div class="blog-date"><span class=""><?php echo e(showAmount($vehicle->price)); ?>(<?php echo e($general->cur_sym); ?>) <sub>/<?php echo app('translator')->get('day'); ?></span></div>


                                          <div class="rent__content text-center mt-n1">
                                               <ul class="d-flex car-info text-center">
                                               </ul>
                                       </div>

                                        <strong><?php echo e($vehicle->name); ?></strong>
                                           <div class="rent__content mt-n1">
                                                <ul class="d-flex car-info center">
                                                     <!-- <li class="pr-3 text-center"> -->
                                                      <li class="text-center center">
                                                        <span class=""><?php echo e(__(@$vehicle->model)); ?> (<?php echo e(__(@$vehicle->car_model_no?? 1)); ?>)</span>
                                                    </li>
                                                </ul>
                                        </div>

                                        <div class="rent__content text-center mt-n1">
                                             <ul class="d-flex_org car-info text-center">
                                                  <li class="pr-1 text-center">
                                                      <div class="row gy-2 gx-0 text-center mb-2">
                                                           <div class="col-4 border-end border-white">
                                                               <i class="fa fa-users text-dark"></i> <span class="text-body ms-1"><?php echo e(__(@$vehicle->seat)); ?> Seat</span>
                                                           </div>
                                                           <div class="col-4 border-end border-white">
                                                               <i class="fa fa-car text-dark"></i> <span class="text-body ms-1"><?php echo e(__(@$vehicle->transmission)); ?></span>
                                                           </div>
                                                           <div class="col-4">
                                                               <i class="las la-gas-pump"></i> <span class="text-body ms-1"><?php echo e(__(@$vehicle->fuel_type)); ?></span>
                                                           </div>
                                                       </div>

                                                 </li>
                                             </ul>
                                       </div>
                                    </div>
                                      <a href="<?php echo e(route('vehicle.details', [$vehicle->id, slug($vehicle->name)])); ?>" class="">Read More  <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                
                          </div>
                    </div>
                </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_3): ?>
                        <?php endif; ?>
                        
                    
                    </div>
                    <div>
                        <div>
                   
                     </div>
  </span>
</div>
<br>
    
        </div>
        <section class="showcase container">
                  <a class="btn-transparent" href="/vehicle-search" target="_blank"  style="float: right">View More vehicles<i class="fa fa-angle-double-right" aria-hidden="true"></i>
                         </a>
                 </section>


<section class="showcase container" style="background: url('assets/img/worldmap.png') no-repeat center; background-size: cover;padding-top: 30px;padding-bottom: 20px;">
    <?php
        $banners = getContent('banner.element');

        $brands = \App\Models\Brand::active()->orderBy('name')->get();
        $seats = \App\Models\Seater::active()->orderBy('number')->get();
    ?>

   </section>


              <section class="showcase" style="background: url('assets/img/worldmap.png') no-repeat center; background-size: cover;padding-top: 30px;padding-bottom: 20px;">
            <?php
                $banners = getContent('banner.element');

                $brands = \App\Models\Brand::active()->orderBy('name')->get();
                $seats = \App\Models\Seater::active()->orderBy('number')->get();
            ?>

          </section>


<hr>



    <script type="text/javascript">
function scrollToNextSection() {
  const currentSection = document.activeElement.closest('section');
  const nextSection = currentSection.nextElementSibling;

  if (nextSection) {
    nextSection.scrollIntoView();
  }
}

    </script>
             </body>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue.'css/datepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset($activeTemplateTrue.'js/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue.'js/datepicker.en.js')); ?>"></script>
    <script>
        // date and time picker
        $('#dateAndTimePicker').datepicker({
            timepicker: true,
            language: 'en',
            onSelect: function (fd, d, picker) {
                var pick_time = fd;
                var price = parseFloat("<?php echo e($vehicle->price); ?>");
                 $('.total_days').text(1);
                 var no_car = $('#no_car').val();


                if (pick_time){
                    $('#dateAndTimePicker2').removeAttr('disabled');
                }else{
                    $('#dateAndTimePicker2').attr('disabled', 'disabled');

                    $('.total_amount').text(price);
                    $('.total_days').text(1);
                }


                $('#dateAndTimePicker2').datepicker({
                    timepicker: true,
                    language: 'en',
                    onSelect: function (fd, d, picker) {
                        var drop_time = fd;

                        const date1 = new Date(pick_time);
                        const date2 = new Date(drop_time);
                        const diffTime = Math.abs(date2 - date1);
                        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) +1;


                           $("#no_car").on('change keydown paste input', function(){
                     no_car = $('#no_car').val();
 $('.total_amount').text(price*diffDays*no_car);

                    //alert(no_car);
});


if(no_car>0)
{
   $('.total_amount').text(price*diffDays*no_car);
   $('.total_days').text(diffDays);

}else{
     alert('Car number is Empty');
}



                    }
                })
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/homem.blade.php ENDPATH**/ ?>