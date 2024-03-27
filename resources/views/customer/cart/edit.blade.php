{{-- menghubungkan dengan file master --}}
@extends('master')

{{-- konten --}}
@section('konten')
@foreach($carts as $cart)
<div class="container">
    <h2>Tambah Data Produk</h2>
    <form action="{{ route('cart.update', $cart->id) }}" method="POST" enctype="multipart/form-data" class="TambahProduk" id="editForm{{ $cart->id }}">
        @csrf
        @method('PUT')
        <div>
            <label class="label" for="id">ID Produk</label>
            <input class="input" type="text" id="id" name="id" value="{{ $cart->id }}">
        </div>
        <div>
            <label class="label" for="nama_produk">Nama Produk</label>
            <input class="input" type="text" id="nama_produk" name="nama_produk" value="{{ $cart->produk_id }}">
        </div>
        <div>
            <label class="label" for="price">Price</label>
            <input class="input" type="text" id="price" name="price" value="{{ $cart->quantity }}">
        </div>
        <div>
            <label class="label" for="tipe_produk">Tipe Produk</label>
            <input class="input" type="text" id="tipe_produk" name="tipe_produk" value="{{ $cart->additional_options }}">
        </div>
        <div>
            {{-- <a href="{{ route('cart.umum') }}" class="btn btn-danger">Kembali</a> --}}
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
@endforeach
@endsection