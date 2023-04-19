@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-end mt-5">
                    <a href="/character/create" class="btn btn-primary rounded-1 border-0">Create</a>
                </div>
                @if (SESSION('success'))
                    <div class="alert alert-success mt-3" role="alert">
                        {{ SESSION('success') }}
                    </div>
                @endif
                <div class="card mt-3 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive mt-2">
                            <table class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($character as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                <a href="/character/{{ $data->id }}/edit"
                                                    class="btn btn-primary border-0">Edit</a>
                                                <form action="/character/{{ $data->id }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="return confirm('Apakah Kamu Ingin Menghapus {{ $data->name }}?')"
                                                        class="btn btn-danger">Delete</button>
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
