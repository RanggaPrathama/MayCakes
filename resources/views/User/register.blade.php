
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
        <p class="title">Form Register</p>
        <form action="{{route('registerPost')}}" method="POST" class="form-login d-flex flex-column justify-content-center">
            @csrf
            <div class="mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid
            @enderror" id="exampleFormControlInput1" placeholder="Name">
            @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid
                @enderror" id="exampleFormControlInput1" placeholder="email">
                @error('email')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid

                    @enderror" id="exampleFormControlInput1" placeholder="password">
                    @error('password')
                    {{$message}}
                    @enderror
                    </div>

            <input type="password" name="password_confirmation" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="password confirmation">
            <button class="btn btn-login" type="submit">Register</button>
            <a href="{{route('login')}}" style="text-decoration: none" href=""><p class="text-white"> Have'nt account?</p></a>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
