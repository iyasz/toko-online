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
                                    <th>Nama</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($inv as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->invoice_code}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>Rp. {{number_format($data->total_price)}}</td>
                                        <td><div class="rounded-4 px-3 py-1 text-white @if($data->status == 1) badge-danger @else badge-primary @endif">@if($data->status == 1) Belum Bayar @elseif($data->status == 2) Belum Di proses @elseif($data->status == 3) Sedang Di proses @elseif($data->status == 4) Sedang Dikirim @else Selesai @endif</div> </td>
                                        <td>
                                            <a href="/pesanan/{{$data->id}}" class="btn btn-primary border-0 btn-sm"><i class="bi bi-eye"></i></a>
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
