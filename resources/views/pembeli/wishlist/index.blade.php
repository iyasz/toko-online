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
                            <hr>
                            @foreach ($wishlist as $data)
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
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
