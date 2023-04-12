<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TokyoFinds - Tempat Belanja Figure dan Barang Lainnya!</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link href="/assets/icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg py-3 bg-white shadow-sm fixed-top">
        <div class="container">
            <a href="/store" class="navbar-brand n-semibold">Tokyo<span style="color: #FC4C02;">Finds</span></a>
            <button class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-3 ">
                        <a href="/store" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item mx-3 dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            Category
                        </a>
                        <ul class="dropdown-menu">
                            @foreach (categories() as $data)
                                <li><a class="dropdown-item" href="/app/c/{{ $data->id }}">{{ $data->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item mx-3 ">
                        <a href="/payment/confirmation" class="nav-link">Pembayaran</a>
                    </li>
                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item mx-1 dropdown">
                        <a href="" data-bs-toggle="dropdown" class="nav-link dropdown-toggle"><i
                                class="bi bi-box2"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/transaksi" class="dropdown-item">Transaksi</a></li>
                            <li><a href="/riwayat" class="dropdown-item">Riwayat Transaksi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-1  ">
                        <a href="/cart" class="nav-link"><i class="bi bi-cart"></i></a>
                    </li>
                    <li class="nav-item mx-1 ">
                        <a href="/logout" class="nav-link"><i class="bi bi-box-arrow-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="/assets/js/jquery-3.6.4.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>
