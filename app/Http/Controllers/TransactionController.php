<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        // Ambil daftar transaksi pengguna yang sedang login
        $transactions = Transaction::where('user_id', auth()->id())->get();
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
