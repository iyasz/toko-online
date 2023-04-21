@extends('layout.mainlayout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 mt-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h4>Result For {{$cat->name}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 col-md-8 mt-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($pro as $data)
                            <div class="col-lg-3 col-md-4 col-6 ">
                                <a href="/items/{{$data->id}}/{{$data->slug}}" class="text-decoration-none text-black">
                                    <img src="/storage/gambar/{{$data->image}}" width="100%" class="rounded-3" alt="">
                                    <div class="@if($data->stok < 1) badge-danger @else badge-primary @endif text-white mt-2 px-3 rounded-4 ">@if($data->stok < 1) Stok Habis @else Ready Stock @endif</div>
                                    <p class="text-release my-2">Releases {{date('F Y'), strtotime($data->created_at)}}</p>
                                    <p class="mt-2 text-header-product n-semibold mb-0">{{$data->name}}</p>
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


@endsection
