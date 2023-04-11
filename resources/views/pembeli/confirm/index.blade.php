@extends('layout.mainlayout')

@section('content')

    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-5 mt-5">
                    <div class="">
                        <h4 class="n-semibold">Bukti Pembayaran</h4>
                        <hr style="color: #d4d4d4">
                    </div>
                    <div class="card mt-3 border-0">
                        <div class="card-body pb-0">
                            <form action="/payment/confirmation" method="post">
                            @csrf
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Order ID</label>
                                <input autocomplete="off" required type="text" name="invoice_id" value="{{old('invoice_id')}}" class="form-control rounded-1">
                                @error('invoice_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Bukti Pembayaran</label>
                                <input autocomplete="off" required type="file" name="gambar" value="{{old('gambar')}}" class="form-control rounded-1">
                                @error('gambar') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-5 mb-3 text-center">
                                <button class="btn btn-primary rounded-1 w-100 mb-3 border-0">Kirim</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
