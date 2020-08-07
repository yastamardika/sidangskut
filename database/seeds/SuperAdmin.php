<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=>1,
            'name' => 'admin',
            'email' => 'admin@sidasi.com',
            'password' => bcrypt('admin123')
        ]);
        DB::table('model_has_roles')->insert([
            'role_id'=>'5',
            'model_type'=>'App\User',
            'model_id'=>1
        ]);
    }
}
