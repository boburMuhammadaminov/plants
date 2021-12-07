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
              <h4>{{$page['title_'.session('lang')]}}</h4>
            </div>
            <div class="py-3" id="forImages">
              {!! $page['content_'.session('lang')] !!}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="links">
          <ul>
            @if (count($pages) > 0 || count($allStaff) > 0)
              @if (Str::substr(Request::getRequestUri(), 0, 6) == '/staff')
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
              @endif
              @foreach ($pages as $news)
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
              @if ($page->category->slug == 'agency')
                <li>
                  <a href="{{route('contact')}}" class="
                    @if (Str::substr(Request::getRequestUri(), 0, 8) == '/contact')
                      active  
                    @endif
                    ">
                    {{__('word.contact')}} 
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