<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SidangReg extends Model
{
    protected $table = "sidang_reg";

    protected $fillable=['id_mhs', 'judul_id', 'judul_eng', 'dosbing', 'tgl_acc_dosbing', 'file_cover_ta', 'status'];
}