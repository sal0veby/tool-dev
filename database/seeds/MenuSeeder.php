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
        DB::table('menus')->updateOrInsert([
            'name' => 'Home',
            'sequence' => 1,
            'active' => 1,
            'default' => 1,
            'created_by' => 1
        ], [
            'name' => 'Home',
            'sequence' => 1,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('menus')->updateOrInsert([
            'name' => 'Job List',
            'sequence' => 2,
            'active' => 1,
            'default' => 1,
            'created_by' => 1
        ], [
            'name' => 'Job List',
            'sequence' => 2,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('menus')->updateOrInsert([
            'name' => 'Report',
            'sequence' => 3,
            'active' => 1,
            'default' => 1,
            'created_by' => 1
        ], [
            'name' => 'Report',
            'sequence' => 3,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('menus')->updateOrInsert([
            'name' => 'Job List Report',
            'sequence' => 1,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 3
        ], [
            'name' => 'Job List Report',
            'sequence' => 1,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 3,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);


        DB::table('menus')->updateOrInsert([
            'name' => 'Hot work Report',
            'sequence' => 2,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 3
        ], [
            'name' => 'Hot work Report',
            'sequence' => 2,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 3,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('menus')->updateOrInsert([
            'name' => 'Manage',
            'sequence' => 4,
            'active' => 1,
            'default' => 1,
            'created_by' => 1
        ], [
            'name' => 'Manage',
            'sequence' => 4,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('menus')->updateOrInsert([
            'name' => 'Class',
            'sequence' => 1,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6
        ], [
            'name' => 'Class',
            'sequence' => 1,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('menus')->updateOrInsert([
            'name' => 'Work type',
            'sequence' => 2,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6
        ], [
            'name' => 'Work type',
            'sequence' => 2,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('menus')->updateOrInsert([
            'name' => 'Operation Location',
            'sequence' => 3,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6
        ], [
            'name' => 'Operation Location',
            'sequence' => 3,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('menus')->updateOrInsert([
            'name' => 'Permission',
            'sequence' => 4,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6
        ], [
            'name' => 'Permission',
            'sequence' => 4,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('menus')->updateOrInsert([
            'name' => 'User',
            'sequence' => 5,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6
        ], [
            'name' => 'User',
            'sequence' => 5,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('menus')->updateOrInsert([
            'name' => 'User Permission',
            'sequence' => 6,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6
        ], [
            'name' => 'User Permission',
            'sequence' => 6,
            'active' => 1,
            'default' => 1,
            'created_by' => 1,
            'parent_id' => 6,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

    }
}
