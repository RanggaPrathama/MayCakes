@extends('layouts.layoutUser')

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 bg-body-tertiary rounded-5 mx-3 my-3 px-3 py-3">
                    <h5 class="font-weight-bold" style="font-weight: 600">Address & Ekspedisi :</h5>
                    <h3 class="font-weight-bold" style="font-weight: 600">Jalan Bunga Andong, Jatimulyo, Lowokwaru. (Paxel)</h3>
                </div>
            </div>
    </div>

    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-12 bg-body-tertiary rounded-5">
                <div class="row">
                    @foreach ($carts as $cart )


                    <div data-idcake="{{$cart->id_cake}}" data-quantity="{{$cart->quantity}}" data-harga_cake="{{$cart->harga_cake}}"  class="col-lg-12 d-flex py-4">
                        <img src="{{route('cake.image',$cart->id_cake)}}" style="background-size: cover; background-repeat:no-repeat" alt="">
                       <div class="content px-4 py-4 flex-column">
                        <h5 style="font-weight: 600;  font-size:25px">Name : Tiramisu </h5>
                        <h5 style="font-weight: 600; font-size:25px">Price : RP. 5000</h5>
                       </div>
                    </div>
                    @endforeach


                    <div class="col-lg-12">
                        <div class="total d-flex justify-content-end px-4 pb-5 ">
                            <div class="totalValue px-5 d-flex">
                            <form id="formPembayaran" action="{{route('pemesanan.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <h5 class="px-3">Total :</h5>
                            <input id="totalHarga" style="max-width: 200px" type="number" class="form-control" value="5000" disabled>
                            </div>
                            <button style="background-color: rgb(136, 96, 96); color:white" class="btn px-5 py-2 buttonPembayaran">Buy</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function(){
    let data = [];
    $('[data-idcake]').each(function(){
        data.push({
            'idcake' : $(this).data('idcake'),
            'jumlah' : $(this).data('quantity'),
            'harga_cake' : $(this).data('harga_cake'),
        });
    });

    function totalHarga(){
        let total = 0;
        data.forEach((item)=>{
            total += item.jumlah * item.harga_cake;
        });
        $('#totalHarga').val(total);
    }

    totalHarga();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.buttonPembayaran', function(e) {
        e.preventDefault(); // Prevent default form submission

        let form = $('#formPembayaran');
        let totalHarga = $('#totalHarga').val();

        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: {
                dataCart: JSON.stringify(data),
                totalHarga: totalHarga
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: "Data Tersimpan!",
                        text: "Silahkan Klik Melanjutkan Pemesanan!",
                        icon: "success"
                    }).then(function(){
                        window.location.href = `/pembayaran/${response.data}`;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message || 'Something went wrong!',
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        });
    });
});

</script>
@endsection
