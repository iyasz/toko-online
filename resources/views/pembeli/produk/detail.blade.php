@extends('layout.mainlayout')

@section('content')

    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-6 col-md-6 col-12 mt-5">
                    <img width="100%" src="{{asset('storage/gambar/'.$produk->image)}}" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-12 mt-5">
                    <div class="py-1 @if($produk->stok < 1)p badge-danger @else badge-primary @endif text-white mt-2 px-3 rounded-4 ">@if($produk->stok < 1) Tidak Tersedia @else Ready Stock @endif</div>
                    <h2 class="mt-2">{{$produk->name}}</h2>
                    <p class="mt-2 opacity-50">By {{$produk->produser}}</p>
                    <hr>
                    <h4 class="n-semibold color-org">IDR {{number_format($produk->harga)}}</h4>
                 <form action="/cart" method="post"> 
                    @csrf
                    @if(Auth::user())
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    @endif
                    <input type="hidden" name="barang_id" value="{{$produk->id}}">
                    <div class="qty d-flex mt-3">
                        <a class="btn btn-primary border-0 rounded-1 me-1" onclick="document.getElementById('qtyProduct').value--">-</a>
                        <input style="width: 60px" name="qty" class="form-control" type="number" min="1" value="1" id="qtyProduct">
                        <a class="btn btn-primary border-0 rounded-1 ms-1" onclick="document.getElementById('qtyProduct').value++">+</a>
                    </div>
                    <div class="row mt-5">
                        <div class="col-6">
                            @if(Auth::user())
                            <button @if($produk->stok < 1) disabled @endif class="btn btn-primary w-100 rounded-1 bg-transparent whishlist py-2" style="border: #FC4C02 1px solid; color:#FC4C02;"><i class="bi bi-heart me-1"></i> Wishlist</button>
                            @else
                            <a href="/auth/login" @if($produk->stok < 1) disabled  @endif class="btn btn-primary w-100 rounded-1 bg-transparent whishlist py-2" style="border: #FC4C02 1px solid; color:#FC4C02;"><i class="bi bi-heart me-1"></i> Wishlist</a>
                            @endif
                        </div>
                        <div class="col-6">
                            @if(Auth::user())
                            <button @if($produk->stok < 1) disabled  @endif class="btn btn-primary w-100 rounded-1 border-0 py-2">Add to Cart</button>
                            @else
                            <a href="/auth/login" @if($produk->stok < 1) disabled  @endif class="btn btn-primary w-100 rounded-1 border-0 py-2">Add to Cart</a>
                            @endif
                        </div>
                    </div>
                </form>
                    <p class="mt-5">{{$produk->deskripsi}}</p>
                </div>
            </div>
        </div>
    </section>

@endsection
