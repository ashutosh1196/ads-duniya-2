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
			[
				'name' => 'List Customers',
				'slug' => 'list_customers',
				'module_name' => 'Customers',
				'module_slug' => 'customers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View Customer',
				'slug' => 'view_customer',
				'module_name' => 'Customers',
				'module_slug' => 'customers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Add Customer',
				'slug' => 'add_customer',
				'module_name' => 'Customers',
				'module_slug' => 'customers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit Customer',
				'slug' => 'edit_customer',
				'module_name' => 'Customers',
				'module_slug' => 'customers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete Customer',
				'slug' => 'delete_customer',
				'module_name' => 'Customers',
				'module_slug' => 'customers',
				'description' => 'desc',
				'status' => 1
			],
			// Jobseeker
			[
				'name' => 'List Jobseekers',
				'slug' => 'list_jobseekers',
				'module_name' => 'Jobseekers',
				'module_slug' => 'jobseekers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View Jobseeker',
				'slug' => 'view_jobseeker',
				'module_name' => 'Jobseekers',
				'module_slug' => 'jobseekers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Add Jobseeker',
				'slug' => 'add_jobseeker',
				'module_name' => 'Jobseekers',
				'module_slug' => 'jobseekers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit Jobseeker',
				'slug' => 'edit_jobseeker',
				'module_name' => 'Jobseekers',
				'module_slug' => 'jobseekers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete Jobseeker',
				'slug' => 'delete_jobseeker',
				'module_name' => 'Jobseekers',
				'module_slug' => 'jobseekers',
				'description' => 'desc',
				'status' => 1
			],
			// Recruiter
			[
				'name' => 'List Recruiters',
				'slug' => 'list_recruiters',
				'module_name' => 'Recruiters',
				'module_slug' => 'recruiters',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View Recruiter',
				'slug' => 'view_recruiter',
				'module_name' => 'Recruiters',
				'module_slug' => 'recruiters',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Add Recruiter',
				'slug' => 'add_recruiter',
				'module_name' => 'Recruiters',
				'module_slug' => 'recruiters',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit Recruiter',
				'slug' => 'edit_recruiter',
				'module_name' => 'Recruiters',
				'module_slug' => 'recruiters',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete Recruiter',
				'slug' => 'delete_recruiter',
				'module_name' => 'Recruiters',
				'module_slug' => 'recruiters',
				'description' => 'desc',
				'status' => 1
			],
			// Admins
			[
				'name' => 'List Admins',
				'slug' => 'list_admins',
				'module_name' => 'Admins',
				'module_slug' => 'admins',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View Admin',
				'slug' => 'view_admin',
				'module_name' => 'Admins',
				'module_slug' => 'admins',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Add Admin',
				'slug' => 'add_admin',
				'module_name' => 'Admins',
				'module_slug' => 'admins',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit Admin',
				'slug' => 'edit_admin',
				'module_name' => 'Admins',
				'module_slug' => 'admins',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete Admin',
				'slug' => 'delete_admin',
				'module_name' => 'Admins',
				'module_slug' => 'admins',
				'description' => 'desc',
				'status' => 1
			],
			// Jobs
			[
				'name' => 'List Jobs',
				'slug' => 'list_jobs',
				'module_name' => 'Jobs',
				'module_slug' => 'jobs',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View Job',
				'slug' => 'view_job',
				'module_name' => 'Jobs',
				'module_slug' => 'jobs',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Add Job',
				'slug' => 'add_job',
				'module_name' => 'Jobs',
				'module_slug' => 'jobs',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit Job',
				'slug' => 'edit_job',
				'module_name' => 'Jobs',
				'module_slug' => 'jobs',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete Job',
				'slug' => 'delete_job',
				'module_name' => 'Jobs',
				'module_slug' => 'jobs',
				'description' => 'desc',
				'status' => 1
			],
			// Job History
			[
				'name' => 'List Job History',
				'slug' => 'list_job_history',
				'module_name' => 'Job History',
				'module_slug' => 'job_history',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View Job History',
				'slug' => 'view_job_history',
				'module_name' => 'Job History',
				'module_slug' => 'job_history',
				'description' => 'desc',
				'status' => 1
			],
			// Jobs
			[
				'name' => 'List Company Credits',
				'slug' => 'list_company_credits',
				'module_name' => 'Company Credits',
				'module_slug' => 'company_credits',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View Job',
				'slug' => 'view_company_credits',
				'module_name' => 'Company Credits',
				'module_slug' => 'company_credits',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Add Company Credit',
				'slug' => 'add_company_credits',
				'module_name' => 'Company Credits',
				'module_slug' => 'company_credits',
				'description' => 'desc',
				'status' => 1
			],
			// Company Credit History
			[
				'name' => 'List Company Credit History',
				'slug' => 'list_company_credits_history',
				'module_name' => 'Company Credits History',
				'module_slug' => 'company_credits_history',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View Company Credit History',
				'slug' => 'view_company_credits_history',
				'module_name' => 'Company Credits History',
				'module_slug' => 'company_credits_history',
				'description' => 'desc',
				'status' => 1
			],
			// Payment Transactions
			[
				'name' => 'List Payment Transactions',
				'slug' => 'list_payment_transactions',
				'module_name' => 'Payment Transactions',
				'module_slug' => 'payment_transactions',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View Payment Transaction',
				'slug' => 'view_payment_transaction',
				'module_name' => 'Payment Transactions',
				'module_slug' => 'payment_transactions',
				'description' => 'desc',
				'status' => 1
			],
			// Tickets
			[
				'name' => 'List Tickets',
				'slug' => 'list_tickets',
				'module_name' => 'Tickets',
				'module_slug' => 'tickets',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View Ticket',
				'slug' => 'view_ticket',
				'module_name' => 'Tickets',
				'module_slug' => 'tickets',
				'description' => 'desc',
				'status' => 1
			],
			// Job Industries
			[
				'name' => 'List Job Industries',
				'slug' => 'list_job_industries',
				'module_name' => 'Job Industries',
				'module_slug' => 'job_industries',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View Job Industry',
				'slug' => 'view_job_industry',
				'module_name' => 'Job Industries',
				'module_slug' => 'job_industries',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Add Job Industry',
				'slug' => 'add_job_industry',
				'module_name' => 'Job Industries',
				'module_slug' => 'job_industries',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit Job Industry',
				'slug' => 'edit_job_industry',
				'module_name' => 'Job Industries',
				'module_slug' => 'job_industries',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete Job Industry',
				'slug' => 'delete_job_industry',
				'module_name' => 'Job Industries',
				'module_slug' => 'job_industries',
				'description' => 'desc',
				'status' => 1
			],
			// Job Locations
			[
				'name' => 'List Job Locations',
				'slug' => 'list_job_locations',
				'module_name' => 'Job Locations',
				'module_slug' => 'job_locations',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View Job Location',
				'slug' => 'view_job_location',
				'module_name' => 'Job Locations',
				'module_slug' => 'job_locations',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Add Job Location',
				'slug' => 'add_job_location',
				'module_name' => 'Job Locations',
				'module_slug' => 'job_locations',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit Job Location',
				'slug' => 'edit_job_location',
				'module_name' => 'Job Locations',
				'module_slug' => 'job_locations',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete Job Location',
				'slug' => 'delete_job_location',
				'module_name' => 'Job Locations',
				'module_slug' => 'job_locations',
				'description' => 'desc',
				'status' => 1
			],
			// Skills
			[
				'name' => 'List Skills',
				'slug' => 'list_skills',
				'module_name' => 'Skills',
				'module_slug' => 'skills',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View Skill',
				'slug' => 'view_skill',
				'module_name' => 'Skills',
				'module_slug' => 'skills',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Add Skill',
				'slug' => 'add_skill',
				'module_name' => 'Skills',
				'module_slug' => 'skills',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit Skill',
				'slug' => 'edit_skill',
				'module_name' => 'Skills',
				'module_slug' => 'skills',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete Skill',
				'slug' => 'delete_skill',
				'module_name' => 'Skills',
				'module_slug' => 'skills',
				'description' => 'desc',
				'status' => 1
			],
			// Cities
			[
				'name' => 'List Cities',
				'slug' => 'list_cities',
				'module_name' => 'Cities',
				'module_slug' => 'cities',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View City',
				'slug' => 'view_city',
				'module_name' => 'Cities',
				'module_slug' => 'cities',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Add City',
				'slug' => 'add_city',
				'module_name' => 'Cities',
				'module_slug' => 'cities',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit City',
				'slug' => 'edit_city',
				'module_name' => 'Cities',
				'module_slug' => 'cities',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete City',
				'slug' => 'delete_city',
				'module_name' => 'Cities',
				'module_slug' => 'cities',
				'description' => 'desc',
				'status' => 1
			],
			// Counties
			[
				'name' => 'List Counties',
				'slug' => 'list_counties',
				'module_name' => 'Counties',
				'module_slug' => 'counties',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View County',
				'slug' => 'view_county',
				'module_name' => 'Counties',
				'module_slug' => 'counties',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Add County',
				'slug' => 'add_county',
				'module_name' => 'Counties',
				'module_slug' => 'counties',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit County',
				'slug' => 'edit_county',
				'module_name' => 'Counties',
				'module_slug' => 'counties',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete County',
				'slug' => 'delete_county',
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
