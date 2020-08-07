<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'status' => 'mendaftar'
        ]);
        DB::table('status')->insert([
            'status' => 'diajukan ke kaprodi',
        ]);
        DB::table('status')->insert([
            'status' => 'sidang',
        ]);
        DB::table('status')->insert([
            'status' => 'selesai',
        ]);
    }
}
