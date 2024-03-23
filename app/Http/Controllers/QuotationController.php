<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class QuotationController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin/pesanan/index', compact('transactions'));
    }

    public function generate($id)
    {
        $transaction = Transaction::where('id', $id)->first();

        if (!auth()->user()) {
            return redirect()->route('login');
        }

        $pdf = PDF::loadView('generate-quotation');
        $pdf->setPaper('A4');

        $pdf->getDomPDF()->getOptions()->set('title', 'Quotation-' . $transaction->number);

        return $pdf->download('Quotation-' . $transaction->number . '.pdf');
    }
}
