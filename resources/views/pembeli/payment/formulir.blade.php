@extends('layout.mainlayout')

@section('content')

    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-8 mt-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="n-semibold opacity-75">Your Address</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12 mt-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="n-semibold opacity-75">Add Address</h4>
                            <form action="/payment" method="post">
                                @csrf
                                <div class="mt-3">
                                    <label class="mb-1 opacity-75">Nama</label>
                                    <input autocomplete="off" required type="text" name="name" value="{{old('name')}}" class="form-control rounded-1">
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mt-3">
                                    <label class="mb-1 opacity-75">Alamat</label>
                                    <textarea required name="harga" class="form-control rounded-1"></textarea>
                                    @error('harga') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            <div class="mt-3">
                                <label class="mb-1 opacity-75">Postal Code</label>
                                <input autocomplete="off" required type="number" name="harga" value="{{old('harga')}}" class="form-control rounded-1">
                                @error('harga') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-1 opacity-75">Phone Number</label>
                                <input autocomplete="off" required type="number" name="harga" value="{{old('harga')}}" class="form-control rounded-1">
                                @error('harga') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-4 mb-3 text-center">
                                <button class="btn btn-primary rounded-1 w-100 mb-3 border-0">Tambah</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
