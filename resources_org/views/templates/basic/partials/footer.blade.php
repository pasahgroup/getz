@php
    $subscribe_content = getContent('subscribe.content', true);
    $footer_content = getContent('footer.content', true);
    $contact = getContent('contact.content', true);
    $social_icons = getContent('social_icon.element', false, null, true);
    $policy_pages = getContent('policy_pages.element', false, null, true);
@endphp
<!-- Footer Section -->

  <div class="newsletter-section">
            <div class="newsletter-wrapper">
                <div class="footer-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{getImage(imagePath()['logoIcon']['path'].'/logo.png')}}" alt="logo" style="width:100px;">
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
<!-- footer area -->
    <footer class="footer-area">

        <div class="footer-widget">
            <div class="container">
                <div class="row footer-widget-wrapper pt-120 pb-70">
                    <div class="col-md-6 col-lg-4">
                        <div class="footer-widget-box about-us">
                            <h4 class="footer-widget-title">@lang('About') @lang($general->sitename)</h4>
                    <p>{{ __(@$footer_content->data_values->content) }}</p>
                    <ul class="social-icons">

                          @forelse($social_icons as $item)
                                <a href="{{ $item->data_values->url }}" class="btn btn-secondary btn-md-square rounded-circle me-3">
                                    @php echo @$item->data_values->social_icon @endphp
                                </a>
                       @empty
                        @endforelse

                    </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                                  <h4 class="footer-widget-title">@lang('General Links')</h4>
                            <ul class="footer-list">

                                  <li><a href="{{ route('home') }}"><i class="fas fa-caret-right"></i>@lang('Home')</a></li>

                        @foreach($pages as $k => $data)
                            <li><a href="{{route('pages',[$data->slug])}}"><i class="fas fa-caret-right"></i>{{__($data->name)}}</a></li>
                        @endforeach

                        <li><a href="{{ route('vehicles') }}"><i class="fas fa-caret-right"></i>@lang('Vehicles')</a></li>
                        <li><a href="{{ route('plans') }}"><i class="fas fa-caret-right"></i>@lang('Plan')</a></li>
                        <li><a href="{{ route('blogs') }}"><i class="fas fa-caret-right"></i>@lang('Blog')</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Support Center</h4>
                            <ul class="footer-list">
                                  @forelse($policy_pages as $policy)
                            <li><a href="{{ route('policy.pages', [$policy->id, slug($policy->data_values->title)]) }}"><i class="fas fa-caret-right"></i> {{ __(@$policy->data_values->title) }}</a></li>
                        @empty
                        @endforelse
                         <li><a href="{{ route('policy.faqs') }}"><i class="fas fa-caret-right"></i>Faqs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Get In Touch</h4>
                          
                              <ul class="footer__contact">
                        <li>
                            <div class="icon"><i class="las la-phone-volume"></i></div>
                            <div class="cont">
                                <span class="subtitle">@lang('For Support')</span>
                                <a href="Tel:{{ $contact->data_values->phone }}" class="info">{{ $contact->data_values->phone }}</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><i class="las la-headset"></i></div>
                            <div class="cont">
                                <span class="subtitle">@lang('Send Us Email')</span>
                                <a href="mailto:{{ $contact->data_values->email }}" class="info">{{ $contact->data_values->email }}</a>
                            </div>
                        </li>
                    </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p class="copyright-text">
                            <span id="date"></span> <a href="#"> </a> {{ __(@$footer_content->data_values->copyright) }}
                        </p>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <ul class="footer-social">
                         
                         <div class="footer__widget widget__about">
                                       <ul class="social-icons">

                          @forelse($social_icons as $item)
                                <a href="{{ $item->data_values->url }}" class="btn btn-secondary btn-md-square rounded-circle me-3">
                                    @php echo @$item->data_values->social_icon @endphp
                                </a>
                       @empty
                        @endforelse

                    </ul>
                </div>
                 </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


