
@extends('layouts.layoutAdmin')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Data Cakes</h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Cakes</li>
        </ol>
      </nav>
      <!-- /resources/views/post/create.blade.php -->



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

<!-- Create Post Form -->
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Update Cakes</h5>
                    <form action="{{ route('cake.update',$cakes->id_cake) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                  <div class="col-lg-6">

                      <label for="">Nama Cake</label>
                      <input type="text" name="nama_cake" value="{{old('nama_cake', $cakes->nama_cake)}}" class="form-control  @error('nama_cake')
                      is-invalid
                      @enderror" >
                      @error('nama_cake')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                      @enderror
                      <br>
                      <label for="">Deskripsi Cake</label>
                      <textarea type="text" name="deskripsi_cake"   class="form-control @error('deskripsi_cake')
                          is-invalid
                      @enderror" > {{$cakes->deskripsi_cake}}</textarea>
                      @error('deskripsi_cake')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                      @enderror
                      <br>
                      <label for="">Harge Cake</label>
                      <input type="number" name="harga_cake" value="{{old('harga_cake',$cakes->harga_cake)}}" class="form-control @error('harga_cake')
                        is-invalid
                      @enderror" >
                      @error('harga_cake')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                      @enderror
                      <br>
                      <label for="">Gambar Cake</label>
                      <input type="file" name="gambar_cake" class="form-control @error('gambar_cake')
                        is-invalid
                      @enderror">
                      @error('gambar_cake')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                      @enderror

                  </div>
                  <div class="text-end py-4" >
                    <button type="submit" class="btn btn-primary"> Update Data</button>
                 </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </section>

  </main><!-- End #main -->
@endsection


