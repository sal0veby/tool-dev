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
        $permission_name = [
            'Admin' => 'Administrator',
            'NOC' => 'NOC',
            'SupNOC' => 'Sup NOC',
            'Engineers' => 'Engineers',
            'PM' => 'Project Manager',
            'SG' => 'Security Guard',
        ];

        foreach ($permission_name as $index => $name) {
            $id = DB::table('permissions')->insertGetId(
                [
                    'name' => $index,
                    'description' => $name,
                    'active' => true,
                    'default' => true,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]);

            $key = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

            foreach ($key as $menu_id) {
                if (in_array($menu_id, [3, 6])) {
                    DB::table('permissions')->updateOrInsert([
                        'menu_id' => $menu_id,
                    ], [
                        'menu_id' => $menu_id,
                        'use' => false,
                        'add' => false,
                        'update' => false,
                        'delete' => false,
                        'excel' => false,
                        'pdf' => false,
                        'active' => true,
                        'created_by' => true,
                        'parent_id' => $id,
                        'created_by' => 1,
                        'updated_by' => 1,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                    ]);
                } else {
                    DB::table('permissions')->updateOrInsert([
                        'menu_id' => $menu_id,
                        'parent_id' => $id,
                    ], [
                        'menu_id' => $menu_id,
                        'use' => true,
                        'add' => true,
                        'update' => true,
                        'delete' => true,
                        'excel' => true,
                        'pdf' => true,
                        'active' => true,
                        'parent_id' => $id,
                        'created_by' => 1,
                        'updated_by' => 1,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                    ]);
                }
            }
        }
    }
}
