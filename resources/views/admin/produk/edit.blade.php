{{-- menghubungkan dengan file master --}}
@extends('admin/master')

{{-- konten --}}
@section('kontenAdmin')
@foreach($produks as $produk)
<div class="container">
    <h2>Tambah Data Produk</h2>
    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="TambahProduk" id="editForm{{ $produk->id }}">
        @csrf
        @method('PUT')
        <div>
            <label class="label" for="id">ID Produk</label>
            <input class="input" type="text" id="id" name="id" value="{{ $produk->id }}">
        </div>
        <div>
            <label class="label" for="nama_produk">Nama Produk</label>
            <input class="input" type="text" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}">
        </div>
        <div>
            <label class="label" for="price">Price</label>
            <input class="input" type="text" id="price" name="price" value="{{ $produk->price }}">
        </div>
        <div>
            <label class="label" for="tipe_produk">Tipe Produk</label>
            <input class="input" type="text" id="tipe_produk" name="tipe_produk" value="{{ $produk->tipe_produk }}">
        </div>
        <div>
            <label class="label" for="gambar">Upload Gambar</label>
            <input class="inputgambar" type="file" id="gambar" name="gambar" accept="image/*">
        </div>
        <div>
            <label class="label" for="upload_pdf">Upload PDF</label>
            <input class="inputpdf" type="file" id="upload_pdf" name="upload_pdf" accept="pdf/*">
        </div>
        <div>
            <label class="label" for="keterangan">Keterangan</label><br>
            <textarea class="inputketerangan" id="keterangan" name="keterangan" rows="4">{{ $produk->keterangan }}</textarea>
        </div>
        <div>
            <a href="{{ route('produk.index') }}" class="btn btn-danger">Kembali</a>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
@endforeach
@endsection