<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User List PDF</title>
  <!--   <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th {
            background: #f2f2f2;
            font-weight: bold;
        }
        td, th {
            padding: 8px;
            text-align: left;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style> -->



   <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }

        table {
            width: 100%;              /* stretch to full page width */
            border-collapse: collapse;
            table-layout: fixed;      /* force equal distribution */
        }

        th, td {
            border: 1px solid #333;
            padding: 6px;
            word-wrap: break-word;    /* wrap long text */
            text-align: left;
        }

        th {
            background: #f2f2f2;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>





    
</head>
<body>
    <h2>Victims Report</h2>
    <table>
        <thead>
               <tr>
                             <th scope="col"><?php echo app('translator')->get('SN'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                                 <th scope="col"><?php echo app('translator')->get('Age'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Incident type'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Incident Place'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Region'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('District'); ?></th>
                               <th scope="col"><?php echo app('translator')->get('Date'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Incident Details'); ?></th>
                                 <th scope="col"><?php echo app('translator')->get('Elapsed time'); ?></th>
                            </tr>
        </thead>
        <tbody>
                   
       <?php $__empty_1 = true; $__currentLoopData = $victims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>   
                                 <td data-label="<?php echo app('translator')->get('Name'); ?>"><?php echo e(__($item->id)); ?></td>                                 
                                    <td data-label="<?php echo app('translator')->get('Name'); ?>"><?php echo e(__($item->first_name)); ?>,<?php echo e(__($item->last_name)); ?></td>
                                    
                                      <td data-label="<?php echo app('translator')->get('Event_type'); ?>"><?php echo e(__($item->age)); ?></td>
                                    <td data-label="<?php echo app('translator')->get('Event_type'); ?>"><?php echo e(__($item->event_type)); ?></td>
                                    <td data-label="<?php echo app('translator')->get('Event_place'); ?>"><?php echo e(__($item->event_place)); ?></td>
                                     <td data-label="<?php echo app('translator')->get('Region'); ?>"><?php echo e(__($item->region)); ?></td>
                                      <td data-label="<?php echo app('translator')->get('District'); ?>"><?php echo e(__($item->district)); ?></td>

                                    <td data-label="<?php echo app('translator')->get('Date event'); ?>"><?php echo e(__($item->date_event)); ?></td>
                                   
       

   <td data-label="<?php echo app('translator')->get('Event details'); ?>">
 <div class="content">
                          <?php echo e(__($item->details)); ?>

                        </div>

   </td>
    <td data-label="<?php echo app('translator')->get('Event details'); ?>"><?php echo e(__($item->elapsed_time)); ?></td>
                                                                  


                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-muted text-center" colspan="100%"><?php echo e(__($empty_message)); ?></td>
                                </tr>
                            <?php endif; ?>

        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\getz\resources\views/pdf/victims.blade.php ENDPATH**/ ?>