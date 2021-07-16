@yield('before-header')

<header>
  <div class="header-top">
    <div class="container-fluid">
      <div class="header-top-logo">
        <a href="{{ route('frontend.home') }}"><img src="{{ asset('frontend/images/logo.png') }}" alt=""></a>
      </div>
      <div class="header-top-info">
        <ul>
          <li><i class="far fa-calendar-alt"></i>वि.सं {{ getNpDate(date('Y-m-d')) }}</li>
          <li><i class="far fa-calendar-alt"></i>{{ date('l, d F, Y') }}</li>
          <li class="hti-btn"><a href="{{ route('frontend.unicode') }}"><i class="far fa-keyboard"></i>युनिकोड</a></li>
          <li class="hti-btn"><a href="{{ $setting->youtube_link }}" target="_blank"><i class="fab fa-youtube"></i>Live</a></a></li>
          <li>
            <ul class=" social-icons">
              
              @foreach ($setting->socialMedia as $socialMedia)
                <li><a href="{{ $socialMedia->social_media_link }}" target="_blank"><i class="{{ $socialMedia->social_media_icon }}"></i></a></li>
              @endforeach

            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="header-bottom">
    <div class="container-fluid hb-display">
      <div class="header-bottom-nav">
        <ul id="nav">
          <li class="hbn-home"><a href="{{ route('frontend.home') }}"><i class="fas fa-home"></i></a></li>

          <?php 
            $categoryLimit = 11;
            $countCategories = $categories->count(); 
            $countFirst = ($countCategories >= $categoryLimit)? $categoryLimit : $countCategories;
          ?>
          @for ($i = 0; $i < $countFirst; $i++)
            <li class="nav-submenu"><a href="{{ route('frontend.category', $categories[$i]->slug) }}">{{ $categories[$i]->title_np }}</a>

              <?php $subCategoryCount = $categories[$i]->subCategories->count(); ?>
              @if ($subCategoryCount > 0)
                <ul>

                  @foreach ($categories[$i]->subCategories as $subCategory)
                    <li><a href="{{ route('frontend.category', $subCategory->slug) }}">{{ $subCategory->title_np }} </a></li>
                  @endforeach
                
                </ul>
              @endif

            </li>
          @endfor
          
          @if ($countCategories > $categoryLimit)
            <li class="nav-submenu"><a href="#">अन्य</a>
              <ul>

                @for ($i = $categoryLimit; $i < $countCategories; $i++)
                  <li><a href="{{ route('frontend.category', $categories[$i]->slug) }}">{{ $categories[$i]->title_np }} </a></li>
                @endfor

              </ul>
            </li>
          @endif

        </ul>
      </div>
      <div class="header-dark-mode">
        <label class="switch btn-color-mode-switch">
          <input type="checkbox" name="color_mode" id="color_mode" value="1">
          <span class="slider round btn-color-mode-switch-inner"></span>
        </label>
        <strong>Dark</strong>
      </div>
      <div class="header-search">
        <i class="fa fa-search" aria-hidden="true"></i>
        <div class="search-box">
          <form method="GET" action="{{ route('frontend.search') }}">
            <input type="text" name="keywords" placeholder="यहाँ टाईप गर्नुहोस् ...">
            <input type="submit" value="खोज्नुहोस्">
          </form>
        </div>
      </div>
      <button class="openbtn" onclick="openNav()"><img src="{{ asset('frontend/images/menu.png') }}" alt=""></button>
      <div id="mySidepanel" class="sidepanel">
        <span><a href="{{ route('frontend.home') }}"><img src="{{ asset('frontend/images/logo.png') }}" alt=""></a></span>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" title="Close"><i class="fas fa-times"></i></a>
        <ul class="sidepanel-nav">
          
          <li>
            <a href="{{ route('frontend.home') }}">गृहपृष्ठ</a>
          </li>

          <?php 
            $categoryLimit = 12;
            $countCategories = $categories->count(); 
            $countFirst = ($countCategories >= $categoryLimit)? $categoryLimit : $countCategories;
          ?>
          @for ($i = 0; $i < $countFirst; $i++)
            <li>
              <a href="{{ route('frontend.category', $categories[$i]->slug) }}">{{ $categories[$i]->title_np }}</a>
            </li>
          @endfor
          
        </ul>
        <div class="sidepanel-address">
          <h4>विज्ञापनका लागि</h4>
          <ul>
            <li>

              <?php $countAdvertisementContact = $setting->advertisementContact->count(); ?>
              @for ($i = 0; $i < $countAdvertisementContact; $i++)
                @if ($i == ($countAdvertisementContact-1))
                  {{ $setting->advertisementContact[$i]->contact_number }}
                @else
                  {{ $setting->advertisementContact[$i]->contact_number.', ' }}
                @endif
              @endfor

            </li>

            <?php $countAdvertisementEmail = $setting->advertisementEmail->count(); ?>
            @for ($i = 0; $i < $countAdvertisementEmail; $i++)
              @if ($i == ($countAdvertisementEmail-1))
                <li>
                  <a href="mailto:{{ $setting->advertisementEmail[$i]->email }}">{{ $setting->advertisementEmail[$i]->email }}</a>
                </li>
              @else
                <li>
                  <a href="mailto:{{ $setting->advertisementEmail[$i]->email }}">{{ $setting->advertisementEmail[$i]->email.', ' }}</a>
                </li>
              @endif
            @endfor

          </ul>
        </div>
        <ul class="sidepanel-social social-icons">

          @foreach ($setting->socialMedia as $socialMedia)
            <li><a href="{{ $socialMedia->social_media_link }}" target="_blank"><i class="{{ $socialMedia->social_media_icon }}"></i></a></li>
          @endforeach

        </ul>
      </div>
    </div>
  </div>
  <div class="header-trending">
    <div class="container-fluid">
      <ul>
        <li class="hmt-title"><a href="#"> <img src="{{ asset('frontend/images/trend.png') }}" alt="">ट्रेन्डिङ</a></li>
        <li class="hmt-trends">
          <!-- Only 10 item -->
          @foreach($trends_com as $trend_com)
          <a href="{{ route('frontend.trend', $trend_com->slug) }}">{{ $trend_com->title }}</a>
          @endforeach
        </li>
      </ul>
    </div>
  </div>
</header>

