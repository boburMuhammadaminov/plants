@extends('admin.layouts.app')
@section('title')
    Jamoa Kategoriyasini tahrirlash
@endsection
@section('content')
    <a href="{{route('admin.catStaff.index')}}" class="btn-primary btn btn-sm mb-3"><i class="bi bi-arrow-left-short"></i> Orqaga</a>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Jamoa Kategoriyasini tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.catStaff.update', $staffCategory->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name_uz">Nomi UZ</label>
                            <input type="text" required class="form-control" name="name_uz" placeholder="Nomi (uz)ni kiriting" value="{{ $staffCategory->name_uz }}">
                        </div>
                        @error ('name_uz')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="name_en">Nomi EN</label>
                            <input type="text" required class="form-control" name="name_en" placeholder="Nomi (en)ni kiriting" value="{{ $staffCategory->name_en }}">
                        </div>
                        @error ('name_en')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="name_RU">Nomi RU</label>
                            <input type="text" required class="form-control" name="name_ru" placeholder="Nomi (ru)ni kiriting" value="{{ $staffCategory->name_ru }}">
                        </div>
                        @error ('name_ru')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
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
