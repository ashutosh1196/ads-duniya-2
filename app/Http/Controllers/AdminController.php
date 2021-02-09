<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recruiter;
use App\Models\Admin;
use App\Models\Page;
use App\Models\Role;
use App\Models\Organization;
use App\Models\UserSocialLogin;
use App\Models\Job;
use Auth;

class AdminController extends Controller
{
	/**
	 * This function is used to Show Admin Dashboard
	*/
	public function dashboard(Request $request) {
		$jobseekers = User::where('deleted_at', NULL)->get();
		$jobseekersCount = count($jobseekers);
		$recruiters = Recruiter::where('deleted_at', NULL)->get();
		$recruitersCount = count($recruiters);
		$customers = Organization::where('is_whitelisted', 1)->get();
		$customersCount = count($customers);
		$admins = Admin::where('role_id', '!=', 1)->get();
		$adminsCount = count($admins);
		// $jobs = Job::where('deleted_at', NULL)->get();
		// $jobsCount = count($jobs);
		return view('dashboard', [
			'jobseekersCount' => $jobseekersCount,
			'recruitersCount' => $recruitersCount,
			'customersCount' => $customersCount,
			'admins' => $admins,
		]);
	}

	/**
	 * This function is used to Show Settings/User Profile Page
	*/
	public function settings(Request $request) {
		$userDetails = User::where('id', Auth::id())->get();
		return view('settings')->with('userDetails', $userDetails );
	}
}
