<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Transaction;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $quotations = Quotation::all();
        return view('admin/pesanan/index', compact('transactions', 'quotations'));
    }

    // public function cetak($id)
    // {
    //     $quotations = Quotation::all();
    //     return view('admin/pesanan/quotation', compact('quotations'));
    // }

    public function show($id)
    {
        $quotation = Quotation::findOrFail($id); // Mengambil pesanan berdasarkan ID
        return view('admin.pesanan.quotation', compact('quotation')); // Meneruskan pesanan ke tampilan
    }
}
