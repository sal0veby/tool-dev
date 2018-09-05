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
        DB::table('users')->updateOrInsert([
            'username' => 'admin',
            'password' => bcrypt('password'),
            'email' => 'a@gmail.com',
        ], [
            'username' => 'admin',
            'password' => bcrypt('password'),
            'email' => 'a@gmail.com',
            'first_name' => 'Admin',
            'last_name' => 'John',
            'active' => 1,
            'default' => 1,
            'permission_id' => 1,
            'created_by' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
