<footer>
    <section class="footer-main">
        <div class="container-fluid">
            <div class="footer-main-top">
                <a href="#"><img src="{{ asset('frontend/images/logo.png') }}" alt=""></a>
                <ul>
                    {{-- <li><a href="#">हाम्रो बारेमा</a></li>  --}}
                    
                    <li><a href="{{ route('frontend.team') }}">हाम्रो टिम</a></li>

                    @foreach ($pages as $page)
                        <li><a href="{{ route('frontend.page.show', $page->slug) }}">{{ $page->link_name }}</a></li>
                    @endforeach

                </ul>
            </div>
            <div class="footer-main-mid">
                <ul>
                    <li>मुकाम मिडिया नेटवर्क प्रा. लि.</li>
                    <li>{{ $setting->address }}</li>

                    <li>
                        <?php $countCompanyContact = $setting->companyContact->count(); ?>
                        @for ($i = 0; $i < $countCompanyContact; $i++)
                            @if ($i == ($countCompanyContact-1))
                            {{ $setting->companyContact[$i]->contact_number }}
                            @else
                            {{ $setting->companyContact[$i]->contact_number.', ' }}
                            @endif
                        @endfor
                    </li>
                    
                    <li>सूचना विभाग दर्ता नं.: २६५१/०७७-०७८</li>
                    <li>प्रेस काउन्सिल दर्ता नं.: १२६६/०७७-०७८</li>

                </ul>
            </div>
            
            <div class="footer-main-mid">
                <ul>
                    <li>
                        <?php $countCompanyEmail = $setting->companyEmail->count(); ?>
                        @for ($i = 0; $i < $countCompanyEmail; $i++)
                            @if ($i == ($countCompanyEmail-1))
                                {{ $setting->companyEmail[$i]->email }}
                            @else
                                {{ $setting->companyEmail[$i]->email.', ' }}
                            @endif
                        @endfor
                    </li>

                    <li>कार्यकारी अध्यक्ष: {{ $setting->executive_publisher }}</li>
                    <li>सम्पादक: {{ $setting->executive_editor }}</li>
                    
                    <li>विज्ञापनका लागि: ९८४१२४४२७६</li>
                    
                </ul>
            </div>
            
            <div class="footer-main-bottom">
                <ul>
                    
                    @foreach ($setting->socialMedia as $socialMedia)
                        <li><a href="{{ $socialMedia->social_media_link }}" target="_blank"><i class="{{ $socialMedia->social_media_icon }}"></i></a></li>
                    @endforeach

                </ul>
                <p> <i class="far fa-copyright"></i> <?php echo date('Y'); ?> <a
                        href="{{ route('frontend.home') }}">Khabar Mukam.</a> All rights reserved. Powered by
                    <a href="https://www.ultrabyteit.com/" target="_blank">Ultrabyte.</a>
                </p>
            </div>
        </div>
    </section>
    <button onclick="topFunction()" id="myTopbtn" title="Go to top"><img
            src="{{ asset('frontend/images/up-arrow.png') }}" alt=""></button>
</footer>
