<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerCartController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Mengambil user yang sedang login
        $carts = Cart::where('user_id', $user->id)->with('product')->get();
        return view('/customer/cart/index', compact('carts'));
    }

    public function store($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $product = Produk::find($id);

            if (!$product) {
                return back()->with('error', 'Produk tidak ditemukan.');
            }

            // Cek apakah produk sudah ada di dalam keranjang pengguna
            $cartItem = Cart::where('user_id', $userId)->where('produk_id', $product->id)->first();

            if ($cartItem) {
                // Jika produk sudah ada di keranjang, tambahkan ke jumlah quantity
                $cartItem->update(['quantity' => $cartItem->quantity + 1]);
            } else {
                // Jika produk belum ada di keranjang, tambahkan entri baru
                Cart::create([
                    'user_id' => $userId,
                    'produk_id' => $product->id,
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
        $produks = DB::table('produk')->where('id', $id)->get();
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

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function checkout()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Cart::where('user_id', $userId)->with('product')->get();

            if ($cartItems->isEmpty()) {
                return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda kosong.');
            }

            // Hitung total harga
            $totalPrice = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            // Memulai transaksi dengan UUID baru
            $transaction = Transaction::create([
                'id' => Str::uuid(),
                'user_id' => $userId,
                'total_price' => $totalPrice,
                'status' => 'Berhasil',
            ]);

            // Menambahkan item transaksi berdasarkan item dalam keranjang
            foreach ($cartItems as $cartItem) {
                TransactionItem::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $cartItem->produk_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price, // Anda mungkin juga perlu menyimpan harga per item dalam tabel transaksi
                ]);

                // Menghapus item keranjang
                $cartItem->delete();
            }

            return redirect()->route('transaction.show', $transaction->id)->with('success', 'Pembelian berhasil.');
        } else {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }
    }
}
