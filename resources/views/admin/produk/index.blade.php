@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="text-end mt-5">
                    <a href="/produk/create" class="btn btn-primary rounded-1 border-0">Create</a>
                </div>
                @if(SESSION('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{SESSION('success')}}
                </div>
                @endif
                <div class="card mt-3 shadow-sm border-0">
                    <div class="card-body">
                <div class="table-responsive mt-2">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($produk as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img width="130px" src="{{ asset('storage/gambar/'.$data->image) }}" alt=""></td>
                                <td>{{$data->name}}</td>
                                <td>{{number_format($data->harga)}}</td>
                                <td>{{$data->stok}}</td>
                                <td class="d-flex">
                                    <a href="/produk/{{$data->id}}/edit" class="btn btn-primary border-0 btn-sm me-1">Edit</a>
                                    <form action="/produk/{{$data->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                        <button onclick="return confirm('Apakah Kamu Ingin Menghapus {{$data->name}}?')" class="btn btn-danger btn-sm">Delete</button>
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
        </div>
    </div>
@endsection
