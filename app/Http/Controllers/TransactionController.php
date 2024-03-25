<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->get();
        return view('customer.transaction.index', compact('transactions'));
    }

    public function edit($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $transaction_items = TransactionItem::where('transaction_id', $id)->get();
        return view('admin.pesanan.edit', compact('transaction', 'transaction_items'));
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $transaction->update([
            'status' => $request->status,
        ]);
        return redirect()->route('pesanan.index');
    }
}
