<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kaprodi extends Model
{
    protected $table = 'kaprodis';

    protected $fillable = ['id_prodi', 'id_user'];

    public function kaprodi(){
        return $this->hasOne(Prodi::class);
    }
}
