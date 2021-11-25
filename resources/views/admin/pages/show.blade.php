@extends('admin.layouts.app')
@section('title')
    Page show
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Sahifa namoyishi</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{ route('admin.page.index') }}" class="btn btn-block btn-primary btn-sm">
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
                            <td>{{ $page->id }}</td>
                        </tr>
                        <tr>
                            <th>Holati</th>
                            <td>{!! $page->getStatus() !!} </td>
                        </tr>
                        <tr>
                            <th>Sarlovha UZ</th>
                            <td>{{ $page->title_uz }}</td>
                        </tr>
                        <tr>
                            <th>Sarlovha EN</th>
                            <td>{{ $page->title_en }}</td>
                        </tr>
                        <tr>
                            <th>Sarlovha RU</th>
                            <td>{{ $page->title_ru }}</td>
                        </tr>
                        <tr>
                            <th>Ma'lumot UZ</th>
                            <td>
                                {!! $page->content_uz !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Ma'lumot RU</th>
                            <td>
                                {!! $page->content_ru !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Ma'lumot EN</th>
                            <td>
                                {!! $page->content_en !!}
                            </td>
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
