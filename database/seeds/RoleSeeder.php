<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'akademik',
            'guard_name' => 'web'
        ]);
        DB::table('roles')->insert([
            'name' => 'kaprodi',
            'guard_name' => 'web'
        ]);
        DB::table('roles')->insert([
            'name' => 'mahasiswa',
            'guard_name' => 'web'
        ]);
        DB::table('roles')->insert([
            'name' => 'dosen_penguji',
            'guard_name' => 'web'
        ]);
        DB::table('roles')->insert([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

    }
}
