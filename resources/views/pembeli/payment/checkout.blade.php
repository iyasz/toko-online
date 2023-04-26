@extends('layout.mainlayout')

@section('content')
    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="mt-5">
                    <h4>Detail Pengiriman</h4>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="header-page-content d-flex mt-2">
                                <h5 class="n-semibold">{{ $addressMain->name }}</h5>
                                <a href="" class="color-org ms-auto text-decoration-none">Ganti Alamat</a>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-12">
                                    <div class="address-page-content">
                                        <p class="mb-0">{{ $addressMain->street }}</p>
                                        <p class="mb-0">{{ strtoupper($addressMain->city_id) }}</p>
                                        <p class="mb-0">{{ strtoupper($addressMain->province_id) }}
                                            {{ $addressMain->zipcode }}</p>
                                        <p class="mb-0">{{ $addressMain->telp }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-12">
                                    <div class="metode-payment-page ms-auto">
                                        <p class="mb-0">Metode Pengiriman</p>
                                        <select name="" id="" class="form-select ">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="notes-checkout-page">
                                <label>Notes</label>
                                <textarea name="" class="form-control" id="" placeholder="Leave a message" rows="2"></textarea>
                                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Toggle bottom
                                    offcanvas</button>

                                <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom"
                                    aria-labelledby="offcanvasBottomLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Offcanvas bottom</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body small">
                                        <h1></h1>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4>Detail Pesanan</h4>
                    </div>
                    <div class="card shadow-sm border-0 ">
                        <div class="card-body">
                            <div class="header-detail-pesanan">
                                <p class="mb-0">Delivery Estimate: <span class="n-semibold">April 2023</span></p>
                                <hr>
                            </div>
                            <div class="row">
                                @foreach ($userCart as $data)
                                <div class="col-12 mb-3">
                                    <div class="row">
                                        <div class="col-2">
                                            <img width="100%" src="{{ asset('/storage/gambar/' . $data->produk->image) }}">
                                        </div>
                                        <div class="col-lg-7 col-md-10 col-10 pesanan-produk-detail">
                                            <h6 class="n-semibold mb-0">{{ $data->produk->name }}</h6>
                                            <p class="mb-0 d-lg-block d-none">IDR {{number_format($data->produk->harga)}}</p>
                                            <p class="mb-0">Quantity: <span class="n-semibold">{{$data->qty}} Item(s)</span></p>
                                            <p class="mb-0 d-lg-none d-block n-semibold color-org">IDR {{number_format($data->produk->harga)}}</p>
                                        </div>
                                        <div class="col-lg-3 d-md-none d-lg-block d-none">
                                            <h6 class="n-semibold color-org">IDR {{number_format($data->produk->harga)}}</h6>
                                        </div>
                                    </div>
                                </div>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="header-payment-details mt-2 mb-3">
                                <p>Payment Details</p>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
