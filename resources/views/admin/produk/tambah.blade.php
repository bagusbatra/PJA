{{-- menghubungkan dengan file master --}}
@extends('admin/master')

{{-- konten --}}
@section('kontenAdmin')
<div class="container">
    <h2>Tambah Data Produk</h2>
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="TambahProduk" id="myForm">
        @csrf
        <div>
            <label class="label" for="id">ID Produk</label>
            <input class="input" type="text" id="id" name="id" placeholder="Masukkan ID Produk" required>
        </div>
        <div>
            <label class="label" for="nama_produk">Nama Produk</label>
            <input class="input" type="text" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" required>
        </div>
        <div>
            <label class="label" for="price">Harga</label>
            <input class="input" type="text" id="price" name="price" placeholder="Masukkan Harga Produk" required>
        </div>
        <div>
            <label class="label" for="tipe_produk">Tipe Produk</label>
            <input class="input" type="text" id="tipe_produk" name="tipe_produk" placeholder="Masukkan Tipe Produk" required>
        </div>
        <div>
            <label class="label" for="gambar">Upload Gambar</label>
            <input class="inputgambar" type="file" id="gambar" name="gambar" accept="image/*" required>
        </div>
        <div>
            <label class="label" for="upload_pdf">Upload PDF</label>
            <input class="inputpdf" type="file" id="upload_pdf" name="upload_pdf" accept="pdf/*" required>
        </div>
        <div>
            <label class="label" for="keterangan">Keterangan</label><br>
            <textarea class="inputketerangan" id="keterangan" name="keterangan" rows="4" placeholder="Masukkan Keterangan Produk" required></textarea>
        </div>
        <div>
            <a href="{{ route('produk.index') }}" class="btn btn-danger">Kembali</a>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection