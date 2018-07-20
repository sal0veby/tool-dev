<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('password'),
            'email' => 'a@gmail.com',
            'first_name' => 'Chaturong',
            'last_name' => 'Buaoon',
            'active' => 1,
            'default' => 1,
            'created_by' => 1
        ]);
    }
}
