<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nama_pemesan', 'nama_instansi', 'email', 'telepon', 'alamat', 'kode_pos'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
