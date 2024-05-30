<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body class="login">
    {{-- <nav>
        <p class="logo">May' Cakes</p>
        <div class="menu">
            <a href=""><img src="images/icon-shopping-cart.svg" alt=""></a>
            <a href=""><img src="images/profileIcon.svg" alt=""></a>
            <a href=""><img src="images/log-in.svg" alt=""></a>
        </div>
    </nav> --}}

    <section class="container container-login">
        <div class="image-label"></div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <p class="title">Form Login</p>
        <form action="{{route('loginPost')}}" method="POST" class="form-login d-flex flex-column justify-content-center">
            @csrf
            <div class="mb-3">
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
            </div>
            <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="password">
            <button class="btn btn-login" type="submit">Login</button>
            <a href="{{route('register')}}" style="text-decoration: none" href=""><p class="text-white"> Dont Have Account?</p></a>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
