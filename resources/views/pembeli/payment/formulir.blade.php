@extends('layout.mainlayout')

@section('content')

    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-8 col-md-12 col-12 mt-5">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h4 class="n-semibold opacity-75">Your Address</h4>
                            @if($addressMain)
                            <div class="address-page-main px-3 pt-3 pb-2 rounded-2">
                                <h6 class="mb-1">Main Address</h6>
                                <h5 class="n-semibold opacity-75 mb-0">{{$addressMain->name}}</h5>
                                <p class="mb-0">{{$addressMain->street}}, {{strtoupper($addressMain->city_id)}}, {{strtoupper($addressMain->province_id)}} {{$addressMain->zipcode}}</p>
                                <p class="">{{$addressMain->telp}}</p>
                                <div class="d-flex address-page-detail">
                                    <p class="mb-0">Main Address</p>
                                    <button data-address="{{$addressMain->id}}" id="editUserAddressMain" class="color-org ms-auto text-decoration-none bg-transparent border-0 ">Edit</button>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                    @foreach ($addressAll as $data)
                                    <div class="col-lg-6 col-md-12 col-12 mt-3">
                                        <div class="address-page-all px-3 pt-3 pb-2 rounded-2">
                                            <h6 class="mb-1">Address {{$loop->iteration}}</h6>
                                            <h5 class="n-semibold opacity-75 mb-0">{{$data->name}}</h5>
                                            <p class="mb-0">{{$data->street}}, {{strtoupper($data->city_id)}}, {{strtoupper($data->province_id)}} {{$data->zipcode}}</p>
                                            <p class="">{{$data->telp}}</p>
                                            <div class="d-flex address-page-detail">
                                                <button data-address="{{$data->id}}" class="color-org bg-transparent border-0">Set as Main Address</button>
                                                <button data-address="{{$data->id}}" class="color-org ms-auto bg-transparent border-0 editUserAddress">Edit</button>
                                                <button data-address="{{$data->id}}" class="color-org ms-3 bg-transparent border-0 deleteUserAddress">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                </div>
                            </div>
                        </div>
                <div class="col-lg-4 col-md-12 col-12 mt-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="n-semibold opacity-75">Add Address</h4>
                            <form action="/user/address" method="post">
                                @csrf
                                <div class="mt-3">
                                    <label class="mb-1 opacity-75">Nama</label>
                                    <input autocomplete="off" required type="text" name="name" value="{{Auth::user()->name}}" class="form-control rounded-1">
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mt-3 position-relative">
                                    <label class="mb-1 opacity-75">Province</label>
                                    <input type="text" id="select2-data-input" value="" class="form-control select2-data-input">
                                    <input type="hidden" name="province_id" id="select2-data-input-value" value="" class="form-control select2-data-input">
                                    <select class="form-select select2-data data-province" id="select2-data" name="state">
                                        @foreach ($province['rajaongkir']['results'] as $data)
                                        <option value="{{$data['province_id']}}">{{$data['province']}}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="mt-3">
                                    <label class="mb-1 opacity-75">City</label>
                                    <select name="city_id" disabled id="select2-city" class="form-select select"></select>
                                </div>
                                <div class="mt-3">
                                    <label class="mb-1 opacity-75">Street Address</label>
                                    <textarea required name="street" class="form-control rounded-1"></textarea>
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
                                <button class="btn btn-primary rounded-1 w-100 mb-3 border-0">ADD</button>
                            </div>
                        </form>
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
