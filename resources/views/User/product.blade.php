@extends('layouts.layoutUser')

@section('content')

<section class="d-flex justify-content-center">
    <div class="container-content">
        <div class="row">
            <div class="col-4 d-flex justify-content-center">
                <div class="image">
                    <img src="{{ route('cake.image', $cakes->id_cake) }}" alt="">
                </div>
            </div>
            <div class="col-8 d-flex flex-column justify-content-center">
                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p class="title">Product Details</p>
                    <p class="name">Name:  {{ $cakes->nama_cake }}</p>
                    <p class="price">Price:   Rp.{{ $cakes->harga_cake }}</p>
                    <div class="d-flex form">
                        <input class="form-control" type="number" name="quantity" id="">
                        <input type="hidden" name="id_cake" value="{{ $cakes->id_cake }}">
                        <button class="btn btn-add" type="submit">Add to Cart</button>
                        <a class="btn btn-buy" href="">Buy Now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
