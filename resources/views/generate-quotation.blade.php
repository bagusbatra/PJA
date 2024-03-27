@php
    $id = Route::current()->parameter('id');
    $transaction = \App\Models\Transaction::where('id', $id)->first();
    $transaction_items = \App\Models\TransactionItem::where('transaction_id', $id)->get();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quotation-{{ $transaction->number }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    {{-- <link href="{{ public_path() }}/css/bootstrap.min.css" rel="stylesheet"> --}}

    <style>
        body {
            font-size: 13px !important;
        }

        .quotation-title {
            color: rgb(85, 83, 211);
            font-weight: 600;
            font-style: italic;
            font-family: 'Trebuchet MS', sans-serif !important;
            font-size: 30px !important;
        }

        footer {
            position: fixed;
            bottom: -30px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
            line-height: 35px;
            font-size: 11px !important;
        }
<<<<<<< HEAD
        .image-ttd {
            display: flex;
            justify-content: center; /* Untuk mengatur horizontal centering */
            align-items: center;     /* Untuk mengatur vertical centering */
            height: 300px;           /* Atur tinggi sesuai kebutuhan */
        }
=======
>>>>>>> 58132d0c69e06bea5abf5330fbf42a8f02cab17f
    </style>
</head>

<body>
    <table class="w-100" cellspacing="0" cellpadding="0">
        <tr style="text-align: center;">
            <td rowspan="4" style="width: 30%;">
<<<<<<< HEAD
                <img src="{{ public_path() }}/storage/identity/logopja.jpg" alt="Logo"
=======
                <img src="{{ public_path() }}/storage/identity/logo.jpg" alt="Logo"
>>>>>>> 58132d0c69e06bea5abf5330fbf42a8f02cab17f
                    style="width: 100%; height: auto;">
            </td>
            <td rowspan="4" class="text-center" style="vertical-align: middle;">
                <p class="quotation-title">QUOTATION</p>
            </td>
        </tr>
    </table>
    <hr>
    <div class="row">
        <div class="col-md-6 mb-4">
            <table class="w-100" cellspacing="0" cellpadding="0">
                <tr>
                    <td>Perihal</td>
                    <td> : </td>
                    <td>Penawaran Harga</td>
                    <td class="text-right">Tanggal</td>
                    <td> : </td>
<<<<<<< HEAD
                    <td>{{ $transaction->created_at->formatLocalized('%d %B %Y') }}</td>
=======
                    <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
>>>>>>> 58132d0c69e06bea5abf5330fbf42a8f02cab17f
                </tr>
                <tr>
                    <td>Nomor</td>
                    <td> : </td>
                    <td>{{ $transaction->number }}</td>
                    <td rowspan="3"></td>
                </tr>
            </table>
        </div>
        <div class="col-md-12 mb-4">
            <table class="w-100 text-black" cellspacing="0" cellpadding="0">
                <tr>
                    <td>Kepada Yth.</td>
                </tr>
                <tr>
                    <td>{{ $transaction->user->userDetails->nama_instansi }}</td>
                </tr>
                <tr>
                    <td>Di tempat</td>
                </tr>
            </table>
        </div>
        <div class="col-md-12 mb-1">
            <p>Berikut kami mengajukan penawaran harga barang dibawah ini</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="w-100 text-black" cellspacing="0" cellpadding="0">
                <thead style="background-color: rgb(0, 25, 134);" class="text-center text-white" border="1">
                    <td style="border: 1px solid; width: 10px;">No</td>
                    <td style="border: 1px solid;">Nama Barang</td>
                    <td style="border: 1px solid;">Qty</td>
                    <td style="border: 1px solid;">Harga Satuan</td>
                    <td style="border: 1px solid;">Total Harga</td>
                </thead>
                @php
                    $nomor = 1;
                    $totalPrice = 0;
                @endphp
                <tbody>
                    @foreach ($transaction_items as $item)
                        @php
                            $totalPrice += $item->price;
                        @endphp

                        <tr class="text-center" style="border: 1px solid;">
                            <td style="border: 1px solid;">{{ $nomor++ }}</td>
                            <td style="border: 1px solid;" class="text-left">{{ $item->product->nama_produk }}</td>
                            <td style="border: 1px solid;">{{ $item->quantity }} EA</td>
                            <td style="border: 1px solid;">Rp. {{ number_format($item->product->price) }}</td>
                            <td style="border: 1px solid;">Rp. {{ number_format($item->price) }}</td>
                        </tr>
                    @endforeach

                    @php
                        $ppn = $totalPrice * 0.11;
                        $totalPriceWithPpn = $totalPrice + $ppn;
                    @endphp

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center text-white"
                            style="background-color: rgb(0, 25, 134); border: 1px solid;">
                            TERMS AND CONDITIONS</td>
                        <td></td>
                        <td>Jumlah</td>
                        <td class="text-right">Rp. {{ number_format($totalPrice) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-left: 1px solid; border-right: 1px solid;">- Harga Frangko
                            Palangkaraya, Sudah termasuk PPN</td>
                        <td></td>
                        <td>PPN 11%</td>
                        <td class="text-right">Rp. {{ number_format($ppn) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-left: 1px solid; border-right: 1px solid;">- Penawaran berlaku
                            30 Hari</td>
                        <td></td>
                        <td>Total</td>
                        <td class="text-right">Rp. {{ number_format($totalPriceWithPpn) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"
                            style="border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;">- Term of
                            Payment 30 days after invoice</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="3">Mengetahui, </td>
                    </tr>
                </tbody>
            </table>
<<<<<<< HEAD
            <div class="image-ttd">
                <img src="{{ public_path() }}/storage/ttd/ttd.png" alt="Image"
                     style="width: 40%; padding-left: 300px">
            </div>
=======
>>>>>>> 58132d0c69e06bea5abf5330fbf42a8f02cab17f
        </div>
    </div>

    <footer>
        Pondok Sidokare Indah Blok BT No. 09 Sidoarjo 61214 Jawa Timur | Telp. : 031-99708045 | email:
        primajayaanugerah@yahoo.co.id
    </footer>
</body>

</html>
