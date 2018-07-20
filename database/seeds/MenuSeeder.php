<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'name' => 'Home',
            'sequence' => 1,
            'active' => 1,
            'default' => 1,
            'created_by' => 1
        ]);
        DB::table('menus')->insert([
            'name' => 'Job List',
            'sequence' => 2,
            'active' => 1,
            'default' => 1,
            'created_by' => 1
        ]);
        DB::table('menus')->insert([
            'name' => 'Report',
            'sequence' => 3,
            'active' => 1,
            'default' => 1,
            'created_by' => 1
        ]);
        DB::table('menus')->insert([
            'name' => 'Job List Report',
            'sequence' => 1,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 3
        ]);
        DB::table('menus')->insert([
            'name' => 'Hot work Report',
            'sequence' => 2,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 3
        ]);
        DB::table('menus')->insert([
            'name' => 'Manage',
            'sequence' => 4,
            'active' => 1,
            'default' => 1,
            'created_by' => 1
        ]);
        DB::table('menus')->insert([
            'name' => 'Class',
            'sequence' => 1,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6
        ]);
        DB::table('menus')->insert([
            'name' => 'Work type',
            'sequence' => 2,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6
        ]);
        DB::table('menus')->insert([
            'name' => 'Operation Location',
            'sequence' => 3,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6
        ]);
        DB::table('menus')->insert([
            'name' => 'Permission',
            'sequence' => 4,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6
        ]);
        DB::table('menus')->insert([
            'name' => 'User',
            'sequence' => 5,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6
        ]);
        DB::table('menus')->insert([
            'name' => 'User Permission',
            'sequence' => 6,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6
        ]);

    }
}
