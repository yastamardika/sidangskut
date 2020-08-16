<?php

use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodis')->insert([
            'program_studi' => 'D4 TRPL',
            'prodi_full' => 'D4 Teknologi Rekayasa Perangkat Lunak'
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D4 TRI',
            'prodi_full' => 'D4 Teknologi Rekayasa Internet'
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D4 TRIK',
            'prodi_full' => 'D4 Teknologi Rekayasa Instrumentasi dan Kontrol'
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D4 TRE',
            'prodi_full' => 'D4 Teknologi Rekayasa Elektro'
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D3 KOMSI',
            'prodi_full' => 'D3 Komputer dan Sistem Infromasi'
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D3 ELINS',
            'prodi_full' => 'D3 Elektronika dan Instrumentasi'
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D3 METINS',
            'prodi_full' => 'D3 Metrologi dan Instrumentasi'
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D3 ELEKTRO',
            'prodi_full' => 'D3 Teknik Elektro'
        ]);
    }
}
