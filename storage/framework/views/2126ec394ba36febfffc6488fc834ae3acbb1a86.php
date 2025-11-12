
<?php $__env->startSection('content'); ?>
<br>

  



         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                          
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                                 
                            <img class="position-absolute w-100 h-100" src="<?php echo e(getImage(imagePath()['vehicles']['path']. '/'. @$metaFirstVehicle->images[0], imagePath()['vehicles']['size'])); ?>" style="object-fit: cover;">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                  <div class="p-3" style="max-width: 700px;">
                      <h2 class="display-4 text-white mb-3 animate__animated animate__fadeInDown"><?php echo e($metaFirstVehicle->model); ?>(<?php echo e($metaFirstVehicle->car_body_type); ?>)</h2>
                      <ul class="#">
                          <li class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Transmission: <strong><?php echo e($metaFirstVehicle->transmission); ?></strong>|Fuel: <strong><?php echo e($metaFirstVehicle->fuel_type); ?></strong></li>
                      </ul>


                      <a class="btn btn-outline-light py-1 px-4 mt-3 animate__animated animate__fadeInUp" href="<?php echo e(route('vehicle.details', [$metaFirstVehicle->id, slug($metaFirstVehicle->name)])); ?>">View More</a>
                  </div>
              </div>

                        </div>
                     </div>



                       
                         <?php $__currentLoopData = $metaVehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indexKey => $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <div class="carousel-item">
                        <div class="row">                          
                              <strong class="banner_taital">Get Start <br>Your favriot shoping</strong>                                                 
                          <img class="position-absolute w-100 h-100" src="<?php echo e(getImage(imagePath()['vehicles']['path']. '/'. @$vehicle->images[0], imagePath()['vehicles']['size'])); ?>" style="object-fit: cover;">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                  <div class="p-3" style="max-width: 700px;">
                      <h2 class="display-4 text-white mb-3 animate__animated animate__fadeInDown"><?php echo e($metaFirstVehicle->model); ?>(<?php echo e($metaFirstVehicle->car_body_type); ?>)</h2>
                      <ul class="#">
                          <li class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Transmission: <strong><?php echo e($metaFirstVehicle->transmission); ?></strong>|Fuel: <strong><?php echo e($metaFirstVehicle->fuel_type); ?></strong></li>
                      </ul>


                      <a class="btn btn-outline-light py-1 px-4 mt-3 animate__animated animate__fadeInUp" href="<?php echo e(route('vehicle.details', [$metaFirstVehicle->id, slug($metaFirstVehicle->name)])); ?>">View More</a>
                  </div>
              </div>
               </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                    

   <?php $__currentLoopData = $metaVehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indexKey => $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="carousel-item">                       
                        <div class="row">
                           <div class="col-sm-12">
                            
                           
                            <img class="position-absolute w-100 h-100" src="<?php echo e(getImage(imagePath()['vehicles']['path']. '/'. @$vehicle->images[0], imagePath()['vehicles']['size'])); ?>" style="object-fit: cover;">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                  <div class="p-3" style="max-width: 700px;">
                      <h1 class="display-4 text-white mb-1 animate__animated animate__fadeInDown"><?php echo e($vehicle->model); ?>(<?php echo e($vehicle->car_body_type); ?>)</h1>
                                      <div class="mx-md-5 px-5 content demo-3 pp" style="color:#fff !important">

                                        <ul class="#">
                                            <li class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Transmission: <strong><?php echo e($metaFirstVehicle->transmission); ?></strong>|Fuel: <strong><?php echo e($metaFirstVehicle->fuel_type); ?></strong></li>
                                        </ul>

                      </div>
                      <a class="btn btn-outline-light py-1 px-4 mt-3 animate__animated animate__fadeInUp" href="<?php echo e(route('vehicle.details', [$vehicle->id, slug($vehicle->name)])); ?>">View More</a>
                                              </div>
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





<hr>
 <!-- Car categories Start -->
        <div class="container categories blog pb-5" id="section3">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">List of Tanzanian People who <span class="text-primary">Killed,Kidnapped Or</span> <span class="text-primary">Missing</span></h1>
                    <p class="mb-0">Book your appropriate Car Type
                    </p>
                </div>

      <div class="row">
<?php $__empty_1 = true; $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                 <!-- <a href="<?php echo e(route('vehicle.details', [$vehicle->id, slug($vehicle->name)])); ?>" class="btn btn-primary rounded-pill d-flex justify-content-center py-1 px-4" style="margin-bottom:0px;">Book</a> -->
                          </div>
                    </div>
                </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                        
                        <marquee style="color:#03153e;float: right">Book car with Rhond's Company Ltd</marquee>
                    </div>
                    <div>
                     <a class="btn-transparent" href="/vehicle-search" target="_blank"  style="float: right">View More vehicles <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                         </a>
  </span>
</div>
        </div>




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