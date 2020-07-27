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
            'program_studi' => 'D4 TRPL'
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D4 TRI',
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D4 TRIK',
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D4 TRE',
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D3 KOMSI',
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D3 ELINS',
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D3 METINS',
        ]);
        DB::table('prodis')->insert([
            'program_studi' => 'D3 ELEKTRO',
        ]);
    }
}
