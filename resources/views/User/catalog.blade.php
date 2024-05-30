@extends('layouts.layoutUser')

@section('content')

<section class="">
    <div class="container-content">
        <div class="row brownies">
            <p class="title">Brownies</p>
        </div>
        <div class="row box-content">
            @foreach ($brownies as $browni)
                <div class="col-3 content" style="cursor: pointer" onclick="window.location.href='{{ route('productDetail', $browni->id_cake) }}'">
                    <div class="image" style="background-image: url({{ route('cake.image', $browni->id_cake) }});"></div>
                    <p class="price">Rp.{{ $browni->harga_cake }}</p>
                    <p class="desk">{{ $browni->nama_cake }}</p>
                </div>
            @endforeach
        </div>
        <div class="row cakes">
            <p class="title">Cake</p>
        </div>
        <div class="row box-content">
            @foreach ($cakes as $cake)
                <div class="col-3 content" style="cursor: pointer" onclick="window.location.href='{{ route('productDetail', $cake->id_cake) }}'">
                    <div class="image" style="background-image: url({{ route('cake.image', $cake->id_cake) }});"></div>
                    <p class="price">Rp.{{ $cake->harga_cake }}</p>
                    <p class="desk">{{ $cake->nama_cake }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
