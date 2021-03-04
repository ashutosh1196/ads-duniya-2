<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobIndustry;
use App\Models\JobFunction;
use App\Models\JobLocation;
use App\Models\Skill;
use App\Models\JobSkill;
use App\Models\Organization;
use App\Models\Recruiter;
use App\Models\Country;
use App\Models\JobHistory;
use Auth;

class JobsController extends Controller {
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function addJob() {
		$countries     = Country::all()->toArray();
		$jobIndustries = JobIndustry::all();
		$jobFunctions  = JobFunction::all();
		$jobLocations  = JobLocation::all();
		$JobSkills     = Skill::all();

		$organisationsList = Organization::where('is_whitelisted', 1)->get();
		$recruitersList = [];
		for ($i=0; $i < count($organisationsList); $i++) {
			$recruiter = Recruiter::where('organization_id', $organisationsList[$i]->id)->get();
			if($recruiter->isNotEmpty()) {
				array_push($recruitersList, $recruiter[0]);
			}
		}
		return view('jobs/add_job', [
			'organisationsList' => $organisationsList,
			'recruitersList' => $recruitersList,
			'countries' => $countries,
			'jobIndustries' => $jobIndustries,
			'jobFunctions' => $jobFunctions,
			'jobLocations' => $jobLocations,
			'JobSkills' => $JobSkills
		]);
	}
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function saveJob(Request $request) {
		$validatedData = $request->validate([
			'job_title' => 'required',
			'job_type' => 'required',
			'job_industry_id' => 'required',
			'job_function_id' => 'required',
			'job_location_id' => 'required',
			'organization_id' => 'required',
			'recruiter_id' => 'required',
			'job_description' => 'required',
			'is_featured' => 'required',
			'job_address' => 'required',
			'city' => 'required',
			'state' => 'required',
			'country' => 'required',
			'pincode' => 'required',
		], [
			'job_title.required' => 'The Job Title field is required.',
			'job_type.required' => 'The Job Type field is required.',
			'job_industry_id.required' => 'The Job Industry field is required.',
			'job_function_id.required' => 'The Job Function field is required.',
			'job_location_id.required' => 'The Job Region field is required.',
			'organization_id.required' => 'The Company field is required.',
			'recruiter_id.required' => 'The Recruiter field is required.',
			'job_description.required' => 'The Job Description field is required.',
			'is_featured.required' => 'The Is Featured field is required.',
			'job_address.required' => 'The Job Address field is required.',
			'city.required' => 'The City field is required.',
			'state.required' => 'The State field is required.',
			'country.required' => 'The Country field is required.',
			'pincode.required' => 'The Zip / Postcode field is required.',
		]);
		$job = new Job;
		$jobRefNumber = uniqid();
		$jobSkills = $request->input('job_skills');
		// dd($jobSkills);
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
		$job->job_industry_id = $request->job_industry_id;
		$job->job_function_id = $request->job_function_id;
		$job->job_location_id = $request->job_location_id;
		$job->is_featured = $request->is_featured;
		$job->min_monthly_salary = $request->min_monthly_salary;
		$job->max_monthly_salary = $request->max_monthly_salary;
		$job->min_experience = $request->min_experience;
		$job->max_experience = $request->max_experience;
		$job->status = $request->job_type;
		$job->recruiter_id = $request->recruiter_id;
		$job->organization_id = $request->organization_id;
		$job->created_by = Auth::user()->name;
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
		$jobDetails = Job::find($id);
		$jobIndustry = jobIndustry::find( $jobDetails->job_industry_id);
		$jobFunction = jobFunction::find( $jobDetails->job_function_id);
		$jobLocation = jobLocation::find( $jobDetails->job_location_id);
		$organization = Organization::find( $jobDetails->organization_id);
		$recruiter = Recruiter::find( $jobDetails->recruiter_id);
		return view('jobs/view_job', [
			'jobDetails' => $jobDetails,
			'organizationName' => $organization->name,
			'recruiter' => $recruiter,
			'jobIndustry' => $jobIndustry->name,
			'jobFunction' => $jobFunction->name,
			'jobLocation' => $jobLocation->name,
		]);
	}
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function editJob($id) {
		$jobDetails = Job::find($id);
		$countries     = Country::all()->toArray();
		$jobIndustries = JobIndustry::all();
		$jobFunctions  = JobFunction::all();
		$jobLocations  = JobLocation::all();
		$JobSkills     = \DB::table('job_skill')->get();
		$skills = Skill::all();
		$organisation = Organization::find($jobDetails->organization_id);
		$recruiter = Organization::find($jobDetails->recruiter_id);
		return view('jobs/edit_job', [
			'organisation' => $organisation,
			'recruiter' => $recruiter,
			'countries' => $countries,
			'jobIndustries' => $jobIndustries,
			'jobFunctions' => $jobFunctions,
			'jobLocations' => $jobLocations,
			'JobSkills' => $JobSkills,
			'jobDetails' => $jobDetails,
			'skills' => $skills,
		]);
	}
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function updateJob(Request $request) {
		$job = Job::find($request->id);
		$validatedData = $request->validate([
			'job_title' => 'required',
			'job_description' => 'required',
			'job_type' => 'required',
			'job_address' => 'required',
			'city' => 'required',
			'country' => 'required',
			'pincode' => 'required',
			'job_url' => 'required',
			'job_industry_id' => 'required',
			'job_function_id' => 'required',
			'job_location_id' => 'required',
		], [
			'job_title.required' => 'The Job Title field is required.',
			'job_description.required' => 'The Job Description field is required.',
			'job_type.required' => 'The Job Type field is required.',
			'job_address.required' => 'The Job Address field is required.',
			'city.required' => 'The City field is required.',
			'country.required' => 'The Country field is required.',
			'pincode.required' => 'The Zip / Postcode field is required.',
			'job_url.required' => 'The Job URL field is required.',
			'job_industry_id.required' => 'The Job Industry field is required.',
			'job_function_id.required' => 'The Job Function field is required.',
			'job_location_id.required' => 'The Job Location field is required.',
		]);
		$jobToUpdate = [
			"job_title" => $request->job_title,
			"job_type" => $request->job_type,
			"job_industry_id" => $request->job_industry_id,
			"job_function_id" => $request->job_function_id,
			"package_range_from" => $request->package_range_from,
			"package_range_to" => $request->package_range_to,
			"salary_currency" => $request->salary_currency,
			"experience_range_min" => $request->experience_range_min,
			"experience_range_max" => $request->experience_range_max,
			"job_description" => $request->job_description,
			"job_address" => $request->job_address,
			"city" => $request->city,
			"county" => $request->county,
			"state" => $request->state,
			"country" => $request->country,
			"pincode" => $request->pincode,
			"job_url" => $request->job_url,
			"job_location_id" => $request->job_location_id,
			"salary" => $request->salary,
			"job_type" => $request->job_type,
		];
		if($request->is_complete_update == "on") {
			$job->jobHistories()->create($job->toArray());
		}
		$updateJob = $job->update($jobToUpdate);
		if($updateJob) {
    	$job->skills()->sync($request->skills);
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

	/**
	 * This function is used to Show Jobs History
	*/
	public function jobsHistory(Request $request) {
		$JobHistory = JobHistory::all();
		return view('jobs/jobs_history')->with('JobHistory', $JobHistory);
	}

	/**
	 * This function is used to Show Jobs History
	*/
	public function viewJobHistory($id) {
		$JobHistory = JobHistory::find($id);
		$jobIndustry = jobIndustry::find($JobHistory->job_industry_id);
		$jobFunction = jobFunction::find($JobHistory->job_function_id);
		$jobLocation = jobLocation::find($JobHistory->job_location_id);
		$organization = Organization::find($JobHistory->organization_id);
		$recruiter = Recruiter::find($JobHistory->recruiter_id);
		return view('jobs/view_job_history', [
			'JobHistory' => $JobHistory,
			'organizationName' => $organization->name,
			'recruiter' => $recruiter,
			'jobIndustry' => $jobIndustry->name,
			'jobFunction' => $jobFunction->name,
			'jobLocation' => $jobLocation->name,
		]);
	}
}
