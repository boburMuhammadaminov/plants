@extends('admin.layouts.app')
@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/dropzone/min/dropzone.min.css')}}">
@endsection
@section('title')
    Blogs
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <h3 class="card-title">Yangiliklar</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{route('admin.blogs.create')}}"
                               class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Qo'shish
                            </a>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            <!-- /.card-header -->
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Sarlavha UZ</th>
                            {{-- <th>Name EN</th> --}}
                            <th>Rasm</th>
                            <th>Holati</th>
                            <th>Harakatlar</th>
                        </tr>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $blog->title_uz }}</td>
                                <td>
                                    {!! $blog->getBlogImage() !!}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{route('admin.activation', ['id'=>$blog->id])}}" method="POST">
                                            <input type="hidden" name="type" value="blog">
                                            @csrf
                                            {!! $blog->getStatusBadge() !!}
                                        </form>
                                    </div>
                                </td>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.blogs.show', $blog->id) }}" type="button"
                                           class="btn btn-primary btn-flat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" type="button"
                                           class="btn btn-success btn-flat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.blogs.destroy',$blog->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                                    type="submit" class="btn btn-danger btn-flat"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        {{$blogs->links()}}
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('../../plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()

            let options = {
                height: 300,
                lang: 'uz-UZ',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph', 'height']],
                    // [ 'table', [ 'table' ] ],
                    ['insert', ['link']],
                    ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
                ]
            };

            $("#noImage3").summernote(options);
            $("#noImage1").summernote(options);
            $("#noImage2").summernote(options);
        })

    </script>
    @if( session()->has('inactive') )
        <script>
            toastr.warning('{{ session()->get('inactive') }}');
        </script>
    @endif
@endsection
