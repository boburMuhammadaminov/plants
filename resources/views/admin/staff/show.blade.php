@extends('admin.layouts.app')
@section('title')
    Satff show
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Jamoa az'osi namoyishi</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{ route('admin.staff.index') }}" class="btn btn-block btn-primary btn-sm">
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
                            <td>{{ $staff->id }}</td>
                        </tr>
                        <tr>
                            <th>Holati</th>
                            <td>{!! $staff->getStatusBadge() !!} </td>
                        </tr>
                        <tr>
                            <th>Rasm</th>
                            <td>{!! $staff->getStaffImage('width:200px') !!}</td>
                        </tr>
                        <tr>
                            <th>F.I.O UZ</th>
                            <td>{{ $staff->name_uz }}</td>
                        </tr>
                        <tr>
                            <th>F.I.O EN</th>
                            <td>{{ $staff->name_en }}</td>
                        </tr>
                        <tr>
                            <th>F.I.O RU</th>
                            <td>{{ $staff->name_ru }}</td>
                        </tr>
                        <tr>
                            <th>Lavozimi UZ</th>
                            <td>{{ $staff->position_uz }}</td>
                        </tr>
                        <tr>
                            <th>Lavozimi EN</th>
                            <td>{{ $staff->position_en }}</td>
                        </tr>
                        <tr>
                            <th>Lavozimi RU</th>
                            <td>{{ $staff->position_ru }}</td>
                        </tr>
                        <tr>
                            <th>Telefon raqami</th>
                            <td>{{ $staff->phone }}</td>
                        </tr>
                        <tr>
                            <th>Elektron manzili</th>
                            <td>{{ $staff->email }}</td>
                        </tr>
                        <tr>
                            <th>Qabul kunlari UZ</th>
                            <td>{{ $staff->reception_uz }}</td>
                        </tr>
                        <tr>
                            <th>Qabul kunlari EN</th>
                            <td>{{ $staff->reception_en }}</td>
                        </tr>
                        <tr>
                            <th>Qabul kunlari RU</th>
                            <td>{{ $staff->reception_ru }}</td>
                        </tr>
                        <tr>
                            <th>Tarjimai holi UZ</th>
                            <td>
                                {!! $staff->biography_uz !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Tarjimai holi RU</th>
                            <td>
                                {!! $staff->biography_ru !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Tarjimai holi EN</th>
                            <td>
                                {!! $staff->biography_en !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Majburiyatlari UZ</th>
                            <td>
                                {!! $staff->charges_uz !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Majburiyatlari RU</th>
                            <td>
                                {!! $staff->charges_ru !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Majburiyatlari EN</th>
                            <td>
                                {!! $staff->charges_en !!}
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
