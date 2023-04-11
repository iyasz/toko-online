<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TokyoFinds - Login</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link href="/assets/icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 mt-5">
                <div class="text-center mt-3">
                    <h5>Explore your Hobby with Tokyo<span style="color: #FC4C02;">Finds!</span></h5>
                </div>
                <div class="card border-0 shadow-sm mt-3">
                    <div class="card-body mx-2">
                        <form action="/login" method="get">
                            @csrf
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Email</label>
                                <input autocomplete="off" type="text" name="email" required value="{{old('email')}}" class="form-control rounded-1">
                                @error('email')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Password</label>
                                <input autocomplete="off" type="password" name="password" required class="form-control rounded-1">
                                @error('password')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="mt-5 mb-3 text-center">
                                <button class="btn btn-primary rounded-1 w-100 mb-3 border-0">Masuk</button>
                                <a href="/auth/register" style="color: #FC4C02;" class=" opacity-75 ">Belum punya akun? click disini!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>