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


        \DB::table('skills')->delete();

        \DB::table('skills')->insert([
            'name' => 'HTML',
            'slug' => 'html',
            'description' => 'desc',
            'status' => 1
        ]);

        \DB::table('job_functions')->delete();

        \DB::table('job_functions')->insert([
            'name' => 'HR',
            'slug' => 'hr',
            'description' => 'desc',
            'status' => 1
        ]);

        \DB::table('job_locations')->delete();

        \DB::table('job_locations')->insert([
            'name' => 'East London',
            'slug' => 'EL',
            'description' => 'desc',
            'status' => 1
        ]);

        \DB::table('job_industries')->delete();

        \DB::table('job_industries')->insert([
            'name' => 'IT',
            'slug' => 'it',
            'description' => 'desc',
            'status' => 1
        ]);
    }
}
