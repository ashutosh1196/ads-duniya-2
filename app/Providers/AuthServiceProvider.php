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

		Gate::define('pending_customer_all', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'add_customer' || 
					$permissions[$i]->slug == 'edit_pending_customer' || 
					$permissions[$i]->slug == 'delete_pending_customer' || 
					$permissions[$i]->slug == 'view_pending_customer'
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

		Gate::define('restore_counties', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]->slug == 'restore_counties') {
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
	}
}
