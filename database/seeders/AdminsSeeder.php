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
        // Admins
        
        \DB::table('admins')->delete();
        \DB::table('admins')->insert([
            [
                'name' => 'Super Admin',
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'superadmin@whichvocation.com',
                'password' => Hash::make('Sup3r@dm!n'),
                'role_id' => 1,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Admin',
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@whichvocation.com',
                'password' => Hash::make('@dm!nU$3r'),
                'role_id' => 2,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Viewer',
                'first_name' => 'Viewer',
                'last_name' => 'Admin',
                'email' => 'viewer@whichvocation.com',
                'password' => Hash::make('@dm!nV!3w3r'),
                'role_id' => 3,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
        

        // Organizations

        \DB::table('organizations')->delete();
        \DB::table('organizations')->insert([
            'name' => 'RV Technologies',
            'email' => 'info@rvtechnologies.com',
            'country_code' => '+91',
            'contact_number' => '+918968519881',
            'url' => 'https://rvtechnologies.com/',
            'domain' => 'rvtechnologies.com',
            'is_whitelisted' => 0,
            'address' => 'C127, Ground Floor',
            'city' => 'Mohali',
            'county' => 'Phase 8 Industrial Area',
            'state' => 'Punjab',
            'country' => 'United Kingdom',
            'pincode' => '132654',
            'created_by' => 'recruiter',
            'created_by_id' => 3,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);
        

        // Recruiters

        \DB::table('recruiters')->delete();
        \DB::table('recruiters')->insert([
            [
                'first_name' => 'Pawanjeet',
                'last_name' => 'Kaur',
                'email' => 'pawanjeet@rvtechnologies.com',
                'password' => bcrypt('12345678'),
                'signup_via' => 'web',
                'status' => 'active',
                'ip_address' => '192.168.1.65',
                'organization_id' => 1,
                'is_parent' => 1,
                'created_by' => 'recruiter',
                'created_by_id' => 1,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'first_name' => '',
                'last_name' => '',
                'email' => 'ashish_kumar@rvtechnologies.com',
                'password' => bcrypt('12345678'),
                'signup_via' => 'web',
                'status' => 'active',
                'ip_address' => '192.168.1.65',
                'organization_id' => 1,
                'is_parent' => 0,
                'created_by' => 'recruiter',
                'created_by_id' => 3,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'first_name' => 'Sandeep',
                'last_name' => 'Kumar',
                'email' => 'sandeep@rvtechnologies.com',
                'password' => bcrypt('12345678'),
                'signup_via' => 'web',
                'status' => 'active',
                'ip_address' => '192.168.1.65',
                'organization_id' => 1,
                'is_parent' => 0,
                'created_by' => 'recruiter',
                'created_by_id' => 3,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'first_name' => '',
                'last_name' => '',
                'email' => 'sunil_jaswal@rvtechnologies.com',
                'password' => bcrypt('12345678'),
                'signup_via' => 'web',
                'status' => 'active',
                'ip_address' => '192.168.1.65',
                'organization_id' => 1,
                'is_parent' => 0,
                'created_by' => 'admin',
                'created_by_id' => 1,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
        

        // Organization Credits

        \DB::table('organization_credits')->delete();
        \DB::table('organization_credits')->insert([
            'trial_credits' => 60,
            'organization_id' => 1,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        // Organization Credit details

        \DB::table('organization_credit_details')->delete();
        \DB::table('organization_credit_details')->insert([
            'txn_type' => 'credit',
            'credits' => '60',
            'credit_type' => 'free',
            'organization_id' => 1,
            'organization_credit_id' => 1,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);
        

        // Jobs

        \DB::table('jobs')->delete();
        \DB::table('jobs')->insert([
            'job_ref_number' => '2343202116148530002',
            'job_title' => 'Designer',
            'job_description' => 'Designer Job',
            'job_type' => 'full_time',
            'is_featured' => 0,
            'city' => 'Mohali',
            'county' => 'Phase 8',
            'state' => 'Punjab',
            'country' => 'United Kingdom',
            'company_logo' => NULL,
            'job_url' => 'http://rvtechnologies.com',
            'job_industry_id' => 1,
            'job_location_id' => 1,
            'package_range_from' => 120000,
            'package_range_to' => 150000,
            'salary_currency' => 'dollars',
            'experience_range_min' => 1.5,
            'status' => 'open',
            'recruiter_id' => 1,
            'organization_id' => 1,
            'expiring_at' => '2022-06-04 11:59:59',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);
        

        // Job Skills

        \DB::table('job_skill')->delete();
        \DB::table('job_skill')->insert([
            'job_id' => 1,
            'skill_id' => 1,
            'status' => 1,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Tickets

        \DB::table('tickets')->delete();
        \DB::table('tickets')->insert([
            'recruiter_id' => 1,
            'organization_id' => 1,
            'subject' => 'Test Ticket',
            'status' => 'open',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Ticket Messages

        \DB::table('ticket_messages')->delete();
        \DB::table('ticket_messages')->insert([
            'message_text' => 'Test Ticket Message',
            'ticket_id' => 1,
            'recruiter_id' => 1,
            'sent_by' => 'recruiter',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);

        

        

    }
}



   
  
   
    
   
  
