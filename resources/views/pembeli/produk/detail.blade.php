@extends('layout.mainlayout')

@section('content')
    <section id="category">
        <div class="container mt-5">
            <div class="card border-0 shadow-sm mt-10">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-lg-6 col-md-6 col-12 ">
                            <img width="100%" class="rounded-3" src="{{ asset('storage/gambar/' . $produk->image) }}" alt="">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 ">
                            <div class="py-1 @if ($produk->stok < 1) p badge-danger @else badge-primary @endif text-white mt-2 px-3 rounded-4 ">
                                @if ($produk->stok < 1)
                                    Tidak Tersedia
                                @else
                                    Ready Stock
                                @endif
                            </div>
                            <h3 class="mt-2 n-semibold">{{ $produk->name }}</h3>
                            <p class="mt-2 opacity-50">By {{ $produk->produser }}</p>
                            <hr>
                            <h4 class="n-semibold color-org">IDR {{ number_format($produk->harga) }}</h4>
                            <div class="qty d-flex mt-3" id="wishlistQty">
                                <a class="btn btn-primary border-0 rounded-1 me-1" onclick="decrementQtyProduct()">-</a>
                                <input style="width: 60px" class="form-control" type="number" min="1" value="1" id="qtyProduct">
                                <a class="btn btn-primary border-0 rounded-1 ms-1" onclick="incrementQtyProduct()">+</a>
                            </div>
                            <div class="row mt-5">
                                <div class="col-4 px-2" id="containerWishlist">
                                    @if (Auth::user())
                                        <button @if($produk->stok < 1) disabled @endif id="{{ $wishlist > 0 ? 'wishlistRemove' : 'wishlistBtn' }}" class="btn btn-primary text-black w-100 rounded-1 bg-transparent py-2 wishlist @if($wishlist > 0)active @endif "><img src="{{ asset('assets/img/maskot/'.($wishlist > 0 ? 'wishlist_active.svg' : 'wishlist.svg')) }}" id="imgWishlist" width="25px" class="me-1 " alt=""> Wishlist </button>
                                    @else <a href="/auth/login" @if ($produk->stok < 1) disabled @endif class="btn btn-primary text-black w-100 rounded-1 bg-transparent wishlist py-2"><img src="{{ asset('assets/img/maskot/wishlist.svg') }}" width="25px" class="me-1 " alt=""> Wishlist</a>
                                    @endif
                                </div>
                                <div class="col-8">
                                    @if (Auth::user())
                                        <button @if ($produk->stok < 1) disabled @endif class="btn btn-primary n-semibold w-100 rounded-1 border-0 py-2" id="cartAdd">Add to Cart</button>
                                    @else
                                        <a href="/auth/login" @if ($produk->stok < 1) disabled @endif class="btn btn-primary w-100 rounded-1 border-0 py-2">Add to Cart</a>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <p class="mt-5">{{ $produk->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
