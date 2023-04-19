@extends('layout.mainlayout')

@section('content')

    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-8 col-md-6 col-12 mt-5">
                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body">
                            <div class="py-2">
                                <h4 class="mb-0">Shopping Cart</h4>
                            </div>
                            @if($count > 0)
                            <input type="hidden" name="" value="{{$totalAll = 0}}">
                            @foreach ($cart as $data)
                                <hr>
                                <div class="row">
                                    <div class="col-3">
                                        <td><img width="100%" height="100%" class="rounded-2" src="{{asset('storage/gambar/'.$data->produk->image)}}" alt=""></td>
                                    </div>
                                    <div class="col-9">
                                         <a class="text-decoration-none text-dark n-semibold">{{$data->produk->name}}</a>
                                         <br>
                                         <p class="mb-0">Jumlah : {{$data->qty}}</p>
                                         <a class="text-decoration-none n-semibold " style="color: #FC4C02;">IDR {{number_format($data->produk->harga)}}</a>
                                         <p class="n-semibold">Total : <span style="color: #FC4C02">{{number_format($data->produk->harga * $data->qty)}}</span></p>
                                         <div class="text-end">
                                            <form action="/cart/{{$data->id}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="text-dark opacity-50 bg-transparent border-0" onclick="return confirm('Apakah anda yakin ingin menghapus item ini?')" ><i class="bi bi-trash"></i></button>
                                            </form>
                                         </div>
                                         <input id="totalPerProduct" type="hidden" value="{{$total = $data->produk->harga * $data->qty}}">
                                         <input id="totalPerProduct" type="hidden" value="{{$totalAll += $total}}">
                                    </div>
                                </div>
                            @endforeach
                            @else 
                            <hr>
                            <div class="text-center py-3">
                                <h5 class="mb-1">Kamu belum belanja apapun</h4>
                                <a class="text-decoration-none color-org" href="/store">Ayo Mulai Belanja!</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mt-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="text-center">
                                <p class="mb-2 opacity-75">Total Price</p>
                                <h3 class="color-org n-semibold">IDR {{$count > 0 ? number_format($totalAll) : '' }}</h3>
                                <input type="hidden" name="" value="{{$count > 0 ? $totalAll : ''}}" id="">
                                <button id="cartPayment" class="btn btn-primary w-100 border-0 py-2 n-semibold" {{$count > 0 ? '' : 'disabled'}}>CHECKOUT</button>
                                <hr>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

@endsection
