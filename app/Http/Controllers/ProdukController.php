<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailUser;
use App\Models\Produk;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource 
     */
    public function index()
    {
        $produks = Produk::all();
        return view('admin/produk/index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::all();
        return view('admin/produk/tambah', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     // Validasi data
     $request->validate([
        'id' => 'required|unique:produk',
        'nama_produk' => 'required',
        'tipe_produk' => 'required',
        'price' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'keterangan' => 'required',
        'upload_pdf' => 'nullable|mimes:pdf|max:2048',
    ]);

    // Simpan gambar
    $gambarPath = $request->file('gambar')->store('uploads/gambar', 'public');

    // Simpan data ke database 
    $produks = new Produk();
    $produks->id = $request->id;
    $produks->nama_produk = $request->nama_produk;
    $produks->tipe_produk = $request->tipe_produk;
    $produks->price = $request->price;
    $produks->gambar = $gambarPath;
    $produks->keterangan = $request->keterangan;
    $produks->upload_pdf = $request->file('upload_pdf') ? $request->file('upload_pdf')->store('uploads/pdf', 'public') : null;
    $produks->save();

    return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');

    // Tambahkan fungsi edit, update, dan destroy juga    
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
 
    public function edit($id)
    {
        $produks = DB::table('produk')->where('id',$id)->get();
        // $produks = Produk::findOrFail($id);
        // dd($produks);
        return view('admin.produk.edit', compact('produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {        

        $produks = Produk::all();
        $carts = Cart::all();
        $detailuser = DetailUser::all();
        $quotation = Quotation::all();

    // Validasi data
    $data = $request->validate([
        'id' => 'required',
        'nama_produk' => 'required',
        'tipe_produk' => 'required',
        'price' => 'required',
        'keterangan' => 'required',
        'gambar' => 'image|nullable',
        'upload_pdf' => 'mimes:pdf|nullable'
    ]);

    // Cari produk berdasarkan ID
    $produks = Produk::find($id);

    // Periksa apakah produk ditemukan
    if (!$produks) {
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }

    // Update data produk
    $produks->id = $request->id;
    $produks->nama_produk = $request->nama_produk;
    $produks->tipe_produk = $request->tipe_produk;
    $produks->price = $request->price;
    $produks->keterangan = $request->keterangan;

    // Perbarui gambar jika diunggah
    if ($request->hasFile('gambar')) {
        Storage::delete('public/' . $produks->gambar);
        $data['gambar'] = $request->file('gambar')->store('uploads/gambar', 'public');
        $produks->gambar = $data['gambar'];
    }

    // Perbarui PDF jika diunggah
    if ($request->hasFile('upload_pdf')) {
        Storage::delete('public/' . $produks->upload_pdf);
        $data['upload_pdf'] = $request->file('upload_pdf')->store('uploads/pdf', 'public');
        $produks->upload_pdf = $data['upload_pdf'];
    }

    // Simpan perubahan
    $produks->save();

    // Redirect dengan pesan sukses
    return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);
        Storage::delete('public/' . $produk->gambar);
        Storage::delete('public/' . $produk->upload_pdf);
        $produk->delete();
        
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
