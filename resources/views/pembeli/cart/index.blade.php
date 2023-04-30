@extends('layout.mainlayout')

@section('content')

    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-8 col-md-12 col-12 mt-5">
                    <div class="card border-0 shadow-sm mb-2">
                        <div class="card-body">
                            <div class="py-2">
                                <h4 class="mb-0 n-semibold">Shopping Cart</h4>
                            </div>
                            @if($count > 0)
                            <input type="hidden" name="" value="{{$totalAll = 0}}">
                            @foreach ($cart as $data)
                                <hr>
                                <div class="row ">
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <td><img width="100%" height="100%" class="rounded-2" src="{{asset('storage/gambar/'.$data->produk->image)}}" alt=""></td>
                                    </div>
                                    <div class="col-12 col-md-9 col-lg-9 mt-3 mt-lg-0">
                                         <a class="text-decoration-none text-dark n-semibold">{{$data->produk->name}}</a>
                                         <br>
                                         <div class="d-flex qty_product">
                                             <p class="mb-0">Jumlah : <button onclick="decrementQtyProduct()" class="btnQtyCart"><i class="bi bi-dash"></i></button> <input class="bg-transparent border-0" type="text" id="qtyProduct" disabled value="{{$data->qty}}"> <button onclick="incrementQtyProduct()" class="btnQtyCart"><i class="bi bi-plus"></i></button></p>
                                            </div>
                                         <a class="text-decoration-none n-semibold color-org">IDR {{number_format($data->produk->harga)}}</a>
                                         <p class="n-semibold">Total : <span class="color-org">{{number_format($data->produk->harga * $data->qty)}}</span></p>
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
                                <h4 class="mb-1 n-semibold">Kamu belum belanja apapun</h4>
                                <a class="text-decoration-none color-org" href="/store">Ayo Mulai Belanja!</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body">
                            <button id="deleteAllProductFromCart" onclick="return confirm('Apakah kamu ingin menghapus semua produk di Cart?')" class="btn btn-primary border-0 rounded-1 w-100"><i class="bi bi-trash"></i> Kosongkan Troli</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 mt-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="text-center">
                                <p class="mb-2 opacity-75">Total Price</p>
                                <h3 class="color-org n-semibold">IDR {{$count > 0 ? number_format($totalAll) : '' }}</h3>
                                <input type="hidden" name="" value="{{$count > 0 ? $totalAll : ''}}" id="">
                                <button id="cartPayment" class="btn btn-primary w-100 border-0 py-2 n-semibold cartPayment" {{$count > 0 ? '' : 'disabled'}}>CHECKOUT</button>
                                <hr>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

@endsection
