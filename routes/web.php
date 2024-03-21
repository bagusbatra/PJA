<?php

use App\Models\Quotation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartListController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CustomerCartController;
use App\Http\Controllers\CustomerShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/admin', function () {
    return view('admin/index');
})->name('admin');
Route::get('riwayat', function () {
    return view('admin/riwayat/index');
})->name('riwayat');
Route::get('login', function () {
    return view('login');
})->name('login');
Route::get('register', function () {
    return view('register');
})->name('register');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');


Route::resource('/', WelcomeController::class);

Route::resource('customer', CustomerController::class)->middleware('auth');
Route::resource('shop', CustomerShopController::class)->middleware('auth');
Route::resource('cart', CustomerCartController::class)->middleware('auth');
Route::get('/add-to-cart/{id}', [CustomerCartController::class, 'store'])->name('addToCart')->middleware('auth');
Route::post('/checkout', [CustomerCartController::class, 'checkout'])->name('cart.checkout')->middleware('auth');
Route::resource('transaction', TransactionController::class)->middleware('auth');


// Route::get('/cart/{id}', [ProdukController::class, 'show'])->name('cart.show')->middleware('auth');

// Route::resource('cart', CustomerCartController::class)->middleware('auth');
// Route::get('/cart', [CartListController::class, 'index'])->name('list')->middleware('auth');

// Route::put('/cart/{id}', [CartListController::class, 'update'])->name('cart.update');
// Route::get('/cart/{id}/ubah', [CartListController::class, 'edit'])->name('cart.edit');
// Route::delete('/cart/{id}', [CartListController::class, 'destroy'])->name('cart.destroy');



Route::get('/detail', [CustomerShopController::class, 'DetailUser'])->name('detailuser');
Route::post('/detail', [CustomerShopController::class, 'store'])->name('detail.store');
Route::post('/verifikasi', [CustomerShopController::class, 'verifikasi'])->name('verifikasi');
Route::post('/login', [CustomerShopController::class, 'order'])->name('order');


// admin
Route::resource('produk', ProdukController::class);
Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.tambah');

Route::resource('pesanan', QuotationController::class);
Route::get('/pesanan/{id}', [QuotationController::class, 'show'])->name('pesanan.cetak');
