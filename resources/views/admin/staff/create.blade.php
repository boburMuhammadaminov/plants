@extends('admin.layouts.app')
@section('title')
    Jamoaga a'zo qo'shish
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <h3 class="card-title">Jamoaga a'zo qo'shish</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{route('admin.staff.index')}}"
                               class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-arrow-left"></i> Orqaga
                            </a>
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body p-0 table-responsive">
                    <form method="POST" action="{{ route('admin.staff.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name_uz">F.I.O UZ</label>
                                <input type="text" required class="form-control" name="name_uz"
                                       placeholder="F.I.O (uz)ni kiriting" value="{{old('name_uz')}}">
                            </div>
                            @error ('name_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="name_en">F.I.O EN</label>
                                <input type="text" required class="form-control" name="name_en"
                                       placeholder="F.I.O (en)ni kiriting" value="{{old('name_en')}}">
                            </div>
                            @error ('name_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="name_ru">F.I.O RU</label>
                                <input type="text" required class="form-control" name="name_ru"
                                       placeholder="F.I.O (ru)ni kiriting" value="{{old('name_ru')}}">
                            </div>
                            @error ('name_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="position_uz">Lavozimi UZ</label>
                                <input type="text" required class="form-control" name="position_uz"
                                       placeholder="Lavozimi (uz)ni kiriting" value="{{old('position_uz')}}">
                            </div>
                            @error ('position_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="position_en">Lavozimi EN</label>
                                <input type="text" required class="form-control" name="position_en"
                                       placeholder="Lavozimi (en)ni kiriting" value="{{old('position_en')}}">
                            </div>
                            @error ('position_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="position_ru">Lavozimi RU</label>
                                <input type="text" required class="form-control" name="position_ru"
                                       placeholder="Lavozimi (ru)ni kiriting" value="{{old('position_ru')}}">
                            </div>
                            @error ('position_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="phone">Telefon raqami</label>
                                <input type="text" required class="form-control" name="phone"
                                       placeholder="Telefon raqamini kiriting" value="{{old('phone')}}">
                            </div>
                            @error ('phone')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="email">Elektron pochtasi</label>
                                <input type="text" required class="form-control" name="email"
                                       placeholder="Elektron pochtasini kiriting" value="{{old('email')}}">
                            </div>
                            @error ('email')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="reception_uz">Qabul kunlari UZ(Shanba 10:00 dan 13:00 gacha)</label>
                                <input type="text" required class="form-control" name="reception_uz"
                                       placeholder="Qabul kunlari (uz)ni kiriting" value="{{old('reception_uz')}}">
                            </div>
                            @error ('reception_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="reception_en">Qabul kunlari EN(Saturday from 10:00 till 13:00)</label>
                                <input type="text" required class="form-control" name="reception_en"
                                       placeholder="Qabul kunlari (en)ni kiriting" value="{{old('reception_en')}}">
                            </div>
                            @error ('reception_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="reception_ru">Qabul kunlari RU(Суббота с 10:00 до 13:00)</label>
                                <input type="text" required class="form-control" name="reception_ru"
                                       placeholder="Qabul kunlari (ru)ni kiriting" value="{{old('reception_ru')}}">
                            </div>
                            @error ('reception_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group mt-3">
                                <label>Rasm 1x1(tavsiya etiladi)</label>
                                <input type="file" required class="form-control" name="image">
                            </div>
                            @error ('image')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <label for="floatingTextarea2 mt-3">Tarjimai hol Uz</label>
                            <div class="form-floating my-3">
                                <textarea id="noImage1" class="form-control" name="biography_uz" required
                                          style="height: 100px">{{old('biography_uz')}}</textarea>
                                @error ('biography_uz')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                            <label for="floatingTextarea2 mt-3">Tarjimai hol En</label>
                            <div class="form-floating my-3">
                                <textarea id="noImage2" class="form-control" name="biography_en" required
                                          style="height: 100px">{{old('biography_en')}}</textarea>
                                @error ('biography_en')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                            <label for="floatingTextarea2 mt-3">Tarjimai hol Ru</label>
                            <div class="form-floating my-3">
                                <textarea id="noImage3" class="form-control" name="biography_ru" required
                                          style="height: 100px">{{old('biography_ru')}}</textarea>
                                @error ('biography_ru')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                            <label for="floatingTextarea2 mt-3">Majburiyatlari Uz</label>
                            <div class="form-floating my-3">
                                <textarea id="noImage1" class="form-control" name="charges_uz" required
                                          style="height: 100px">{{old('charges_uz')}}</textarea>
                                @error ('charges_uz')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                            <label for="floatingTextarea2 mt-3">Majburiyatlari En</label>
                            <div class="form-floating my-3">
                                <textarea id="noImage2" class="form-control" name="charges_en" required
                                          style="height: 100px">{{old('charges_en')}}</textarea>
                                @error ('charges_en')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                            <label for="floatingTextarea2 mt-3">Majburiyatlari Ru</label>
                            <div class="form-floating my-3">
                                <textarea id="noImage3" class="form-control" name="charges_ru" required
                                          style="height: 100px">{{old('charges_ru')}}</textarea>
                                @error ('charges_ru')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        {{-- {{$blogs->links()}} --}}
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
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
