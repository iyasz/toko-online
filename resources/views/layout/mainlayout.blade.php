<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TokyoFinds - Tempat Belanja Figure dan Barang Lainnya!</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">

       <!-- izitoast  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="/assets/icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg p-0 bg-white shadow-sm fixed-top">
        <div class="container">
            <a href="/store" class=" n-semibold"><img src="{{asset('assets/img/maskot/maskot.webp')}}" width="130px" alt=""><img src="{{asset('assets/img/maskot/icon.png')}}" width="100px"></a>
            <button class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-lg-5 mx-md-0 mx-0 w-100 mt-2 mt-lg-0">
                    <li class="nav-item w-100">
                        <form class="d-flex input-group w-100" action="/search" method="get" role="search">
                            <input class="form-control " name="q" autocomplete="off" type="search" placeholder="Lagi khilaf apa hari ini?" >
                            <button class="input-group-text bg-org text-white border-0 " id="basic-addon2"><i class="bi bi-search"></i></button>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav d-flex">
                    <li class="nav-item mx-1 d-inline-block ">
                        <a href="/transaksi" class="nav-link color-org"><i class="bi bi-box2"></i> <span class="d-inline d-md-inline d-lg-none ms-2">Transaksi</span></a>
                    </li>
                    <li class="nav-item mx-1 d-inline-block  ">
                        <a href="/cart" class="nav-link color-org"><i class="bi bi-cart"></i> <span class="d-inline d-md-inline d-lg-none ms-2">Cart</span></a>
                    </li>
                    <li class="nav-item mx-1 d-inline-block ">
                        <a href="/wishlist" class="nav-link color-org pb-0"><i class="bi bi-heart"></i> <span class="d-inline d-md-inline d-lg-none ms-2">Wishlist</span> </a>
                    </li>
                    <li class="nav-item mx-4 ">
                        <div style="width: 1px; background: #dee2e6; height: 100%"></div>
                    </li>
                <ul class="navbar-nav">
                    @if(Auth::user())
                    <li class="nav-item mx-1 dropdown">
                        <a data-bs-toggle="dropdown" class="nav-link dropdown-toggle "><img src="{{asset('assets/img/maskot/face.png')}}"  width="25px" alt=""></a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow position-absolute w-100">
                            <li class=" py-2"><img src="{{asset('assets/img/maskot/face.png')}}" class="mx-3" width="37px" alt=""> <span>{{Auth::user()->name}}</span></li>
                            <hr class="my-2">
                            <li><a href="/wishlist" class="dropdown-item py-2 opacity-75"><i class="bi bi-heart mx-3"></i> My Wishlist</a></li>
                            <li><a href="/cart" class="dropdown-item py-2 opacity-75"><i class="bi bi-cart mx-3"></i> My Cart</a></li>
                            <li><a href="/transaksi" class="dropdown-item py-2 opacity-75"><i class="bi bi-clock-history mx-3"></i> Order History</a></li>
                            <hr class="my-2">
                            <li><a href="/logout" class="dropdown-item py-2 opacity-75"><i class="bi bi-box-arrow-right mx-3"></i> Logout</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item mx-1 ">
                        <a href="/auth/login" class="nav-link color-org ">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="/assets/js/jquery-3.6.4.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/assets/js/main.js"></script>

    @stack('javascript')
</body>

</html>
