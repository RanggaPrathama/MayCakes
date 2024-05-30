@extends("layouts.layoutUser")

@section('content')

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12 bg-body-tertiary rounded">
                <h3>No Rekening Toko</h3>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12 bg-body-tertiary rounded">
                <h4>Silahkan Transfer Uang Ke No Rekening Di bawah ini Sebesar:</h4>
                <h4>Rp.{{$pemesanans->total_pesan}}.-</h4>
                <h4>{{$payments->nama_bank}} {{$payments->no_rekening}} An {{$payments->atas_nama}}</h4>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 bg-body-tertiary rounded">
               <h3>Upload Bukti Pembayaran</h3>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12 py-3 bg-body-tertiary rounded">
                <form action="{{route('pembayaran.store')}}" method="POST">
                    @csrf
                <h5>Atas Nama</h5>
                <input type="text" class="form-control" value="{{auth()->user()->name}}">
                <h5>Nama Bank</h5>
                <input  class="form-control" type="text" value="{{$payments->nama_bank}}" >
                <input type="hidden" name="id_pemesanan" value="{{$pemesanans->id_pemesanan}}">
                <input type="hidden" name="id_payment" value="{{$payments->id_payment}}">
                <h5>Bukti Bayar</h5>
                <input type="file" class="form-control" name="buktiBayar" >

                <div class="buttonPay py-5">
                    <button type="submit" style="background-color: rgb(136, 96, 96); color:white" class="btn px-5 py-2">Submit</button>
                  <a href="">  <button style="background-color: rgb(136, 96, 96); color:white" class="btn px-5 py-2">Back</button></a>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
