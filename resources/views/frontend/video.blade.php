@extends('frontend.layouts.app')

@section('content')
  <!-- main begin -->

  <section class="main">
    <div class="my-container">
      <div class="row">
        <div class="col-md-9">
          <div class="top">
            <h4>{{__('word.video')}}</h4>
          </div>
          <div class="video_grid">
            @foreach ($videos as $video)
            <div class="video-item">
              <div class="top">
                <a data-fancybox data-width="100%" href="{{$video->video}}">
                  <img class="card-img-top img-fluid" src="{{$video->thumbnail}}" alt="{{$video['title_'.session('lang')]}}" />
                  <img class="play" src="frontend/images/video-play.svg" alt="play-image">
                </a>
              </div>
              <div class="content">
                <p class="title">{{ Str::limit($video['title_'.session('lang')], 30) }} </p>
              </div>
            </div>
            @endforeach
          </div>
          {{$videos->links('frontend.layouts.pagination')}}
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
                @if (Str::substr(Request::getRequestUri(), 0, 5) == '/news' || Str::substr(Request::getRequestUri(), 0, 8) == '/gallery' || Str::substr(Request::getRequestUri(), 0, 7) == '/videos')
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