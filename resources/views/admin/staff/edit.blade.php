@extends('admin.layouts.app')
@section('title')
    Staff Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.staff.index') }}" class="btn btn-block btn-primary btn-sm">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Jamoa az'osini tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.staff.update', $staff->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name_ru">Kategoriya</label>
                            <select name="staffCategory_id" class="form-select">
                                <option
                                    disabled>
                                    Open this select menu
                                </option>
                                @foreach ($categories as $category)
                                    <option
                                        @php
                                            if($category->id == $staff->staffCategory_id){
                                                echo "selected";
                                            }
                                        @endphp
                                        value="{{$category->id}}">{{$category->name_uz}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error ('staffCategory_id')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group mb-3">
                            <label for="name_uz">Ism UZ</label>
                            <input type="text" required class="form-control" name="name_uz" value="{{$staff->name_uz}}"
                                   placeholder="Enter Ism UZ">
                            @error ('name_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_en">Ism EN</label>
                            <input type="text" required class="form-control" name="name_en" value="{{$staff->name_en}}"
                            placeholder="Enter Ism EN">
                            @error ('name_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_ru">Ism RU</label>
                            <input type="text" required class="form-control" name="name_ru" value="{{$staff->name_ru}}"
                                   placeholder="Enter Ism RU">
                            @error ('name_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Rasm 1x1(tafsiya etiladi)</label>
                            <div>
                                {!! $staff->getStaffImage() !!}
                            </div>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label for="position_uz">Lavozimi UZ</label>
                            <input type="text" required class="form-control" name="position_uz"
                                   placeholder="Lavozimi (uz)ni kiriting" value="{{$staff['position_uz']}}">
                        </div>
                        @error ('position_uz')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="position_en">Lavozimi EN</label>
                            <input type="text" required class="form-control" name="position_en"
                                   placeholder="Lavozimi (en)ni kiriting" value="{{$staff['position_en']}}">
                        </div>
                        @error ('position_en')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="position_ru">Lavozimi RU</label>
                            <input type="text" required class="form-control" name="position_ru"
                                   placeholder="Lavozimi (ru)ni kiriting" value="{{$staff['position_ru']}}">
                        </div>
                        @error ('position_ru')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="phone">Telefon raqami</label>
                            <input type="text" required class="form-control" name="phone"
                                   placeholder="Telefon raqamini kiriting" value="{{$staff['phone']}}">
                        </div>
                        @error ('phone')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="email">Elektron pochtasi</label>
                            <input type="text" required class="form-control" name="email"
                                   placeholder="Elektron pochtasini kiriting" value="{{$staff['email']}}">
                        </div>
                        @error ('email')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="reception_uz">Qabul kunlari UZ(Shanba 10:00 dan 13:00 gacha)</label>
                            <input type="text" required class="form-control" name="reception_uz"
                                   placeholder="Qabul kunlari (uz)ni kiriting" value="{{$staff['reception_uz']}}">
                        </div>
                        @error ('reception_uz')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="reception_en">Qabul kunlari EN(Saturday from 10:00 till 13:00)</label>
                            <input type="text" required class="form-control" name="reception_en"
                                   placeholder="Qabul kunlari (en)ni kiriting" value="{{$staff['reception_en']}}">
                        </div>
                        @error ('reception_en')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="reception_ru">Qabul kunlari RU(Суббота с 10:00 до 13:00)</label>
                            <input type="text" required class="form-control" name="reception_ru"
                                   placeholder="Qabul kunlari (ru)ni kiriting" value="{{$staff['reception_ru']}}">
                        </div>
                        @error ('reception_ru')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <label for="floatingTextarea2 mt-3">Tarjimai hol Uz</label>
                        <div class="form-floating my-3">
                            <textarea id="noImage1" class="form-control" name="biography_uz" required
                                        style="height: 100px">{{$staff['biography_uz']}}</textarea>
                            @error ('biography_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <label for="floatingTextarea2 mt-3">Tarjimai hol En</label>
                        <div class="form-floating my-3">
                            <textarea id="noImage2" class="form-control" name="biography_en" required
                                        style="height: 100px">{{$staff['biography_en']}}</textarea>
                            @error ('biography_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <label for="floatingTextarea2 mt-3">Tarjimai hol Ru</label>
                        <div class="form-floating my-3">
                            <textarea id="noImage3" class="form-control" name="biography_ru" required
                                        style="height: 100px">{{$staff['biography_ru']}}</textarea>
                            @error ('biography_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <label for="floatingTextarea2 mt-3">Majburiyatlari Uz</label>
                        <div class="form-floating my-3">
                            <textarea id="noImage1" class="form-control" name="charges_uz" required
                                        style="height: 100px">{{$staff['charges_uz']}}</textarea>
                            @error ('charges_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <label for="floatingTextarea2 mt-3">Majburiyatlari En</label>
                        <div class="form-floating my-3">
                            <textarea id="noImage2" class="form-control" name="charges_en" required
                                        style="height: 100px">{{$staff['charges_en']}}</textarea>
                            @error ('charges_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <label for="floatingTextarea2 mt-3">Majburiyatlari Ru</label>
                        <div class="form-floating my-3">
                            <textarea id="noImage3" class="form-control" name="charges_ru" required
                                        style="height: 100px">{{$staff['charges_ru']}}</textarea>
                            @error ('charges_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>

                        
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
                    </div>
            </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    </div>
@endsection
@section('script')
@section('script')
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'biography_uz', {
            'filebrowserImageBrowseUrl' : '/elfinder/ckeditor',
            'filebrowserBrowseUrl' : '/elfinder/ckeditor',
        } );
        CKEDITOR.replace( 'biography_en', {
            'filebrowserImageBrowseUrl' : '/elfinder/ckeditor',
            'filebrowserBrowseUrl' : '/elfinder/ckeditor',
        } );
        CKEDITOR.replace( 'biography_ru', {
            'filebrowserImageBrowseUrl' : '/elfinder/ckeditor',
            'filebrowserBrowseUrl' : '/elfinder/ckeditor',
        } );
        CKEDITOR.replace( 'charges_uz', {
            'filebrowserImageBrowseUrl' : '/elfinder/ckeditor',
            'filebrowserBrowseUrl' : '/elfinder/ckeditor',
        } );
        CKEDITOR.replace( 'charges_en', {
            'filebrowserImageBrowseUrl' : '/elfinder/ckeditor',
            'filebrowserBrowseUrl' : '/elfinder/ckeditor',
        } );
        CKEDITOR.replace( 'charges_ru', {
            'filebrowserImageBrowseUrl' : '/elfinder/ckeditor',
            'filebrowserBrowseUrl' : '/elfinder/ckeditor',
        } );
    </script>
    @if( session()->has('inactive') )
        <script>
            toastr.warning('{{ session()->get('inactive') }}');
        </script>
    @endif
@endsection

