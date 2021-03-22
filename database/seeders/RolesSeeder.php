<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	*/
	public function run() {
		\DB::table('roles')->delete();
		\DB::table('roles')->insert([
			[
				'name' => 'Super Admin',
				'tag' => 'super_admin',
				'status' => 1,
			],
			[
				'name' => 'Admin',
				'tag' => 'admin',
				'status' => 1,
			],
			[
				'name' => 'Viewer',
				'tag' => 'viewer',
				'status' => 1,
			],
		]);
	}
}
