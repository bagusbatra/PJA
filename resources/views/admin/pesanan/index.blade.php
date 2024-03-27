{{-- menghubungkan dengan file master --}}
@extends('admin/master')

{{-- konten --}}
@section('kontenAdmin')
    <div class="col pt-3">
        <div class="card produk">
            <div class="card-body p-4">
                <h3>Transaksi User</h3>
            </div>

            <div class="card">
                <div class="table produk ov-h">
                    <table class="table" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Pesanan</th>
                                <th>No. Pesanan</th>
                                <th>Nama</th>
                                <th>Total Pesanan</th>
                                <th>Jumlah Item</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nomor = 1;
                            @endphp
                            @foreach ($transactions as $key => $transaction)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->number }}</td>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>{{ $transaction->total_price }}</td>
                                    <td>{{ $transaction->items->sum('quantity') }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            </div>
        </div> <!-- /.card -->
    </div> <!-- /.col-lg-8 -->
@endsection
