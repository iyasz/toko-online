@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="text-end mt-5">
                    <a href="/category/create" class="btn btn-primary rounded-1 border-0">Create</a>
                </div>
                @if(SESSION('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{SESSION('success')}}
                </div>
                @endif
                <div class="table-responsive mt-2">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($category as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{ asset('storage/gambar/'.$data->icon) }}" alt=""></td>
                                <td>{{$data->name}}</td>
                                <td>
                                    <a href="/category/{{$data->id}}/edit" class="btn btn-primary border-0">Edit</a>
                                    <form action="/category/{{$data->id}}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                        <button onclick="return confirm('Apakah Kamu Ingin Menghapus {{$data->name}}?')" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
