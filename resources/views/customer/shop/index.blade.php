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

                @foreach ($produks as $produk)
                        <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                            <a class="product-item" href="{{ route('addToCart', $produk->id) }}">
                                <img src="{{ asset('storage/' . $produk->gambar) }}"
                                    class="img-fluid product-thumbnail rounded">
                                <h3 class="">{{ $produk->nama_produk }}</h3>
                                <p>{{ $produk->tipe_produk }}</p>
                            </a>
                        </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@push('script')
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif
@endpush
