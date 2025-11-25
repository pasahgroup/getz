@extends($activeTemplate.'layouts.frontend')

@section('content')
    @php
        $contact_content = getContent('contact.content', true);
    @endphp
    <!-- Contact Section Starts Here -->
    <div class="contact-section pt-120 pb-120 bg--section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="account__wrapper mw-100 bg--body">
                        <form class="account-form row g-4" method="post" action="">
                            @csrf

                            <div class="col-md-6">
                                <label for="name" class="form--label">@lang('Name')</label>
                                <input name="name" type="text" placeholder="@lang('Your Name')" class="form-control form--control" value="{{ auth()->check() ? auth()->user()->fullname : old('name') }}" @if(auth()->user()) readonly @endif required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form--label">@lang('E-Mail')</label>
                                <input name="email" type="text" placeholder="@lang('Enter E-Mail Address')" class="form-control form--control" value="{{ auth()->check() ? auth()->user()->email : old('email') }}" @if(auth()->user()) readonly @endif required>
                            </div>
                            <div class="col-md-12">
                                <label for="subject" class="form--label">@lang('Subject')</label>
                                <input name="subject" type="text" placeholder="@lang('Write your subject')" class="form-control form--control" value="{{old('subject')}}" required>
                            </div>
                            <div class="col-md-12">
                                <label for="message" class="form--label">@lang('Your Message')</label>
                                <textarea name="message" wrap="off" placeholder="@lang('Write your message')" class="form-control form--control">{{old('message')}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="cmn--btn btn--lg">@lang('Submit')</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="h-100 map-area">
                        <iframe src = "https://maps.google.com/maps?q={{ @$contact_content->data_values->map_latitude }},{{ @$contact_content->data_values->map_longitude }}&hl=es;z=14&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section Ends Here -->
<hr>

    <!-- Brance Section Starts Here -->
    <section class="brance-section pb-120 bg--section">
        <div class="container">
            <div class="section__header section__header__center">
                <h3 class="section__title">@lang('Contact') <span class="text--base">@lang('Information')</span></h3>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-xl-4 col-md-6">
                    <div class="contact__item bg--body">
                        <div class="contact__icon">
                            <i class="las la-phone"></i>
                        </div>
                        <div class="contact__body">
                            <h5 class="contact__title">@lang('Phone')</h5>
                            <ul class="contact__info">
                                <li>
                                    <a href="Tel:{{ @$contact_content->data_values->phone }}">{{ @$contact_content->data_values->phone }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact__item bg--body">
                        <div class="contact__icon">
                            <i class="las la-envelope"></i>
                        </div>
                        <div class="contact__body">
                            <h5 class="contact__title">@lang('Email')</h5>
                            <ul class="contact__info">
                                <li>
                                    <a href="mailto:{{ @$contact_content->data_values->email }}">{{ @$contact_content->data_values->email }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact__item bg--body">
                        <div class="contact__icon">
                            <i class="las la-map-marker"></i>
                        </div>
                        <div class="contact__body">
                            <h5 class="contact__title">@lang('Address')</h5>
                            <ul class="contact__info">
                                <li>{{ __(@$contact_content->data_values->address) }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<hr>

            <!-- Team Start -->
            <div class="container team pb-5" id="section9">
                <div class="container pb-5">
                    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                        <h1 class="display-5 text-capitalize mb-3">Customer<span class="text-primary"> Suport</span> Center</h1>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet nemo expedita asperiores commodi accusantium at cum harum, excepturi, quia tempora cupiditate! Adipisci facilis modi quisquam quia distinctio,
                        </p>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item p-4 pt-0">
                                <div class="team-img">
                                    <img src="../../frontendp/img/team-1.jpg" class="img-fluid rounded w-100" alt="Image">
                                </div>
                                <div class="team-content pt-4">
                                    <h4>MARTIN DOE</h4>
                                    <p>Profession</p>
                                    <div class="team-icon d-flex justify-content-center">
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="team-item p-4 pt-0">
                                <div class="team-img">
                                    <img src="../../frontendp/img/team-2.jpg" class="img-fluid rounded w-100" alt="Image">
                                </div>
                                <div class="team-content pt-4">
                                    <h4>MARTIN DOE</h4>
                                    <p>Profession</p>
                                    <div class="team-icon d-flex justify-content-center">
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="team-item p-4 pt-0">
                                <div class="team-img">
                                    <img src="../../frontendp/img/team-3.jpg" class="img-fluid rounded w-100" alt="Image">
                                </div>
                                <div class="team-content pt-4">
                                    <h4>MARTIN DOE</h4>
                                    <p>Profession</p>
                                    <div class="team-icon d-flex justify-content-center">
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="team-item p-4 pt-0">
                                <div class="team-img">
                                    <img src="../../frontendp/img/team-4.jpg" class="img-fluid rounded w-100" alt="Image">
                                </div>
                                <div class="team-content pt-4">
                                    <h4>MARTIN DOE</h4>
                                    <p>Profession</p>
                                    <div class="team-icon d-flex justify-content-center">
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Team End -->

    <!-- Brance Section Ends Here -->
@endsection
