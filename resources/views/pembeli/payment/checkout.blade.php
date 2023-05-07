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
                                <a href="/user/address" class="color-org ms-auto text-decoration-none">Ganti Alamat</a>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-12">
                                    <div class="address-page-content">
                                        <p class="mb-0">{{ $addressMain->street }}</p>
                                        <p class="mb-0">{{ strtoupper($addressMain->city) }}</p>
                                        <p class="mb-0">{{ strtoupper($addressMain->province) }}
                                            {{ $addressMain->zipcode }}</p>
                                        <p class="mb-0">{{ $addressMain->telp }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-12">
                                    <div class="metode-payment-page ms-auto mt-lg-0 mt-3 ">
                                        <p class="mb-0">Metode Pengiriman</p>
                                        <select name="" id="select-courier" class="form-select select-courier">
                                            <option disabled selected>Pilih Metode</option>
                                            <optgroup label="Regular" class="">
                                                <option value="jne">JNE</option>
                                                <option value="tiki">TIKI</option>
                                                <option value="">Ninja Xpress Standard</option>
                                                <option value="pos">POS Indonesia Reguler</option>
                                            </optgroup>
                                            <optgroup class="" label="Next Day">
                                                <option value="">JNE OKE</option>
                                                <option value="">SiCepat BEST</option>
                                                <option value="">Ninja Xpress Next Day</option>
                                            </optgroup>
                                            <optgroup class="" label="Same Day">
                                                <option value="">GoSend</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-12">
                                    <div class="metode-payment-page ms-auto mt-lg-0 mt-3 ">
                                        <p class="mb-0">Layanan</p>
                                        <select id="select-layanan" disabled class="form-select select-layanan">
                                            <option disabled selected>Pilih Layanan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="notes-checkout-page">
                                <label>Notes</label>
                                <textarea name="" class="form-control" id="noteCheckout" placeholder="Leave a message" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4>Choose Payment Method</h4>
                    </div>
                    <div class="card shadow-sm border-0 mb-3">
                        <div class="card-body">
                            <div class="row payment_method_container">
                                <div class="col-12 col-lg-3 payment_method_details ">
                                    <button value="shopee" class="w-100 h-100 bg-transparent border-0 rounded-1 shadow-sm active">
                                        <img src="{{asset('assets/img/payment/shopee.png')}}" width="40" class="py-4" alt="">
                                        <p class="fs-sm mt-auto">Shopee</p>
                                    </button>
                                </div>
                                <div class="col-12 col-lg-3 payment_method_details ">
                                    <button value="ewallet" class="w-100 h-100 bg-transparent border-0 rounded-1 shadow-sm">
                                        <img src="{{asset('assets/img/payment/ewallet.png')}}" width="40" class="py-4" alt="">
                                        <p class="fs-sm mt-auto">E-wallet</p>
                                    </button>
                                </div>
                                <div class="col-12 col-lg-3 payment_method_details ">
                                    <button value="tokopedia" class="w-100 h-100 bg-transparent border-0 rounded-1 shadow-sm">
                                        <img src="{{asset('assets/img/payment/tokopedia.svg')}}" width="40" class="py-4" alt="">
                                        <p class="fs-sm mt-auto">Tokopedia</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4>Detail Pesanan</h4>
                    </div>
                    <div class="card shadow-sm border-0 mb-5">
                        <div class="card-body">
                            <div class="header-detail-pesanan">
                                <p class="mb-0">Delivery Estimate: <span class="n-semibold">April 2023</span></p>
                                <hr>
                            </div>
                            <div class="row">
                                <input type="hidden" value="{{$totalAll = 0}}" id="">
                                <input type="hidden" value="{{$weightAll = 0}}" id="">
                                @foreach ($userCart as $data)
                                    <div class="col-12 mb-3">
                                        <div class="row">
                                            <div class="col-2">
                                                <img width="100%" src="{{ asset('/storage/gambar/' . $data->produk->image) }}">
                                            </div>
                                            <div class="col-lg-7 col-md-10 col-10 pesanan-produk-detail">
                                                <h6 class="n-semibold mb-0 ">{{ $data->produk->name }}</h6>
                                                <p class="mb-0 d-lg-block d-none">IDR
                                                    {{ number_format($data->produk->harga) }}</p>
                                                <p class="mb-0">Quantity: <span class="n-semibold">{{ $data->qty }}
                                                        Item(s)</span></p>
                                                <p class="mb-0 d-lg-none d-block n-semibold color-org">IDR
                                                    {{ number_format($data->produk->harga) }}</p>
                                            </div>
                                            <div class="col-lg-3 d-md-none d-lg-block d-none">
                                                <h6 class="n-semibold color-org">IDR
                                                    {{ number_format($data->produk->harga) }}</h6>
                                            </div>
                                            <input type="hidden" name="" value="{{$weightAll += $data->produk->weight}}" id="">
                                            <input type="hidden" name="" value="{{$total = $data->produk->harga * $data->qty}}" id="">
                                            <input type="hidden" name="" value="{{$totalAll += $total}}" id="">
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
                            <div class="content-page-payment-details">
                                <div class="detail d-flex">
                                    <div class="">
                                        <p class="mb-0">Subtotal</p>
                                        <p class="mb-2">Item(s)</p>
                                    </div>
                                    <input type="hidden" value="{{$totalResult = $totalAll}}" id="resultPaymentTotalHidden">
                                    <span id="subtotalPayment" data-value="{{$totalAll}}" class="ms-auto">IDR {{number_format($totalAll)}}</span>
                                </div>
                                <div class="detail d-flex">
                                    <div class="">
                                        <p class="mb-0">Shipping Fee</p>
                                    </div>
                                    <span id="shippingFee" data-value="" class="ms-auto">IDR 0</span>
                                </div>
                            </div>
                            <hr>
                            <div class="total-price-all-page">
                                <div class="detail d-flex">
                                    <div class="">
                                        <p class="mb-0">Total</p>
                                    </div>
                                    <input type="hidden" value="" id="resultAllPaymentHidden">
                                    <span id="resultAllPayment" data-value="" class="ms-auto">IDR {{number_format($totalAll)}}</span>
                                </div>
                                <button class="btn btn-primary w-100 border-0 mt-3 rounded-1" value="{{$totalAll}}" data-address="{{ $addressMain->id }}" data-weight="{{$weightAll}}" data-destination="{{$addressMain->city_id}}" id="paymentButtonCheckout" disabled>Pay now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
