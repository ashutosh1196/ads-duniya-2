<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admins')->delete();

		$admins = [
            'name' => 'Super Admin',
            'email' => 'superadmin@whichvocation.com',
            'password' => Hash::make('Sup3r@dm!n'),
            'role_id' => 1,
        ];

		\DB::table('admins')->insert($admins);
    }
}
