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

        \DB::table('organizations')->delete();

        \DB::table('organizations')->insert([
            'name' => 'RV Technologies',
            'email' => 'info@rvtechnologies.com',
            'country_code' => '+91',
            'contact_number' => '+918968519881',
            'url' => 'https://rvtechnologies.com/',
            'domain' => 'rvtechnologies.com',
            'is_whitelisted' => 1,
            'address' => 'C127, Ground Floor',
            'city' => 'Mohali',
            'county' => 'Phase 8 Industrial Area',
            'state' => 'Punjab',
            'country' => 'United Kingdom',
            'pincode' => '132654'
        ]);    

        \DB::table('recruiters')->delete();

        \DB::table('recruiters')->insert([[
            'email' => 'ashish_kumar@rvtechnologies.com',
            'password' => bcrypt('12345678'),
            'signup_via' => 'web',
            'status' => 'active',
            'ip_address' => '192.168.1.65',
            'organization_id' => 1,
            'is_parent' => 0
        ],[
            'email' => 'pawanjeet@rvtechnologies.com',
            'password' => bcrypt('12345678'),
            'signup_via' => 'web',
            'status' => 'active',
            'ip_address' => '192.168.1.65',
            'organization_id' => 1,
            'is_parent' => 0
        ],[
            'email' => 'sandeep@rvtechnologies.com',
            'password' => bcrypt('12345678'),
            'signup_via' => 'web',
            'status' => 'active',
            'ip_address' => '192.168.1.65',
            'organization_id' => 1,
            'is_parent' => 1
        ],[
            'email' => 'sunil_jaswal@rvtechnologies.com',
            'password' => bcrypt('12345678'),
            'signup_via' => 'web',
            'status' => 'active',
            'ip_address' => '192.168.1.65',
            'organization_id' => 1,
            'is_parent' => 0
        ]]);

        \DB::table('organization_credits')->delete();

        \DB::table('organization_credits')->insert([
            'trial_credits' => 60,
            'organization_id' => 1,
        ]);    


        \DB::table('organization_credit_details')->delete();

        \DB::table('organization_credit_details')->insert([
            'txn_type' => 'credit',
            'credits' => '60',
            'credit_type' => 'free',
            'organization_id' => 1,
            'organization_credit_id' => 1
        ]);    
    }
}
