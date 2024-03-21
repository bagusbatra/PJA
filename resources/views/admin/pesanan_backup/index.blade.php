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
                        <input class="form-control" type="text" name="q" value=""
                            placeholder="Search here..." />
                    </div>
                    <div class="tombolSearch">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="table produk ov-h">
                    <table class="table" style="text-align: center;">
                        <thead>
                            <tr>
                                <th style="width: 8%;">ID</th>
                                <th style="width: 10%;">Image</th>
                                <th style="width: 17%;">Name</th>
                                <th style="width: 17%;">Price</th>
                                <th style="width: 15%;">Type</th>
                                <th>Description</th>
                                <th style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotations as $quotation)
                                <tr>
                                    <td>{{ $quotation->id }}</td>
                                    <td>{{ $quotation->user_id }}</td>
                                    <td>{{ $quotation->price }}</td>
                                    <td>{{ $quotation->tipe_produk }}</td>
                                    <td>{{ $quotation->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('pesanan.cetak', ['id' => $quotation->id]) }}"
                                            class="btn btn-primary"><i class="ti-pencil-alt"></i></a>
                                        {{-- Hapus --}}
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#DeleteProduk{{ $quotation->id }}">
                                            <i class="ti-trash"></i>
                                        </button>
                                        <!-- Modal Konfirmasi Hapus -->
                                        <div class="modal fade" id="DeleteProduk{{ $quotation->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModalLabel{{ $quotation->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $quotation->id }}">
                                                            Konfirmasi Hapus</h5>
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
                                                        <form action="{{ route('produk.destroy', $quotation->id) }}"
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
                </div> <!-- /.table-stats -->
            </div>
        </div> <!-- /.card -->
    </div> <!-- /.col-lg-8 -->
@endsection

{{-- Bagian script JavaScript --}}
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            @foreach ($quotations as $produk)
                $('#saveChangesBtn{{ $quotation->id }}').click(function() {
                    $('#editForm{{ $quotation->id }}').submit();
                });
            @endforeach
        });
    </script>
@endpush
