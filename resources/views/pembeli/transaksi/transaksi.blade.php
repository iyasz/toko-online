@extends('layout.mainlayout')

@section('content')

    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-8 col-md-6 col-12 mt-5">
                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body">
                            <h4>Transaksi </h4>
                            @foreach ($trx as $data)
                                <hr>
                                <div class="row">
                                    <div class="col-3 m-auto">
                                        <div class="rounded-4 px-3 py-2 text-white @if($data->status == 1) badge-danger @else badge-primary @endif">@if($data->status == 1) Belum Bayar @elseif($data->status == 2) Belum Di proses @elseif($data->status == 3) Sedang Di proses @elseif($data->status == 4) Sedang Dikirim @else Selesai @endif</div> 
                                    </div>
                                    <div class="col-9" onclick="window.location.href='/transaksi/{{$data->id}}'" style="cursor: pointer">
                                        <a href="" class="text-decoration-none">
                                            <a class="text-decoration-none text-dark n-semibold">{{$data->name}}</a>
                                            <br>
                                            <p class="mb-0">Total :</p>
                                            <a class="text-decoration-none n-semibold " style="color: #FC4C02;">IDR {{number_format($data->total_price)}}</a>
                                            <p class="mb-0" style="font-size: 12px">{{$data->alamat}}</p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mt-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="text-center">
                                <h4>Transaksi</h4>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

@endsection
