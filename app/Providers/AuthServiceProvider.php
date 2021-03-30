<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Auth;

class AuthServiceProvider extends ServiceProvider {
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	*/
	protected $policies = [
		// 'App\Models\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	*/
	public function boot() {
		$this->registerPolicies();

		Gate::define('manage_customers', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_customer' || 
					 $permissions[$i]->slug == 'edit_pending_customer' || 
					 $permissions[$i]->slug == 'delete_pending_customer' || 
					 $permissions[$i]->slug == 'view_pending_customer' ||
					 $permissions[$i]->slug == 'whitelist_pending_customer' ||
					 $permissions[$i]->slug == 'reject_pending_customer' ||
					 $permissions[$i]->slug == 'edit_whitelisted_customer' || 
					 $permissions[$i]->slug == 'delete_whitelisted_customer' || 
					 $permissions[$i]->slug == 'view_whitelisted_customer' ||
					 $permissions[$i]->slug == 'reject_whitelisted_customer' ||
					 $permissions[$i]->slug == 'edit_rejected_customer' || 
					 $permissions[$i]->slug == 'delete_rejected_customer' || 
					 $permissions[$i]->slug == 'view_rejected_customer' ||
					 $permissions[$i]->slug == 'whitelist_rejected_customer'
				) {
					return true;
				}
			}
		});

		Gate::define('manage_pending_customers_actions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_pending_customer' || 
					 $permissions[$i]->slug == 'delete_pending_customer' || 
					 $permissions[$i]->slug == 'view_pending_customer' ||
					 $permissions[$i]->slug == 'whitelist_pending_customer' ||
					 $permissions[$i]->slug == 'reject_pending_customer'
				) {
					return true;
				}
			}
		});
		
		Gate::define('manage_pending_customers', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_customer' || 
					$permissions[$i]->slug == 'edit_pending_customer' || 
					$permissions[$i]->slug == 'delete_pending_customer' || 
					$permissions[$i]->slug == 'view_pending_customer' ||
					$permissions[$i]->slug == 'whitelist_pending_customer' ||
					$permissions[$i]->slug == 'reject_pending_customer'
				) {
					return true;
				}
			}
		});

		Gate::define('manage_whitelisted_customers', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_whitelisted_customer' || 
					$permissions[$i]->slug == 'delete_whitelisted_customer' || 
					$permissions[$i]->slug == 'view_whitelisted_customer' ||
					$permissions[$i]->slug == 'whitelist_whitelisted_customer' ||
					$permissions[$i]->slug == 'reject_whitelisted_customer'
				) {
					return true;
				}
			}
		});

		Gate::define('manage_rejected_customers', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_rejected_customer' || 
					$permissions[$i]->slug == 'delete_rejected_customer' || 
					$permissions[$i]->slug == 'view_rejected_customer' ||
					$permissions[$i]->slug == 'whitelist_rejected_customer'
				) {
					return true;
				}
			}
		});

		Gate::define('add_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_customer') {
					return true;
				}
			}
		});

		Gate::define('edit_pending_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_pending_customer') {
					return true;
				}
			}
		});

		Gate::define('delete_pending_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'delete_pending_customer') {
					return true;
				}
			}
		});

		Gate::define('view_pending_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_pending_customer') {
					return true;
				}
			}
		});

		Gate::define('whitelist_pending_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'whitelist_pending_customer') {
					return true;
				}
			}
		});

		Gate::define('reject_pending_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'reject_pending_customer') {
					return true;
				}
			}
		});

		Gate::define('edit_whitelisted_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_whitelisted_customer') {
					return true;
				}
			}
		});

		Gate::define('delete_whitelisted_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'delete_whitelisted_customer') {
					return true;
				}
			}
		});

		Gate::define('view_whitelisted_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_whitelisted_customer') {
					return true;
				}
			}
		});

		Gate::define('reject_whitelisted_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'reject_whitelisted_customer') {
					return true;
				}
			}
		});

		Gate::define('edit_rejected_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_rejected_customer') {
					return true;
				}
			}
		});

		Gate::define('delete_rejected_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'delete_rejected_customer') {
					return true;
				}
			}
		});

		Gate::define('view_rejected_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_rejected_customer') {
					return true;
				}
			}
		});

		Gate::define('whitelist_rejected_customer', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'whitelist_rejected_customer') {
					return true;
				}
			}
		});

		Gate::define('manage_users', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_jobseeker' ||
					 $permissions[$i]->slug == 'edit_jobseeker' ||
					 $permissions[$i]->slug == 'delete_jobseeker' ||
					 $permissions[$i]->slug == 'view_jobseeker' ||
					 $permissions[$i]->slug == 'add_recruiter' ||
					 $permissions[$i]->slug == 'edit_recruiter' ||
					 $permissions[$i]->slug == 'delete_recruiter' ||
					 $permissions[$i]->slug == 'view_recruiter' ||
					 $permissions[$i]->slug == 'add_admin' ||
					 $permissions[$i]->slug == 'edit_admin' ||
					 $permissions[$i]->slug == 'delete_admin' ||
					 $permissions[$i]->slug == 'view_admin'
				) {
					return true;
				}
			}
		});

		Gate::define('manage_jobseekers', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_jobseeker' ||
					$permissions[$i]->slug == 'edit_jobseeker' ||
					$permissions[$i]->slug == 'delete_jobseeker' ||
					$permissions[$i]->slug == 'view_jobseeker'
				) {
					return true;
				}
			}
		});

		Gate::define('manage_jobseekers_actions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_jobseeker' || 
					 $permissions[$i]->slug == 'delete_jobseeker' || 
					 $permissions[$i]->slug == 'view_jobseeker'
				) {
					return true;
				}
			}
		});

		Gate::define('add_jobseeker', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_jobseeker') {
					return true;
				}
			}
		});

		Gate::define('edit_jobseeker', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_jobseeker') {
					return true;
				}
			}
		});

		Gate::define('delete_jobseeker', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'delete_jobseeker') {
					return true;
				}
			}
		});

		Gate::define('view_jobseeker', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_jobseeker') {
					return true;
				}
			}
		});

		Gate::define('manage_recruiters', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_recruiter' ||
					 $permissions[$i]->slug == 'edit_recruiter' ||
					 $permissions[$i]->slug == 'delete_recruiter' ||
					 $permissions[$i]->slug == 'view_recruiter'
				) {
					return true;
				}
			}
		});

		Gate::define('manage_recruiters_actions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_recruiter' || 
					 $permissions[$i]->slug == 'delete_recruiter' || 
					 $permissions[$i]->slug == 'view_recruiter'
				) {
					return true;
				}
			}
		});

		Gate::define('add_recruiter', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_recruiter') {
					return true;
				}
			}
		});

		Gate::define('edit_recruiter', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_recruiter') {
					return true;
				}
			}
		});

		Gate::define('delete_recruiter', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'delete_recruiter') {
					return true;
				}
			}
		});

		Gate::define('view_recruiter', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_recruiter') {
					return true;
				}
			}
		});

		Gate::define('manage_admins', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_admin' ||
					$permissions[$i]->slug == 'edit_admin' ||
					$permissions[$i]->slug == 'delete_admin' ||
					$permissions[$i]->slug == 'view_admin'
				) {
					return true;
				}
			}
		});

		Gate::define('manage_admins_actions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_admin' || 
					 $permissions[$i]->slug == 'delete_admin' || 
					 $permissions[$i]->slug == 'view_admin'
				) {
					return true;
				}
			}
		});

		Gate::define('add_admin', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_admin') {
					return true;
				}
			}
		});

		Gate::define('edit_admin', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_admin') {
					return true;
				}
			}
		});

		Gate::define('delete_admin', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'delete_admin') {
					return true;
				}
			}
		});

		Gate::define('view_admin', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_admin') {
					return true;
				}
			}
		});

		Gate::define('manage_jobs', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_job' ||
					 $permissions[$i]->slug == 'edit_job' ||
					 $permissions[$i]->slug == 'delete_job' ||
					 $permissions[$i]->slug == 'view_job' ||
					 $permissions[$i]->slug == 'view_job_history' ||
					 $permissions[$i]->slug == 'view_job_bookmarks' ||
					 $permissions[$i]->slug == 'view_job_applications' ||
					 $permissions[$i]->slug == 'view_job_search_history' ||
					 $permissions[$i]->slug == 'view_reported_job'
				  ) {
					return true;
				}
			}
		});

		Gate::define('manage_jobs_actions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_job' || 
					 $permissions[$i]->slug == 'delete_job' || 
					 $permissions[$i]->slug == 'view_job'
				) {
					return true;
				}
			}
		});

		Gate::define('manage_job', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_job' ||
					 $permissions[$i]->slug == 'edit_job' ||
					 $permissions[$i]->slug == 'delete_job' ||
					 $permissions[$i]->slug == 'view_job'
				  ) {
					return true;
				}
			}
		});

		Gate::define('add_job', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_job') {
					return true;
				}
			}
		});

		Gate::define('edit_job', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_job') {
					return true;
				}
			}
		});

		Gate::define('delete_job', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'delete_job') {
					return true;
				}
			}
		});

		Gate::define('view_job', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_job') {
					return true;
				}
			}
		});

		Gate::define('view_job_history', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_job_history') {
					return true;
				}
			}
		});

		Gate::define('view_job_bookmarks', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_job_bookmarks') {
					return true;
				}
			}
		});

		Gate::define('view_job_applications', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_job_applications') {
					return true;
				}
			}
		});

		Gate::define('view_job_search_history', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_job_search_history') {
					return true;
				}
			}
		});

		Gate::define('view_reported_job', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_reported_job') {
					return true;
				}
			}
		});

		Gate::define('manage_company_credits', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_company_credit' ||
					 $permissions[$i]->slug == 'view_company_credit' ||
					 $permissions[$i]->slug == 'view_credits_history' ||
					 $permissions[$i]->slug == 'view_payment_transaction'
				) {
					return true;
				}
			}
		});

		Gate::define('manage_credits', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_company_credit' ||
					 $permissions[$i]->slug == 'view_company_credit'
				) {
					return true;
				}
			}
		});

		Gate::define('add_company_credit', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_company_credit') {
					return true;
				}
			}
		});

		Gate::define('view_company_credit', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_company_credit') {
					return true;
				}
			}
		});

		Gate::define('view_credits_history', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_credits_history') {
					return true;
				}
			}
		});

		Gate::define('view_payment_transaction', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_payment_transaction') {
					return true;
				}
			}
		});

		Gate::define('manage_tickets', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_ticket' ||
				   $permissions[$i]->slug == 'open_ticket' ||
				   $permissions[$i]->slug == 'close_ticket' ||
					 $permissions[$i]->slug == 'reply_ticket') {
					return true;
				}
			}
		});

		Gate::define('view_ticket', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_ticket') {
					return true;
				}
			}
		});

		Gate::define('reply_ticket', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'reply_ticket') {
					return true;
				}
			}
		});

		Gate::define('open_ticket', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'open_ticket') {
					return true;
				}
			}
		});

		Gate::define('close_ticket', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'close_ticket') {
					return true;
				}
			}
		});

		Gate::define('manage_misc_data', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_job_industry' ||
					 $permissions[$i]->slug == 'edit_job_industry' ||
					 $permissions[$i]->slug == 'delete_job_industry' ||
					 $permissions[$i]->slug == 'view_job_industry' ||
					 $permissions[$i]->slug == 'add_job_location' ||
					 $permissions[$i]->slug == 'edit_job_location' ||
					 $permissions[$i]->slug == 'delete_job_location' ||
					 $permissions[$i]->slug == 'view_job_location' ||
					 $permissions[$i]->slug == 'add_skill' ||
					 $permissions[$i]->slug == 'edit_skill' ||
					 $permissions[$i]->slug == 'delete_skill' ||
					 $permissions[$i]->slug == 'view_skill' ||
					 $permissions[$i]->slug == 'add_city' ||
					 $permissions[$i]->slug == 'edit_city' ||
					 $permissions[$i]->slug == 'delete_city' ||
					 $permissions[$i]->slug == 'view_city' ||
					 $permissions[$i]->slug == 'add_county' ||
					 $permissions[$i]->slug == 'edit_county' ||
					 $permissions[$i]->slug == 'delete_county' ||
					 $permissions[$i]->slug == 'view_county'
					) {
					return true;
				}
			}
		});

		Gate::define('manage_job_industry', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_job_industry' ||
					 $permissions[$i]->slug == 'edit_job_industry' ||
					 $permissions[$i]->slug == 'delete_job_industry' ||
					 $permissions[$i]->slug == 'view_job_industry'
					) {
					return true;
				}
			}
		});

		Gate::define('manage_job_industry_actions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_job_industry' || 
					 $permissions[$i]->slug == 'delete_job_industry' || 
					 $permissions[$i]->slug == 'view_job_industry'
				) {
					return true;
				}
			}
		});

		Gate::define('add_job_industry', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_job_industry') {
					return true;
				}
			}
		});

		Gate::define('edit_job_industry', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_job_industry') {
					return true;
				}
			}
		});

		Gate::define('delete_job_industry', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'delete_job_industry') {
					return true;
				}
			}
		});

		Gate::define('view_job_industry', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_job_industry') {
					return true;
				}
			}
		});

		Gate::define('manage_job_location', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_job_location' ||
				$permissions[$i]->slug == 'edit_job_location' ||
				$permissions[$i]->slug == 'delete_job_location' ||
				$permissions[$i]->slug == 'view_job_location'
					) {
					return true;
				}
			}
		});

		Gate::define('manage_job_location_actions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_job_location' || 
					 $permissions[$i]->slug == 'delete_job_location' || 
					 $permissions[$i]->slug == 'view_job_location'
				) {
					return true;
				}
			}
		});

		Gate::define('add_job_location', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_job_location') {
					return true;
				}
			}
		});

		Gate::define('edit_job_location', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_job_location') {
					return true;
				}
			}
		});

		Gate::define('delete_job_location', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'delete_job_location') {
					return true;
				}
			}
		});

		Gate::define('view_job_location', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_job_location') {
					return true;
				}
			}
		});

		Gate::define('manage_skills', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_skill' ||
				$permissions[$i]->slug == 'edit_skill' ||
				$permissions[$i]->slug == 'delete_skill' ||
				$permissions[$i]->slug == 'view_skill'
					) {
					return true;
				}
			}
		});

		Gate::define('manage_skills_actions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_skill' || 
					 $permissions[$i]->slug == 'delete_skill' || 
					 $permissions[$i]->slug == 'view_skill'
				) {
					return true;
				}
			}
		});

		Gate::define('add_skill', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_skill') {
					return true;
				}
			}
		});

		Gate::define('edit_skill', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_skill') {
					return true;
				}
			}
		});

		Gate::define('delete_skill', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'delete_skill') {
					return true;
				}
			}
		});

		Gate::define('view_skill', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_skill') {
					return true;
				}
			}
		});

		Gate::define('manage_cities', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_city' ||
					 $permissions[$i]->slug == 'edit_city' ||
					 $permissions[$i]->slug == 'delete_city' ||
					 $permissions[$i]->slug == 'view_city'
					) {
					return true;
				}
			}
		});

		Gate::define('manage_cities_actions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_city' || 
					 $permissions[$i]->slug == 'delete_city' || 
					 $permissions[$i]->slug == 'view_city'
				) {
					return true;
				}
			}
		});

		Gate::define('add_city', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_city') {
					return true;
				}
			}
		});

		Gate::define('edit_city', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_city') {
					return true;
				}
			}
		});

		Gate::define('delete_city', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'delete_city') {
					return true;
				}
			}
		});

		Gate::define('view_city', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_city') {
					return true;
				}
			}
		});

		Gate::define('manage_counties', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_county' ||
					 $permissions[$i]->slug == 'edit_county' ||
					 $permissions[$i]->slug == 'delete_county' ||
					 $permissions[$i]->slug == 'view_county'
					) {
					return true;
				}
			}
		});

		Gate::define('manage_counties_actions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_county' || 
					 $permissions[$i]->slug == 'delete_county' || 
					 $permissions[$i]->slug == 'view_county'
				) {
					return true;
				}
			}
		});

		Gate::define('add_county', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_county') {
					return true;
				}
			}
		});

		Gate::define('edit_county', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_county') {
					return true;
				}
			}
		});

		Gate::define('delete_county', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'delete_county') {
					return true;
				}
			}
		});

		Gate::define('view_county', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_county') {
					return true;
				}
			}
		});

		Gate::define('manage_access_control', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_role' ||
					 $permissions[$i]->slug == 'edit_role' ||
					 $permissions[$i]->slug == 'view_role' ||
					 $permissions[$i]->slug == 'delete_role' ||
					 $permissions[$i]->slug == 'add_permissions'
					) {
					return true;
				}
			}
		});

		Gate::define('manage_roles', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_role' ||
					 $permissions[$i]->slug == 'edit_role' ||
					 $permissions[$i]->slug == 'view_role' ||
					 $permissions[$i]->slug == 'delete_role'
					) {
					return true;
				}
			}
		});

		Gate::define('manage_roles_actions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_role' || 
					 $permissions[$i]->slug == 'delete_role' || 
					 $permissions[$i]->slug == 'view_role'
				) {
					return true;
				}
			}
		});

		Gate::define('add_role', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_role') {
					return true;
				}
			}
		});

		Gate::define('edit_role', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_role') {
					return true;
				}
			}
		});

		Gate::define('view_role', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_role') {
					return true;
				}
			}
		});

		Gate::define('delete_role', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'delete_role') {
					return true;
				}
			}
		});

		Gate::define('add_permissions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_permissions') {
					return true;
				}
			}
		});
		
		Gate::define('manage_recycle_bin', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_customers' ||
					 $permissions[$i]->slug == 'restore_jobseekers' ||
					 $permissions[$i]->slug == 'restore_recruiters' ||
					 $permissions[$i]->slug == 'restore_admins' ||
					 $permissions[$i]->slug == 'restore_jobs' ||
					 $permissions[$i]->slug == 'restore_job_industries' ||
					 $permissions[$i]->slug == 'restore_job_locations' ||
					 $permissions[$i]->slug == 'restore_skills' ||
					 $permissions[$i]->slug == 'restore_cities' ||
					 $permissions[$i]->slug == 'restore_counties' ||
					 $permissions[$i]->slug == 'restore_roles' ||
					 $permissions[$i]->slug == 'restore_website_page' ||
					 $permissions[$i]->slug == 'restore_mobile_page'
					) {
					return true;
				}
			}
		});

		Gate::define('restore_customers', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_customers') {
					return true;
				}
			}
		});

		Gate::define('restore_jobseekers', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_jobseekers') {
					return true;
				}
			}
		});

		Gate::define('restore_recruiters', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_recruiters') {
					return true;
				}
			}
		});

		Gate::define('restore_admins', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_admins') {
					return true;
				}
			}
		});

		Gate::define('restore_jobs', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_jobs') {
					return true;
				}
			}
		});

		Gate::define('restore_job_industries', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_job_industries') {
					return true;
				}
			}
		});

		Gate::define('restore_job_locations', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_job_locations') {
					return true;
				}
			}
		});

		Gate::define('restore_skills', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_skills') {
					return true;
				}
			}
		});

		Gate::define('restore_cities', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_cities') {
					return true;
				}
			}
		});

		Gate::define('restore_counties', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_counties') {
					return true;
				}
			}
		});

		Gate::define('restore_roles', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_roles') {
					return true;
				}
			}
		});

		Gate::define('restore_website_page', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_website_page') {
					return true;
				}
			}
		});

		Gate::define('restore_mobile_page', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_mobile_page') {
					return true;
				}
			}
		});
		
		Gate::define('manage_cms', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_website_page' ||
					 $permissions[$i]->slug == 'view_website_page' ||
					 $permissions[$i]->slug == 'edit_mobile_page' ||
					 $permissions[$i]->slug == 'view_mobile_page'
					) {
					return true;
				}
			}
		});
		
		Gate::define('manage_website_pages', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_website_page' ||
					 $permissions[$i]->slug == 'view_website_page'
					) {
					return true;
				}
			}
		});
		
		Gate::define('manage_website_pages_actions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_website_page' ||
					 $permissions[$i]->slug == 'view_website_page'
					) {
					return true;
				}
			}
		});
		
		Gate::define('edit_website_page', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_website_page') {
					return true;
				}
			}
		});
		
		Gate::define('view_website_page', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_website_page') {
					return true;
				}
			}
		});
		
		Gate::define('manage_mobile_pages', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_mobile_page' ||
					 $permissions[$i]->slug == 'view_mobile_page'
					) {
					return true;
				}
			}
		});
		
		Gate::define('manage_mobile_pages_actions', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_mobile_page' ||
					 $permissions[$i]->slug == 'view_mobile_page'
					) {
					return true;
				}
			}
		});
		
		Gate::define('edit_mobile_page', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'edit_mobile_page') {
					return true;
				}
			}
		});
		
		Gate::define('view_mobile_page', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_mobile_page') {
					return true;
				}
			}
		});
		
		Gate::define('view_feedback', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_feedback') {
					return true;
				}
			}
		});
		
		Gate::define('view_contact_us', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'view_contact_us') {
					return true;
				}
			}
		});

	}
}
