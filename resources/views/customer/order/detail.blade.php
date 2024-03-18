{{-- menghubungkan dengan file master --}}
@extends('master')

{{-- konten --}}
@section('konten')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Shop</h1>
                </div>
            </div>
            <div class="col-lg-7">
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->
<div class="container"><br>
    <div class="col-md-9 col-md-offset-4">
        <h2 class="text-center">Masukkan Detail Pesanan</h2>
        <hr>
        <form action="{{ route('detail.store') }}" method="POST">
        @csrf
            <div class="form-group mb-3">
                <label>Nama Pemesan</label>
                <input type="text" name="nama_pemesan" class="form-control" placeholder="Nama Pemesan" required="">
            </div>
            <div class="form-group mb-3">
                <label>Nama Instansi</label>
                <input type="text" name="nama_instansi" class="form-control" placeholder="Nama Instansi" required="">
            </div>
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
            <div class="form-group mb-3">
                <label>Telepom</label>
                <input type="text" name="telepon" class="form-control" placeholder="Telepon" required="">
            </div>
            <div class="form-group mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required="">
            </div>
            <div class="form-group mb-3">
                <label>Kode Pos</label>
                <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" required="">
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-5">Submit</button>
        </form>
    </div>
</div>
@endsection