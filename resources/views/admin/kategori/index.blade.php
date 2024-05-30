@extends('layouts.layoutAdmin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Kategori</h1>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Kategori</li>
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
                        <h5 class="card-title">Data Kategori</h5>

                        <a href="{{ route('kategori.create') }}"> <button class="btn btn-primary"> Create Data</button></a>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Id Kategori</th>
                                    <th scope="col">Nama Kategori</th>

                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $noId = 1; ?>
                                @foreach ($kategoris as $kategori)
                                    <tr>
                                        <th scope="row">{{ $noId++ }}</th>
                                        <td>{{ $kategori->nama_kategori }}</td>
                                        <td>
                                            <a href="{{ route('kategori.edit', $kategori->id_kategori) }}"><button
                                                    type='submit'class="btn btn-success"><i
                                                        class="bi bi-pencil-square"></i></button></a>
                                            <form action="{{ route('kategori.delete', $kategori->id_kategori) }}"
                                                method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure ?')"
                                                    class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>

                                            </form>

                                        </td>
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

