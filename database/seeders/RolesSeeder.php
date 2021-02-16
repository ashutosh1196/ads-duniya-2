<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

		$roles = [[
            'name' => 'Super Admin',
            'tag' => 'super_admin',
            'permissions' => 'add',
            'status' => 1,
        ],
        [
            'name' => 'Admin',
            'tag' => 'admin',
            'permissions' => 'add',
            'status' => 1,
        ]];

		\DB::table('roles')->insert($roles);
    }
}
