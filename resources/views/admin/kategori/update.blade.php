
@extends('layouts.layoutAdmin')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Data kategori</h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">kategori</li>
        </ol>
      </nav>
      <!-- /resources/views/post/Update.blade.php -->



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Update Post Form -->
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Update kategori</h5>
                    <form action="{{ route('kategori.update',$kategoris->id_kategori) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                  <div class="col-lg-6">

                      <label for="">Nama kategori</label>
                      <input type="text" name="nama_kategori" value="{{old('nama_kategori',$kategoris->nama_kategori)}}" class="form-control" >


                  </div>
                  <div class="text-end py-4" >
                    <button type="submit" class="btn btn-primary"> Update</button>
                 </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </section>



  </main><!-- End #main -->
@endsection


