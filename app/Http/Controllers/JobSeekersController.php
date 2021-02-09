<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSocialLogin;
use Illuminate\Support\Facades\Gate;
use Hash;

class JobSeekersController extends Controller {
	
	/**
	 * This function is used to Add Job Seeker
	*/
	public function addJobseeker() {
		return view('add_jobseeker');
	}

	/**
	 * This function is used to Add Job Seeker
	*/
	public function saveJobseeker(Request $request) {
		$jobseeker = new User;
		$jobseeker->first_name = $request->first_name;
		$jobseeker->last_name = $request->last_name;
		$jobseeker->email = $request->email;
		$jobseeker->password = Hash::make($request->password);
		if($jobseeker->save()) {
			$jobseekersList = User::all();
			return view('jobseekers_list', ['jobseekersList' => $jobseekersList])->with('success', 'Jobseeker Added Successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function jobseekersList(Request $request) {
		$jobseekersList = User::all();
		return view('jobseekers_list')->with('jobseekersList', $jobseekersList);
	}

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function viewJobseeker($id) {
		$jobseeker = User::where('id', $id)->get();
		$deletedJobseekers = User::onlyTrashed()->get();
		if($jobseeker->isNotEmpty()) {
			return view('view_jobseeker')->with('jobseeker', $jobseeker);
		}
		else {
			return view('view_jobseeker')->with('jobseeker', $deletedJobseekers);
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function editJobseeker($id) {
		$jobseeker = User::where('id', $id)->get();
		return view('edit_jobseeker')->with("jobseeker", $jobseeker);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function updateJobseeker(Request $request) {
		$dataToUpdate = [
			'name' => $request->name,
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'email' => $request->email,
			'phone_number' => $request->phone_number,
			'is_job_alert_enabled' => $request->job_alert,
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
		$deletedJobseekers = User::onlyTrashed()->get();
		return view('deleted_jobseekers_list', ['deletedJobseekers' => $deletedJobseekers]);
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
