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
			[
				'name' => 'Whitelist',
				'slug' => 'whitelist_pending_customer',
				'module_name' => 'Pending Customers',
				'module_slug' => 'pending_customers',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Reject',
				'slug' => 'reject_pending_customer',
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
			[
				'name' => 'Reject',
				'slug' => 'reject_whitelisted_customer',
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
			[
				'name' => 'Whitelist',
				'slug' => 'whitelist_rejected_customer',
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
				'module_name' => 'Credits History',
				'module_slug' => 'credits_history',
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
			[
				'name' => 'Open',
				'slug' => 'open_ticket',
				'module_name' => 'Tickets',
				'module_slug' => 'tickets',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Close',
				'slug' => 'close_ticket',
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
			// Roles
			[
				'name' => 'Add',
				'slug' => 'add_role',
				'module_name' => 'Roles',
				'module_slug' => 'roles',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Edit',
				'slug' => 'edit_role',
				'module_name' => 'Roles',
				'module_slug' => 'roles',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'View',
				'slug' => 'view_role',
				'module_name' => 'Roles',
				'module_slug' => 'roles',
				'description' => 'desc',
				'status' => 1
			],
			[
				'name' => 'Delete',
				'slug' => 'delete_role',
				'module_name' => 'Roles',
				'module_slug' => 'roles',
				'description' => 'desc',
				'status' => 1
			],
			// Permissions
			[
				'name' => 'Add',
				'slug' => 'add_permissions',
				'module_name' => 'Permissions',
				'module_slug' => 'permissions',
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
				'name' => 'Restore Cities',
				'slug' => 'restore_cities',
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
				'name' => 'Restore Roles',
				'slug' => 'restore_roles',
				'module_name' => 'Restore',
				'module_slug' => 'restore',
				'description' => 'desc',
				'status' => 1
			],
		]);

		/* \DB::table('permission_role')->delete();
		$allPermissions = \DB::table('permissions')->all();
		for ($i=0; $i < count($allPermissions); $i++) { 
			$permission = $allPermissions[$i];
			\DB::table('permission_role')->insert([
				'permission_id' => $permission->id,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			]);
		} */

		\DB::table('permission_role')->delete();
		\DB::table('permission_role')->insert([
			[
				'permission_id' => 1,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 2,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 3,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 4,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 5,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 6,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 7,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 8,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 9,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 10,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 11,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 12,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 13,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 14,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 15,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 16,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 17,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 18,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 19,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 20,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 21,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 22,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 23,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 24,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 25,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 26,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 27,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 28,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 29,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 30,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 31,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 32,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 33,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 34,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 35,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 36,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 37,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 38,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 39,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 40,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 41,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 42,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 43,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 44,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 45,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 46,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 47,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 48,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 49,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 50,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 51,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 52,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 53,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 54,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 55,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 56,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 57,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 58,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 59,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 60,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 61,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 62,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 63,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 64,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 65,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 66,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 67,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 68,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 69,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 70,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 71,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 72,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 73,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 74,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 75,
				'role_id' => 1,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
			
			// Admin 
			
			[
				'permission_id' => 1,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 2,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 3,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 4,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 5,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 6,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 7,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 8,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 9,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 10,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 11,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 12,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 13,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 14,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 15,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 16,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 17,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 18,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 19,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 20,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 21,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 22,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 23,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 24,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 25,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 26,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 27,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 28,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 29,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 30,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 31,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 32,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 33,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 34,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 35,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 36,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 37,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 38,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 39,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 40,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 41,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 42,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 43,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 44,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 45,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 46,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 47,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 48,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 49,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 50,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 51,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 52,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 53,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 54,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 55,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 56,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 57,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 58,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 59,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 65,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 66,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 67,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 68,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 69,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 70,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 71,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 72,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 73,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 74,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 75,
				'role_id' => 2,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
			
			// Viewer 
			
			[
				'permission_id' => 4,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 9,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 13,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 18,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 22,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 26,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 30,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 31,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 33,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 34,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 35,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 36,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 43,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 47,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 51,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 59,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
      [
				'permission_id' => 62,
				'role_id' => 3,
				'status' => 1,
				'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
			],
		]);
	}
}
