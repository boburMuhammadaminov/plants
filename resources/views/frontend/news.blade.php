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
            @foreach ($categories as $cat)
              <li><a href="{{route('news', $cat->slug)}}" class="
              @if ($cat->id === $category->id)
                active  
              @endif  
              ">
                {{$cat['name_'.session('lang')]}}
              </a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- main end -->
@endsection