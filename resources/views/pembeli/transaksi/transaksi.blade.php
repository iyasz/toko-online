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
                                        <ul class="nav nav-tabs border-bottom">
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
                                         
                                         <div class="tab-content pt-0">
                                            <div class="tab-pane fade show active" id="tab1" data-bs-animation="true">
                                                <div class="text-center py-3">
                                                    <img src="{{asset('/assets/img/maskot/SearchNotFound.gif')}}" width="250" alt="">
                                                    <h4 class="mb-1 n-semibold">Nggak ada yang harus dibayar nih</h4>
                                                    <a class="text-decoration-none color-org" href="/store">Yuk belanja!</a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab2" data-bs-animation="true">
                                                <div class="text-center py-3">
                                                    <img src="{{asset('/assets/img/maskot/SearchNotFound.gif')}}" width="250" alt="">
                                                    <h4 class="mb-1 n-semibold">Belum ada transaksi apapun nih</h4>
                                                    <a class="text-decoration-none color-org" href="/store">Ayo mulai belanja!</a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab3" data-bs-animation="true">
                                                <div class="text-center py-3">
                                                    <img src="{{asset('/assets/img/maskot/SearchNotFound.gif')}}" width="250" alt="">
                                                    <h4 class="mb-1 n-semibold">Belum ada transaksi apapun nih</h4>
                                                    <a class="text-decoration-none color-org" href="/store">Ayo mulai belanja!</a>
                                                </div>
                                            </div>
                                         </div>   
                                    </div>
                                </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
        </div>
    </section>

@endsection
