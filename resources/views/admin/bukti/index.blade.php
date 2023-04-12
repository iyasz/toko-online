@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 mt-5">
                @if(SESSION('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{SESSION('success')}}
                </div>
                @endif
                <div class="card mt-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive mt-2">
                            <table class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Code Invoice</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($bukti as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->invoice_code}}</td>
                                        <td><img width="120px" src="{{asset('storage/gambar/'.$data->gambar)}}" alt=""></td>
                                        <td><a onclick="return confirm('Yakin ingin menyelesaikan ini?')" href="/status/{{$data->id}}" class="btn btn-primary btn-sm border-0"><i class="bi bi-pen"></i> Selesai</a></td>
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
