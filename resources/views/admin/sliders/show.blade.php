@extends('admin.layouts.app')
@section('title')
    Slider show
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Slayder namoyishi</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{ route('admin.sliders.index') }}" class="btn btn-block btn-primary btn-sm">
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
                            <td>{{ $slider->id }}</td>
                        </tr>
                        <tr>
                            <th>Holati</th>
                            <td>{!! $slider->getStatus() !!} </td>
                        </tr>
                        <tr>
                            <th>Rasm</th>
                            <td>{!! $slider->getImage('width:300px') !!}</td>
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
