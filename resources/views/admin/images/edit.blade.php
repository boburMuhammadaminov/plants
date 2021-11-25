@extends('admin.layouts.app')
@section('title')
    Image Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.galleries.index') }}" class="btn btn-block btn-primary ">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Rasm tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.galleries.update', $gallery->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="icon">Sarlavha Uz</label>
                            <input type="text" required class="form-control" name="title_uz"
                                   placeholder="Sarlavha (uz) kiriting" value="{{$gallery->title_uz}}">
                        </div>
                        @error ('title_uz')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Sarlavha En</label>
                            <input type="text" required class="form-control" name="title_en"
                                   placeholder="Sarlavha (en) kiriting" value="{{$gallery->title_en}}">
                        </div>
                        @error ('title_en')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Sarlavha Ru</label>
                            <input type="text" required class="form-control" name="title_ru"
                                   placeholder="Sarlavha (ru) kiriting" value="{{$gallery->title_ru}}">
                        </div>
                        @error ('title_ru')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group mt-3 mb-3">
                            <label class="d-block">Avvalgi rasm</label>
                            <div class="d-flex flex-wrap justify-content-start align-items-start">
                                @foreach ($gallery->images as $image)
                                <div class="card m-2 imageCard{{$image->id}}">
                                    <div class="card-header text-center">
                                        <button class="btn btn-danger btn-sm image{{$image->id}}" type="submit" class="btn btn-danger btn-flat">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="p-3">
                                        <img class="card-img-top" src="{{asset($image['image'])}}" style="width: 200px;">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label>Rasm</label>
                            <input type="file" required multiple class="form-control" name="images[]">
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

