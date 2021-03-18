<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSocialLogin;
use Illuminate\Support\Facades\Gate;
use Hash;
use Auth;

class JobSeekersController extends Controller {
	
	/**
	 * This function is used to Add Job Seeker
	*/
	public function addJobseeker() {
		if(Auth::user()->can('add_jobseeker')) {
			return view('jobseekers/add_jobseeker');
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Add Job Seeker
	*/
	public function saveJobseeker(Request $request) {
		$validatedData = $request->validate([
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:8',
			'confirm_password' => 'required|min:8',
		], [
			'first_name.required' => 'First Name is required',
			'last_name.required' => 'Last Name is required',
			'email.required' => 'Email is required',
			'email.email' => 'Email is not valid',
			'email.unique' => 'This Email is already taken',
			'password.required' => 'Password is required',
			'confirm_password.required' => 'Confirm Password is required'
		]);
		$jobseeker = new User;
		$jobseeker->name = $request->first_name.$request->last_name;
		$jobseeker->first_name = $request->first_name;
		$jobseeker->last_name = $request->last_name;
		$jobseeker->email = $request->email;
		$jobseeker->phone_number = $request->phone_number;
		$jobseeker->password = Hash::make($request->password);
		$jobseeker->ip_address = $_SERVER["REMOTE_ADDR"];
		$jobseeker->signup_via = 'web';
		if($jobseeker->save()) {
			$jobseekersList = User::all();
			return redirect()->route('jobseekers_list', ['jobseekersList' => $jobseekersList])->with('success', 'Jobseeker Added Successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function jobseekersList(Request $request) {
		if(Auth::user()->can('manage_jobseekers')) {
			$jobseekersList = User::orderByDesc('id')->get();
			return view('jobseekers/jobseekers_list')->with('jobseekersList', $jobseekersList);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function viewJobseeker($id) {
		if(Auth::user()->can('view_jobseeker')) {
			$jobseeker = User::where('id', $id)->get();
			$deletedJobseekers = User::onlyTrashed()->get();
			if($jobseeker->isNotEmpty()) {
				return view('jobseekers/view_jobseeker')->with('jobseeker', $jobseeker);
			}
			else {
				return view('jobseekers/view_jobseeker')->with('jobseeker', $deletedJobseekers);
			}
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function editJobseeker($id) {
		if(Auth::user()->can('edit_jobseeker')) {
			$jobseeker = User::where('id', $id)->get();
			return view('jobseekers/edit_jobseeker')->with("jobseeker", $jobseeker);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function updateJobseeker(Request $request) {
		$validatedData = $request->validate([
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'is_job_alert_enabled' => 'required',
		], [
			'first_name.required' => 'First Name is required',
			'last_name.required' => 'Last Name is required',
			'email.required' => 'Email is required',
			'email.email' => 'Email is not valid',
			'is_job_alert_enabled.required' => 'Job Alert Status is required',
		]);
		$dataToUpdate = [
			'name' => $request->first_name.$request->last_name,
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			// 'email' => $request->email,
			'phone_number' => $request->phone_number,
			'is_job_alert_enabled' => $request->is_job_alert_enabled,
		];
		$updateUser = User::where('id', $request->id)->update($dataToUpdate);
		if($updateUser) {
			$jobseekersList = User::all();
			return redirect()->route('jobseekers_list', ['jobseekersList' => $jobseekersList])->with('success', 'Jobseeker Updated Successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function deleteJobseeker(Request $request) {
		$userId = $request->id;
		$userSocialLogin = UserSocialLogin::where('user_id', $userId)->delete();
		// $deleteLoginLogs = DB::table('login_logs')::where('user_id', $userId)->delete();
		// $deleteForgotPassword = DB::table('forgot_password')::where('user_id', $userId)->delete();
		// $deleteJobsBookmark = DB::table('jobs_bookmarks')::where('user_id', $userId)->delete();
		// $deleteJobsSearchListory = DB::table('jobs_search_history')::where('user_id', $userId)->delete();
		// $deleteJobsApplications = DB::table('jobs_applications')::where('user_id', $userId)->delete();
		// $deleteJobsReport = DB::table('jobs_report')::where('user_id', $userId)->delete();
		// $deleteJobsApplied = DB::table('jobs_applied')::where('user_id', $userId)->delete();
		// if($userSocialLogin) {
			// $deleteJobseeker = User::where('id', $userId)->delete();
			$deleteJobseeker = User::where('id', $userId)->delete();
			$jobseekersList = User::all();
			if($deleteJobseeker) {
	
				$res['success'] = 1;
				$res['data'] = $jobseekersList;
				return json_encode($res);
			}
			else {
				$res['success'] = 0;
				return json_encode($res);
			}
		/* }
		else {
			$res['success'] = 0;
			return json_encode($res);
		} */
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function deletedJobseekersList() {
		if(Auth::user()->can('restore_jobseekers')) {
			$deletedJobseekers = User::onlyTrashed()->orderByDesc('id')->get();
			return view('jobseekers/deleted_jobseekers_list', ['deletedJobseekers' => $deletedJobseekers]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function restoreJobseeker(Request $request) {
		$jobseekerId = $request->id;
		$jobseeker = User::where('id', $jobseekerId);
		$restoreJobseeker = $jobseeker->restore();
		if($restoreJobseeker) {
			$jobseekersList = User::all();
			$res['success'] = 1;
			$res['data'] = $jobseekersList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

}
