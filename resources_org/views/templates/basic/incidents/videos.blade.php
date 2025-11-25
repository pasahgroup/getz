@extends($activeTemplate.'layouts.frontend')
@section('content')
<!-- <style>
    .top{
        padding-top:8%;
    }
</style> -->

 <!-- Car categories Start -->

 <section>
        <div id="section3">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                     <h2 class="display-5 text-capitalize mb-3">Incident <span class="text-primary">Videos</span> <span class="text-primary"></span></h2>
                    <p class="mb-0">(Tumeni picha zote za matukio halisi ya picha mnato na videos)
                    </p>
                </div>

      <div class="row">
@forelse($videos as $event_data)

                     <div class="col-md-3">
                    <div class="categories-item">
                        <div class="rent__item">
                            <div class="blog-item">
                            <div class="rent__thumb" style="background-color:#9ca494">
                                        <a href="{{ route('event.details', [$event_data->id, slug($event_data->name)]) }}">
                                            <img src="{{ getImage(imagePath()['vehicles']['path']. '/'. @$event_data->images[0], imagePath()['vehicles']['size']) }}" class="first-look" alt="rent-vehicle">
                                            <img src="{{ getImage(imagePath()['vehicles']['path']. '/'. @$event_data->images[1], imagePath()['vehicles']['size']) }}" class="hover-look" alt="rent-vehicle">
                                        </a>
                                    </div>
                            <div class="categories-content rounded-bottom p-4 text-center" style="margin:-42px">
                                    <!-- <div class="blog-img">
                                        <img src="../../frontendp/img/blog-1.jpg" class="img-fluid rounded-top w-100" alt="Image">
                                    </div> -->

                                    <div class="blog-content rounded-bottom p-3">
                                        <div class="blog-date"><span class="">{{$event_data->name}} 
                                              {{--
                                            <sub>/@lang('day')</span>
                                            --}}
                                            </div>
                                                


                                          <div class="rent__content text-center mt-n1">
                                               <ul class="d-flex car-info text-center">
                                               </ul>
                                       </div>

                                        <strong>({{$event_data->event_type}})</strong>
                                           <div class="rent__content mt-n1">
                                                <ul class="d-flex car-info center">
                                                     <!-- <li class="pr-3 text-center"> -->
                                                      <li class="text-center center">
                                                        <span class="">Region:{{ $event_data->region }} ({{ $event_data->district }})</span>
                                                    </li>
                                                </ul>
                                        </div>

                                          <strong>({{$event_data->event_title}})</strong>
                                      </br>
                                      <a href="{{ route('event.details', [$event_data->id, slug($event_data->name)]) }}" class="">Read More  <i class="fa fa-arrow-right"></i></a>
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
                  <a class="btn-transparent" href="/vehicle-search" target="_blank"  style="float: right;color:red;">View More Incident Videos <i class="fa fa-angle-double-right" aria-hidden="true"></i>
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

</section>





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
@endpush