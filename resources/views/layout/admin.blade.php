<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TokyoFinds - Admin</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link href="/assets/icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-lg py-3 bg-white shadow-sm ">
        <div class="container">
            <a href="/app" class="navbar-brand n-semibold">Tokyo<span style="color: #FC4C02;">Finds</span></a>
            <button class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-3 ">
                        <a href="/bukti" class="nav-link">Bukti Bayar</a>
                    </li>
                    <li class="nav-item mx-3 ">
                        <a href="/pesanan" class="nav-link">Pesanan</a>
                    </li>
                    <li class="nav-item mx-3 ">
                        <a href="/category" class="nav-link">Category</a>
                    </li>
                    <li class="nav-item mx-3 ">
                        <a href="/produk" class="nav-link">Produk</a>
                    </li>
                    <li class="nav-item mx-3 ">
                        <a href="/character" class="nav-link">Character</a>
                    </li>
                    <li class="nav-item mx-3 ">
                        <a href="/series" class="nav-link">Series</a>
                    </li>
                    <li class="nav-item mx-3 ">
                        <a href="/brand" class="nav-link">Brand</a>
                    </li>
                </ul>
                <ul class="navbar-nav ">
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
</body>
</html>