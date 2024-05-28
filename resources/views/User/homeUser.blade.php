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
  <body class="home">
    <nav>
        <p class="logo">May' Cakes</p>
        <div class="menu d-flex">
            <div class="hyperlink">
                <a class="link active" href="">Home</a>
                <a class="link" href="">Catalog</a>
                <a class="link" href="">AboutUs</a>
            </div>
            <a href=""><img src="images/icon-shopping-cart.svg" alt=""></a>
            <a href=""><img src="images/profileIcon.svg" alt=""></a>
            <a href=""><img src="images/log-in.svg" alt=""></a>
        </div>
    </nav>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <section class="d-flex justify-content-center">
        <div class="container-content">
            <div class="row row1">
                <div class="col-7 d-flex flex-column justify-content-center">
                    <p class="title">Why Choose Us?</p>
                    <p class="desk">Our cakes are made 100% from scratch and absolutely
                        no commercial cakes mixes are used. You will taste the
                        difference and can be assured of quality.</p>
                </div>
                <div class="col-5 d-flex justify-content-center">
                    <div class="image"></div>
                </div>
            </div>
            <div class="row row2 d-flex justify-content-center">
                <b>This Week’s Special</b>
            </div>
            <div class="row row3">
                <div class="col-3 image" style="background-image: url('images/home2.svg');"></div>
                <div class="col-3 image" style="background-image: url('images/home3.svg');"></div>
                <div class="col-3 image" style="background-image: url('images/home4.svg');"></div>
                <div class="col-3 image" style="background-image: url('images/home5.svg');"></div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
