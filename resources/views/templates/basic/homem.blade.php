@extends($activeTemplate.'layouts.frontend')
@section('content')
   <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href="../../../multishop/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../../multishop/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../../multishop/css/style.css" rel="stylesheet">


<style>
.truncate {
  width: 250px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  transition: all 0.3s ease;
}

.truncate:hover {
  white-space: normal;   
  overflow: visible;    
  text-overflow: clip;
}
</style>


    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>


                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">

                <div class="carousel-item position-relative active" style="height: 430px;">
                        <img src="{{ getImage(imagePath()['vehicles']['path']. '/'. @$event->images[0], imagePath()['vehicles']['size']) }}" class="first-look" alt="rent-vehicle">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                
                                 <h2 data-animation="fadeInUp" data-delay="100ms" style="color:yellow;">{{$event_data->event_type??''}}</h2>                                

                                            <div class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Name: <strong>{{$event_data->name?? ''}}</strong></div>
                            <div class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Event Type: <strong>{{$event_data->event_type?? ''}}</strong></div>

                               <div class="mx-md-5 px-5 animate__animated animate__bounceIn">  <strong>{{$event_data->details?? ''}}</strong></div>

                                   <a class="btn btn-outline-light py-1 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ route('event.details', [$event_data->id?? 0, slug($event_data->name?? '')]) }}">View More</a>
                                </div>
                            </div>
                        </div>

                  
                            @forelse($events as $event)
                        <div class="carousel-item position-relative" style="height: 430px;">
                              <img src="{{ getImage(imagePath()['vehicles']['path']. '/'. @$event->images[0], imagePath()['vehicles']['size']) }}" class="first-look" alt="rent-vehicle">

                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                
                                 <h2 data-animation="fadeInUp" data-delay="100ms" style="color:yellow;">{{$event->event_type}} {{$events}}</h2>                                

                                            <div class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Name: <strong>{{$event->name}}</strong></div>
                            <div class="mb-2 text-white"><i class="fa fa-check-circle text-primary me-1"></i>Event Type: <strong>{{$event->event_type}}</strong></div>

                               <div class="mx-md-5 px-5 animate__animated animate__bounceIn">  <strong>{{$event->details}}</strong></div>

                                   <a class="btn btn-outline-light py-1 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ route('event.details', [$event->id, slug($event->name)]) }}">View More</a>
                                </div>
                            </div>
                        </div>
  @endforeach 

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/offer-1.jpg" alt="">
                    <div class="offer-text">
                         <h6 class="text-white text-uppercase">Image1</h6>
                        {{--
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                        --}}
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/offer-2.jpg" alt="">
                    <div class="offer-text">
                       <h6 class="text-white text-uppercase">Image2</h6>
                      {{--
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


 <!-- Car categories Start -->
        <div class="container categories blog pb-5" id="section3">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h2 class="display-5 text-capitalize mb-3">Incident <span class="text-primary">Photos</span> <span class="text-primary"></span></h2>
                    <p class="mb-0">(Tumeni picha zote za matukio halisi ya picha mnato na videos)
                    </p>
                </div>

      <div class="row">
@forelse($events as $event_dataa)

                     <div class="col-md-3">
                    <div class="categories-item">
                        <div class="rent__item">
                            <div class="blog-item">
                            <div class="rent__thumb" style="background-color:#9ca494">
                                        <a href="{{ route('event.details', [$event_dataa->id, slug($event_dataa->name)]) }}">
                                            <img src="{{ getImage(imagePath()['vehicles']['path']. '/'. @$event_dataa->images[0], imagePath()['vehicles']['size']) }}" class="first-look" alt="rent-vehicle">
                                            <img src="{{ getImage(imagePath()['vehicles']['path']. '/'. @$event_dataa->images[1], imagePath()['vehicles']['size']) }}" class="hover-look" alt="rent-vehicle">
                                        </a>
                                    </div>
                            <div class="categories-content rounded-bottom p-4 text-center" style="margin:-42px">
                                    <!-- <div class="blog-img">
                                        <img src="../../frontendp/img/blog-1.jpg" class="img-fluid rounded-top w-100" alt="Image">
                                    </div> -->

                                    <div class="blog-content rounded-bottom p-3">
                                        <div class="blog-date"><span class="">{{$event_dataa->name}} 
                                              {{--
                                            <sub>/@lang('day')</span>
                                            --}}
                                            </div>                                               


                                          <div class="rent__content text-center mt-n1">
                                               <ul class="d-flex car-info text-center">
                                               </ul>
                                          </div>

                                        <strong>({{$event_dataa->event_type}})</strong>

                                           <div class="rent__content mt-n1">
                                                <ul class="d-flex car-info center">
                                                      <li class="text-center center">
                                                        <span class="truncate" onclick="this.classList.toggle('expanded')">Region:{{ $event_dataa->region }} ({{ $event_dataa->district }})</span>
                                                    

                                                    </li>
                                                </ul>
                                        </div>

  
<div class="truncate" onclick="this.classList.toggle('expanded')">
  ({{$event_dataa->event_title}})
</div>


                                      </br>
                                      <a href="{{ route('event.details', [$event_dataa->id, slug($event_dataa->name)]) }}" class="">Read More  <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                
                          </div>
                    </div>
                </div>
               

                        @empty
                        @endforelse
                        {{--
                        {!! $vehicles->links() !!}
                        --}}
                    
                    </div>
                    <div>
                        <div>
                   
                     </div>
  </span>
</div>
     <br>
          <br>
     <section class="showcase container">
                  <a class="btn-transparent" href="/event-search" target="_blank"  style="float: right;color:red;">View More Incident Photos <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                         </a>
    </section>            
        </div>
 
<hr>
 <!-- Car categories Start -->
        <div class="container categories blog pb-5" id="section3">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                     <h2 class="display-5 text-capitalize mb-3">Incident <span class="text-primary">Videos</span> <span class="text-primary"></span></h2>
                    <p class="mb-0">(Tumeni picha zote za matukio halisi ya picha mnato na videos)
                    </p>
                </div>

      <div class="row">
@forelse($videos as $video_data)

                     <div class="col-md-3">
                    <div class="categories-item">
                        <div class="rent__item">
                            <div class="blog-item">
                                                             <a href="{{ route('event.details', [$video_data->id, slug($video_data->name)]) }}">                                                                                 

                                                                       <video controls width="250" height="150">
    <source src="{{ Storage::url($video_data->path) }}" type="video/mp4" style="object-fit: cover;">
    Your browser does not support the video tag.
</video>
</a>
  
                            <div class="categories-content rounded-bottom p-4 text-center" style="margin:-42px">
                                    <!-- <div class="blog-img">
                                        <img src="../../frontendp/img/blog-1.jpg" class="img-fluid rounded-top w-100" alt="Image">
                                    </div> -->

                                    <div class="blog-content rounded-bottom p-3">
                                        <div class="blog-date"><span class="">{{$video_data->name}} 
                                              {{--
                                            <sub>/@lang('day')</span>
                                            --}}
                                            </div>
                                                


                                          <div class="rent__content text-center mt-n1">
                                               <ul class="d-flex car-info text-center">
                                               </ul>
                                       </div>

                                        <strong>({{$video_data->event_type}})</strong>
                                           <div class="rent__content mt-n1">
                                                <ul class="d-flex car-info center">
                                                     <!-- <li class="pr-3 text-center"> -->
                                                      <li class="text-center center">
                                                         <span class="truncate" onclick="this.classList.toggle('expanded')">Region:{{ $video_data->region }} ({{ $video_data->district }})</span>
                                                    </li>
                                                </ul>
                                        </div>

                                        <div class="truncate" onclick="this.classList.toggle('expanded')">
  ({{$video_data->event_title}})
</div>

                                      </br>
                                      <a href="{{ route('video.details', [$video_data->id, slug($video_data->name)]) }}" class="">Read More <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                
                          </div>
                    </div>
                </div>
               

                        @empty
                        @endforelse
                        {{--
                        {!! $vehicles->links() !!}
                        --}}
                    
                    </div>
                    <div>
                        <div>
                   
                     </div>
  </span>
</div>
     <br>
          <br>
     <section class="showcase container">
                  <a class="btn-transparent" href="/video-search" target="_blank"  style="float: right;color:red;">View More Incident Videos  <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                         </a>
    </section>            
        </div>
 
      <div class="container categories blog pb-5" id="section3">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <p class="mb-0">The truth must be revealed.
                    </p>
                </div>

                           
  </span>
</div>
</div>



  <section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(img/bg-img/b2.jpg)">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-12">
                    <div class="cta-content text-center">
                        <h5 class="wow fadeInUp" data-wow-delay="300ms" style="color:fff"><span style="color:yellow;">We must expose all evil events</span></h5>
                        <h6 class="wow fadeInUp" data-wow-delay="400ms">The timeless rallying cry for justice, unity, and unbreakable power of solidarity</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>


     
    <script type="text/javascript">
function scrollToNextSection() {
  const currentSection = document.activeElement.closest('section');
  const nextSection = currentSection.nextElementSibling;

  if (nextSection) {
    nextSection.scrollIntoView();
  }
}

    </script>





<!-- start multishop -->


  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../../../multishop/lib/easing/easing.min.js"></script>
    <script src="../../../multishop/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../../../multishop/mail/jqBootstrapValidation.min.js"></script>
    <script src="../../../multishop/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../../../multishop/js/main.js"></script>


<!-- end multishop -->

             </body>
@endsection
@push('style')
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/datepicker.min.css')}}">
@endpush

@push('script')
    <script src="{{asset($activeTemplateTrue.'js/datepicker.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'js/datepicker.en.js')}}"></script>
    <script>
        // date and time picker
        $('#dateAndTimePicker').datepicker({
            timepicker: true,
            language: 'en',
            onSelect: function (fd, d, picker) {
                var pick_time = fd;
                var price = parseFloat("#");
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

        <script>
            $(function (){

                /* Example options:
                
                    let options = {
                        autostart: true,
                        property: 'value',
                        onComplete: null,
                        duration: 20000,
                        padding: 10,
                        marquee_class: '.marquee',
                        container_class: '.simple-marquee-container',
                        sibling_class: 0,
                        hover: true,
                        velocity: 0.1
                        direction: 'right'
                    }

                    $('.simple-marquee-container').SimpleMarquee(options);
                    
                */

                $('.simple-marquee-container').SimpleMarquee();
                
            });

        </script>
@endpush
