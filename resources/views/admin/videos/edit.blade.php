@extends('admin.layouts.app')
@section('title')
    Video Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.videos.index') }}" class="btn btn-block btn-primary ">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Videoni tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.videos.update', $video->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="icon">Sarlavha Uz</label>
                            <input type="text" required class="form-control" name="title_uz"
                                   placeholder="Sarlavha (uz) kiriting" value="{{$video->title_uz}}">
                        </div>
                        @error ('title_uz')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Sarlavha En</label>
                            <input type="text" required class="form-control" name="title_en"
                                   placeholder="Sarlavha (en) kiriting" value="{{$video->title_en}}">
                        </div>
                        @error ('title_en')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Sarlavha Ru</label>
                            <input type="text" required class="form-control" name="title_ru"
                                   placeholder="Sarlavha (ru) kiriting" value="{{$video->title_ru}}">
                        </div>
                        @error ('title_ru')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Video link(YouTube) - <a href="{{ $video->video }}" target="_blank">Ko'rish</a></label>
                            <input type="text" required class="form-control" name="video"
                                   placeholder="Video link(YouTube)ni kiriting" value="{{$video->video}}">
                        </div>
                        @error ('title_ru')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group mt-3 mb-3">
                            <label class="d-block">Rasmi</label>
                            {!! $video->getImage('width:150px') !!}
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
                    </div>
                </form>
            </div>
        <!-- /.card -->
        </div>
    </div>
@endsection

