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
            'name' => 'Designer',
            'slug' => 'designer',
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
            'name' => 'Information Technology',
            'slug' => 'information_technology',
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
            'job_function_id' => 1,
            'job_location_id' => 1,
            'package_range_from' => 120000,
            'package_range_to' => 150000,
            'salary_currency' => 'dollars',
            'experience_range_min' => 1.5,
            'status' => 'open',
            'recruiter_id' => 1,
            'organization_id' => 1,
            'expiring_at' => '2022-06-04 11:59:59'
        ]);

        \DB::table('job_skill')->insert([
            'job_id' => 1,
            'skill_id' => 1,
            'status' => 1
        ]);

        \DB::table('cities')->delete();

        $cities = [
            ['city' => 'Aberdeen'],
            ['city' => 'Armagh'],
            ['city' => 'Bangor'],
            ['city' => 'Bath'],
            ['city' => 'Belfast'],
            ['city' => 'Birmingham'],
            ['city' => 'Bradford'],
            ['city' => 'Brighton and Hove'],
            ['city' => 'Bristol'],
            ['city' => 'Cambridge'],
            ['city' => 'Canterbury'],
            ['city' => 'Cardiff'],
            ['city' => 'Carlisle'],
            ['city' => 'Chelmsford'],
            ['city' => 'Chester'],
            ['city' => 'Chichester'],
            ['city' => 'City of London'],
            ['city' => 'Coventry'],
            ['city' => 'Derby'],
            ['city' => 'Dundee'],
            ['city' => 'Durham'],
            ['city' => 'Edinburgh'],
            ['city' => 'Ely'],
            ['city' => 'Exeter'],
            ['city' => 'Glasgow'],
            ['city' => 'Gloucester'],
            ['city' => 'Hereford'],
            ['city' => 'Inverness'],
            ['city' => 'Kingston upon Hull'],
            ['city' => 'Lancaster'],
            ['city' => 'Leeds'],
            ['city' => 'Leicester'],
            ['city' => 'Lichfield'],
            ['city' => 'Lincoln'],
            ['city' => 'Lisburn'],
            ['city' => 'Liverpool'],
            ['city' => 'Londonderry'],
            ['city' => 'Manchester'],
            ['city' => 'Newcastle upon Tyne'],
            ['city' => 'Newport'],
            ['city' => 'Newry'],
            ['city' => 'Norwich'],
            ['city' => 'Nottingham'],
            ['city' => 'Oxford'],
            ['city' => 'Perth'],
            ['city' => 'Peterborough'],
            ['city' => 'Plymouth'],
            ['city' => 'Portsmouth'],
            ['city' => 'Preston'],
            ['city' => 'Ripon'],
            ['city' => 'Salford'],
            ['city' => 'Salisbury'],
            ['city' => 'Sheffield'],
            ['city' => 'Southampton'],
            ['city' => 'St Albans'],
            ['city' => 'St Davids'],
            ['city' => 'Stirling'],
            ['city' => 'Stoke-on-Trent'],
            ['city' => 'Sunderland'],
            ['city' => 'Swansea'],
            ['city' => 'Truro'],
            ['city' => 'Wakefield'],
            ['city' => 'Wells'],
            ['city' => 'Westminster'],
            ['city' => 'Winchester'],
            ['city' => 'Wolverhampton'],
            ['city' => 'Worcester'],
            ['city' => 'York']
        ];


        \DB::table('cities')->insert($cities);


        \DB::table('counties')->delete();

        $counties = [
            ['county' => 'Bath and North East Somerset','country' => 'England'],
            ['county' => 'Bedfordshire','country' => 'England'],
            ['county' => 'Berkshire','country' => 'England'],
            ['county' => 'Bristol','country' => 'England'],
            ['county' => 'Buckinghamshire','country' => 'England'],
            ['county' => 'Cambridgeshire','country' => 'England'],
            ['county' => 'Cheshire','country' => 'England'],
            ['county' => 'Cornwall','country' => 'England'],
            ['county' => 'County Durham','country' => 'England'],
            ['county' => 'Cumbria','country' => 'England'],
            ['county' => 'Derbyshire','country' => 'England'],
            ['county' => 'Devon','country' => 'England'],
            ['county' => 'East Riding of Yorkshire','country' => 'England'],
            ['county' => 'East Sussex','country' => 'England'],
            ['county' => 'Essex','country' => 'England'],
            ['county' => 'Gloucestershire','country' => 'England'],
            ['county' => 'Greater London','country' => 'England'],
            ['county' => 'Greater Manchester','country' => 'England'],
            ['county' => 'Hampshire','country' => 'England'],
            ['county' => 'Herefordshire','country' => 'England'],
            ['county' => 'Hertfordshire','country' => 'England'],
            ['county' => 'Isle of Wight','country' => 'England'],
            ['county' => 'Isles of Scilly','country' => 'England'],
            ['county' => 'Kent','country' => 'England'],
            ['county' => 'Lancashire','country' => 'England'],
            ['county' => 'Leicestershire','country' => 'England'],
            ['county' => 'Lincolnshire','country' => 'England'],
            ['county' => 'Merseyside','country' => 'England'],
            ['county' => 'Norfolk','country' => 'England'],
            ['county' => 'North Somerset','country' => 'England'],
            ['county' => 'North Yorkshire','country' => 'England'],
            ['county' => 'Northamptonshire','country' => 'England'],
            ['county' => 'Northumberland','country' => 'England'],
            ['county' => 'Nottinghamshire','country' => 'England'],
            ['county' => 'Oxfordshire','country' => 'England'],
            ['county' => 'Rutland','country' => 'England'],
            ['county' => 'Shropshire','country' => 'England'],
            ['county' => 'Somerset','country' => 'England'],
            ['county' => 'South Gloucestershire','country' => 'England'],
            ['county' => 'South Yorkshire','country' => 'England'],
            ['county' => 'Staffordshire','country' => 'England'],
            ['county' => 'Suffolk','country' => 'England'],
            ['county' => 'Surrey','country' => 'England'],
            ['county' => 'Tyne & Wear','country' => 'England'],
            ['county' => 'Warwickshire','country' => 'England'],
            ['county' => 'West Midlands','country' => 'England'],
            ['county' => 'West Sussex','country' => 'England'],
            ['county' => 'West Yorkshire','country' => 'England'],
            ['county' => 'WIltshire','country' => 'England'],
            ['county' => 'Worcestershire','country' => 'England'],
            ['county' => 'Aberdeenshire','country' => 'Scotland'],
            ['county' => 'Angus','country' => 'Scotland'],
            ['county' => 'Argyll & Bute','country' => 'Scotland'],
            ['county' => 'Ayrshire','country' => 'Scotland'],
            ['county' => 'Banffshire','country' => 'Scotland'],
            ['county' => 'Berwickshire','country' => 'Scotland'],
            ['county' => 'Borders','country' => 'Scotland'],
            ['county' => 'Caithness','country' => 'Scotland'],
            ['county' => 'Clackmannanshire','country' => 'Scotland'],
            ['county' => 'Dumfries & Galloway','country' => 'Scotland'],
            ['county' => 'Dunbartonshire','country' => 'Scotland'],
            ['county' => 'East Ayrshire','country' => 'Scotland'],
            ['county' => 'East Dunbartonshire','country' => 'Scotland'],
            ['county' => 'East Lothian','country' => 'Scotland'],
            ['county' => 'East Renfrewshire','country' => 'Scotland'],
            ['county' => 'Fife','country' => 'Scotland'],
            ['county' => 'Highland','country' => 'Scotland'],
            ['county' => 'Inverclyde','country' => 'Scotland'],
            ['county' => 'Kincardineshire','country' => 'Scotland'],
            ['county' => 'Midlothian','country' => 'Scotland'],
            ['county' => 'Moray','country' => 'Scotland'],
            ['county' => 'North Ayrshire','country' => 'Scotland'],
            ['county' => 'North Lanarkshire','country' => 'Scotland'],
            ['county' => 'Orkney','country' => 'Scotland'],
            ['county' => 'Perth & KInross','country' => 'Scotland'],
            ['county' => 'Renfrewshire','country' => 'Scotland'],
            ['county' => 'Shetland','country' => 'Scotland'],
            ['county' => 'South Ayrshire','country' => 'Scotland'],
            ['county' => 'South Lanarkshire','country' => 'Scotland'],
            ['county' => 'Stirlingshire','country' => 'Scotland'],
            ['county' => 'West Dunbartonshire','country' => 'Scotland'],
            ['county' => 'West Lothian','country' => 'Scotland'],
            ['county' => 'Western Isles','country' => 'Scotland'],
            ['county' => 'Blaenau Gwent','country' => 'Wales'],
            ['county' => 'Bridgend','country' => 'Wales'],
            ['county' => 'Caerphilly','country' => 'Wales'],
            ['county' => 'Cardiff','country' => 'Wales'],
            ['county' => 'Carmarthenshire','country' => 'Wales'],
            ['county' => 'Ceredigion','country' => 'Wales'],
            ['county' => 'Conwy','country' => 'Wales'],
            ['county' => 'Denbighshire','country' => 'Wales'],
            ['county' => 'Flintshire','country' => 'Wales'],
            ['county' => 'Gwynedd','country' => 'Wales'],
            ['county' => 'Isle of Anglesey','country' => 'Wales'],
            ['county' => 'Merthyr Tydfil','country' => 'Wales'],
            ['county' => 'Monmouthshire','country' => 'Wales'],
            ['county' => 'Neath Port Talbot','country' => 'Wales'],
            ['county' => 'Newport','country' => 'Wales'],
            ['county' => 'Pembrokeshire','country' => 'Wales'],
            ['county' => 'Powy','country' => 'Wales'],
            ['county' => 'Rhondda Cynon Taff','country' => 'Wales'],
            ['county' => 'Swansea','country' => 'Wales'],
            ['county' => 'Torfaen','country' => 'Wales'],
            ['county' => 'Vale of Glamorgan','country' => 'Wales'],
            ['county' => 'Wrexham','country' => 'Wales'],
            ['county' => 'Antrim','country' => 'Northern Ireland'],
            ['county' => 'Armagh','country' => 'Northern Ireland'],
            ['county' => 'Down','country' => 'Northern Ireland'],
            ['county' => 'Fermanagh','country' => 'Northern Ireland'],
            ['county' => 'Londonderry','country' => 'Northern Ireland'],
            ['county' => 'Tyrone','country' => 'Northern Ireland']
        ];
        \DB::table('counties')->insert($counties);

        \DB::table('dropdowns')->delete();

        $dropdowns = [
            ['name'=>'employment_eligibility','slug'=>'visa_considered','value'=>'Visa considered'],
            ['name'=>'employment_eligibility','slug'=>'sponsorship_offered','value'=>'Sponsorship offered'],
            ['name'=>'currency','slug'=>'pounds','value'=>'GBP Pound'],
            ['name'=>'currency','slug'=>'dollars','value'=>'USD'],
            ['name'=>'job_type','slug'=>'full_time','value'=>'Full Time'],
            ['name'=>'job_type','slug'=>'contract_basis','value'=>'Contract Basis'],
            ['name'=>'job_type','slug'=>'part_time','value'=>'Part Time'],
            ['name'=>'job_type','slug'=>'graduate','value'=>'Graduate'],
            ['name'=>'job_type','slug'=>'public_sector','value'=>'Public Sector'],
            ['name'=>'job_type','slug'=>'work_from_home','value'=>'Work From Home'],
        ];

        \DB::table('counties')->insert($dropdowns);
    }
}



   
  
   
    
   
  
