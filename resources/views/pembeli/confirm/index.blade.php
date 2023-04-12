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
                    <div class="card mt-3 border-0 shadow-sm">
                        <div class="card-body pb-0">
                            <form action="/confirmation" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Order ID</label>
                                <input autocomplete="off" required type="text" name="invoice_code" value="{{old('invoice_code')}}" class="form-control rounded-1">
                                @error('invoice_code') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Bukti Pembayaran</label>
                                <input autocomplete="off" required type="file" name="img" value="{{old('img')}}" class="form-control rounded-1">
                                @error('img') <p class="text-danger">{{$message}}</p> @enderror
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
