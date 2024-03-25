{{-- menghubungkan dengan file master --}}
@extends('admin/master')

{{-- konten --}}
@section('kontenAdmin')
    <div class="col pt-3">
        <div class="card produk">
            <div class="card-body p-4">
                <h3>Pesanan {{ $transaction->number }}</h3>
            </div>

            <div class="card p-4">

                <form method="POST" action="{{ route('transaction.update', $transaction->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="id" class="form-label">ID Transaksi</label>
                        <input type="text" class="form-control" id="id" value="{{ $transaction->id }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Nomor Transaksi</label>
                        <input type="text" class="form-control" id="number" value="{{ $transaction->number }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="name" value="{{ $transaction->user->name }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="total_price" class="form-label">Total Harga</label>
                        <input type="text" class="form-control" id="total_price" value="{{ $transaction->total_price }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select form-control" id="status" name="status">
                            <option value="Menunggu Konfirmasi"
                                {{ $transaction->status === 'Menunggu Konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi
                            </option>
                            <option value="Diproses" {{ $transaction->status === 'Diproses' ? 'selected' : '' }}>
                                Diproses</option>
                            <option value="Selesai" {{ $transaction->status === 'Selesai' ? 'selected' : '' }}>Selesai
                            </option>
                            <option value="Dibatalkan" {{ $transaction->status === 'Dibatalkan' ? 'selected' : '' }}>
                                Dibatalkan
                            </option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </form>

                <hr>

                <h4>List Barang:</h4>
                <table class="w-100 text-black" cellspacing="0" cellpadding="0" border="1">
                    <thead>
                        <td>No</td>
                        <td>Nama Barang</td>
                        <td>Qty</td>
                        <td>Harga Satuan</td>
                        <td>Total Harga</td>
                    </thead>
                    @php
                        $nomor = 1;
                    @endphp
                    <tbody>
                        @foreach ($transaction_items as $item)
                            <tr class="text-center">
                                <td>{{ $nomor++ }}</td>
                                <td class="text-left">{{ $item->product->nama_produk }}</td>
                                <td>{{ $item->quantity }} EA</td>
                                <td>Rp. {{ number_format($item->product->price) }}</td>
                                <td>Rp. {{ number_format($item->price) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
