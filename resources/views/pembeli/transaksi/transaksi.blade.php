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
                            <div class="row mt-4">
                                <div class="col-12">
                                    <ul class="nav nav-tabs border-bottom">
                                        <li class="nav-item">
                                            <a class="nav-link n-semibold mx-3 active" href="#tab1"
                                                data-bs-toggle="tab">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link n-semibold mx-3" href="#tab2"
                                                data-bs-toggle="tab">Expired</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link n-semibold mx-3" href="#tab3" data-bs-toggle="tab">Paid</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content pt-0">
                                        <div class="tab-pane fade show active" id="tab1" data-bs-animation="true">
                                            @if ($trxActiveStatus->count() != 0)
                                                @foreach ($trxActiveStatus as $data)
                                                    <div class="card rounded-1 mt-4">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-9 col-md-12 col-12">
                                                                    <div class="">
                                                                        <p class="mb-0">INVOICE: <span class="n-semibold ">{{ $data->invoice_code }}</span></p>
                                                                        <p class="fs-sm mb-0">{{date('d M Y', strtotime($data->created_at))}} - {{$data->transaksi->count()}} Category</p>
                                                                    </div>
                                                                    <hr class="mt-2">
                                                                    <div class="content-detail-product-transaction">
                                                                        @foreach ($data->transaksi as $item)
                                                                            <div class="row mt-3">
                                                                                <div class="col-2">
                                                                                    <img src="{{ asset('storage/gambar/'.$item->produk->image) }}" width="100%" alt="">
                                                                                </div>
                                                                                <div class="col-9">
                                                                                <a href="/items/{{$item->produk->id}}/{{$item->produk->slug}}" class="n-semibold text-header-product fs-6 color-org">{{ $item->produk->name }}</a>
                                                                                    <p class="fs-sm mb-0">IDR {{number_format($item->produk->harga)}}</p>
                                                                                    <p class="fs-sm ">Quantity: <span class="n-semibold">{{$item->qty}} Item(s)</span></p>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-12 col-12">
                                                                    <div class="detail-transaksi dekstopOnly d-none d-lg-block">
                                                                        <div class="text-center">
                                                                            <p class="fs-sm">Payment Method<br> <img src="{{asset('assets/img/payment/'.$data->payment_method.'.'.($data->payment_method != 'tokopedia' ? 'png' : 'svg'))}}" alt="paymentMethod" class="my-2" width="70">
                                                                            </p>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <p class="fs-sm">Due Date: <br> <span class="n-semibold color-org fs-6">{{ date('d M Y H:i', strtotime($data->created_at->addDays(2))) }}</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <p class="fs-sm">Payment Due: <br> <span class="n-semibold color-org fs-6">IDR {{number_format($data->total_price) }}</span></p>
                                                                        </div>
                                                                        <div class="text-center button-detail-transaction">
                                                                            <button class=" btn-sm w-100 py-1 rounded-1">Details</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="text-center py-3">
                                                    <img src="{{ asset('/assets/img/maskot/SearchNotFound.gif') }}"
                                                        width="250" alt="">
                                                    <h4 class="mb-1 n-semibold">Nggak ada yang harus dibayar nih</h4>
                                                    <a class="text-decoration-none color-org" href="/store">Yuk belanja!</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="tab2" data-bs-animation="true">
                                            <div class="text-center py-3">
                                                <img src="{{ asset('/assets/img/maskot/SearchNotFound.gif') }}"
                                                    width="250" alt="">
                                                <h4 class="mb-1 n-semibold">Belum ada transaksi apapun nih</h4>
                                                <a class="text-decoration-none color-org" href="/store">Ayo mulai
                                                    belanja!</a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" data-bs-animation="true">
                                            <div class="text-center py-3">
                                                <img src="{{ asset('/assets/img/maskot/SearchNotFound.gif') }}"
                                                    width="250" alt="">
                                                <h4 class="mb-1 n-semibold">Belum ada transaksi apapun nih</h4>
                                                <a class="text-decoration-none color-org" href="/store">Ayo mulai
                                                    belanja!</a>
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
