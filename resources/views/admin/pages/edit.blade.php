@extends('admin.layouts.app')
@section('title')
    Page Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.page.index') }}" class="btn btn-block btn-primary btn-sm">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sahifani tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.page.update', $page->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name_ru">Kategoriya</label>
                            <select name="pagesCategory_id" class="form-select">
                                <option
                                    disabled> 
                                    Open this select menu
                                </option>
                                @foreach ($categories as $category)
                                    <option
                                        @php
                                            if($category->id == $page->pagesCategory_id){
                                                echo "selected";
                                            }
                                        @endphp
                                        value="{{$category->id}}">{{$category->name_uz}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error ('pagesCategory_id')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group mb-3">
                            <label for="title_uz">Title UZ</label>
                            <input type="text" required class="form-control" name="title_uz" value="{{$page->title_uz}}"
                                   placeholder="Enter Title UZ">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title_en">Title EN</label>
                            <input type="text" required class="form-control" name="title_en" value="{{$page->title_en}}"
                                   placeholder="Enter Title EN">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title_ru">Title RU</label>
                            <input type="text" required class="form-control" name="title_ru" value="{{$page->title_ru}}"
                                   placeholder="Enter Title RU">
                        </div>

                        <label for="floatingTextarea2">Ma'lumot Uz</label>
                        <div class="form-floating">
                            <textarea id="noImage1" class="form-control" name="content_uz" required
                                      placeholder="Ma'lumot (uz)ni kiriting" id="floatingTextarea2"
                                      style="height: 100px">{{$page->content_uz}}</textarea>
                            @error ('content_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <label for="floatingTextarea2">Ma'lumot En</label>
                        <div class="form-floating mt-3">
                            <textarea id="noImage2" class="form-control" name="content_en" required
                                      placeholder="Ma'lumot (en)ni kiriting" id="floatingTextarea2"
                                      style="height: 100px">{{$page->content_en}}</textarea>
                            @error ('content_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <label for="floatingTextarea2">Ma'lumot Ru</label>
                        <div class="form-floating mt-3">
                            <textarea id="noImage3" class="form-control" name="content_ru" required
                                      placeholder="Ma'lumot (ru)ni kiriting" id="floatingTextarea2"
                                      style="height: 100px">{{$page->content_ru}}</textarea>
                            @error ('content_ru')
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
@endsection

