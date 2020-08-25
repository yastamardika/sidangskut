<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sidang extends Model
{
    protected $table = "sidangs";

    protected $fillable=['id_mhs', 'id_penguji1', 'id_penguji2', 'id_pembimbing', 'tanggal_sidang', 'waktu', 'tempat'];
}
