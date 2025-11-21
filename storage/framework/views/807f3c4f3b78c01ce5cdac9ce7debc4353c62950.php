<script src="<?php echo e(asset('assets/admin/js/vendor/jquery-3.6.0.min.js')); ?>"></script>
<?php $__env->startSection('panel'); ?>
   
        <?php if(@json_decode($general->sys_version)->message): ?>
        <div class="row">
            <?php $__currentLoopData = json_decode($general->sys_version)->message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-12">
                  <div class="alert border border--primary" role="alert">
                      <div class="alert__icon bg--primary"><i class="far fa-bell"></i></div>
                      <p class="alert__message"><?php echo $msg; ?></p>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>

    <div class="row mb-none-30">
        <div class="col-xl-2 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--primary b-radius--10 box-shadow">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount"> <?php echo e($eventCounts->where('event_type','Injured')->count()); ?></span>
                    </div>
                    <div class="desciption">
                        <span class="text--small"><?php echo app('translator')->get('Injured(Jeruhiwa)'); ?></span>
                    </div>
                    <a href="/event-web/Injured" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xl-2 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--cyan b-radius--10 box-shadow">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount"><?php echo e($eventCounts->where('event_type','kidnapped')->count()); ?></span>
                    </div>
                    <div class="desciption">
                        <span class="text--small"><?php echo app('translator')->get('kidnapped(Tekwa)'); ?></span>
                    </div>
                    <a href="/event-web/kidnapped" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                </div>
            </div>
        </div>
   

        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                <!-- <div class="dashboard-w1 bg--orange b-radius--10 box-shadow "> -->
                      <div class="dashboard-w1 bg--19 b-radius--10 box-shadow" >
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount"><?php echo e($eventCounts->where('event_type','Missed')->count()); ?></span>
                    </div>
                    <div class="desciption">
                        <span class="text--small"><?php echo app('translator')->get('Missed(Potea bila Taarifa)'); ?></span>
                    </div>

                    <a href="/event-web/Missed" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
   


          <div class="col-xl-2 col-lg-6 col-sm-6 mb-30">
              <!-- <div class="dashboard-w1 bg--19 b-radius--10 box-shadow" > -->
                  <div class="dashboard-w1 bg--orange b-radius--10 box-shadow ">
                  <div class="icon">
                      <i class="las la-car-side"></i>
                  </div>
                  <div class="details">
                      <div class="numbers">
                          <span class="amount"><?php echo e($eventCounts->where('event_type','Totured')->count()); ?></span>
                      </div>
                      <div class="desciption">
                          <span><?php echo app('translator')->get('Totured(Teswa)'); ?></span>
                      </div>
                      <a href="<?php echo e(route('admin.vehicles.booking.log')); ?>" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                  </div>
              </div>
          </div>


          <div class="col-xl-2 col-lg-6 col-sm-6 mb-30">
              <div class="dashboard-w1 bg--3 b-radius--10 box-shadow" >
                  <div class="icon">
                      <i class="las la-hourglass-half"></i>
                  </div>
                  <div class="details">
                      <div class="numbers">
                          <span class="amount"><?php echo e($eventCounts->where('event_type','Other')->count()); ?></span>
                      </div>
                      <div class="desciption">
                          <span><?php echo app('translator')->get('Other(Ingineyo)'); ?></span>
                      </div>
                      <a href="/event-web/Other" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                  </div>
              </div>
          </div>


               <div class="col-xl-2 col-lg-4 col-sm-6 mb-30">
                    <div class="dashboard-w1 bg--pink b-radius--10 box-shadow ">
                <div class="icon">
                    <i class="la la-envelope"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount"><?php echo e($eventCounts->where('event_type','killed')->count()); ?></span>
                    </div>
                    <div class="desciption">
                        <span class="text--small"><?php echo app('translator')->get('killed(Uwawa)'); ?></span>
                    </div>

                    <a href="/event-web/killed" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
 </div><!-- row end-->

<!-- Second row -->

      <div class="row mt-50 mb-none-30">
          <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
              <div class="dashboard-w1 bg--12 b-radius--10 box-shadow" >
                  <div class="icon">
                      <i class="las la-spinner"></i>
                  </div>
                  <div class="details">
                      <div class="numbers">
                          <span class="amount"><?php echo e($suspectCounts->where('category','Individual')->count()); ?></span>
                      </div>
                      <div class="desciption">
                          <span><?php echo app('translator')->get('Individual(Mtu)'); ?></span>
                      </div>

                      <a href="/suspect-web/Individual" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
              <div class="dashboard-w1 bg--success b-radius--10 box-shadow">
                  <div class="icon">
                      <i class="las la-check-circle"></i>
                  </div>
                  <div class="details">
                      <div class="numbers">
                          <span class="amount"><?php echo e($suspectCounts->where('category','People')->count()); ?></span>
                      </div>
                      <div class="desciption">
                          <span><?php echo app('translator')->get('Group of People(Kundi la Watu)'); ?></span>
                      </div>

                      <a href="/suspect-web/People" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
              <div class="dashboard-w1 bg--1 b-radius--10 box-shadow">
                  <div class="icon">
                      <i class="lab la-product-hunt"></i>
                  </div>
                  <div class="details">
                      <div class="numbers">
                          <span class="amount"><?php echo e($suspectCounts->where('category','Institute')->count()); ?></span>
                      </div>
                      <div class="desciption">
                          <span><?php echo app('translator')->get('Institute(Taasisi)'); ?></span>
                      </div>

                      <a href="/suspect-web/Institute" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
              <div class="dashboard-w1 bg--2 b-radius--10 box-shadow">
                  <div class="icon">
                      <i class="las la-hourglass-half"></i>
                  </div>
                  <div class="details">
                      <div class="numbers">
                          <span class="amount"> <?php echo e($suspectCounts->where('category','Other')->count()); ?></span>
                      </div>
                      <div class="desciption">
                          <span><?php echo app('translator')->get('Other(Nyingine)'); ?></span>
                      </div>

                      <a href="/suspect-web/Other" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                  </div>
              </div>
          </div>



      </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script src="<?php echo e(asset('assets/admin/js/vendor/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/vendor/chart.js.2.8.0.js')); ?>"></script>

    <script>
        "use strict";
        // apex-bar-chart js
        var options = {
            series: [{
                name: 'Total Payment',
                data: [
                  <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e(getAmount(@$depositsMonth->where('months',$month)->first()->depositAmount)); ?>,
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            }],
            chart: {
                type: 'bar',
                height: 400,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: <?php echo json_encode($months, 15, 512) ?>,
            },
            yaxis: {
                title: {
                    text: "<?php echo e(__($general->cur_sym)); ?>",
                    style: {
                        color: '#7c97bb'
                    }
                }
            },
            grid: {
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: false
                    }
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "<?php echo e(__($general->cur_sym)); ?>" + val + " "
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#apex-bar-chart"), options);
        chart.render();


        // apex-line chart
        var options = {
            chart: {
                height: 430,
                type: "area",
                toolbar: {
                    show: false
                },
                dropShadow: {
                    enabled: true,
                    enabledSeries: [0],
                    top: -2,
                    left: 0,
                    blur: 10,
                    opacity: 0.08
                },
                animations: {
                    enabled: true,
                    easing: 'linear',
                    dynamicAnimation: {
                        speed: 1000
                    }
                },
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            grid: {
                padding: {
                    left: 5,
                    right: 5
                },
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: false
                    }
                },
            },
        };

        chart.render();




         // apex-line chart
            var options = {
                chart: {
                    height: 430,
                    type: "area",
                    toolbar: {
                        show: false
                    },
                    dropShadow: {
                        enabled: true,
                        enabledSeries: [0],
                        top: -2,
                        left: 0,
                        blur: 10,
                        opacity: 0.08
                    },
                    animations: {
                        enabled: true,
                        easing: 'linear',
                        dynamicAnimation: {
                            speed: 1000
                        }
                    },
                },
                 colors: ['#00E396', '#0090FF'],
                dataLabels: {
                    enabled: false
                },
                series: [
                    {
                        name: "Series 1",
                        data: <?php echo json_encode($deposits['per_day_amount']->flatten(), 15, 512) ?>
                    }
                ],
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.9,
                        stops: [0, 90, 100]
                    }
                },
                xaxis: {
                    categories: <?php echo json_encode($deposits['per_day']->flatten(), 15, 512) ?>
                },
                grid: {
                    padding: {
                        left: 5,
                        right: 5
                    },
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    yaxis: {
                        lines: {
                            show: false
                        }
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#deposit-line"), options);

            chart.render();


        var ctx = document.getElementById('userBrowserChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($chart['user_browser_counter']->keys(), 15, 512) ?>,
                datasets: [{
                    data: <?php echo e($chart['user_browser_counter']->flatten()); ?>,
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                maintainAspectRatio: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });



        var ctx = document.getElementById('userOsChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($chart['user_os_counter']->keys(), 15, 512) ?>,
                datasets: [{
                    data: <?php echo e($chart['user_os_counter']->flatten()); ?>,
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 0.05)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            },
        });


        // Donut chart
        var ctx = document.getElementById('userCountryChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($chart['user_country_counter']->keys(), 15, 512) ?>,
                datasets: [{
                    data: <?php echo e($chart['user_country_counter']->flatten()); ?>,
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layoutsuser.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/admin/dashboarduser.blade.php ENDPATH**/ ?>