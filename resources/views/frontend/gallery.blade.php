@extends('frontend.layouts.app')

@section('content')
<!-- main begin -->

<section class="main">
  <div class="my-container">
    <div class="row">
      <div class="col-md-9">
        <div class="top">
          <h4>{{__('word.gallery')}}</h4>
        </div>
        <div class="gallery_grid">
          @foreach ($galleries as $gallery)
          <a href="{{route('gallerySingle', $gallery->slug)}}" class="gallery_item">
            <img src="{{asset($gallery->images[0]['image'])}}" alt="{{$gallery['title_'.session('lang')]}}" />
            <div class="content">
              <p class="text">
                {{$gallery['title_'.session('lang')]}}
              </p>
              <div class="date">{{$gallery->created_at->format('d.m.Y')}}</div>
            </div>
          </a>
          @endforeach
        </div>
        {{$galleries->links('frontend.layouts.pagination')}}
      </div>
      <div class="col-md-3">
        <div class="links">
          <ul>
            <li>
              <a href="Javascript:void(0);" class="h5">Foydali halovalar</a>
            </li>
            @foreach ($links as $link)
              <li>
                <a href="{{$link->link}}">
                  {{$link['title_'.session('lang')]}} 
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- main end -->
@endsection