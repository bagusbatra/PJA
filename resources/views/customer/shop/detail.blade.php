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

<div class="untree_co-section product-section before-footer-section">
    <div class="container">
          <div class="row">

            @foreach($produks as $produk)
            <div class="container">
                <h2>Tambah Data Produk</h2>
                <form action="{{ route('cart.store', $produk->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <img src="{{ asset('storage/'.$produk->gambar) }}" class="img-fluid product-thumbnail rounded">
                    <div>
                        <label class="label" for="id">{{ $produk->id }}</label>
                    </div>
                    <div>
                        <label class="label" for="nama_produk">{{ $produk->nama_produk }}</label>
                    </div>
                    <div>
                        <label class="label" for="tipe_produk">{{ $produk->tipe_produk }}</label>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            @endforeach

          </div>
    </div>
</div>


@endsection