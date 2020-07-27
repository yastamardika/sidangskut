<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = "prodis";

    protected $fillable=['program_studi'];

    public function user()
    {
        return $this->HasMany(User::class);
    }
}
