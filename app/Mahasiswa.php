<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";

    protected $fillable=['user_id', 'nama_mhs', 'email', 'nim', 'id_prodi', 'judul_idn', 'judul_eng', 'dosbing', 'nomerhp', 'tgl_acc_dosbing', 'file_cover_ta', 'id_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
