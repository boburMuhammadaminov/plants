<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{asset('frontend/images/icon.svg')}}" />
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <!-- bootstrap 5.0.0 css files -->

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>

    <!-- ---------- -->

    <!-- fontawesome 5.15 css -->

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
      integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- ---------- -->

    <!-- fancybox.3.5.7.min.css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
    integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ---------- -->

    <!-- owl carousel 2.3.4 css -->

    <link
      rel="stylesheet"
      href="{{asset('frontend/libs/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{asset('frontend/libs/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css')}}"
    />

    <!-- ---------- -->

    <!-- my custom css file -->

    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/myStyle.css')}}" />

    <!-- ---------- -->

  </head>
  @php
    define("lang", session('lang'));
    $setting = \App\Models\Setting::first();
    $logo = \App\Models\SiteImage::first();
    $socials = \App\Models\SocialSettings::where('is_active', '=', 1)->get();
    $pagesCategories = \App\Models\PagesCategory::with(
      array(
        'pages' => function($query){ $query->where('is_active', '=', 1); }
      )
    )->get();
    $newsCategories = \App\Models\Category::with(
      array(
        'blogs' => function($query){ $query->where('is_active', '=', 1); }
      )
    )->get();
  @endphp
  <body>
    
    <!-- specialViewModal begin -->

    <div id="specialViewModal">
      <div id="specialViewModalWrapper" class="wrapper">
        <i id="modalCloser" class="fa fa-times"></i>
        <div class="size">
          <h5 class="title">
            {{__('word.f-size')}}:
          <h5 />
          <div>
            <p id="smallFont" class="example" style="font-size: 16px !important;">
              A
            </p>
            <p id="largeFont" class="example" style="font-size: 22px !important;">
              A
            </p>
          </div>
        </div>
        <div class="theme">
          <h5 class="title">
            {{__('word.color')}}:
          </h5>
          <div>
            <div id="colorful" class="example">
              A
            </div>
            <div id="black" class="example">
              A
            </div>
            <div id="white" class="example">
              A
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- specialViewModal end -->

    <!-- header begin -->
    <header>
      <div class="header-top">
        <div class="my-container">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <ul class="in-row special">
                <li>
                  <a href="#"
                    ><i class="fa fa-sitemap"></i><span>{{__('word.site map')}}</span></a
                  >
                </li>
                <li class="mobile">
                  <a href="#" id="mobile"
                    ><i class="fa fa-mobile"></i><span>{{__('word.mobile version')}}</span></a
                  >
                </li>
                <li>
                  <a href="#" id="specialView">
                    <i class="fa fa-eye"></i>
                    <span>{{__('word.visually impaired')}}</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-md-6 col-sm-12 in-row secondary">
              @if (count($socials) > 0)
                <ul class="social in-row">
                  @foreach ($socials as $social)
                  <li>
                    <a href="{{$social->link}}"><i class="{{$social->icon}}"></i></a>
                  </li>
                  @endforeach
                </ul>
              @endif
              <form class="search">
                <input type="text" placeholder="{{__('word.search')}}" />
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
              <ul class="langs in-row">
                <li class="uz"><a href="{{route('lang', 'uz')}}">O'z</a></li>
                <li class="ru"><a href="{{route('lang', 'ru')}}">Ru</a></li>
                <li class="en"><a href="{{route('lang', 'en')}}">En</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="header-body">
        <div class="my-container">
          <div class="logo">
            <img src="{{asset($logo->image)}}" alt="{{$logo['title_'.session('lang')]}}" />
            <a href="{{route('home')}}">
              {{$setting['name_'.session('lang')]}}
            </a>
          </div>
          <div class="links">
            <div class="location">
              <a href="#" class="icon">
                <i class="fas fa-map-marked-alt"></i>
              </a>
              <div class="text">
                <a href="#">
                  <p>{{__('word.our address')}}:</p>
                  <span>{{$setting['address_'.session('lang')]}}</span>
                </a>
                <a href="mailto:{{$setting['email']}}">
                  <span>{{__('word.email address')}}: {{$setting['email']}}</span>
                </a>
              </div>
            </div>
            <div class="tel">
              <a href="tel:{{$setting->number}}">
                <div class="icon">
                  <i class="fas fa-phone-square"></i>
                </div>
                <div class="text">
                  <span class="title">{{__('word.helpline')}}</span>
                  <p class="number"><span>({{Str::substr($setting['number'], 0, 6)}})</span>{{Str::substr($setting['number'], 6, 3)}} {{Str::substr($setting['number'], 9, 2)}} {{Str::substr($setting['number'], 11, 2)}}</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="header-bottom">
        <div class="my-container">
          <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#main_nav"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <i class="fa fa-bars"></i>
              </button>
              <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">{{__('word.home')}} </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('gallery')}}">{{__('word.gallery')}} </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      data-bs-toggle="dropdown"
                    >
                    {{__('word.news')}}
                    </a>
                    @if (count($newsCategories) > 0)
                    <ul class="dropdown-menu fade-up">
                      @foreach ($newsCategories as $news)
                      <li>
                        <a class="dropdown-item" href="{{route('news', $news->slug)}}"> {{$news['name_'.session('lang')]}}</a>
                      </li>
                      @endforeach
                    </ul>
                    @endif
                  </li>
                  @foreach ($pagesCategories as $item)
                  @if (count($item->pages) > 0)
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="javascript:void(0);"
                      data-bs-toggle="dropdown"
                    >
                    {{$item['name_'.session('lang')]}}
                    </a>
                    @if (count($item->pages) > 0)
                    <ul class="dropdown-menu fade-up">
                      @foreach ($item->pages as $page)
                      <li>
                        <a class="dropdown-item" href="{{route('pagesSingle', $page->slug)}}"> {{$page['title_'.session('lang')]}}</a>
                      </li>
                      @endforeach
                    </ul>
                    @endif
                  </li>
                  @endif
                  @endforeach
                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('contact')}}">{{__('word.contact')}} </a>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse.// -->
            </div>
            <!-- container-fluid.// -->
          </nav>
        </div>
      </div>
    </header>

    <!-- header end -->

    @yield('content')

    <!-- footer begin -->

    <footer>
      <div class="my-container">
        <div class="logo">
          <img src="{{asset($logo->image)}}" alt="{{$logo['title_'.session('lang')]}}" />
          <div class="text">
            <h5>
              {{$setting['name_'.session('lang')]}}
            </h5>
            <p class="copyright">{{\Carbon\Carbon::now()->year}} © {{__('word.rights reserved')}}</p>
          </div>
        </div>
        <div class="content">
          <p>Saytning yangilangan sanasi: 19.11.2021, 17:46</p>
          <p>
            Sayt ma'lumotlaridan foydalanilganda <a href="https://karantinhimoya.uz">www.karantinhimoya.uz</a> manbasi
            ko'rsatilishi shart
          </p>
          <p>
            Saytdagi barcha materiallardan quyidagi lisenziya bo‘yicha
            foydalanish mumkin: <br />
            <a href="#">Creative Commons Attribution 4.0 International</a>
          </p>
        </div>
      </div>
      <p class="isoft">{{__("word.site creator")}}: <a href="https://isoftware.uz">iSoft group</a></p>
    </footer>

    <!-- footer end -->
    
    <!-- jQuery 3.2.1 js -->

    <script src="{{asset('frontend/libs/jquery-3.2.1.js')}}"></script>

    <!-- ---------- -->

    <script>
      $(".{{lang}}").addClass('active');
    </script>
    
    <!-- bootstrap 4.0.0 js files -->


    <!-- ---------- -->

    <!-- owl carousel 2.3.4 js files -->

    <script src="{{asset('frontend/libs/OwlCarousel2-2.3.4/dist/owl.carousel.min.js')}}"></script>

    <!-- ---------- -->

    <!-- isotope 3.0.6 js -->

    <script src="{{asset('frontend/libs/isotope.3.0.6.js')}}"></script>
    <script src="{{asset('frontend/js/isotopeActivator.js')}}"></script>

    <!-- ---------- -->

    <!-- fancybox.3.5.7.min.js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
    integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- ---------- -->

    <!-- carousel activator js file -->

    <script src="{{asset('frontend/js/carouselActivator.js')}}"></script>

    <!-- ---------- -->

    <!-- my js file -->

    <script src="{{asset('frontend/js/main.js')}}"></script>

    <!-- ---------- -->
  </body>
</html>
