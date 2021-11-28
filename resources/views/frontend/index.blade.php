@extends('frontend.layouts.app')

@section('content')
<!-- top contents begin -->

<section class="top-contents">
    <div class="my-container">
      <div class="row">
        <div class="col-md-9">
          <div class="owl-carousel top-slider owl-theme">
            @foreach ($sliders as $slider)
            <div class="item">
              <img src="{{asset($slider->image)}}" alt="" />
            </div>
            @endforeach
          </div>
        </div>
        <div class="col-md-3">
          <div class="links">
            <div class="main-links">
              @foreach ($links as $link)
                <div class="button">
                  <p>
                    <a href="{{$link->link}}">
                      {{$link['title_'.session('lang')]}}
                    </a>
                  </p>
                </div>
              @endforeach
            </div>
            {{-- <div class="symbols">
              <a href="#">
                <img src="{{asset('frontend/images/symbols.png')}}" />
                <p>Davlat ramzlari</p>
              </a>
            </div> --}}
            {{-- <div class="banner">
              <a href="#">
                <img src="{{asset('frontend/images/364f0760508e6e167c0817455503531d.jpg')}}" />
                <div class="text">
                  <p>
                    2021 yil — Yoshlarni qo‘llab-quvvatlash va aholi
                    salomatligini mustahkamlash yili
                  </p>
                </div>
              </a>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
</section>

<!-- top contents end -->

<!-- news-section begin -->

<section class="news-section">
    <div class="my-container">
      <a href="#" class="d-block section-title mb-3">{{__('word.news')}}</a>
      <div class="grid" id="isotopeGrid">
          @foreach ($blogs as $blog)
            <div class="mb-3 item element-item">
                <a href="{{route('newsSingle', $blog->slug)}}"
                ><div class="date">
                    <i class="fa fa-calendar-day"></i>
                    {{$blog->created_at->format('d.m.Y')}}
                </div>
                <h4 class="title">
                    {{$blog['title_'.session('lang')]}}
                </h4>
                <img
                    src="{{asset($blog->image)}}"
                    class="image"
                />
                <p class="text">
                  {{Str::limit(strip_tags($blog['content_'.session('lang')]), 150)}}
                </p></a
                >
            </div>
          @endforeach
      </div>
    </div>
</section>

<!-- news-section end -->

<!-- media section begin -->

@if (count($galleries) == 2)
  <section class="media">
      <div class="my-container">
        <div>
          <div class="row">
            <div class="col-md-12">
              <div class="d-flex justify-content-between">
                <h4 style="color: #01CC4E;">{{__('word.gallery')}}</h4>
                <a href="{{route('gallery')}}" class="myHover">{{__('word.see-all')}}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($galleries as $gallery)
          <div class="col-md-6">
              <a href="{{route('gallerySingle', $gallery->slug)}}">
              <div class="main">
                  <img
                  class="background"
                  src="{{asset($gallery->images[0]['image'])}}" alt="{{$gallery['title_'.session('lang')]}}"
                  />
                  <div class="content">
                  <p class="title">
                    {{Str::limit($gallery['title_'.session('lang')], 55)}}
                  </p>
                  <div class="date">{{$gallery->created_at->format('d.m.Y')}}</div>
                  </div>
              </div>
              </a>
          </div>
          @endforeach
        </div>
      </div>
  </section>
@endif

<!-- media section end -->


<!-- ad begin -->

{{-- <section class="ad">
    <div class="my-container">
        <a href="https://my.gov.uz/uz/" target="_blank">
        <img src="{{asset('frontend/images/my.gov.png')}}" />
        </a>
    </div>
</section> --}}

<!-- ad end -->

<!-- useful links begin -->

<section class="useful">
  <div class="my-container">
    <h4 class="p-2 mt-3" style="color: #01CC4E;">
      {{__('word.usefullLinks')}}
    </h4>
    <div class="useful-links owl-carousel owl-theme">
      @foreach ($imageLinks as $imageLink)
      <div class="item">
          <a href="{{$imageLink->link}}">
          <img src="{{asset($imageLink->image)}}" alt="{{$imageLink['title_'.session('lang')]}}" />
          </a>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- useful links end -->

<!-- map begin -->

<section class="map">
    <div class="my-container">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1650.9055065219227!2d69.34956705549729!3d41.36857583874566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef389904ded01%3A0x85b7d5878032d7f3!2sO&#39;simliklarni%20himoya%20qilish%20ilmiy%20tadqiqot%20instituti!5e0!3m2!1sen!2s!4v1637987732273!5m2!1sen!2s"
        width="100%"
        height="450"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
      ></iframe>
    </div>
</section>

<!-- map end -->
@endsection