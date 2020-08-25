<?php

namespace App\Exports;

use App\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mahasiswa::all();
    }
}
