@extends('frontend.layouts.app')

@section('content')
<style>

  #forImages img{
    width: 100% !important;
    height: auto !important;
  }
</style>
<!-- main begin -->

<section class="main">
  <div class="my-container">
    <div class="row">
      <div class="col-md-9">
        <div class="contact-wrapper">
          <div class="my-container d-block" style="padding: 0 15px !important;">
            <div class="top p-3">
              <h4>{{$blog['title_'.session('lang')]}}</h4>
            </div>
            <img src="{{asset($blog->image)}}" alt="{{$blog['title_'.session('lang')]}}" class="w-100">
            <div class="py-3" id="forImages">
              {!! $blog['content_'.session('lang')] !!}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="links">
          <ul>
            @if (count($blogs) > 0)
              <li>
                <a href="Javascript:void(0);" class="h5">{{__('word.relatedNews')}}</a>
              </li>
              @foreach ($blogs as $news)
              <li>
                <a href="{{route('newsSingle', $news->slug)}}">
                  {{$news['title_'.session('lang')]}}
                </a>
              </li>
              @endforeach
              <li>
                <a href="{{route('news', $blog['category']['slug'])}}">{{__('word.see-all')}} <i class="fas fa-angle-right"></i></a>
              </li>
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