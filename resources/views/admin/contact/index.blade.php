@extends('admin.layouts.app')
@section('title')
    SmS
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            @if (count($read)>0)
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 p-3">
                            <a href="{{route('admin.contact.archive')}}" class="card-title cursor-pointer" style="cursor: pointer;">Arxivni ko'rish ({{count($read)}})</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 p-3">
                            <h3 class="card-title">Yangi xabarlar</h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Ism</th>
                            <th>Email</th>
                            <th>Xabar</th>
                            <th>Harakatlar</th>
                        </tr>
                        @foreach($unread as $contact)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{\Illuminate\Support\Str::limit($contact->sms, 50)}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.contact.show', $contact->id) }}" type="button"
                                           class="btn btn-primary btn-flat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{route('admin.contact.destroy', $contact->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-flat" type="submit" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$unread->links()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
