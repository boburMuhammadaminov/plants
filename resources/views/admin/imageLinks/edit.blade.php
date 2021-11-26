@extends('admin.layouts.app')
@section('title')
    Usefull link(image) Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.imageLinks.index') }}" class="btn btn-block btn-primary ">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-header">
                    <h3 class="card-title">Foydali link(rasm) tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.imageLinks.update', $imageLink->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="icon">Sarlavha Uz</label>
                            <input type="text" required class="form-control" name="title_uz"
                                   placeholder="Sarlavha (uz) kiriting" value="{{$imageLink->title_uz}}">
                        </div>
                        @error ('title_uz')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Sarlavha En</label>
                            <input type="text" required class="form-control" name="title_en"
                                   placeholder="Sarlavha (en) kiriting" value="{{$imageLink->title_en}}">
                        </div>
                        @error ('title_en')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Sarlavha Ru</label>
                            <input type="text" required class="form-control" name="title_ru"
                                   placeholder="Sarlavha (ru) kiriting" value="{{$imageLink->title_ru}}">
                        </div>
                        @error ('title_ru')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" required class="form-control" name="link"
                                   placeholder="Linkni kiriting" value="{{$imageLink->link}}">
                        </div>
                        @error ('link')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group mt-3 mb-3">
                            <label class="d-block">Avvalgi rasm</label>
                            <td>{!! $imageLink->getImage('width:150px') !!}</td>
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label>Rasm</label>
                            <input type="file" required class="form-control" name="image">
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

