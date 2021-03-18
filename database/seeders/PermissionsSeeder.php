<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	*/
	public function run() {
		\DB::table('permissions')->delete();
		\DB::table('permissions')->insert([
			// Pending Customers
			[
				'name' => 'Add',
				'slug' => 'add_customer',
				'module_name' => 'Pending Customers',
				'module_slug' => 'pending_customers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit',
				'slug' => 'edit_pending_customer',
				'module_name' => 'Pending Customers',
				'module_slug' => 'pending_customers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete',
				'slug' => 'delete_pending_customer',
				'module_name' => 'Pending Customers',
				'module_slug' => 'pending_customers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_pending_customer',
				'module_name' => 'Pending Customers',
				'module_slug' => 'pending_customers',
				'description' => 'desc',
				'status' => 1
			],

			// Whitelisted Customers
			[
				'name' => 'Edit',
				'slug' => 'edit_whitelisted_customer',
				'module_name' => 'Whitelisted Customers',
				'module_slug' => 'whitelisted_customers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete',
				'slug' => 'delete_whitelisted_customer',
				'module_name' => 'Whitelisted Customers',
				'module_slug' => 'whitelisted_customers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_whitelisted_customer',
				'module_name' => 'Whitelisted Customers',
				'module_slug' => 'whitelisted_customers',
				'description' => 'desc',
				'status' => 1
			],
			
			// Rejected Customers
			[
				'name' => 'Edit',
				'slug' => 'edit_rejected_customer',
				'module_name' => 'Rejected Customers',
				'module_slug' => 'rejected_customers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete',
				'slug' => 'delete_rejected_customer',
				'module_name' => 'Rejected Customers',
				'module_slug' => 'rejected_customers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_rejected_customer',
				'module_name' => 'Rejected Customers',
				'module_slug' => 'rejected_customers',
				'description' => 'desc',
				'status' => 1
			],

			// Jobseeker
			[
				'name' => 'Add',
				'slug' => 'add_jobseeker',
				'module_name' => 'Jobseekers',
				'module_slug' => 'jobseekers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit',
				'slug' => 'edit_jobseeker',
				'module_name' => 'Jobseekers',
				'module_slug' => 'jobseekers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete',
				'slug' => 'delete_jobseeker',
				'module_name' => 'Jobseekers',
				'module_slug' => 'jobseekers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_jobseeker',
				'module_name' => 'Jobseekers',
				'module_slug' => 'jobseekers',
				'description' => 'desc',
				'status' => 1
			],
			// Recruiter
			[
				'name' => 'Add',
				'slug' => 'add_recruiter',
				'module_name' => 'Recruiters',
				'module_slug' => 'recruiters',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit',
				'slug' => 'edit_recruiter',
				'module_name' => 'Recruiters',
				'module_slug' => 'recruiters',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete',
				'slug' => 'delete_recruiter',
				'module_name' => 'Recruiters',
				'module_slug' => 'recruiters',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_recruiter',
				'module_name' => 'Recruiters',
				'module_slug' => 'recruiters',
				'description' => 'desc',
				'status' => 1
			],
			// Admins
			[
				'name' => 'Add',
				'slug' => 'add_admin',
				'module_name' => 'Admins',
				'module_slug' => 'admins',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit',
				'slug' => 'edit_admin',
				'module_name' => 'Admins',
				'module_slug' => 'admins',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete',
				'slug' => 'delete_admin',
				'module_name' => 'Admins',
				'module_slug' => 'admins',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_admin',
				'module_name' => 'Admins',
				'module_slug' => 'admins',
				'description' => 'desc',
				'status' => 1
			],
			// Jobs
			[
				'name' => 'Add',
				'slug' => 'add_job',
				'module_name' => 'Jobs',
				'module_slug' => 'jobs',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit',
				'slug' => 'edit_job',
				'module_name' => 'Jobs',
				'module_slug' => 'jobs',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete',
				'slug' => 'delete_job',
				'module_name' => 'Jobs',
				'module_slug' => 'jobs',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_job',
				'module_name' => 'Jobs',
				'module_slug' => 'jobs',
				'description' => 'desc',
				'status' => 1
			],
			// Job History
			[
				'name' => 'View',
				'slug' => 'view_job_history',
				'module_name' => 'Job History',
				'module_slug' => 'job_history',
				'description' => 'desc',
				'status' => 1
			],
			// Company Credits
			[
				'name' => 'Add',
				'slug' => 'add_company_credit',
				'module_name' => 'Company Credits',
				'module_slug' => 'company_credits',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_company_credit',
				'module_name' => 'Company Credits',
				'module_slug' => 'company_credits',
				'description' => 'desc',
				'status' => 1
			],
			// Company Credit History
			[
				'name' => 'View',
				'slug' => 'view_credits_history',
				'module_name' => 'Company Credits History',
				'module_slug' => 'company_credits_history',
				'description' => 'desc',
				'status' => 1
			],
			// Payment Transactions
			[
				'name' => 'View',
				'slug' => 'view_payment_transaction',
				'module_name' => 'Payment Transactions',
				'module_slug' => 'payment_transactions',
				'description' => 'desc',
				'status' => 1
			],
			// Tickets
			[
				'name' => 'View',
				'slug' => 'view_ticket',
				'module_name' => 'Tickets',
				'module_slug' => 'tickets',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Reply',
				'slug' => 'reply_ticket',
				'module_name' => 'Tickets',
				'module_slug' => 'tickets',
				'description' => 'desc',
				'status' => 1
			],
			// Job Industries
			[
				'name' => 'Add',
				'slug' => 'add_job_industry',
				'module_name' => 'Job Industries',
				'module_slug' => 'job_industries',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit',
				'slug' => 'edit_job_industry',
				'module_name' => 'Job Industries',
				'module_slug' => 'job_industries',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete',
				'slug' => 'delete_job_industry',
				'module_name' => 'Job Industries',
				'module_slug' => 'job_industries',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_job_industry',
				'module_name' => 'Job Industries',
				'module_slug' => 'job_industries',
				'description' => 'desc',
				'status' => 1
			],
			// Job Locations
			[
				'name' => 'Add',
				'slug' => 'add_job_location',
				'module_name' => 'Job Locations',
				'module_slug' => 'job_locations',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit',
				'slug' => 'edit_job_location',
				'module_name' => 'Job Locations',
				'module_slug' => 'job_locations',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete',
				'slug' => 'delete_job_location',
				'module_name' => 'Job Locations',
				'module_slug' => 'job_locations',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_job_location',
				'module_name' => 'Job Locations',
				'module_slug' => 'job_locations',
				'description' => 'desc',
				'status' => 1
			],
			// Skills
			[
				'name' => 'Add',
				'slug' => 'add_skill',
				'module_name' => 'Skills',
				'module_slug' => 'skills',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit',
				'slug' => 'edit_skill',
				'module_name' => 'Skills',
				'module_slug' => 'skills',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete',
				'slug' => 'delete_skill',
				'module_name' => 'Skills',
				'module_slug' => 'skills',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_skill',
				'module_name' => 'Skills',
				'module_slug' => 'skills',
				'description' => 'desc',
				'status' => 1
			],
			// Cities
			[
				'name' => 'Add',
				'slug' => 'add_city',
				'module_name' => 'Cities',
				'module_slug' => 'cities',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit',
				'slug' => 'edit_city',
				'module_name' => 'Cities',
				'module_slug' => 'cities',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete',
				'slug' => 'delete_city',
				'module_name' => 'Cities',
				'module_slug' => 'cities',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_city',
				'module_name' => 'Cities',
				'module_slug' => 'cities',
				'description' => 'desc',
				'status' => 1
			],
			// Counties
			[
				'name' => 'Add',
				'slug' => 'add_county',
				'module_name' => 'Counties',
				'module_slug' => 'counties',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit',
				'slug' => 'edit_county',
				'module_name' => 'Counties',
				'module_slug' => 'counties',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete',
				'slug' => 'delete_county',
				'module_name' => 'Counties',
				'module_slug' => 'counties',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_county',
				'module_name' => 'Counties',
				'module_slug' => 'counties',
				'description' => 'desc',
				'status' => 1
			],
			// Recycle Bin
			[
				'name' => 'Restore Customers',
				'slug' => 'restore_customers',
				'module_name' => 'Restore',
				'module_slug' => 'restore',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Restore Jobseekers',
				'slug' => 'restore_jobseekers',
				'module_name' => 'Restore',
				'module_slug' => 'restore',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Restore Recruiters',
				'slug' => 'restore_recruiters',
				'module_name' => 'Restore',
				'module_slug' => 'restore',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Restore Admins',
				'slug' => 'restore_admins',
				'module_name' => 'Restore',
				'module_slug' => 'restore',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Restore Jobs',
				'slug' => 'restore_jobs',
				'module_name' => 'Restore',
				'module_slug' => 'restore',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Restore Job Industries',
				'slug' => 'restore_job_industries',
				'module_name' => 'Restore',
				'module_slug' => 'restore',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Restore Job Locations',
				'slug' => 'restore_job_locations',
				'module_name' => 'Restore',
				'module_slug' => 'restore',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Restore Skills',
				'slug' => 'restore_skills',
				'module_name' => 'Restore',
				'module_slug' => 'restore',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Restore Counties',
				'slug' => 'restore_counties',
				'module_name' => 'Restore',
				'module_slug' => 'restore',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Restore Counties',
				'slug' => 'restore_counties',
				'module_name' => 'Restore',
				'module_slug' => 'restore',
				'description' => 'desc',
				'status' => 1
			],
		]);
	}
}
