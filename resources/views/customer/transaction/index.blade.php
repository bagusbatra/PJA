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
                        <h1>Daftar Transaksi</h1>
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
                                <th>No Transaksi</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Quotation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">{{ $transaction->number }}</h2>
                                    </td>
                                    <td class="product-type">
                                        <h2 class="h5 text-black">Rp. {{ number_format($transaction->total_price) }}</h2>
                                    </td>
                                    <td class="product-type">
                                        <h2 class="h5 text-black">{{ $transaction->status }}</h2>
                                    </td>
                                    <td class="product-type">
                                        <h2 class="h5 text-black">{{ $transaction->created_at }}</h2>
                                    </td>
                                    <td>
                                        <a href="{{ route('quotation.generate', $transaction->id) }}">Download</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
