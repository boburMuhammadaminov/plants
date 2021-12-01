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
        <div class="top">
          <h4>{{ $staffs['name_'.session('lang')] }}</h4>
        </div>
        <div class="management_grid">
          @if (count($staffs->staff) == 0)
            <h2>{{__('word.noData')}}</h2>
          @else
            @foreach ($staffs->staff as $staff)
            <div class="item">
              <ul class="nav nav-tabs" id="myTab{{$staff->id}}" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab{{$staff->id}}" data-bs-toggle="tab" data-bs-target="#home{{$staff->id}}" type="button" role="tab" aria-controls="home{{$staff->id}}" aria-selected="true">{{__('word.information')}}</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab{{$staff->id}}" data-bs-toggle="tab" data-bs-target="#profile{{$staff->id}}" type="button" role="tab" aria-controls="profile{{$staff->id}}" aria-selected="false">{{__('word.autobiography')}}</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab{{$staff->id}}" data-bs-toggle="tab" data-bs-target="#contact{{$staff->id}}" type="button" role="tab" aria-controls="contact{{$staff->id}}" aria-selected="false">{{__('word.charges')}}</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContentmyTab{{$staff->id}}">
                <div
                  class="tab-pane fade show active home"
                  id="home{{$staff->id}}"
                  role="tabpanel"
                  aria-labelledby="home-tab{{$staff->id}}"
                  >
                  <div class="wrapper">
                    <img src="{{asset($staff->image)}}" />
                    <div class="text">
                      <p class="job">{{$staff['position_'.session('lang')]}}</p>
                      <p class="name">{{$staff['name_'.session('lang')]}}</p>
                      <p class="about"><span>{{__('word.staffPhone')}}:</span> {{$staff->phone}}</p>
                      <p class="about">
                        <span>{{__('word.staffEmail')}}:</span><a class="myHover" href="mailto:{{$staff->email}}"> {{$staff->email}}</a>
                      </p>
                      <p class="about">
                        <span>{{__('word.staffReception')}}:</span> {{$staff['reception_'.session('lang')]}}
                      </p>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade profile"
                  id="profile{{$staff->id}}"
                  role="tabpanel"
                  aria-labelledby="profile-tab{{$staff->id}}"
                  >
                  <div class="wrapper">
                    <ul>
                      <li>
                        {!! $staff['biography_'.session('lang')] !!}
                      </li>
                    </ul>
                  </div>
                </div>
                <div
                  class="tab-pane fade contact"
                  id="contact{{$staff->id}}"
                  role="tabpanel"
                  aria-labelledby="contact-tab{{$staff->id}}"
                  >
                  <div class="wrapper">
                    <ul>
                      <li>
                        {!! $staff['charges_'.session('lang')] !!}
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          @endif
        </div>
      </div>
      <div class="col-md-3">
        <div class="links">
          <ul>
            @if (count($pages->pages) > 0 || count($allStaff) > 0)
              @foreach ($allStaff as $staff)
              @if (count($staff->staff)>0)
                <li>
                  <a href="{{route('staff', $staff->slug)}}" class="
                    @if (Str::substr(Request::getRequestUri(), 0, 6) == '/staff')
                      @if ($staffs->id === $staff->id)
                        active  
                      @endif 
                    @endif
                    ">
                    {{$staff['name_'.session('lang')]}}
                  </a>
                </li>
                @endif
              @endforeach
              @foreach ($pages->pages as $news)
              <li>
                <a href="{{route('pagesSingle', $news->slug)}}" class="

                  @if (Str::substr(Request::getRequestUri(), 0, 6) !== '/staff')
                    @if ($page->id === $news->id)
                      active  
                    @endif 
                  @endif
                  ">
                  {{$news['title_'.session('lang')]}}
                </a>
              </li>
              @endforeach
              <li>
                <a href="{{route('contact')}}" class="
                  @if (Str::substr(Request::getRequestUri(), 0, 8) == '/contact')
                    active  
                  @endif
                  ">
                  {{__('word.contact')}} 
                </a>
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