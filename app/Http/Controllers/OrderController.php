<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function DetailUser()
    {
        $produks = Produk::all();
        $carts = Cart::all();
        return view('login', compact('produks', 'carts'));
    }
}
