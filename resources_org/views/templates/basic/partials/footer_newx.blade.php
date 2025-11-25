@php
    $subscribe_content = getContent('subscribe.content', true);
    $footer_content = getContent('footer.content', true);
    $contact = getContent('contact.content', true);
    $social_icons = getContent('social_icon.element', false, null, true);
    $policy_pages = getContent('policy_pages.element', false, null, true);
@endphp

 <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                            <h4 class="widget__title">@lang('About') @lang($general->sitename)</h4>
                    <p>{{ __(@$footer_content->data_values->content) }}</p>

                            </div>
                        </div>
                    </div>


                      <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4">Quick Links</h4>
                              <li class="fas fa-angle-right me-2"><a href="{{ route('home') }}">@lang('Home')</a></li>
                                @foreach($pages as $k => $data)
                            <li class="fas fa-angle-right me-2"><a href="{{route('pages',[$data->slug])}}">{{__($data->name)}}</a></li>
                        @endforeach
                        <li class="fas fa-angle-right me-2"><a href="{{ route('vehicles') }}">@lang('Vehicles')</a></li>
                        <li class="fas fa-angle-right me-2"><a href="{{ route('plans') }}">@lang('Plan')</a></li>
                        <li class="fas fa-angle-right me-2"><a href="{{ route('blogs') }}">@lang('Blog')</a></li>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">@lang('Policy Pages')</h4>

                               @forelse($policy_pages as $policy)
                            <li class="fas fa-angle-right me-2"><a href="{{ route('policy.pages', [$policy->id, slug($policy->data_values->title)]) }}">{{ __(@$policy->data_values->title) }}</a></li>

                        @empty
                        @endforelse

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Contact Info</h4>
                            <a href="#"><i class="fa fa-map-marker-alt me-2"></i> 123 Street, New York, USA</a>
                            <a href="mailto:info@example.com"><i class="fas fa-envelope me-2"></i> info@example.com</a>
                            <a href="tel:+012 345 67890"><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                            <a href="tel:+012 345 67890" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                            <div class="d-flex">
                @forelse($social_icons as $item)
                                <a href="{{ $item->data_values->url }}" class="btn btn-secondary btn-md-square rounded-circle me-3">
                                    @php echo @$item->data_values->social_icon @endphp
                                </a>
                       @empty
                        @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">

 <div class="newsletter-section">
            <div class="newsletter-wrapper">
                <div class="footer-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="logo">
                    </a>
                </div>
                <div class="newsletter-title">
                    <div class="section__header border-0">
                        <h4 class="section__title mb-0">@lang('Newsletter') <span class="text--base">@lang('Subscription')</span></h4>
                        <p>{{ __(@$subscribe_content->data_values->content) }}</p>
                    </div>
                </div>
                <div class="newsletter-form">
                    <form action="{{ route('subscribe') }}" id="subscribeForm" method="post">
                        @csrf
                        <div class="input-group">
                            <input name="email" type="email" class="form-control form--control subscribe_email" placeholder="@lang('Enter your email address')"/>
                            <button type="submit" class="input-group-text cmn--btn">@lang('Subscribe')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

            </div>
        </div>

              <!-- Back to Top -->
        <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
