@extends('admin.layouts.app')
@section('title')
    Image Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.siteImages.index') }}" class="btn btn-block btn-primary ">
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
                <form method="POST" action="{{ route('admin.siteImages.update', $image->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="icon">Sarlavha Uz</label>
                            <input type="text" required class="form-control" name="name_uz"
                                   placeholder="Sarlavha (uz) kiriting" value="{{$image->name_uz}}">
                        </div>
                        @error ('name_uz')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Sarlavha En</label>
                            <input type="text" required class="form-control" name="name_en"
                                   placeholder="Sarlavha (en) kiriting" value="{{$image->name_en}}">
                        </div>
                        @error ('name_en')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Sarlavha Ru</label>
                            <input type="text" required class="form-control" name="name_ru"
                                   placeholder="Sarlavha (ru) kiriting" value="{{$image->name_ru}}">
                        </div>
                        @error ('name_ru')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group mt-3 mb-3">
                            <label class="d-block">Avvalgi rasm</label>
                            {!! $image->getImage('width:200px') !!}
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label>Rasm</label>
                            <input type="file" class="form-control" name="image">
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

