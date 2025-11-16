<?php $__env->startSection("content"); ?>

  
  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card-box table-responsive">

                <div class="row">
                  
                  <div class="col-md-3">
                     <?php echo Form::open(array('url' => 'admin/movies','class'=>'app-search','id'=>'search','role'=>'form','method'=>'get')); ?>   
                      <input type="text" name="s" placeholder="<?php echo e(trans('words.search_by_title')); ?>" class="form-control">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    <?php echo Form::close(); ?>

                  </div>  
                  <div class="col-sm-6">
                  &nbsp;
                </div>           
                <div class="col-md-3">
                  <a href="<?php echo e(URL::to('user/videos/add_video')); ?>" class="btn btn-success btn-md waves-effect waves-light m-b-20 mt-2 pull-right" data-toggle="tooltip" title="<?php echo e(trans('words.add_movie')); ?>"><i class="fa fa-plus"></i> <?php echo e(trans('words.add_movie')); ?></a>
                </div>
              </div>

              <div class="row">   
                  <div class="wall-filter-block">  
                    <div class="row" style="align-items: center;justify-content: space-between;">            
                     
                      <div class="col-sm-3">
                      <select class="form-control select2" name="movie_genres_id" id="filter_genres_id">
                            <option value=""><?php echo e(trans('words.filter_by_genres')); ?></option>
                            <?php $__currentLoopData = $genres_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genres_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="?genres_id=<?php echo e($genres_data->id); ?>" <?php if(isset($_GET['genres_id']) && $_GET['genres_id']==$genres_data->id ): ?> selected <?php endif; ?>><?php echo e($genres_data->genre_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>                    
                      </div>
                       
                      <div class="col-sm-4">
                        <div class="checkbox checkbox-success pull-right">
                            <input id="sellect_all" type="checkbox" name="sellect_all">
                            <label for="sellect_all"><?php echo e(trans('words.select_all')); ?></label>
                            &nbsp;&nbsp;
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false"><?php echo e(trans('words.action')); ?><span class="caret"></span></button>
                                <div class="dropdown-menu">
                                    <a href="javascript:void(0);" class="dropdown-item" data-action="delete" id="data_remove_selected"><?php echo e(trans('words.delete')); ?></a>                                                                  
                                </div>
                            </div>
                        </div>
                      </div>
                    </div> 
                  </div>                
                </div>

                <br/>

              <div class="row">
                <?php $__currentLoopData = $movies_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $movies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6" id="card_box_id_<?php echo e($movies->id); ?>">

                        <!-- Simple card -->
                        <div class="card m-b-20">
                            <div class="wall-list-item">
                              <div class="checkbox checkbox-success wall_check">
                                <input type="checkbox" name="post_ids[]" id="checkbox<?php echo $i; ?>" value="<?php echo $movies->id; ?>" class="post_ids">
                                <label for="checkbox<?php echo $i; ?>"></label>
                              </div>  
                              
                               
                              <?php if(isset($movies->video_image_thumb)): ?> <img class="card-img-top thumb-xs img-fluid" src="<?php echo e(URL::to('/'.$movies->video_image_thumb)); ?>" alt="<?php echo e(stripslashes($movies->video_title)); ?>"> <?php endif; ?>
                            </div>
 
                            <div class="card-body p-3">
                                <h4 class="card-title book_title mb-3 d-flex align-items-center"><?php echo e(stripslashes($movies->video_title)); ?></h4>
                                <a href="<?php echo e(url('admin/movies/edit_movie/'.$movies->id)); ?>" class="btn btn-icon waves-effect waves-light btn-success m-r-5" data-toggle="tooltip" title="<?php echo e(trans('words.edit')); ?>"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-icon waves-effect waves-light btn-danger data_remove" data-toggle="tooltip" title="<?php echo e(trans('words.remove')); ?>" data-id="<?php echo e($movies->id); ?>"><i class="fa fa-remove"></i></a>
                                <a class="ml-2 fl-right mt-1" href="Javascript:void(0);" data-toggle="tooltip" title="<?php if($movies->status==1): ?><?php echo e(trans('words.active')); ?> <?php else: ?> <?php echo e(trans('words.inactive')); ?> <?php endif; ?>"><input type="checkbox" name="category_on_off" id="category_on_off" value="1" data-plugin="switchery" data-color="#28a745" data-size="small" class="enable_disable" data-id="<?php echo e($movies->id); ?>" <?php if($movies->status==1): ?> <?php echo e('checked'); ?> <?php endif; ?>/></a>    
                            </div>
                        </div>

                    </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      

                </div> 
                 
                <nav class="paging_simple_numbers">
                  
                </nav>
           
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
<script src="<?php echo e(URL::asset('admin_assets/js/jquery.min.js')); ?>"></script>


<script type="text/javascript">
 
$(".enable_disable").on("change",function(e){      
       
      var post_id = $(this).data("id");
      
      var status_set = $(this).prop("checked"); 

      var action_name='movie_status';
      //alert($(this).is(":checked"));
      //alert(status_set);

      $.ajax({
        type: 'post',
        url: "<?php echo e(URL::to('admin/ajax_status')); ?>",
        dataType: 'json',
        data: {"_token": "<?php echo e(csrf_token()); ?>",id: post_id, value: status_set, action_for: action_name},
        success: function(res) {

          if(res.status=='1')
          {
            Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '<?php echo e(trans('words.status_changed')); ?>',
                    showConfirmButton: true,
                    confirmButtonColor: '#10c469',
                    background:"#1a2234",
                    color:"#fff"
                  })
             
          } 
          else
          { 
            Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Something went wrong!',
                    showConfirmButton: true,
                    confirmButtonColor: '#10c469',
                    background:"#1a2234",
                    color:"#fff"
                  })
          }
          
        }
      });
}); 

</script>

<script type="text/javascript">

$(".data_remove").click(function () {  
  
  var post_id = $(this).data("id");
  var action_name='movies_delete';

  Swal.fire({
    title: '<?php echo e(trans('words.dlt_warning')); ?>',
  text: "<?php echo e(trans('words.dlt_warning_text')); ?>",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '<?php echo e(trans('words.dlt_confirm')); ?>',
  cancelButtonText: "<?php echo e(trans('words.btn_cancel')); ?>",
  background:"#1a2234",
  color:"#fff"

}).then((result) => {

  //alert(post_id);

  //alert(JSON.stringify(result));

    if(result.isConfirmed) { 

        $.ajax({
            type: 'post',
            url: "<?php echo e(URL::to('admin/ajax_delete')); ?>",
            dataType: 'json',
            data: {"_token": "<?php echo e(csrf_token()); ?>",id: post_id, action_for: action_name},
            success: function(res) {

              if(res.status=='1')
              {  

                  var selector = "#card_box_id_"+post_id;
                    $(selector ).fadeOut(1000);
                    setTimeout(function(){
                            $(selector ).remove()
                        }, 1000);

                  Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '<?php echo e(trans('words.deleted')); ?>!',
                    showConfirmButton: true,
                    confirmButtonColor: '#10c469',
                    background:"#1a2234",
                    color:"#fff"
                  })
                
              } 
              else
              { 
                Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Something went wrong!',
                        showConfirmButton: true,
                        confirmButtonColor: '#10c469',
                        background:"#1a2234",
                        color:"#fff"
                       })
              }
              
            }
        });
    }
 
})

});


//Multiple
$("#data_remove_selected").click(function () {  
  
  var post_ids = $.map($('.post_ids:checked'), function(c) {
      return c.value;
    });
         
  var action_name='movies_delete_selected';

  Swal.fire({
  title: '<?php echo e(trans('words.dlt_warning')); ?>',
  text: "<?php echo e(trans('words.dlt_warning_text')); ?>",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '<?php echo e(trans('words.dlt_confirm')); ?>',
  cancelButtonText: "<?php echo e(trans('words.btn_cancel')); ?>",
  background:"#1a2234",
  color:"#fff"

}).then((result) => {
 
    if(result.isConfirmed) { 

        $.ajax({
            type: 'post',
            url: "<?php echo e(URL::to('admin/ajax_delete')); ?>",
            dataType: 'json',
            data: {"_token": "<?php echo e(csrf_token()); ?>",id: post_ids, action_for: action_name},
            success: function(res) {

              if(res.status=='1')
              {  
                  $.map($('.post_ids:checked'), function(c) {
                    
                    var post_id= c.value;
                    
                    var selector = "#card_box_id_"+post_id;
                      $(selector ).fadeOut(1000);
                      setTimeout(function(){
                              $(selector ).remove()
                          }, 1000);

                    return c.value;
                  });
 
                  Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '<?php echo e(trans('words.deleted')); ?>!',
                    showConfirmButton: true,
                    confirmButtonColor: '#10c469',
                    background:"#1a2234",
                    color:"#fff"
                  })
                
              } 
              else
              { 
                Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Something went wrong!',
                        showConfirmButton: true,
                        confirmButtonColor: '#10c469',
                        background:"#1a2234",
                        color:"#fff"
                       })
              }
              
            }
        });
    }
 
})

});

</script>
<script type="text/javascript">

  
  var totalItems = 0;
 // $("#sellect_all").on("click", function(e) {
  $(document).on("click", "#sellect_all", function() {
      
    totalItems = 0;

    $("input[name='post_ids[]']").not(this).prop('checked', this.checked);
    $.each($("input[name='post_ids[]']:checked"), function() {
      totalItems = totalItems + 1;       
    });

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false,
        /*didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }*/
      })

    
    if ($("input[name='post_ids[]']").prop("checked") == true) {
        
      Toast.fire({
      icon: 'success',
      title: totalItems + ' <?php echo e(trans('words.item_checked')); ?>'
    })

    } else if ($("input[name='post_ids[]']").prop("checked") == false) {
      totalItems = 0;
      
      Toast.fire({
      icon: 'success',
      title: totalItems + ' <?php echo e(trans('words.item_checked')); ?>'
    })
      
    }
 
});

$(document).on("click", ".post_ids", function(e) {
 
if ($(this).prop("checked") == true) {
  totalItems = totalItems + 1;
} else if ($(this).prop("checked") == false) {
  totalItems = totalItems - 1;
}

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false,
        /*didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }*/
      })

    if (totalItems == 0) {
      Toast.fire({
        icon: 'success',
        title: totalItems + ' <?php echo e(trans('words.item_checked')); ?>'
      })

      return true;
    }
 
    Toast.fire({
      icon: 'success',
      title: totalItems + ' <?php echo e(trans('words.item_checked')); ?>'
    })

 
});

</script>  
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/videos/list.blade.php ENDPATH**/ ?>