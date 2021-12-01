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
      {{-- <div class="col-md-12">
        hiiii
      </div> --}}
      <div class="col-md-9">
        <div class="top">
          <h4>{{__('word.site map')}}</h4>
        </div>
        <div class="management_grid">
          
          <ul class="list-group">
            <li class="list-group-item">
              <a class="nav-link myHover" href="{{route('home')}}">
                {{__('word.home')}} 
              </a>
            </li>
            <li class="list-group-item">
              <a class="nav-link myHover" href="{{route('staff', 'hi')}}">
                {{__('word.ourStaff')}} 
              </a>
            </li>
            
            
            @if (count($pagesCategories)>0)
              @foreach ($pagesCategories as $item)
                <li class="list-group-item">
                  <a class="nav-link myHover">
                    {{$item['name_'.session('lang')]}} 
                  </a>
                </li>
                @if ($item->slug == 'agency')
                  @foreach ($allStaff as $staff)
                    @if (count($staff->staff)>0)
                      <li class="list-group-item" style="padding-left: 40px;">
                        <a class="nav-link myHover" href="{{route('staff', $staff->slug)}}">
                          {{($staff['name_'.session('lang')])}} 
                        </a>
                      </li>
                    @endif
                  @endforeach
                @endif
                @foreach ($item->pages as $page)
                  <li class="list-group-item" style="padding-left: 40px;">
                    <a class="nav-link myHover" href="{{route('pagesSingle', $page->slug)}}">
                      {{$page['title_'.session('lang')]}}
                    </a>
                  </li>
                @endforeach
                @if ($item->slug == 'information-service')
                  @foreach ($newsCategories as $news)
                    <li class="list-group-item" style="padding-left: 40px;">
                      <a class="nav-link myHover" href="{{route('news', $news->slug)}}">
                        {{$news['name_'.session('lang')]}}
                      </a>
                    </li>
                  @endforeach
                  <li class="list-group-item" style="padding-left: 40px;">
                    <a class="nav-link myHover" href="{{route('videos')}}">
                      {{__('word.video')}} 
                    </a>
                  </li>
                  <li class="list-group-item" style="padding-left: 40px;">
                    <a class="nav-link myHover" href="{{route('gallery')}}">
                      {{__('word.gallery')}} 
                    </a>
                  </li>
                @endif
                @if ($item->slug == 'agency')
                  <li class="list-group-item" style="padding-left: 40px;">
                    <a class="nav-link myHover" href="{{route('contact')}}">
                      {{__('word.contact')}} 
                    </a>
                  </li>
                @endif
              @endforeach
            @endif
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="links">
          <ul>
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
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- main end -->
@endsection