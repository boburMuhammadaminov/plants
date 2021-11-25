@extends('admin.layouts.app')
@section('title')
    Sahifa qo'shish
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <h3 class="card-title">Sahifa qo'shish</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{route('admin.page.index')}}"
                               class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-arrow-left"></i> Orqaga
                            </a>
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body p-0 table-responsive">
                    <form method="POST" action="{{ route('admin.page.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Kategoriya</label>
                                <select name="pagesCategory_id" class="form-select mb-3">
                                    <option disabled selected>Ushbu tanlash menyusini oching</option>
                                    @if(count($categories) > 0)
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name_uz}}</option>
                                        @endforeach
                                    @else
                                        <option disabled selected>Kategoriyalar mavjud emas, avval kategoriya yarating</option>
                                    @endif
                                </select>
                                @error ('pagesCategory_id')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title_uz">Sarlovha UZ</label>
                                <input type="text" required class="form-control" name="title_uz"
                                        placeholder="Sarlovha (uz)ni kiriting" value="{{old('title_uz')}}">
                            </div>
                            @error ('title_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="title_en">Sarlovha EN</label>
                                <input type="text" required class="form-control" name="title_en"
                                        placeholder="Sarlovha (en)ni kiriting" value="{{old('title_en')}}">
                            </div>
                            @error ('title_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="title_ru">Sarlovha RU</label>
                                <input type="text" required class="form-control" name="title_ru"
                                        placeholder="Sarlovha (ru)ni kiriting" value="{{old('title_ru')}}">
                            </div>
                            @error ('title_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <label for="floatingTextarea2">Ma'lumot Uz</label>
                            <div class="form-floating">
                                <textarea id="noImage1" class="form-control" name="content_uz" required
                                            style="height: 100px">{{old('content_uz')}}</textarea>
                                @error ('content_uz')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                            <label for="floatingTextarea2">Ma'lumot En</label>
                            <div class="form-floating mt-3">
                                <textarea id="noImage2" class="form-control" name="content_en" required
                                            style="height: 100px">{{old('content_en')}}</textarea>
                                @error ('content_en')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                            <label for="floatingTextarea2">Ma'lumot Ru</label>
                            <div class="form-floating mt-3">
                                <textarea id="noImage3" class="form-control" name="content_ru" required
                                            style="height: 100px">{{old('content_ru')}}</textarea>
                                @error ('content_ru')
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
        CKEDITOR.replace( 'content_uz', {
            'filebrowserImageBrowseUrl' : '/elfinder/ckeditor',
            'filebrowserBrowseUrl' : '/elfinder/ckeditor',
        } );
        CKEDITOR.replace( 'content_en', {
            'filebrowserImageBrowseUrl' : '/elfinder/ckeditor',
            'filebrowserBrowseUrl' : '/elfinder/ckeditor',
        } );
        CKEDITOR.replace( 'content_ru', {
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
