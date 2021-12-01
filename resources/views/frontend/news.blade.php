@extends('frontend.layouts.app')

@section('content')
<!-- main begin -->

<section class="main">
  <div class="my-container">
    <div class="row">
      <div class="col-md-9">
        <div class="top">
          <h4>{{$category['name_'.session('lang')]}}</h4>
        </div>
        <div class="news_grid">
          @foreach ($blogs as $news)
            <div class="item element-item inspeksiya">
              <a href="{{route('newsSingle', $news->slug)}}"
                ><div class="date">
                  <i class="fa fa-calendar-day"></i>
                  {{$news->created_at->format('d.m.Y')}}
                </div>
                <h4 class="title">
                  {{$news['title_'.session('lang')]}}
                </h4>
                <img
                  src="{{asset($news->image)}}"
                  class="image"
                />
                <p class="text">
                  {{Str::limit(strip_tags($news['content_'.session('lang')]), 100)}}
                </p>
              </a>
            </div>
          @endforeach
        </div>
        {{$blogs->links('frontend.layouts.pagination')}}
      </div>
      <div class="col-md-3">
        <div class="links">
          <ul>
            @if (count($categories) > 0 || Str::substr(Request::getRequestUri(), 0, 7) == '/videos' || Str::substr(Request::getRequestUri(), 0, 8) == '/gallery')
              @foreach ($categories as $news)
                @if (count($news->blogs)>0)
                  <li>
                    <a href="{{route('news', $news->slug)}}" class="
                      @if (Str::substr(Request::getRequestUri(), 0, 5) == '/news')
                        @if ($news->id === $category->id)
                          active  
                        @endif
                      @endif
                      ">
                      {{$news['name_'.session('lang')]}}
                    </a>
                  </li>
                @endif
              @endforeach
              @if (Str::substr(Request::getRequestUri(), 0, 5) == '/news')
              <li>
                <a href="{{route('videos')}}" class="
                  @if (Str::substr(Request::getRequestUri(), 0, 7) == '/videos')
                    active  
                  @endif
                  ">
                  {{__('word.video')}}
                </a>
              </li>
              <li>
                <a href="{{route('gallery')}}" class="
                  @if (Str::substr(Request::getRequestUri(), 0, 8) == '/gallery')
                    active  
                  @endif
                  ">
                  {{__('word.gallery')}}
                </a>
              </li>
                  
              @endif
            @else
              <li>
                <a href="Javascript:void(0);" class="h5">{{__('word.usefullLinks')}}</a>
              </li>
              @foreach ($links as $link)
              <li>
                <a href="{{$link->link}}">
                  {{$link['title_'.session('lang')]}}
                </a>
              </li>
              @endforeach
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- main end -->
@endsection