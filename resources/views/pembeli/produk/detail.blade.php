@extends('layout.mainlayout')

@section('content')
    <section id="category">
        <div class="container ">
            <div class="row">
                <div class="col-12">
            <div class="card border-0 shadow-sm mt-10 mb-5">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-lg-6 col-md-6 col-12 ">
                            <img width="100%" class="rounded-3" src="{{ asset('storage/gambar/' . $produk->image) }}" alt="">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 ">
                            <div class="py-1 @if ($produk->stok < 1) p badge-danger @else badge-primary @endif text-white mt-2 px-3 rounded-4 ">{{$produk->stok < 1 ? 'Tidak Tersedia' : 'Stock Ready'}}
                            </div>
                            <h3 class="mt-2 n-semibold">{{ $produk->name }}</h3>
                            <p class="mt-2 opacity-50">By {{$produk->brand->name}}</p>
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
                                        <button id="{{ $wishlist > 0 ? 'wishlistRemove' : 'wishlistBtn' }}" class="btn btn-danger text-black w-100 rounded-1 bg-transparent py-2 wishlist @if($wishlist > 0)active @endif "><img src="{{ asset('assets/img/maskot/'.($wishlist > 0 ? 'wishlist_active.svg' : 'wishlist.svg')) }}" id="imgWishlist" width="25px" class="me-1 " alt=""> Wishlist </button>
                                    @else <button id="productAuth" class="btn btn-danger text-black w-100 rounded-1 bg-transparent wishlist py-2"><img src="{{ asset('assets/img/maskot/wishlist.svg') }}" width="25px" class="me-1 " alt=""> Wishlist</button>
                                    @endif
                                </div>
                                <div class="col-8">
                                    @if (Auth::user())
                                        <button @if($produk->stok < 1) disabled @endif class="btn btn-primary n-semibold w-100 rounded-1 border-0 py-2" id="cartAdd">{{$produk->stok < 1 ? 'Sold Out' : 'Add to Cart'}}</button>
                                    @else
                                        <button id="cartAuth" @if($produk->stok < 1) disabled @endif class="btn btn-primary n-semibold w-100 rounded-1 border-0 py-2">{{$produk->stok < 1 ? 'Sold Out' : 'Add to Cart'}}</button>
                                    @endif
                                </div>
                            </div>
                            <hr class="mb-0">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <p class="productDesc color-gray">{!! nl2br($produk->deskripsi) !!}</p>
                                    <ul class="ps-0 product-view-details ">  
                                        @if(!empty($produk->character))
                                        <li class="d-flex mb-2">
                                            <p class="mb-0 color-gray">Character</p>
                                            <div class="info">
                                                <a href="/search?character={{$produk->character->name}}" class="d-inline-block text-decoration-none rounded-4">{{$produk->character->name}}</a>
                                            </div>
                                        </li>
                                        @endif
                                        @if(!empty($produk->series))
                                        <li class="d-flex mb-2">
                                            <p class="mb-0 color-gray">Series</p>
                                            <div class="info">
                                                <a href="/search?series={{$produk->series->name}}" class="d-inline-block text-decoration-none rounded-4 color-gray">{{$produk->series->name}}</a>
                                            </div>
                                        </li>
                                        @endif
                                        @if(!empty($produk->category))
                                        <li class="d-flex mb-2">
                                            <p class="mb-0 color-gray">Category</p>
                                            <div class="info">
                                                <a href="/c/{{$produk->category->id}}" class="d-inline-block text-decoration-none rounded-4 color-gray">{{$produk->category->name}}</a>
                                            </div>
                                        </li>
                                        @endif
                                        @if(!empty($produk->brand))
                                        <li class="d-flex mb-2">
                                            <p class="mb-0 color-gray">Manufacturer</p>
                                            <div class="info">
                                                <a href="/search?brand={{$produk->brand->name}}" class="d-inline-block text-decoration-none rounded-4 color-gray">{{$produk->brand->name}}</a>
                                            </div>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="n-semibold">More Stuff Like This!</h5>
        <div class="card mt-2 shadow-sm border-0">
            <div class="card-body">
                <div class="row">
                    @foreach ($items as $data)
                    <div class="col-lg-2 col-md-4 col-6 ">
                        <a href="/items/{{$data->id}}/{{$data->slug}}" class="text-decoration-none text-black">
                            <img src="{{asset('/storage/gambar/'. $data->image)}}" width="100%" class="rounded-3" alt="">
                            <div class="@if($data->stok < 1) badge-danger @else badge-primary @endif text-white mt-2 px-3 rounded-4 ">@if($data->stok < 1) Stok Habis @else Ready Stock @endif</div>
                            <p class="text-release my-2">Releases {{date('F Y'), strtotime($data->created_at)}}</p>
                            <p class="mt-2 text-header-product n-medium mb-0">{{$data->name}}</p>
                            <p class="mt-2 text-danger n-semibold">IDR {{number_format($data->harga)}}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </section>
@endsection
