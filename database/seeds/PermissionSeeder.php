<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->updateOrInsert([
            'name' => 'Admin',
        ], [
            'name' => 'Admin',
            'description' => 'Administrator',
            'active' => 1,
            'created_by' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        if (DB::table('permissions')->get()->count() == 1) {
            $key = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

            foreach ($key as $menu_id) {
                if (in_array($menu_id, [3, 6])) {
                    DB::table('permissions')->updateOrInsert([
                        'menu_id' => $menu_id,
                    ], [
                        'menu_id' => $menu_id,
                        'use' => 0,
                        'add' => 0,
                        'update' => 0,
                        'delete' => 0,
                        'excel' => 0,
                        'pdf' => 0,
                        'active' => 1,
                        'created_by' => 1,
                        'parent_id' => 1,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                    ]);
                } else {
                    DB::table('permissions')->updateOrInsert([
                        'menu_id' => $menu_id,
                    ], [
                        'menu_id' => $menu_id,
                        'use' => 1,
                        'add' => 1,
                        'update' => 1,
                        'delete' => 1,
                        'excel' => 1,
                        'pdf' => 1,
                        'active' => 1,
                        'created_by' => 1,
                        'parent_id' => 1,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                    ]);
                }
            }
        }
    }
}
