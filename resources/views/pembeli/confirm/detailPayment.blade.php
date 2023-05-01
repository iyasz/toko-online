@extends('layout.mainlayout')

@section('content')
    <section id="category">
        <div class="container mt-5">
            <div class="row mt-5 justify-content-center">
                <div class="col-lg-5 mt-5">
                    <div class="card mt-3 border-0 shadow-sm">
                        <div class="card-body pb-0">
                            <div class="header-detail">
                                <p class="">Payment in Progress</p>
                                <hr>
                            </div>
                            <div class="">
                                <div class="text-center">
                                    <p>ThanKyou <span class="color-org">{{ Auth::user()->name }}</span>, your order has been
                                        received!</p>
                                </div>
                                <div class="content-payment-progress mb-3">
                                    <p class="fs-sm mb-0 ">Pay Before:</p>
                                    <h6 class="n-semibold fs-sm">03 May 2023 12:39</h6>
                                </div>
                                <div class="content-payment-progress mb-3">
                                    <p class="fs-sm mb-0 ">Order Total:</p>
                                    <h6 class="n-semibold fs-sm color-org">IDR {{ number_format(300000) }}</h6>
                                </div>
                                <div class="content-payment-progress mb-3">
                                    <p class="fs-sm mb-0 ">Total Payment:</p>
                                    <h6 class="n-semibold fs-sm color-org">IDR {{ number_format(300000) }}</h6>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
