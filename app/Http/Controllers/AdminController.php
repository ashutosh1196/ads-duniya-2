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
		$jobseekers = User::all();
		$jobseekersCount = count($jobseekers);
		$customers = Organization::where('is_whitelisted', 1)->get();
		$recruitersList = [];
		if($customers->isNotEmpty()) {
			for ($i=0; $i < count($customers); $i++) {
				$recruiter = Recruiter::where('organization_id', $customers[$i]->id)->get();
				if($recruiter->isNotEmpty()) {
					array_push($recruitersList, $recruiter[0]);
				}
			}
		}
		$recruitersCount = count($recruitersList);
		$customers = Organization::where('is_whitelisted', 1)->get();
		$customersCount = count($customers);
		$admins = Admin::where('role_id', '!=', 1)->get();
		$adminsCount = count($admins);
		// $jobs = Job::all();
		// $jobsCount = count($jobs);
		return view('dashboard', [
			'jobseekersCount' => $jobseekersCount,
			'recruitersCount' => $recruitersCount,
			'customersCount' => $customersCount,
			'adminsCount' => $adminsCount,
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
