<script src="<?php echo e(asset('assets/admin/js/vendor/jquery-3.6.0.min.js')); ?>"></script>


 <style>    


@media (max-width:768px){
.container-1{width:100%;}
.container-2{width:100%;}
}
.container-1:after,
.container-2:before,
{
  display: table;
  content: " ";
}
.container-1:after,
.container-2:after,
{clear: both;}

.container-1{display: none;}
/*navbar-right=====START==========*/

.social-icon{margin:0px;padding:0px;}
.social-icon li {margin: 0px;padding: 0px;list-style-type: none;}
.social-icon li a {
    display: block;
    padding: 15px 14px;
    text-decoration:none;
}
.social-icon li a:focus{
   color:#fff;
    text-decoration:none;
}

.messages-link{
        color: #fff !important;
    background: #16a085 !important;

}

.alerts-link{
        color: #fff !important;
    background: #f39c12 !important;

}

.tasks-link{
        color: #fff !important;
    background: #2980b9 !important;

}

.user-link{
        color: #fff !important;
    background: #E74C3C !important;

}
 .number {
    position: absolute;
    bottom: 25px;
    left: 3px;
    width: 20px;
    height: 20px;
    padding-right: 1px;
    border-radius: 50%;
    text-align: center;
    font-size: 11px;
    line-height: 20px;
    background-color: #2c3e50;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: -105px;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
}
/*navbar-right=======END========*/

/*sidebar-toggle=============*/
.sidebar-toggle:hover, .sidebar-toggle:focus {
    color: #fff;
    text-decoration: underline;
}


/*sidr-NAVBAR=======START========*/
.navbar-nav-1{width: 100%;background-color:#34495E;height:auto;overflow: hidden;z-index: 1020;position: relative;}

.side-user {
    display: block;
    width: 100%;
    padding: 15px;
    border-top: none !important;
    border-bottom: 1px solid #142638;
    text-align: center;
}
.close-btn {
    position: absolute;
    z-index: 99;
    color: #fff;
    font-size: 31px;
    top: 0px;
    left: 223px;    
    display: none;
    padding: 0px;
    cursor: pointer;
}
.close-btn .fa-window-close{color:#fff;font-size: 25px;}
.welcome {
    margin: 0;
    font-style: italic;
    color: #9aa4af;
}

.name {
    margin: 0;
    font-family: "Ubuntu","Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 20px;
    font-weight: 300;
    color: #ccd1d7;
}
.side-user a{
   color:#fff;
}
.nav-search{border-top: 1px solid #54677a;}
.nav-search .form-control{border: 1px solid #000;border-radius: 0px;}
.nav-search .btn{border: 1px solid #000;border-radius: 0px;}

.dashboard>a{
    color:#fff;
    }
.side-nav li {
    border-top: 1px solid #54677a;
    border-bottom: 1px solid #142638;
}

.side-nav>li>a:active {
    text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
    outline: none;
    color: #fff;
    background-color: #34495e;
}

.panel {
    margin-bottom: 0;
    border: none;
    border-radius: 0;
    background-color: transparent;
    box-shadow: none;
}

.panel>a{
    position: relative;
    display: block;
    padding: 10px 15px;
    color: #fff;
}

.panel>ul>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
    color: darkcyan;
    background: black;
}
.nav > li > a:hover, .nav > li > a:focus {
    text-decoration: none;
    background-color: #3d566e;
}
/*sidr-NAVBAR=======END========*/
@media (min-width: 768px){

#page-wrapper {
   
    padding: 0 30px;
    min-height: 1300px;
    border-left: 1px solid #2c3e50;
}
}

#page-wrapper {
    padding: 0 15px;
    border: none;
    
}

.date-picker{    
    border-color: #138871;
    color: #fff;
    background-color: #149077;
    margin-top: -7px;
    border-radius: 0px;
    margin-right: -15px;
}




@media (min-width: 768px){
.circle-tile {
    margin-bottom: 30px;
}
}

.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}

.circle-tile-heading {
    /*position: relative;*/
    width: 80px;
    height: 80px;
    margin: 0 auto -40px;
    /*border: 3px solid rgba(255,255,255,0.3);*/
    border-radius: 100%;
    color: #fff;
    transition: all ease-in-out .3s;
}

/* -- Background Helper Classes */

/* Use these to cuztomize the background color of a div. These are used along with tiles, or any other div you want to customize. */

 .dark-blue {
    background-color: #34495e;
}

.green {
    background-color: #16a085;
}

.blue {
    background-color: #2980b9;
}

.orange {
    background-color: #f39c12;
}

.red {
    background-color: #e74c3c;
}

.purple {
    background-color: #8e44ad;
}

.dark-gray {
    background-color: #7f8c8d;
}

.gray {
    background-color: #95a5a6;
}

.light-gray {
    background-color: #bdc3c7;
}

.yellow {
    background-color: #f1c40f;
}

/* -- Text Color Helper Classes */

 .text-dark-blue {
    color: #34495e;
}

.text-green {
    color: #16a085;
}

.text-blue {
    color: #2980b9;
}

.text-orange {
    color: #f39c12;
}

.text-red {
    color: #e74c3c;
}

.text-purple {
    color: #8e44ad;
}

.text-faded {
    color: rgba(255,255,255,0.7);
}



.circle-tile-heading .fa {
    line-height: 80px;
}

.circle-tile-content {
    padding-top: 15px;
}
.circle-tile-description {
    text-transform: uppercase;
}

.text-faded {
    color: rgba(255,255,255,0.7);
}

.circle-tile-number {
    padding: 4px 0 15px;
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
}

.circle-tile-footer {
    display: block;
    padding: 5px;
    color: rgba(255,255,255,0.5);
    background-color: rgba(0,0,0,0.1);
    transition: all ease-in-out .3s;
}

.circle-tile-footer:hover {
    text-decoration: none;
    color: rgba(255,255,255,0.5);
    background-color: rgba(0,0,0,0.2);
}



.time-widget {
    margin-top: 5px;
    overflow: hidden;
    text-align: center;
    font-size: 1.75em;
}

.time-widget-heading {
    text-transform: uppercase;
    font-size: .5em;
    font-weight: 400;
    color: #fff;
}
#datetime{color:#fff;}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0,0,0,0.9);
}

.tile {
    margin-bottom: 15px;
    padding: 15px;
    overflow: hidden;
    color: #fff;
}
 </style>


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

<div>-- Comming Soon --</div>


   <div class="container">    
      <div class="row mt-50 mb-none-30">
           <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
              <div class="dashboard-w1 bg--10 b-radius--10 box-shadow">
                  <div class="icon">
                      <i class="las la-spinner"></i>
                  </div>
                  <div class="details">
                      <div class="desciption">
                          <span> <a href="<?php echo e(route('user.events.index')); ?>"><?php echo app('translator')->get('Photos'); ?>(<?php echo e($eventCounts->count()); ?>)</a></span>
                      </div>
                  </div>
              </div>
          </div>

                  <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
      <div class="dashboard-w1 bg--3 b-radius--10 box-shadow">
                  <div class="icon">
                      <i class="las la-spinner"></i>
                  </div>
                  <div class="details">
                      <div class="desciption">
                          <span> <a href="<?php echo e(route('user.videos.index')); ?>"><?php echo app('translator')->get('Videos'); ?>(<?php echo e($videosCounts->count()); ?>)</a></span>
                      </div>
                  </div>
              </div>
          </div>


              <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
              <div class="dashboard-w1 bg--12 b-radius--10 box-shadow" >
                  <div class="icon">
                      <i class="las la-spinner"></i>
                  </div>
                  <div class="details">
                      <div class="desciption">
                          <span> <a href="<?php echo e(route('user.suspects.index')); ?>"><?php echo app('translator')->get('Suspects'); ?>(<?php echo e($suspectCounts->count()); ?>)</a></span>
                      </div>
                  </div>
              </div>
          </div>

              <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
              <div class="dashboard-w1 bg--1 b-radius--10 box-shadow">
                  <div class="icon">
                      <i class="las la-spinner"></i>
                  </div>
                  <div class="details">
                      <div class="desciption">
                          <span> <a href="<?php echo e(route('user.victims.index')); ?>"><?php echo app('translator')->get('Victims'); ?>(<?php echo e($victimsCounts->count()); ?>)</a></span>
                      </div>
                  </div>
              </div>
          </div>
      </div>

     
      <div class="row">
     <div class="col-md-12">
      <div class="page-title">
        <ol class="breadcrumb">
          <li class="pull-right">
              
      </li>
        </ol>
       </div>
      </div>
     </div> 
                                                 
        <div class="row" >
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-users fa-fw fa-1x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-number text-faded">
                                  Photos
                                </div>
                              <!--   <div class="circle-tile-number text-faded">
                                    265
                                    <span id="sparklineA"></span>
                                </div> -->
                                <a href="#" class="circle-tile-footer">More Info(4) <i class="fa fa-chevron-circle-right"></i></a>
                                <a href="#" class="circle-tile-footer">More Info(3)<i class="fa fa-chevron-circle-right"></i></a>
                                                 </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading green">
                               <i class="fa fa-comments fa-fw fa-1x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                              
                                <div class="circle-tile-number text-faded">
                                    $32,384
                                </div>
                                <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading orange">
                                    <i class="fa fa-bell fa-fw fa-1x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content orange">
                               
                                <div class="circle-tile-number text-faded">
                                    9 New
                                </div>
                                <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue">
                                    <i class="fa fa-tasks fa-fw fa-1x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue">
                                <div class="circle-tile-number text-faded">
                                    10
                                    <span id="sparklineB"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>               
                </div>
                                                     
        <div class="row">
         <div class="col-lg-3">
         <div class="tile tile-img tile-time morning" style="height: 200px">
           <p class="time-widget">
            <span class="time-widget-heading">It Is Currently</span>
             <br>
              <strong><span id="datetime">Friday<br>March 17th, 2017<br>12:43:17 PM</span></strong>
           </p>
         </div>
        </div>
         <div class="col-lg-9"></div>  
            
        </div>
        
    </div><!-- page-wrapper END-->
     

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

<?php echo $__env->make('admin.layoutsuser.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\getz\resources\views/admin/dashboarduserMain.blade.php ENDPATH**/ ?>