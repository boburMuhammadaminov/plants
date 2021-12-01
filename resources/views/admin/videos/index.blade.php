@extends('admin.layouts.app')
@section('title')
    Videos
@endsection
@section('content')
    <!-- Create -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Video qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.videos.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title_uz">Sarlavha Uz</label>
                                <input type="text" required class="form-control" name="title_uz"
                                       placeholder="Sarlavha (uz)ni kiriting" value="{{old('title_uz')}}">
                            </div>
                            @error ('title_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="title_en">Sarlavha En</label>
                                <input type="text" required class="form-control" name="title_en"
                                       placeholder="Sarlavha (en)ni kiriting" value="{{old('title_en')}}">
                            </div>
                            @error ('title_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="title_ru">Sarlavha Ru</label>
                                <input type="text" required class="form-control" name="title_ru"
                                       placeholder="Sarlavha (ru)ni kiriting" value="{{old('title_ru')}}">
                            </div>
                            @error ('title_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="video">Video link(YouTube)</label>
                                <input type="text" required class="form-control" name="video"
                                       placeholder="Video link(YouTube)ni kiriting" value="{{old('video')}}">
                            </div>
                            @error ('video')
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
                            <h3 class="card-title">Videolar</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add"
                               class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Qo'shish
                            </a>
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
                            <th>Link</th>
                            <th>Holati</th>
                            <th>Harakatlar</th>
                        </tr>
                        @foreach($videos as $video)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ Str::limit($video->title_uz, 60) }}</td>
                                <td>{!! $video->getImage('width:150px') !!}</td>
                                <td><a href="{{ $video->video }}">{{ $video->video }}</a></td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{route('admin.activation', ['id'=>$video->id])}}" method="POST">
                                            <input type="hidden" name="type" value="vidoe">
                                            @csrf
                                            {!! $video->getStatus() !!}
                                        </form>
                                    </div>
                                </td>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.videos.show', $video->id) }}" type="button"
                                           class="btn btn-primary btn-flat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.videos.edit', $video->id) }}" type="button"
                                           class="btn btn-success btn-flat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.videos.destroy',$video->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" class="btn btn-danger btn-flat">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        {{$videos->links()}}
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
