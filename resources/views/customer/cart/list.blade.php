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
        <form class="col-md-12" method="post">
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
                  @foreach($carts as $cart)
                  <tr>
                      <td class="product-thumbnail">
                          <img src="{{ asset('storage/'.$cart->produk->gambar) }}" alt="Image" class="img-fluid rounded">
                      </td>
                      <td class="product-name">
                          <h2 class="h5 text-black">{{ $cart->produk->nama_produk }}</h2>
                      </td>
                      <td class="product-type">
                          <h2 class="h5 text-black">{{ $cart->produk->tipe_produk }}</h2>
                      </td>
                      <td class="product-type">
                        <h2 class="h5 text-black">{{ $cart->quantity }}</h2>
                      </td>
                      <td>
                        <a href="{{ route('cart.edit', ['id' => $cart->id]) }}" class="btn btn-primary"><i class="ti-pencil-alt"></i></a>
                                {{-- Hapus --}}
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteProduk{{ $cart->id }}">
                                    <i class="ti-trash"></i>
                                </button>
                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="DeleteProduk{{ $cart->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $cart->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $cart->id }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus produk ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
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
        </form>
      </div>

      <div class="container">
        <div class="row">
            <div class="col-md-5 mb-3 mb-md-0 pb-3">
              <div class="col-md-6 mb-3 mb-md-0">
                <a href="{{ route('detailuser') }}">test</a>
              </div>
            </div>
        </div>
      </div>
      




      {{-- <div class="row">
        <div class="col">
          <div class="row">
            <div class="col">
              <label class="text-black h4" for="coupon">Detail Pesanan</label>
            </div>
            <div class="col-md-5 mb-3 mb-md-0 pb-3">
              <input type="text" class="form-control py-3" id="coupon" placeholder="Nama Pemesan">
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Nama Instansi">
            </div>
            <div class="col-md-7 mb-3 mb-md-0 pb-3">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Email">
            </div>
            <div class="col-md-5 mb-3 mb-md-0 pb-3">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Telepon">
            </div>
            <div class="col-md-7 mb-3 mb-md-0 pb-3">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Alamat">
            </div>
            <div class="col-md-5 mb-3 mb-md-0 pb-3">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Kode Pos">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-6 mb-3 mb-md-0">
              <button class="btn btn-black btn-sm btn-block">Submit Item</button>
            </div>
          </div>
        </div>
      </div> --}}


    </div>
  </div>


@endsection