<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        $carts = Cart::all();
        return view('/customer/cart/index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $id = $request->id;
        if (Auth::check()) {
            $userId = Auth::user()->id; // Mendapatkan ID pengguna yang login
            $produk = Produk::first();
            $produkId = $produk->id;
    
            // Cek apakah produk sudah ada di dalam keranjang pengguna
            $cartItem = Cart::where('user_id', $userId)->where('produk_id', $produkId)->first();

            if ($cartItem) {
                // Jika produk sudah ada di keranjang, tambahkan ke jumlah quantity
                $cartItem->update(['quantity' => $cartItem->quantity + 1]);
            } else {
                // Jika produk belum ada di keranjang, tambahkan entri baru
                Cart::create([
                    'user_id' => $userId,
                    'produk_id' => $produkId,
                    'quantity' => 1, // Quantity awal
                ]);
            }


    
            // Kembali ke halaman sebelumnya atau halaman keranjang dengan pesan sukses
            return back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
        } else {
            // Jika pengguna tidak login, kembalikan ke halaman login atau beri pesan error
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produks = DB::table('produk')->where('id',$id)->get();
        // $produks = Produk::findOrFail($id);
        // dd($produks);
        return view('customer.shop.detail', compact('produks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        
        return redirect()->route('cart')->with('success', 'Produk berhasil dihapus.');
    }
}
