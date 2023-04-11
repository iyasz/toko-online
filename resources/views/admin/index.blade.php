@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mt-5 text-center">
                    <h1>SELAMAT DATANG <br> {{Auth::user()->name}}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
