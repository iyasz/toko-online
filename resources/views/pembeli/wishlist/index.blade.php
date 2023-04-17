@extends('layout.mainlayout')

@section('content')
    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-12 mt-5">
                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body">
                            <div class="py-2">
                                <h4 class="mb-0">My Wishlist</h4>
                            </div>
                            <hr class="">
                            <input type="hidden" value="{{ $totalAll = 0 }}">
                            <div class="row">
                                @foreach ($wishlist as $data)
                                    <div class="col-12 col-md-6 col-lg-3 px-2 gy-3">
                                        <div class="card">
                                            <div class="card-body p-0 mx-0">
                                                <img width="100%" src="{{ asset('storage/gambar/' . $data->produk->image) }}">
                                                <div class="mx-2">
                                                    <div class="py-1 @if ($data->produk->stok < 1) p badge-danger @else badge-primary @endif text-white mt-2 px-3 rounded-4 ">
                                                        @if ($data->produk->stok < 1)
                                                            Tidak Tersedia
                                                        @else
                                                            Ready Stock
                                                        @endif
                                                    </div>
                                                    <h6 class="n-semibold text-header-product mt-2 mb-1">{{ $data->produk->name }}</h6>
                                                    <p class="color-org n-semibold">IDR
                                                        {{ number_format($data->produk->harga) }}</p>
                                                    <div class="row mb-3">
                                                        <div class="col-lg-9 col-md-9 col-10 pe-0">
                                                            <button class="btn btn-primary border-0 n-semibold py-2 rounded-1 btn-sm w-100">ADD TO CART</button>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-2">
                                                            <form action="/wishlist/{{$data->id}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button onclick="return confirm('Apakah Anda Ingin Menghapus Produk ini dari Wishlist Anda?')" class="btn btn-primary py-2 rounded-1 btn-sm text-black w-100 wishlist bg-transparent"><i class="bi bi-trash opacity-75"></i></button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection