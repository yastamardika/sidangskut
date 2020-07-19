<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SidangReg extends Model
{
    protected $table = "mahasiswa";

    protected $fillable=['nama_mhs','email','nim','id_prodi','judul_id', 'judul_eng', 'dosbing', 'tgl_acc_dosbing', 'file_cover_ta', 'id_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
