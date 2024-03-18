<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    protected $table = 'detailuser';
    protected $fillable = ['user_id', 'nama_pemesan', 'nama_instansi', 'telepon', 'alamat', 'kode_pos'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}


