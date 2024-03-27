<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailUser;
use App\Models\Produk;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('/customer/shop/index', compact('produks'));
    }

    public function DetailUser()
    {
        $produks = Produk::all();
        $carts = Cart::all();
        $detailusers = DetailUser::all();
        
        return view('customer.order.detail', compact('produks', 'carts'));
    }

    public function verifikasi()
    {
        $user = Auth::user(); // Mengambil user yang sedang login

        // $produks = Produk::all();
        $carts = Cart::where('user_id', $user->id)->get();

        $produks = Produk::all();

        $detailusers = DetailUser::all();
        $quotation = Quotation::all();
    
    return view('customer.order.verification', compact('produks', 'carts', 'detailusers'));
        
    }

    public function order(Request $request){
        $user = Auth::user(); // Mengambil user yang sedang login
        // $akun = Quotation::where('user_id', $user->id)->get();

        // // $id = $request->id;
        // if (Auth::check()) {
        //     $userId = Auth::user()->id; // Mendapatkan ID pengguna yang login

        //     // Simpan data ke database 
        //     $quotation = new Quotation();
        //     $quotation->user_id = $userId;
        //     $quotation->save();

        //     // Kembali ke halaman sebelumnya atau halaman keranjang dengan pesan sukses
        //     return view('login', compact('produks', 'carts', 'detailusers', 'users'))->with('success', 'Produk berhasil ditambahkan ke keranjang.');
        // } else {
        //     // Jika pengguna tidak login, kembalikan ke halaman login atau beri pesan error
        //     return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        // }
        return view('login', compact('produks', 'carts', 'detailusers'));


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
        $user = Auth::user(); // Mengambil user yang sedang login

        $users = User::all();

        // $produks = Produk::all();
        $carts = Cart::where('user_id', $user->id)->get();

        $produks = Produk::all();

        $detailusers = DetailUser::all();
        $quotation = Quotation::all();

        // $id = $request->id;
        if (Auth::check()) {
            $userId = Auth::user()->id; // Mendapatkan ID pengguna yang login

            // Validasi data
            $request->validate([
                'nama_pemesan' => 'required',
                'nama_instansi' => 'required',
                'email' => 'required',
                'telepon' => 'required',
                'alamat' => 'required',
                'kode_pos' => 'required',
            ]);

            // Simpan data ke database 
            $detailusers = new DetailUser();
            $detailusers->user_id = $userId;
            $detailusers->nama_pemesan = $request->nama_pemesan;
            $detailusers->nama_instansi = $request->nama_instansi;
            $detailusers->email = $request->email;
            $detailusers->telepon = $request->telepon;
            $detailusers->alamat = $request->alamat;
            $detailusers->kode_pos = $request->kode_pos;
            $detailusers->save();

            // Kembali ke halaman sebelumnya atau halaman keranjang dengan pesan sukses
            return view('customer.order.verification', compact('produks', 'carts', 'detailusers', 'users'))->with('success', 'Produk berhasil ditambahkan ke keranjang.');
        } else {
            // Jika pengguna tidak login, kembalikan ke halaman login atau beri pesan error
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }
}
