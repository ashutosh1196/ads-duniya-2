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
use App\Models\BookmarkedJob;
use App\Models\User;
use App\Models\JobApplication;
use App\Models\JobSearchHistory;
use App\Models\JobReport;
use Auth;
use DB;

class JobsController extends Controller {
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function addJob() {
		if(Auth::user()->can('add_job')) {
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
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function saveJob(Request $request) {
		$validatedData = $request->validate([
			'job_title' => 'required',
			'job_type' => 'required',
			'job_industry_id' => 'required',
			'job_function' => 'required',
			'job_location_id' => 'required',
			'organization_id' => 'required',
			'recruiter_id' => 'required',
			'job_description' => 'required',
			// 'is_featured' => 'required',
			// 'job_address' => 'required',
			// 'city' => 'required',
			// 'state' => 'required',
			'country' => 'required',
			// 'pincode' => 'required',
		], [
			'job_title.required' => 'The Job Title field is required.',
			'job_type.required' => 'The Job Type field is required.',
			'job_industry_id.required' => 'The Job Industry field is required.',
			'job_function.required' => 'The Job Function field is required.',
			'job_location_id.required' => 'The Job Region field is required.',
			'organization_id.required' => 'The Company field is required.',
			'recruiter_id.required' => 'The Recruiter field is required.',
			'job_description.required' => 'The Job Description field is required.',
			// 'is_featured.required' => 'The Is Featured field is required.',
			// 'job_address.required' => 'The Job Address field is required.',
			// 'city.required' => 'The City field is required.',
			// 'state.required' => 'The State field is required.',
			'country.required' => 'The Country field is required.',
			// 'pincode.required' => 'The Zip / Postcode field is required.',
		]);
		$job = new Job;
		$jobRefNumber = uniqid();
		$jobSkills = $request->input('job_skills');
		// dd($jobSkills);
		$job->job_ref_number = $jobRefNumber;
		$job->job_title = $request->job_title;
		$job->job_description = $request->job_description;
		$job->job_type = $request->job_type;
		// $job->job_address = $request->job_address;
		$job->city = $request->city;
		$job->county = $request->county;
		$job->state = $request->state;
		$job->country = $request->country;
		// $job->pincode = $request->pincode;
		$job->job_industry_id = $request->job_industry_id;
		$job->job_function = $request->job_function;
		$job->job_location_id = $request->job_location_id;
		// $job->is_featured = $request->is_featured == 'on' ? 1 : 0;
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
		if(Auth::user()->can('manage_job')) {
			$jobsList = Job::orderByDesc('id')->get();
			return view('jobs/jobs_list')->with('jobsList', $jobsList);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function viewJob($id) {
		if(Auth::user()->can('view_job')) {
			$jobDetails = Job::find($id);
			$jobApplications = DB::table('job_applications')->where('job_id', $id)->get();
			$applicantIds = [];
			for ($i=0; $i < count($jobApplications); $i++) { 
				$jobApplication = $jobApplications[$i];
				if(!in_array($jobApplication->applicant_id, $applicantIds, true)) {
					array_push($applicantIds, $jobApplication->applicant_id);
				}
			}
			$applicants = User::whereIn('id', $applicantIds)->get();
			$jobIndustry = JobIndustry::find($jobDetails->job_industry_id);
			$jobLocation = JobLocation::find($jobDetails->job_location_id);
			$organization = Organization::find($jobDetails->organization_id);
			$recruiter = Recruiter::find( $jobDetails->recruiter_id);
			return view('jobs/view_job', [
				'jobDetails' => $jobDetails,
				'organizationName' => $organization->name,
				'recruiter' => $recruiter,
				'jobIndustry' => $jobIndustry->name,
				'jobLocation' => $jobLocation->name,
				'applicants' => $applicants,
			]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function editJob($id) {
		if(Auth::user()->can('edit_job')) {
			$jobDetails = Job::find($id);
			$countries     = Country::all()->toArray();
			$counties     = DB::table('counties')->get();
			$cities     = DB::table('cities')->get();
			$jobIndustries = JobIndustry::all();
			$jobFunctions  = JobFunction::all();
			$jobLocations  = JobLocation::all();
			$skills = Skill::all();
			$employmentDropdowns = DB::table('dropdowns')->where('name', 'employment_eligibility')->get();
			$currencies = DB::table('dropdowns')->where('name', 'currency')->get();
			$jobTypes = DB::table('dropdowns')->where('name', 'job_type')->get();
			$organisation = Organization::find($jobDetails->organization_id);
			return view('jobs/edit_job', [
				'jobDetails'		=> $jobDetails,
				'countries'			=> $countries,
				'counties'			=> $counties,
				'cities'				=> $cities,
				'jobIndustries' => $jobIndustries,
				'jobFunctions'	=> $jobFunctions,
				'jobLocations'	=> $jobLocations,
				'skills'				=> $skills,
				'organisation'	=> $organisation,
				'employmentDropdowns'	=> $employmentDropdowns,
				'currencies'	=> $currencies,
				'jobTypes'	=> $jobTypes,
			]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
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
			'city' => 'required_without_all:county',
			'county' => 'required_without_all:city',
			'country' => 'required',
			// 'job_url' => 'required',
			'job_industry_id' => 'required',
			// 'job_function' => 'required',
			'job_location_id' => 'required',
			'salary_currency' => 'required',
		], [
			'job_title.required' => 'The Job Title field is required.',
			'job_description.required' => 'The Job Description field is required.',
			'job_type.required' => 'The Job Type field is required.',
			'city.required_without_all' => 'The City / Town field is required when County is not present.',
			'county.required_without_all' => 'The County field is required when City / Town is not present.',
			'country.required' => 'The Country field is required.',
			// 'job_url.required' => 'The Job URL field is required.',
			'job_industry_id.required' => 'The Job Industry field is required.',
			// 'job_function.required' => 'The Job Function field is required.',
			'job_location_id.required' => 'The Job Location field is required.',
			'salary_currency' => 'Currency is required',
		]);
		if($job->is_featured == 1) {
			$job_url = $request->job_url ? $request->job_url : $request->company_url;
			$fileName = $request->logo_image ? $request->logo_image : $job->company_logo;
			/* if($request->logo_image != null) {
				$logo_image = $request->logo_image;
				$folderPath = $_SERVER['DOCUMENT_ROOT'].'/which-vocation/website/Amrik-which-vocation-web/public/images/companyLogos/';
				$imageParts = explode(";base64,", $logo_image);
				$imageTypeAux = explode("image/", $imageParts[0]);
				$imageType = $imageTypeAux[1];
				$imageBase64 = base64_decode($imageParts[1]);
				$fileName = uniqid().'.'.$imageType;
				$file = $folderPath.$fileName;
				file_put_contents($file, $imageBase64);
			}
			else {
				$fileName = "";
			} */
		}
		else {
			$job_url = $request->company_url;
			$fileName = $job->company_logo;
			// $folderPath = $_SERVER['DOCUMENT_ROOT'].'/which-vocation/website/Amrik-which-vocation-web/public/images/companyLogos/';
			// $logoImage = $folderPath.$request->logo_image;
			// if(file_exists($logoImage)) {
			// 	unlink( $logoImage );
			// }
			// $fileName = "";
		}
		$jobToUpdate = [
			"job_title" => $request->job_title,
			"job_type" => $request->job_type,
			"job_industry_id" => $request->job_industry_id,
			"job_function" => $request->job_function,
			"job_location_id" => $request->job_location_id,
			"package_range_from" => $request->package_range_from,
			"package_range_to" => $request->package_range_to,
			"salary_currency" => $request->salary_currency,
			"experience_range_min" => $request->experience_range_min,
			"job_description" => $request->job_description,
			"city" => $request->city,
			"county" => $request->county,
			"state" => $request->state,
			"country" => $request->country,
			"job_url" => $job_url,
			"company_logo" => $fileName,
			"job_type" => $request->job_type,
		];
		$updateJob = $job->update($jobToUpdate);
		if($updateJob) {
			if($request->is_complete_update == "on") {
				$job->jobHistories()->create($job->toArray());
			}
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
		if(Auth::user()->can('restore_jobs')) {
			$deletedJobs = Job::onlyTrashed()->orderByDesc('id')->get();
			return view('jobs/deleted_jobs')->with('deletedJobs', $deletedJobs);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
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
	 * This function is used to Show Jobs History
	*/
	public function jobsHistory(Request $request) {
		if(Auth::user()->can('view_job_history')) {
			$jobHistory = JobHistory::all();
			return view('jobs/jobs_history')->with('jobHistory', $jobHistory);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Jobs History
	*/
	public function viewJobHistory($id) {
		if(Auth::user()->can('view_job_history')) {
			$jobHistory = JobHistory::find($id);
			$jobIndustry = JobIndustry::find($jobHistory->job_industry_id);
			$jobLocation = JobLocation::find($jobHistory->job_location_id);
			$organization = Organization::find($jobHistory->organization_id);
			$recruiter = Recruiter::find($jobHistory->recruiter_id);
			return view('jobs/view_job_history', [
				'jobHistory' => $jobHistory,
				'organizationName' => $organization->name,
				'recruiter' => $recruiter,
				'jobIndustry' => $jobIndustry->name,
				'jobLocation' => $jobLocation->name,
			]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	public function uploadImage(Request $request) {
		$jobId = $request->jobId;
		$logo_image = $request->logo_image;
		$folderPath = $_SERVER['DOCUMENT_ROOT'].config('adminlte.logo_path');
		// $folderPath = public_path("images/companyLogos");
		// $fileURL = asset("images/companyLogos");
		$imageParts = explode(";base64,", $logo_image);
		$imageTypeAux = explode("image/", $imageParts[0]);
		$imageType = $imageTypeAux[1];
		$imageBase64 = base64_decode($imageParts[1]);
		$fileName = uniqid().'.'.$imageType;
		$file = $folderPath.$fileName;
		file_put_contents($file, $imageBase64);
		$updateImage = Job::where('id', $jobId)->update(['company_logo' => $fileName]);
		if($updateImage) {
			$res['success'] = 1;
			$res['image'] = $fileName;
			$response = [
				'success' => 1,
				'image' => $fileName,
			];
			return json_encode($response);
		}
		else {
			$res['success'] = 0;
			$res['image'] = "";
			$response = $res;
			return json_encode($response);
		}
	}

	/**
	 * This function is used to Show Bookmarked Jobs Listing
	*/
	public function bookmarkedJobs(Request $request) {
		if(Auth::user()->can('view_job_bookmarks')) {
			$bookmarkedJobs = BookmarkedJob::all();
			return view('jobs/bookmarked/bookmarked_jobs')->with('bookmarkedJobs', $bookmarkedJobs);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to View Bookmarked Job
	*/
	public function viewBookmarkedJob($id) {
		if(Auth::user()->can('view_job_bookmarks')) {
			$bookmark = BookmarkedJob::find($id);
			$bookmarkedJob = Job::find($bookmark->job_id);
			$user = User::find($bookmark->user_id);
			return view('jobs/bookmarked/view_bookmarked_job', [
				'bookmark' => $bookmark,
				'bookmarkedJob' => $bookmarkedJob,
				'userName' =>  $user->first_name ? $user->first_name.' '.$user->last_name : $user->email,
			]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Bookmarked Jobs Listing
	*/
	public function jobApplications(Request $request) {
		if(Auth::user()->can('view_job_applications')) {
			$jobApplications = JobApplication::all();
			return view('jobs/applications/job_applications_list')->with('jobApplications', $jobApplications);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to View Bookmarked Job
	*/
	public function viewJobApplication($id) {
		if(Auth::user()->can('view_job_applications')) {
			$jobApplication = JobApplication::find($id);
			$appliedJob = Job::find($jobApplication->job_id);
			$user = User::find($jobApplication->applicant_id);
			return view('jobs/applications/view_job_application', [
				'jobApplication' => $jobApplication,
				'appliedJob' => $appliedJob,
				'userName' =>  $user->first_name ? $user->first_name.' '.$user->last_name : $user->email,
			]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Bookmarked Jobs Listing
	*/
	public function jobSearchHistoryList(Request $request) {
		if(Auth::user()->can('view_job_search_history')) {
			$jobSearchHistoryList = JobSearchHistory::all();
			return view('jobs/search_history/job_search_history_list')->with('jobSearchHistoryList', $jobSearchHistoryList);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to View Bookmarked Job
	*/
	public function viewJobSearchHistory($id) {
		if(Auth::user()->can('view_job_search_history')) {
			$jobSearchHistory = JobSearchHistory::find($id);
			$user = User::find($jobSearchHistory->user_id);
			return view('jobs/search_history/view_search_history', [
				'jobSearchHistory' => $jobSearchHistory,
				'userName' =>  $user->first_name ? $user->first_name.' '.$user->last_name : $user->email,
			]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Bookmarked Jobs Listing
	*/
	public function reportedJobsList(Request $request) {
		if(Auth::user()->can('view_reported_job')) {
			$reportedJobs = JobReport::all();
			return view('jobs/reported/reported_jobs_list')->with('reportedJobs', $reportedJobs);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to View Bookmarked Job
	*/
	public function viewReportedJob($id) {
		if(Auth::user()->can('view_reported_job')) {
			$reportedJob = JobReport::find($id);
			$job = Job::find($reportedJob->job_id);
			$user = User::find($reportedJob->user_id);
			return view('jobs/reported/view_reported_job', [
				'reportedJob' => $reportedJob,
				'job' =>  $job,
				'userName' =>  $user->first_name ? $user->first_name.' '.$user->last_name : $user->email,
			]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
}
