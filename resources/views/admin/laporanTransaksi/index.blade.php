@extends('layouts.layoutAdmin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Transaksi</h1>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Transaksi</h5>


                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No order</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Atas Nama</th>
                                    <th scope="col"> Total Transaksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $noId = 1; ?>
                                @foreach ($transaksis as $transaksi)
                                    <tr>
                                        <th scope="row">{{ $noId++ }}</th>
                                        <td>{{ $transaksi->created_at }}</td>
                                        <td> {{$transaksi->name}}</td>
                                        <td>{{$transaksi->total_pesan}}</td>

                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>


</main><!-- End #main -->
@endsection

