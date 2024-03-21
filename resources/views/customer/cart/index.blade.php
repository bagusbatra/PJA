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
                        <h1>Daftar Pesanan</h1>
                    </div>
                </div>
                <div class="col-lg-7">
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-type">Type</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="{{ asset('storage/' . $cart->product->gambar) }}" alt="Image"
                                            class="img-fluid rounded">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">{{ $cart->product->nama_produk }}</h2>
                                    </td>
                                    <td class="product-type">
                                        <h2 class="h5 text-black">{{ $cart->product->tipe_produk }}</h2>
                                    </td>
                                    <td class="product-type">
                                        <h2 class="h5 text-black">{{ $cart->quantity }}</h2>
                                    </td>
                                    <td>
                                        <a href="{{ route('cart.edit', $cart->id) }}" class="btn btn-primary"><i
                                                class="ti-pencil-alt"></i></a>
                                        {{-- Hapus --}}
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#DeleteProduk{{ $cart->id }}">
                                            <i class="ti-trash"></i>
                                        </button>
                                        <!-- Modal Konfirmasi Hapus -->
                                        <div class="modal fade" id="DeleteProduk{{ $cart->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModalLabel{{ $cart->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $cart->id }}">
                                                            Konfirmasi Hapus
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus produk ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="{{ route('cart.destroy', $cart->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col text-end">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#proses">Proses</button>
                    </div>
                </div>

                <div class="modal fade" id="proses" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    Masukkan Detail Pesanan
                                </h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('cart.checkout') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label>Nama Pemesan</label>
                                        <input type="text" name="nama_pemesan" class="form-control"
                                            placeholder="Nama Pemesan" required="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nama Instansi</label>
                                        <input type="text" name="nama_instansi" class="form-control"
                                            placeholder="Nama Instansi" required="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            required="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Telepom</label>
                                        <input type="text" name="telepon" class="form-control" placeholder="Telepon"
                                            required="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control" placeholder="Alamat"
                                            required="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Kode Pos</label>
                                        <input type="text" name="kode_pos" class="form-control"
                                            placeholder="Kode Pos" required="">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block mb-5">Checkout</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <form action="{{ route('transaction.store') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
