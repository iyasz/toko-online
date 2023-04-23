@extends('layout.mainlayout')

@section('content')

    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-8 col-md-12 col-12 mt-5">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h4 class="n-semibold opacity-75">Your Order</h4>
                            <input type="hidden" name="" value="{{$totalAll = 0}}">
                            @foreach ($cart as $data)
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-12">
                                        <td><img width="100%" height="100%" class="rounded-2" src="{{asset('storage/gambar/'.$data->produk->image)}}" alt=""></td>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-12 mt-lg=0 mt-3">
                                         <a class="text-decoration-none text-dark n-semibold">{{$data->produk->name}}</a>
                                         <br>
                                         <p class="mb-0">Jumlah : {{$data->qty}}</p>
                                         <a class="text-decoration-none n-semibold " style="color: #FC4C02;">IDR {{number_format($data->produk->harga)}}</a>
                                         <p class="n-semibold">Total : <span style="color: #FC4C02">{{number_format($data->produk->harga * $data->qty)}}</span></p>
                                         <input id="" type="hidden" value="{{$total = $data->produk->harga * $data->qty}}">
                                         <input name="" type="hidden" value="{{$totalAll += $total}}">
                                        </div>
                                    </div>
                                 @endforeach
                                </div>
                            </div>
                        </div>
                <div class="col-lg-4 col-md-12 col-12 mt-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="text-center">
                                <p class="mb-2">Total </p>
                                <h2 class="n-semibold" style="color: #FC4C02;">IDR {{number_format($totalAll)}}</h2>
                            </div>
                            <hr>
                            <h4 class="n-semibold opacity-75">Add Address</h4>
                            <form action="/payment/store" method="post">
                                <input name="total_price" type="hidden" value="{{$totalAll}}">
                                @csrf
                                <div class="mt-3">
                                    <label class="mb-1 opacity-75">Nama</label>
                                    <input autocomplete="off" required type="text" name="name" value="{{Auth::user()->name}}" class="form-control rounded-1">
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mt-3 position-relative">
                                    <label class="mb-1 opacity-75">Province</label>
                                    <input type="text" name="" id="select2-data-input" value="" class="form-control select2-data-input">
                                    <select class="form-select select2-data" name="state">
                                        @foreach ($province['rajaongkir']['results'] as $data)
                                        <option value="{{$data['province_id']}}">{{$data['province']}}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="mt-3">
                                    <label class="mb-1 opacity-75">City</label>
                                    <input autocomplete="off" required type="text" name="city_id" value="{{old('city_id')}}" class="form-control rounded-1">
                                    @error('city_id') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mt-3">
                                    <label class="mb-1 opacity-75">City</label>
                                    <select name="" id="" class="form-select">
                                        @foreach ($province['rajaongkir']['results'] as $data)
                                        <option value="{{$data['province_id']}}">{{$data['province']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label class="mb-1 opacity-75">Alamat</label>
                                    <textarea required name="alamat" class="form-control rounded-1"></textarea>
                                    @error('alamat') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            <div class="mt-3">
                                <label class="mb-1 opacity-75">Postal Code</label>
                                <input autocomplete="off" required type="number" name="zipcode" value="{{old('zipcode')}}" class="form-control rounded-1">
                                @error('zipcode') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-1 opacity-75">Phone Number</label>
                                <input autocomplete="off" required type="text" name="telp" value="{{old('telp')}}" class="form-control rounded-1">
                                @error('telp') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-4 mb-3 text-center">
                                <button class="btn btn-primary rounded-1 w-100 mb-3 border-0">Bayar Sekarang</button>
                            </div>
                        </form>
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
