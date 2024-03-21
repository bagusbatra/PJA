<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $table = 'produk';
    protected $fillable = ['id', 'nama_produk', 'tipe_produk', 'price', 'gambar', 'keterangan', 'upload_pdf'];
}
