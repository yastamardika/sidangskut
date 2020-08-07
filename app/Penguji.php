<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Penguji extends Model
{
    protected $table = 'pengujis';

    protected $fillable =['id_user','id_prodi'];

    public function prodi(){
        return $this->hasOne(Prodi::class);
    }

}
