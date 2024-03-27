<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CartListController extends Controller
{
    public function index()
    {

        $user = Auth::user(); // Mengambil user yang sedang login

        // $produks = Produk::all();
        $carts = Cart::where('user_id', $user->id)->get();

        $produks = Produk::all();
        // $carts = Cart::all();
        return view('/customer/cart/index', compact('produks'), compact('carts'));
    }

    public function edit($id)
    {
        $carts = DB::table('cart')->where('id', $id)->get();
        // $produks = Produk::findOrFail($id);
        // dd($produks);
        return view('customer.cart.edit', compact('carts'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $data = $request->validate([
            'quantity' => 'required',
        ]);

        // Cari produk berdasarkan ID
        $carts = Cart::find($id);

        // Periksa apakah produk ditemukan
        if (!$carts) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        $carts->quantity = $request->quantity;

        // Simpan perubahan
        $carts->save();

        return redirect()->route('customer.cart.list')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->route('customer.cart.list')->with('success', 'Produk berhasil dihapus.');
    }
}
