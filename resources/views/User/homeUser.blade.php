@extends('layouts.layoutUser')

@section('content')
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
                @foreach ($cakes as  $cake)
                <div class="col-3 image" onclick="window.location.href='{{route('productDetail',$cake->id_cake)}}'" style="cursor:pointer; background-image: url('{{route('cake.image',$cake->id_cake)}}');"></div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
