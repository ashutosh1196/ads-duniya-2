<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Organization;
use App\Models\Recruiter;
use App\Models\Country;

class JobsController extends Controller {
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function addJob() {
		$countries = Country::all();
		$organisationsList = Organization::where('is_whitelisted', 1)->get();
		$recruitersList = [];
		for ($i=0; $i < count($organisationsList); $i++) {
			$recruiter = Recruiter::where('organization_id', $organisationsList[$i]->id)->get();
			if($recruiter->isNotEmpty()) {
				array_push($recruitersList, $recruiter[0]);
			}
		}
		return view('jobs/add_job', ['organisationsList' => $organisationsList, 'recruitersList' => $recruitersList, 'countries' => $countries]);
	}
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function saveJob(Request $request) {
		$validatedData = $request->validate([
			'job_title' => 'required',
			'job_description' => 'required',
			'job_type' => 'required',
			'job_address' => 'required',
			'city' => 'required',
			'state' => 'required',
			'country' => 'required',
			'pincode' => 'required',
			'industry' => 'required',
			'recruiter_id' => 'required',
			'organization_id' => 'required',
		], [
			'job_title.required' => 'The Job Title field is required.',
			'job_description.required' => 'The Job Description field is required.',
			'job_type.required' => 'The Job Type field is required.',
			'job_address.required' => 'The Job Address field is required.',
			'city.required' => 'The City field is required.',
			'state.required' => 'The State field is required.',
			'country.required' => 'The Country field is required.',
			'pincode.required' => 'The Zip / Postcode field is required.',
			'industry.required' => 'The Industry field is required.',
			'recruiter_id.required' => 'The Recruiter Name field is required.',
			'organization_id.required' => 'The Company Name field is required.',
		]);
		$job = new Job;
		$jobRefNumber = uniqid();
		$job->job_ref_number = $jobRefNumber;
		$job->job_title = $request->job_title;
		$job->job_description = $request->job_description;
		$job->job_type = $request->job_type;
		$job->job_address = $request->job_address;
		$job->city = $request->city;
		$job->county = $request->county;
		$job->state = $request->state;
		$job->country = $request->country;
		$job->pincode = $request->pincode;
		$job->latitude = $request->latitude;
		$job->longitude = $request->longitude;
		$job->industry = $request->industry;
		$job->salary = $request->salary;
		$job->status = $request->job_type;
		$job->recruiter_id = $request->recruiter_id;
		$job->organization_id = $request->organization_id;
		$job->created_by = $request->created_by;
		if($job->save()) {
			$jobsList = Job::all();
			return redirect()->route('jobs_list', ['jobsList' => $jobsList])->with('success', 'Job Added Successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function jobsList(Request $request) {
		$jobsList = Job::all();
		return view('jobs/jobs_list')->with('jobsList', $jobsList);
	}
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function viewJob($id) {
		$jobDetails = Job::where('id',$id)->get();
		$organization = Organization::where('id', $jobDetails[0]->organization_id)->get();
		$recruiter = Recruiter::where('id', $jobDetails[0]->recruiter_id)->get();
		return view('jobs/view_job', [
			'jobDetails' => $jobDetails,
			'organizationName' => $organization[0]->name,
			'recruiterName' => $recruiter[0]->name
		]);
	}
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function editJob($id) {
		$countries = Country::all();
		$jobDetails = Job::where('id', $id)->get();
		$organisationsList = Organization::where('is_whitelisted', 1)->get();
		$recruitersList = [];
		for ($i=0; $i < count($organisationsList); $i++) {
			$recruiter = Recruiter::where('organization_id', $organisationsList[$i]->id)->get();
			if($recruiter->isNotEmpty()) {
				array_push($recruitersList, $recruiter[0]);
			}
		}
		return view('jobs/edit_job', [
			'jobDetails' => $jobDetails,
			'recruitersList' => $recruitersList,
			'organisationsList' => $organisationsList,
			'countries' => $countries
		]);
	}
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function updateJob(Request $request) {
		$validatedData = $request->validate([
			'job_title' => 'required',
			'job_description' => 'required',
			'job_type' => 'required',
			'job_address' => 'required',
			'city' => 'required',
			'state' => 'required',
			'country' => 'required',
			'pincode' => 'required',
			'industry' => 'required',
			'recruiter_id' => 'required',
			'organization_id' => 'required',
		], [
			'job_title.required' => 'The Job Title field is required.',
			'job_description.required' => 'The Job Description field is required.',
			'job_type.required' => 'The Job Type field is required.',
			'job_address.required' => 'The Job Address field is required.',
			'city.required' => 'The City field is required.',
			'state.required' => 'The State field is required.',
			'country.required' => 'The Country field is required.',
			'pincode.required' => 'The Zip / Postcode field is required.',
			'industry.required' => 'The Industry field is required.',
			'recruiter_id.required' => 'The Recruiter Name field is required.',
			'organization_id.required' => 'The Company Name field is required.',
		]);
		$jobId = $request->id;
		$jobToUpdate = [
			"job_title" => $request->job_title,
			"job_description" => $request->job_description,
			"job_type" => $request->job_type,
			"job_address" => $request->job_address,
			"city" => $request->city,
			"county" => $request->county,
			"state" => $request->state,
			"country" => $request->country,
			"pincode" => $request->pincode,
			"latitude" => $request->latitude,
			"longitude" => $request->longitude,
			"industry" => $request->industry,
			"salary" => $request->salary,
			"status" => $request->job_type,
			"recruiter_id" => $request->recruiter_id,
			"organization_id" => $request->organization_id,
			"created_by" => $request->created_by
		];
		$updateJob = Job::where('id', $jobId)->update($jobToUpdate);
		if($updateJob) {
			$jobsList = Job::all();
			return redirect()->route('jobs_list', ['jobsList' => $jobsList])->with('success', 'Job Updated Successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to Delete a Job By ID
	*/
	public function deleteJob(Request $request) {
		$jobId = $request->id;
		$deleteJob = Job::where('id', $jobId)->delete();
		$jobsList = Job::all();
		if($deleteJob) {
			$res['success'] = 1;
			$res['data'] = $jobsList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function deletedJobs(Request $request) {
		$deletedJobs = Job::onlyTrashed()->get();
		return view('jobs/deleted_jobs')->with('deletedJobs', $deletedJobs);
	}

	/**
	 * This function is used to Delete a Job By ID
	*/
	public function restoreJob(Request $request) {
		$jobId = $request->id;
		$job = Job::where('id', $jobId);
		$restoreJob = $job->restore();
		if($restoreJob) {
			$jobsList = Job::all();
			$res['success'] = 1;
			$res['data'] = $jobsList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function bookmarkedJobs(Request $request) {
		$bookmarkedJobs = Job::all();
		return view('jobs/bookmarked_jobs')->with('bookmarkedJobs', $bookmarkedJobs);
	}
}
