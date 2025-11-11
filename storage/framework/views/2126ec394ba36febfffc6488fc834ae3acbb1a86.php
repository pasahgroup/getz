
<?php $__env->startSection('content'); ?>
<br>
<div class="container categories blog pb-5" id="section3">
<div class="row">
  <div class="col-md-9">
  <div id="header-carousel" class="carousel slide carousel-fade mb-lg-0" data-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
          <?php for($i=1;$i<10;$i++): ?>
        <li data-target="#header-carousel" data-slide-to="<?php echo e($i); ?>"></li>
      <?php endfor; ?>
      </ol>
      <div class="carousel-inner">
          <div class="carousel-item position-relative active" style="height: 556px;">
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
<?php $__currentLoopData = $metaVehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indexKey => $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="carousel-item position-relative" style="height: 556px;">
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
  </div>
</div>

<div class="col-md-3">
 <h5> Rhonds<span class="text-primary"> Services</span></h5>
  <div class="product-offer" style="height: 295px;">     
 <div class="rowx">

                        <div class="rent__item">
                            <div class="blog-item">
                            <div class="categories-content rounded-bottom p-4 text-center" style="margin:-42px">
                                                                        <?php $__currentLoopData = $view_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view_service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                           <div class="rent__content mt-n1">
                                                <ul class="d-flex car-info center">
                                                      <li class="text-center center">
                                                
 <form action="<?php echo e(route('web-service',$view_service->service_name)); ?>" method="get" class="priceForm">
            <button  class="dropdown-item">
  <span class="text-dark">
              <?php echo e($view_service->title); ?>

            </span>
            </button>
                                                  </form>

                                                        
                                                    </li>
                                                </ul>
                                        </div>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   

                                     <div class="rent__content text-center mt-n1">
                                             <ul class="d-flex_org car-info text-center">
                                                  <li class="pr-1 text-center">
                                                      <div class="row gy-2 gx-0 text-center mb-2">
                                                           <div class="col-4 border-end border-white">
                                                               <i class="fa fa-users text-dark"></i> <span class="text-body ms-1">Seats</span>
                                                           </div>
                                                           <div class="col-4 border-end border-white">
                                                               <i class="fa fa-car text-dark"></i> <span class="text-body ms-1">AT/Manual</span>
                                                           </div>
                                                           <div class="col-4">
                                                               <i class="las la-gas-pump"></i> <span class="text-body ms-1">Fuel</span>
                                                           </div>
                                                       </div>

                                                 </li>
                                             </ul>
                                       </div> 
                                    
                                </div>
                            </div>
                          </div>                                                             
                        <marquee style="color:#03153e;float: right">Welcome to book with Rhonds Company</marquee>
                    </div>


  </div>

  <div class="product-offer" style="height: 240px;">
      <img class="img-fluid" src="<?php echo e(getImage(imagePath()['vehicles']['path']. '/'. @$metaFirstVehicle3->images[0], imagePath()['vehicles']['size'])); ?>" alt="">
      <div class="offer-text">
        <div class="text-start">
        <div class="rounded">
              <strong class="text-white"><?php echo e($metaFirstVehicle3->model); ?>(<?php echo e($metaFirstVehicle3->car_body_type); ?>)</strong>
              <ul class="#">
                  <li class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Transmission:   <strong><?php echo e($metaFirstVehicle3->transmission); ?></strong></li>
                  <li class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i> Number of Doors:  <strong><?php echo e($metaFirstVehicle3->doors); ?></strong></li>
                  <li class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Fuel:  <strong><?php echo e($metaFirstVehicle3->fuel_type); ?></strong></li>
              </ul>
              </div>
              <div class="mb-2">
              </div>
                <a href="<?php echo e(route('vehicle.details', [$vehicle->id, slug($vehicle->name)])); ?>" class="">Read More<i class="fa fa-arrow-right"></i></a>
               
                  </div>
      </div>
  </div>
</div>

            </div>
</div>



      

<hr>
 <!-- Car categories Start -->
        <div class="container categories blog pb-5" id="section3">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">Car <span class="text-primary">List</span></h1>
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

    <!-- Book Section -->
    
    <?php if($sections->secs != null): ?>
        <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
            <?php if($sec =="plan"): ?>
            <?php echo $__env->make($activeTemplate.'sections.'.$sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
 </section>


              <section class="showcase" style="background: url('assets/img/worldmap.png') no-repeat center; background-size: cover;padding-top: 30px;padding-bottom: 20px;">
            <?php
                $banners = getContent('banner.element');

                $brands = \App\Models\Brand::active()->orderBy('name')->get();
                $seats = \App\Models\Seater::active()->orderBy('number')->get();
            ?>

            <!-- Book Section -->



            <?php if($sections->secs != null): ?>
                <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($sec =="faq"): ?>
  <?php echo $__env->make($activeTemplate.'sections.'.$sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
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