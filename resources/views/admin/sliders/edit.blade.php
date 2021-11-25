@extends('admin.layouts.app')
@section('title')
    Slider Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.sliders.index') }}" class="btn btn-block btn-primary ">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Slayderni tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.sliders.update', $slider->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mt-3 mb-3">
                            <label class="d-block">Slayderning eski rasmi</label>
                            {!! $slider->getImage('width:200px') !!}
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label>Slayder rasmi</label>
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

