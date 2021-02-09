<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruiter;
use App\Models\Organization;
use App\Models\RecruiterSocialLogin;

class RecruitersController extends Controller {

	/**
	 * This function is used to Show Recruiters Listing
	*/
	public function recruitersList(Request $request) {
		$recruitersList = Recruiter::all();
		return view('recruiters_list')->with('recruitersList', $recruitersList);
	}

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function viewRecruiter($id) {
		$recruiter = Recruiter::where('id', $id)->get();
		$deletedRecruiter = Recruiter::onlyTrashed()->get();
		if($recruiter->isNotEmpty()) {
			$organization = Organization::where('id', $recruiter[0]->organization_id)->get();
			return view('view_recruiter')->with(['recruiter' => $recruiter, 'organization' => $organization]);
		}
		else {
			$organization = Organization::where('id', $deletedRecruiter[0]->organization_id)->get();
			return view('view_recruiter')->with(['recruiter' => $recruiter, 'organization' => $deletedRecruiter]);
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function editRecruiter($id) {
		$recruiter = Recruiter::where('id', $id)->get();
		$organizations = Organization::all();
		return view('edit_recruiter', )->with(["recruiter" => $recruiter, "organizations" => $organizations]);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function updateRecruiter(Request $request) {
		$validatedData = $request->validate([
			'email' => 'required|email',
			'organization_id' => 'required',
		], [
			'email.required' => 'Email is required.',
			'email.email' => 'Email is not Valid.',
			'organization_id' => 'Organization is required.',
		]);
		$dataToUpdate = [
			'name' => $request->first_name.$request->last_name,
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'email' => $request->email,
			'phone_number' => $request->phone_number,
			'organization_id' => $request->organization_id,
		];
		$updateUser = Recruiter::where('id', $request->id)->update($dataToUpdate);
		if($updateUser) {
			$recruitersList = Recruiter::all();
			return redirect()->route('recruiters_list', ['recruitersList' => $recruitersList])->with('success', 'Recruiter Updated Successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function deleteRecruiter(Request $request) {
		$recruiterId = $request->id;
		$recruiterSocialLogin = RecruiterSocialLogin::where('recruiter_id', $recruiterId)->delete();
		// if($recruiterSocialLogin) {
			$deleteRecruiter = Recruiter::where('id', $recruiterId)->delete();
			$recruitersList = Recruiter::all();
			if($deleteRecruiter) {
				$res['success'] = 1;
				$res['data'] = $recruitersList;
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
	public function deletedRecruitersList() {
		$deletedRecruiters = Recruiter::onlyTrashed()->get();
		return view('deleted_recruiters_list', ['deletedRecruiters' => $deletedRecruiters]);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function restoreRecruiter(Request $request) {
		$recruiterId = $request->id;
		$recruiter = Recruiter::where('id', $recruiterId);
		$restoreRecruiter = $recruiter->restore();
		if($restoreRecruiter) {
			$recruitersList = Recruiter::all();
			$res['success'] = 1;
			$res['data'] = $recruitersList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}
}
