@extends('layout.mainlayout')

@section('content')

    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-8 col-md-6 col-12 mt-5">
                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body">
                            <h4>Transaksi Detail</h4>
                            @foreach ($detail as $data)
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <td><img width="100%" height="100%" class="rounded-2" src="{{asset('storage/gambar/'.$data->produk->image)}}" alt=""></td>
                                </div>
                                <div class="col-9">
                                     <h5 class="text-decoration-none text-dark n-semibold">{{$data->produk->name}}</h5>
                                     <hr>
                                     <p class="mb-0">Jumlah : {{$data->qty}}</p>
                                     {{-- <a class="text-decoration-none n-semibold " style="color: #FC4C02;">IDR {{number_format($data->produk->harga)}}</a> --}}
                                     <p class="n-semibold">Harga : <span style="color: #FC4C02">IDR {{number_format($data->price)}}</span></p>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mt-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="text-center">
                                <h4>Invoice</h4>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

@endsection
