@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 mt-5">
                @if (SESSION('success'))
                    <div class="alert alert-success mt-3" role="alert">
                        {{ SESSION('success') }}
                    </div>
                @endif
                <div class="card mt-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h3>Data Alamat</h3>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Nama Penerima</td>
                                            <td>{{ $inv->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Invoice Code</td>
                                            <td>{{ $inv->invoice_code }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>{{ $inv->alamat }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Phone Num</td>
                                            <td>{{ $inv->telp }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kode Pos</td>
                                            <td>{{ $inv->zipcode }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card my-5 border-0 shadow-sm">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <input type="hidden" value="{{$totalAll = 0}}">
                                @foreach ($detail as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->produk->name }}</td>
                                        <td>{{ $data->qty }}</td>
                                        <td>Rp. {{ number_format($data->produk->harga) }}</td>
                                        <td>
                                            <a href="/items/{{ $data->produk->id }}/{{$data->slug}}"
                                                class="btn btn-primary border-0 btn-sm"><i class="bi bi-eye"></i></a>
                                        </td>
                                        
                                        <input type="hidden" value="{{$total = $data->qty * $data->produk->harga}}}">
                                        <input type="hidden" value="{{$totalAll += $total}}">
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h6 class="n-semibold">Total : <span class="color-org">Rp. {{number_format($totalAll)}}</span></h6>
                        <hr>
                        <a href="/status/{{$inv->status}}/{{$inv->id}}" class="btn btn-primary btn-sm border-0 @if($inv->status == 4)d-none @endif" onclick="return confirm('Apakah Yakin Ingin Menjalnkan Aksi Ini?')">@if($inv->status == 1) Belum Bayar @elseif($inv->status == 2) Belum Di proses @elseif($inv->status == 3) Sedang Di proses @elseif($inv->status == 4) Sedang Dikirim @else Selesai @endif</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
