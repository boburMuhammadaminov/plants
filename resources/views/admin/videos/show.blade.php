@extends('admin.layouts.app')
@section('title')
    Video show
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Video namoyishi</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{ route('admin.videos.index') }}" class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-arrow-left"></i> Orqaga
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm">
                        <tr>
                            <th>#</th>
                            <td>{{ $video->id }}</td>
                        </tr>
                        <tr>
                            <th>Holati</th>
                            <td>{!! $video->getStatus() !!} </td>
                        </tr>
                        <tr>
                            <th>Sarlavha UZ</th>
                            <td>{{ $video->title_uz }}</td>
                        </tr>
                        <tr>
                            <th>Sarlavha EN</th>
                            <td>{{ $video->title_en }}</td>
                        </tr>
                        <tr>
                            <th>Sarlavha RU</th>
                            <td>{{ $video->title_ru }}</td>
                        </tr>
                        <tr>
                            <th>Video link(YouTube)</th>
                            <td><a href="{{ $video->video }}">{{ $video->video }}</a></td>
                        </tr>
                        <tr>
                            <th>Rasm</th>
                            <td>{!! $video->getImage('width:300px') !!}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
