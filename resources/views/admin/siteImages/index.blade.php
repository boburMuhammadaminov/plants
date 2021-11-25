@extends('admin.layouts.app')
@section('style')
    <!-- Bootstrap-Iconpicker -->
{{--    <link rel="stylesheet" href="dist/css/bootstrap-iconpicker.min.css"/>--}}
@endsection
@section('title')
    Images
@endsection
@section('content')
    <!-- Create -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rasm qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.siteImages.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name_uz">Sarlavha Uz</label>
                                <input type="text" required class="form-control" name="name_uz"
                                       placeholder="Sarlavha (uz)ni kiriting" value="{{old('name_uz')}}">
                            </div>
                            @error ('name_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="name_en">Sarlavha En</label>
                                <input type="text" required class="form-control" name="name_en"
                                       placeholder="Sarlavha (en)ni kiriting" value="{{old('name_en')}}">
                            </div>
                            @error ('name_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="name_ru">Sarlavha Ru</label>
                                <input type="text" required class="form-control" name="name_ru"
                                       placeholder="Sarlavha (ru)ni kiriting" value="{{old('name_ru')}}">
                            </div>
                            @error ('name_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group mt-3 mb-3">
                                <label>Rasm</label>
                                <input type="file" required class="form-control" name="image">
                            </div>
                            @error ('image')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
                    {{--end form--}}
                </div>

            </div>
        </div>
    </div>
    {{--    End Create--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <h3 class="card-title">Rasmlar</h3>
                        </div>
                        <div class="col-md-2">
                            {{-- <a type="button" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add"
                               class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Qo'shish
                            </a> --}}
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <!-- /.card-header -->
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Sarlavha UZ</th>
                            <th>Rasm</th>
                            <th>Harakatlar</th>
                        </tr>
                        @foreach($images as $image)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $image->name_uz }}</td>
                                <td>{!! $image->getImage('width:150px') !!}</td>
                                
                                <td>
                                    <div class="btn-group">
                                        {{-- <a href="{{ route('admin.images.show', $image->id) }}" type="button"
                                           class="btn btn-primary btn-flat">
                                            <i class="fas fa-eye"></i>
                                        </a> --}}
                                        <a href="{{ route('admin.siteImages.edit', $image->id) }}" type="button"
                                           class="btn btn-success btn-flat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        {{$images->links()}}
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('script')
    @if(session()->has('inactive'))
        <script>
            toastr.warning('{{ session()->get('inactive') }}');
        </script>
    @endif
@endsection
