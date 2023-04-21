@extends('layout.mainlayout')

@section('content')

    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-12 col-md-12 col-12 mt-5">
                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body">
                            <div class="py-2">
                                <h4 class="mb-0 n-semibold">Transactions</h4>
                            </div>
                            {{-- @foreach ($trx as $data) --}}
                                {{-- <hr> --}}
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                               <a class="nav-link n-semibold mx-3 active" href="#tab1" data-bs-toggle="tab">Active</a>
                                            </li>
                                            <li class="nav-item">
                                               <a class="nav-link n-semibold mx-3" href="#tab2" data-bs-toggle="tab">Expired</a>
                                            </li>
                                            <li class="nav-item">
                                               <a class="nav-link n-semibold mx-3" href="#tab3" data-bs-toggle="tab">Paid</a>
                                            </li>
                                         </ul>
                                         
                                         <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tab1" data-bs-animation="true">
                                                <div class="text-center py-3">
                                                    <h4 class="mb-1 n-semibold">Nggak ada yang harus dibayar nih</h4>
                                                    <a class="text-decoration-none color-org" href="/store">Yuk belanja!</a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab2" data-bs-animation="true">
                                                <div class="text-center py-3">
                                                    <h4 class="mb-1 n-semibold">Belum ada transaksi apapun nih</h4>
                                                    <a class="text-decoration-none color-org" href="/store">Ayo mulai belanja!</a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab3" data-bs-animation="true">
                                                <div class="text-center py-3">
                                                    <h4 class="mb-1 n-semibold">Belum ada transaksi apapun nih</h4>
                                                    <a class="text-decoration-none color-org" href="/store">Ayo mulai belanja!</a>
                                                </div>
                                            </div>
                                         </div>
                                         
                                    </div>
                                    {{-- <div class="col-3 m-auto">
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
                                    </div> --}}
                                </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
        </div>
    </section>

@endsection
