@extends('admin.layouts.app')
@section('title')
    Useful link(image) show
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Foydali link(rasm) namoyishi</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{ route('admin.imageLinks.index') }}" class="btn btn-block btn-primary btn-sm">
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
                            <td>{{ $imageLink->id }}</td>
                        </tr>
                        <tr>
                            <th>Holati</th>
                            <td>{!! $imageLink->getStatus() !!} </td>
                        </tr>
                        <tr>
                            <th>Sarlavha UZ</th>
                            <td>{{ $imageLink->title_uz }}</td>
                        </tr>
                        <tr>
                            <th>Sarlavha EN</th>
                            <td>{{ $imageLink->title_en }}</td>
                        </tr>
                        <tr>
                            <th>Sarlavha RU</th>
                            <td>{{ $imageLink->title_ru }}</td>
                        </tr>
                        <tr>
                            <th>Rasm</th>
                            <td>{!! $imageLink->getImage('width:300px') !!}</td>
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
