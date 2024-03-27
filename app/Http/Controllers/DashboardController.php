<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $new_transactions = Transaction::where('status', 'Menunggu Konfirmasi')->get();
        $proceed_transactions = Transaction::where('status', 'Diproses')->get();
        return view('admin.index', compact('new_transactions', 'proceed_transactions'));
    }
}
