
<?php $__env->startSection('content'); ?>

   <div class="search-section pt-120 pb-120 bg--section position-relative overflow-hidden">
        <div class="shape right-side"><?php echo app('translator')->get('Rent'); ?></div>
        <div class="shape"><?php echo app('translator')->get('Vehicles'); ?></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <aside class="category-sidebar">
                        <br>

                        <div class="widget border--dashed" style="margin-top:70px">
                              <div class="d-flex justify-content-between">
                                  <strong class="title border-0 pb-0 mb-0"><?php echo app('translator')->get('---Filter Vehicles---'); ?></strong>
                                  <div class="close-sidebar"><i class="las la-times"></i></div>
                              </div>

                          <label for="stat-dae" class="form--label">
                            <strong class="title">  <i class="las la-car-side"></i> <?php echo app('translator')->get('Search by Name'); ?></strong>
                          </label>
                            <div class="widget-body">
                                <form action="<?php echo e(route('vehicle.search')); ?>" method="get">
                                    <div class="input-group">
                                        <input type="text" name="name" value="<?php echo e($car_name); ?>" class="form-control" placeholder="<?php echo app('translator')->get('Vehicle Name'); ?>" id="search" required>
                                        <button class="input-group-text cmn--btn" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                                                <div class="widget border--dashed">
                                                  <label for="stat-dae" class="form--label">
                                                      <strong class="title">  <i class="las la-dollar-sign"></i> <?php echo app('translator')->get('Filter by Seats'); ?></strong>
                                                  </label>
                                                    <div class="widget-body">
                                                      <form action="<?php echo e(route('vehicle.search')); ?>" method="get" class="priceForm">
                                                            <div class="input-group">

                                                              <select name="seats" id="seats" class="form-control" required="" style="background-color:#809f75">
                                                                  <option value=""><?php echo app('translator')->get('--Select Seats--'); ?></option>

                                                                  <?php if(!empty($seat_data)): ?>
                                                                    <option value="<?php echo e($seat_data->id); ?>" selected><?php echo e($seat_data->number); ?> Seats</option>
                                                                    <?php endif; ?>

                                                                  <?php $__empty_1 = true; $__currentLoopData = $seats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                      <option value="<?php echo e($seat->id); ?>"><?php echo e(__(@$seat->number)); ?> Seats</option>
                                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                  <?php endif; ?>
                                                              </select>
                                                                <button class="input-group-text cmn--btn" type="submit">Search</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                        <div class="widget border--dashed">
                          <label for="stat-dae" class="form--label">
                              <strong class="title">  <i class="las la-dollar-sign"></i> <?php echo app('translator')->get('Filter by Price'); ?></strong>
                          </label>
                            <div class="widget-body">
                              <form action="<?php echo e(route('vehicle.search')); ?>" method="get" class="priceForm">
                                  <input type="hidden" value="<?php echo e(@request()->min_price); ?>" class="min_price" name="min_price" required>
                                    <div class="input-group">
  <input type="number" value="<?php echo e($max_price); ?>" class="form-control max_price" name="max_price" placeholder="<?php echo app('translator')->get('price'); ?>" required>
                                        <button class="input-group-text cmn--btn" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="widget border--dashed">
                          <label for="stat-dae" class="form--label">
                              <strong class="title">  <i class="las la-dollar-sign"></i> <?php echo app('translator')->get('Filter by Car body'); ?></strong>
                          </label>
                            <div class="widget-body">
                              <form action="<?php echo e(route('vehicle.search')); ?>" method="get" class="priceForm">
                                    <div class="input-group">
                                      <select name="carbody" id="carbody" class="form-control" required="" style="background-color:#809f75">
                                          <option value=""><?php echo app('translator')->get('--Select Car Body--'); ?></option>

                                          <?php if(!empty($cartype_datas)): ?>
                                            <option value="<?php echo e($cartype_datas->id); ?>" selected><?php echo e($cartype_datas->car_body_type); ?></option>
                                            <?php endif; ?>

                                          <?php $__empty_1 = true; $__currentLoopData = $carBodies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carbody): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                              <option value="<?php echo e($carbody->car_body_type_id); ?>"><?php echo e(__(@$carbody->car_body_type)); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                          <?php endif; ?>
                                      </select>
                                        <button class="input-group-text cmn--btn" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="widget border--dashed">
                          <label for="stat-dae" class="form--label">
                              <strong class="title">  <i class="las la-dollar-sign"></i> <?php echo app('translator')->get('Filter by Car Tag'); ?></strong>
                          </label>
                            <div class="widget-body">
                              <form action="<?php echo e(route('vehicle.search')); ?>" method="get" class="priceForm">
                                    <div class="input-group">

                                      <select name="cartag" id="cartag" class="form-control" required="" style="background-color:#809f75">
                                          <option value=""><?php echo app('translator')->get('--Select Car Tag--'); ?></option>

                                          <?php if(!empty($cartag_datas)): ?>
                                            <option value="<?php echo e($cartag_datas->id); ?>" selected><?php echo e($cartag_datas->tag); ?></option>
                                            <?php endif; ?>

                                          <?php $__empty_1 = true; $__currentLoopData = $cartags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                              <option value="<?php echo e($cartag->tag_id); ?>"><?php echo e(__(@$cartag->tag)); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                          <?php endif; ?>
                                      </select>
                                        <button class="input-group-text cmn--btn" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </aside>
                </div>
                <div class="col-lg-10">
                    <div class="filter-in d-lg-none" style="margin-top:-80px">
                        <i class="las la-filter"></i>
                    </div>

                    <div class="book__wrapper bg--body border--dashed mb-4">
                        <form class="book--form row gx-3 gy-4 g-md-4" action="<?php echo e(route('vehicle.search')); ?>" method="get" class="priceForm">
                            <div class="col-md-3 col-sm-4">
                                <div class="form-group">
                                    <label for="car-type" class="form--label">
                                        <i class="las la-car-side"></i> <?php echo app('translator')->get('--Select Brand--'); ?>
                                    </label>
                                    <select name="brand" id="brand" class="form-control">
                                        <option value=""><?php echo app('translator')->get('--Select Brand--'); ?></option>

                                        <?php if(!empty($brand_data)): ?>
                                          <option value="<?php echo e($brand_data->id); ?>" selected><?php echo e($brand_data->name); ?></option>
                                          <?php endif; ?>
                                        <option value="0">All</option>
                                        <?php $__empty_1 = true; $__currentLoopData = $brandss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option value="<?php echo e($brand->brand_id); ?>"><?php echo e(__(@$brand->name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-4">
                                <div class="form-group">
                                    <label for="car-type" class="form--label">
                                        <i class="las la-car-side"></i> <?php echo app('translator')->get('--Select Model--'); ?>
                                    </label>
                                    <select name="modeldata" id="modeldata" class="form-control">
                                                                            <?php if(!empty($model_data)): ?>
                                        <option value="<?php echo e($model_data->model); ?>" selected><?php echo e($model_data->model); ?></option>
                                        <?php endif; ?>
                                            <option value="0">All</option>
                                              <?php if(!empty($brand_data)): ?>
                                            <?php $__empty_1 = true; $__currentLoopData = $model_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($m_data->model); ?>"><?php echo e(__(@$m_data->model)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-1 col-sm-3">
                                <div class="form-group">
                                    <label class="form--label d-none d-sm-block">&nbsp;</label>
                                    <button class="cmn--btn form--control bg--base w-100 justify-content-center" type="submit" value="search" name="search"><?php echo app('translator')->get('Search'); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="row g-4" style="margin-top:-42px">
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
                               <div class="categories-content rounded-bottom p-2 text-center" style="margin:-10px">
                                       <!-- <div class="blog-img">
                                           <img src="../../frontendp/img/blog-1.jpg" class="img-fluid rounded-top w-100" alt="Image">
                                       </div> -->

                                       <div class="blog-content rounded-bottom p-2">
                                           <div class="blog-date"><span class=""><?php echo e(showAmount($vehicle->price)); ?>(<?php echo e($general->cur_sym); ?>) <sub>/<?php echo app('translator')->get('day'); ?></span></div>


                                             <div class="rent__content text-center mt-n1">
                                                  <ul class="d-flex car-info text-center">

                                                  </ul>
                                          </div>

                                           <strong><?php echo e($vehicle->name); ?></strong>

                                              <div class="rent__content text-center mt-n1">
                                                   <ul class="d-flex car-info text-center">
                                                        <li class="pr-3 text-center">
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
<?php echo $vehicles->links(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type='text/javascript'>
      $(document).ready(function(){

          // Department Change
          $('#brand').change(function(){

//alert('sasa');
               // Department id
               var id = $(this).val();

               // Empty the dropdown
               $('#model').find('option').not(':first').remove();
              $('#seats').find('option').not(':first').remove();
   //alert(id);
               // AJAX request
               $.ajax({
                   url: 'getModel/'+id,
                   type: 'get',
                   dataType: 'json',
                   success: function(response){
                       var len = 0;
                       if(response['data'] != null){
                            len = response['data'].length;
                       }

   //alert(len);
                       if(len > 0){
                            // Read data and create <option >
                            for(var i=0; i<len; i++){

                                 var id = response['data'][i].id;
                                 var name = response['data'][i].model;

                                 var option = "<option value='"+name+"'>"+name+"</option>";

                                 $("#modeldata").append("All");
                                  $("#modeldata").append(option);
                            }
                       }

                   }
               });
          });
      });
      </script>


<!--
      <script type='text/javascript'>
        $(document).ready(function(){

            // Department Change
            $('#model').change(function(){

    //alert('sasa');
                 // Department id
                 var id = $(this).val();

                 // Empty the dropdown
                $('#seats').find('option').not(':first').remove();
     //alert(id);
                 // AJAX request
                 $.ajax({
                     url: 'getSeater/'+id,
                     type: 'get',
                     dataType: 'json',
                     success: function(response){
                         var len = 0;
                         if(response['data'] != null){
                              len = response['data'].length;
                         }

    //alert(len);
                         if(len > 0){
                              // Read data and create <option >
                              for(var i=0; i<len; i++){

                                   var id = response['data'][i].id;
                                   var name = response['data'][i].seater_id;
                                   var option = "<option value='"+name+"'>"+name+"</option>";

                                   $("#seats").append(option);
                              }
                         }

                     }
                 });
            });
        });
        </script> -->




      <script type='text/javascript'>
      $(document).ready(function(){

          // Department Change
          $('#sel_depart').change(function(){
               // Department id
               var id = $(this).val();
               // Empty the dropdown
                  $('#sel_emp').find('option').not(':first').remove();
                  $('#seats').find('option').not(':first').remove();
  // alert(id);
               // AJAX request
               $.ajax({
                   url: 'Employee/'+id,
                   type: 'get',
                   dataType: 'json',
                   success: function(response){

                       var len = 0;
                       if(response['data'] != null){
                            len = response['data'].length;
                       }

                       alert(len);

                       if(len > 0){
                            // Read data and create <option >
                            for(var i=0; i<len; i++){

                                 var id = response['data'][i].id;
                                 var name = response['data'][i].color;

                                 var option = "<option value='"+id+"'>"+name+"</option>";

                                 $("#sel_emp").append(option);
                            }
                       }

                   }
               });
          });
      });


       $(document).ready(function(){
          // Department Change
          $('#sel_emp').change(function(){

               // Department id
               var id = $(this).val();

  //alert(id);
               // Empty the dropdown
               $('#seats').find('option').not(':first').remove();

               // AJAX request
               $.ajax({
                   url: 'getEmp/'+id,
                   type: 'get',
                   dataType: 'json',
                   success: function(response){

                       var len = 0;
                       if(response['data'] != null){
                            len = response['data'].length;
                       }
  //alert(len);

                       if(len > 0){
                            // Read data and create <option >
                            for(var i=0; i<len; i++){

                                 var id = response['data'][i].id;
                                 var name = response['data'][i].color;

                                 var option = "<option value='"+id+"'>"+name+"</option>";

                                 $("#sel_emp2").append(option);
                            }
                       }

                   }
               });
          });
      });
      </script>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";

            $('.min_price').keypress(function (e) {
                if (e.which == 13) {
                    $('.priceForm').submit();
                    return false;
                }
            });

            $('.max_price').keypress(function (e) {
                if (e.which == 13) {
                    $('.priceForm').submit();
                    return false;
                }
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/vehicles/index.blade.php ENDPATH**/ ?>