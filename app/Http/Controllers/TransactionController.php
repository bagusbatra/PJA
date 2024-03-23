<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        // Ambil daftar transaksi pengguna yang sedang login
        $transactions = Transaction::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->get();
        return view('customer.transaction.index', compact('transactions'));
    }

    public function show($id)
    {
        $produks = DB::table('produk')->where('id', $id)->get();
        // $produks = Produk::findOrFail($id);
        // dd($produks);
        return view('customer.shop.detail', compact('produks'));
    }
}
