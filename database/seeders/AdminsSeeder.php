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
        \DB::table('admins')->truncate();
        \DB::table('admins')->insert([
            [
                'name' => 'Super Admin',
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'superadmin@adsduniya.com',
                'password' => Hash::make('Sup3r@dm!n'),
                'role_id' => 1
            ],
        ]);
    }
}



   
  
   
    
   
  
