@extends('frontend.layouts.app')

@section('content')
<!-- main begin -->

<section class="main">
  <div class="my-container">
    <div class="row">
      <div class="row">
        <div class="col-md-12">
          <h1 class="mainTitle">
            {{$gallery['title_'.session('lang')]}}
          </h1>
          <div class="grid">
            @foreach ($gallery->images as $image)
            <div data-fancybox="gallery" class="grouped_elements" rel="group1" href="{{asset($image->image)}}">
              <img src="{{asset($image->image)}}" alt="{{$gallery['title_'.session('lang')]}}" />
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- main end -->
@endsection