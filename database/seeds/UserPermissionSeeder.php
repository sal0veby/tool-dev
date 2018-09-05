<?php

use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->get()->count() == 1) {
            $key = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

            foreach ($key as $menu_id) {
                if (in_array($menu_id, [3, 6])) {
                    DB::table('user_permissions')->updateOrInsert([
                        'user_id' => 1,
                        'menu_id' => $menu_id,
                    ], [
                        'user_id' => 1,
                        'menu_id' => $menu_id,
                        'use' => 0,
                        'add' => 0,
                        'update' => 0,
                        'delete' => 0,
                        'excel' => 0,
                        'pdf' => 0,
                        'active' => 1,
                        'created_by' => 1,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                    ]);
                } else {
                    DB::table('user_permissions')->updateOrInsert([
                        'user_id' => 1,
                        'menu_id' => $menu_id,
                    ], [
                        'user_id' => 1,
                        'menu_id' => $menu_id,
                        'use' => 1,
                        'add' => 1,
                        'update' => 1,
                        'delete' => 1,
                        'excel' => 1,
                        'pdf' => 1,
                        'active' => 1,
                        'created_by' => 1,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                    ]);
                }
            }
        }
    }
}
