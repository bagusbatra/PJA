<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $table = 'produk';
    protected $fillable = ['id', 'nama_produk', 'tipe_produk', 'price', 'gambar', 'keterangan', 'upload_pdf'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) \Illuminate\Support\Str::uuid();
        });
    }
}
