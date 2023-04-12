@extends('layout.mainlayout')

@section('content')
    {{-- <div class="container">
        <button onclick="document.getElementById('inpQty').value--"><i class="bi bi-dash"></i></button>
        <input type="number" min="1" value="1" name="" id="inpQty">
        <button onclick="document.getElementById('inpQty').value++"><i class="bi bi-plus"></i></button>
    </div> --}}
    <div id="carouselHero" class="carousel slide mt-5">
        {{-- <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="0" class="active" aria-current="true"></button>
          <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="2"></button>
          <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="3"></button>
        </div> --}}
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/assets/img/banner/banner5.webp" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <div class="hero-text-content text-center mt-5">
                        <h1>SELAMAT DATANG DI <span style="color:#FC4C02;">TokyoFinds</span> <br> BELANJA FIGURE ASLI DARI
                            JEPANG!</h1>
                    </div>
                    <h5>Lagi khilaf apa hari ini ? :3</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/assets/img/banner/banner2.webp" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="/assets/img/banner/banner3.webp" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="/assets/img/banner/banner4.webp" class="d-block w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselHero" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselHero" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="">
                        <h4 class="n-semibold">Categories</h4>
                        <hr style="color: #d4d4d4">
                    </div>
                    <div class="card mt-3  border-0">
                        <div class="card-body pb-0">
                            <div class="row">
                                @foreach ($category as $data)
                                <div class="col-lg-2 col-md-4 col-4 text-center">
                                    <a href="" class="text-decoration-none text-black">
                                        <img src="{{asset('/storage/gambar/'.$data->icon)}}" width="100%" alt="">
                                        <p class="mt-2">{{$data->name}}</p>
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

    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="">
                        <h4 class="n-semibold">Newest Items</h4>
                        <hr style="color: #d4d4d4">
                    </div>
                    <div class="card mt-3 shadow-sm border-0">
                        <div class="card-body">
                            <div class="row ">
                                @foreach ($produk as $data)
                                <div class="col-lg-2 col-md-4 col-6 ">
                                    <a href="/items/{{$data->id}}" class="text-decoration-none text-black">
                                        <img src="/storage/gambar/{{$data->image}}" width="100%" class="rounded-3" alt="">
                                        <div class="@if($data->stok < 1) badge-danger @else badge-primary @endif text-white mt-2 px-3 rounded-4 ">@if($data->stok < 1) Stok Habis @else Ready Stock @endif</div>
                                        <p style="line-height: 1.2" class="mt-2 n-medium mb-0">{{$data->name}}</p>
                                        <p class="mt-2 text-danger n-semibold">IDR {{number_format($data->harga)}}</p>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="">
                        <h4 class="n-semibold">All Product</h4>
                        <hr style="color: #d4d4d4">
                    </div>
                    <div class="card mt-3 shadow-sm border-0">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($AllProduct as $data)
                                <div class="col-lg-2 col-md-4 col-6 ">
                                    <a href="/items/{{$data->id}}" class="text-decoration-none text-black">
                                        <img src="/storage/gambar/{{$data->image}}" width="100%" class="rounded-3" alt="">
                                        <div class="@if($data->stok < 1) badge-danger @else badge-primary @endif text-white mt-2 px-3 rounded-4 ">@if($data->stok < 1) Stok Habis @else Ready Stock @endif</div>
                                        <p class="mt-2 n-medium mb-0">{{$data->name}}</p>
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
