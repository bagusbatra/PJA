{{-- menghubungkan dengan file master --}}
@extends('admin/master')

{{-- konten --}}
@section('kontenAdmin')
<div class="col pt-3">
    <div class="card produk">
        <div class="card-body p-1">
            <form class="row p-2" action="" method="GET">
                <div class="kategori">
                    <select class="form-select filter" name="category_id">
                        <option value="Urut">All Category</option>
                        <option value="Urut">Terbaru</option>
                        <option value="Urut">Terdahulu</option>
                    </select>
                </div>
                <div class="tanggal">
                    <div class="input-group filter">
                        <input class="form-control" type="date" name="start" value="" />
                        <input class="form-control" type="date" name="end" value="" />
                    </div>
                </div>
                <div class="search">
                    <input class="form-control" type="text" name="q" value="" placeholder="Search here..." />
                </div>
                <div class="tombolSearch">
                    <button class="btn btn-success">Search</button>
                </div>
            </form>
            <div class="div mb-2">
                <a href="" class="tambahProduk" id="tambahProduk" data-toggle="modal" data-target="#TambahProduk"><i class="ti-plus"> </i>Tambah Data</a>
            </div>
            {{-- form tambah produk --}}
            <div class="modal fade" id="TambahProduk" role="dialog" arialabelledby="modalLabel" area-hidden="true">
                <form action="/proses" method="POST" enctype="multipart/form-data" class="formTambahProduk" id="myForm">
                    @csrf
                    <div>
                        <label class="label" for="id_produk">ID Produk</label>
                        <input class="input" type="text" id="id_produk" name="id_produk" placeholder="Masukkan ID Produk" required>
                    </div>
                    <div>
                        <label class="label" for="nama_produk">Nama Produk</label>
                        <input class="input" type="text" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" required>
                    </div>
                    <div>
                        <label class="label" for="type_produk">Tipe Produk</label>
                        <input class="input" type="text" id="type_produk" name="type_produk" placeholder="Masukkan Tipe Produk" required>
                    </div>
                    <div>
                        <label class="label" for="gambar">Upload Gambar</label>
                        <input class="inputgambar" type="file" id="gambar" name="gambar" accept="image/*" required>
                    </div>
                    <div>
                        <label class="label" for="pdf">Upload PDF</label>
                        <input class="inputpdf" type="file" id="pdf" name="pdf" accept="pdf/*" required>
                    </div>
                    <div>
                        <label class="label" for="keterangan">Keterangan</label><br>
                        <textarea class="inputketerangan" id="keterangan" name="keterangan" rows="4" placeholder="Masukkan Keterangan Produk" required></textarea>
                    </div>
                    <div>
                        <button class="cancel" type="button" id="cancelBtn" onclick="closeForm()">Cancel</button>
                        <button class="submit" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            {{-- akhir form tambah produk --}}
        </div>
        <div class="card">
            <div class="table produk ov-h">
                <table class="table" style="text-align: center;">
                    <thead>
                        <tr>
                            <th style="width: 8%;">ID</th>
                            <th style="width: 10%;">Image</th>
                            <th style="width: 17%;">Name</th>
                            <th style="width: 15%;">Type</th>
                            <th>Description</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="id">1234</td>
                            <td><span class="image"></span></td>
                            <td><span class="name">louis@gmail.com</span></td>
                            <td><span class="type">12/12/2012</span></td>
                            <td>
                                <span class="description">Lihat</span>
                            </td>
                            <td>
                                <a href="" class="editProduk" id="editProduk" data-toggle="modal" data-target="#EditProduk"><i class="ti-pencil-alt"></i></a>
                                {{-- form tambah produk --}}
                                <div class="modal fade" id="EditProduk" role="dialog" arialabelledby="modalLabel" area-hidden="true">
                                    <form action="/proses" method="POST" enctype="multipart/form-data" class="formTambahProduk" id="myForm">
                                        @csrf
                                        <div>
                                            <label class="label" for="id_produk">ID Produk</label>
                                            <input class="input" type="text" id="id_produk" name="id_produk" placeholder="Masukkan ID Produk" required>
                                        </div>
                                        <div>
                                            <label class="label" for="nama_produk">Nama Produk</label>
                                            <input class="input" type="text" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" required>
                                        </div>
                                        <div>
                                            <label class="label" for="type_produk">Tipe Produk</label>
                                            <input class="input" type="text" id="type_produk" name="type_produk" placeholder="Masukkan Tipe Produk" required>
                                        </div>
                                        <div>
                                            <label class="label" for="gambar">Upload Gambar</label>
                                            <input class="inputgambar" type="file" id="gambar" name="gambar" accept="image/*" required>
                                        </div>
                                        <div>
                                            <label class="label" for="pdf">Upload PDF</label>
                                            <input class="inputpdf" type="file" id="pdf" name="pdf" accept="pdf/*" required>
                                        </div>
                                        <div>
                                            <label class="label" for="keterangan">Keterangan</label><br>
                                            <textarea class="inputketerangan" id="keterangan" name="keterangan" rows="4" placeholder="Masukkan Keterangan Produk" required></textarea>
                                        </div>
                                        <div>
                                            <button class="cancel" type="button" id="cancelBtn" onclick="closeForm()">Cancel</button>
                                            <button class="submit" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- akhir form tambah produk --}}
                                <a href="" class="hapusProduk"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div> <!-- /.card -->
</div>  <!-- /.col-lg-8 -->

@endsection