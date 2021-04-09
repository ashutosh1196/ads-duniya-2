<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobIndustry;
use App\Models\JobQualification;
use App\Models\JobFunction;
use App\Models\JobLocation;
use App\Models\Skill;
use App\Models\City;
use App\Models\County;
use App\Models\Country;
use DB;
use Auth;

class MiscController extends Controller {
	
	/**
	 * This function is used to Check if Job Industry / Function / Skill Exists
	*/
	public function checkIfExists() {
		$tableName = $_GET['table_name'];
		$slugTrimmed = str_replace(' ', '_', $_GET['name']);
		$jobSlug = strtolower($slugTrimmed);
		if(isset($_GET['id'])) {
			$nameExists = DB::table($tableName)->where('slug', $jobSlug)->where('id', '!=', $_GET['id'])->get();
			if ($nameExists->isNotEmpty()) {
				return true;
			}
			else {
				return false;
			}
			exit;
		}
		else {
			$nameExists = DB::table($tableName)->where('slug', $jobSlug)->get();
			if ($nameExists->isNotEmpty()) {
				return true;
			}
			else {
				return false;
			}
			exit;
		}
	}
	
	/**
	 * This function is used to Get Job Industry Details
	*/
	public function viewJobIndustry($id) {
		if(Auth::user()->can('view_job_industry')) {
			$jobIndustry = JobIndustry::where('id', $id)->get();
			return view('misc/job_industries/view_job_industry', [ 'jobIndustry' => $jobIndustry ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Get Job Industries List
	*/
	public function jobIndustriesList() {
		if(Auth::user()->can('manage_job_industry')) {
			$jobIndustriesList = JobIndustry::orderByDesc('id')->get();
			return view('misc/job_industries/job_industries_list', [ 'jobIndustriesList' => $jobIndustriesList ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Get Add Job Industry View
	*/
	public function addJobIndustry() {
		if(Auth::user()->can('add_job_industry')) {
			return view('misc/job_industries/add_job_industry');
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	
	/**
	 * This function is used to Save Job Industry
	*/
	public function saveJobIndustry(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required|unique:job_industries',
		], [
			'name.required' => 'The Job Industry Name is required.',
			'name.unique' => 'The Job Industry Name must be unique.',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$jobSlug = strtolower($slugTrimmed);

		$jobIndustry = new JobIndustry;
		$jobIndustry->name = $request->name;
		$jobIndustry->slug = $jobSlug;
		$jobIndustry->status = $request->status;

		if($jobIndustry->save()) {
			$jobIndustriesList = JobIndustry::all();
			return redirect()->route('job_industries_list', [ 'jobIndustriesList' => $jobIndustriesList ])->with('success', 'Job Industry Added Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}
	
	/**
	 * This function is used to Get Edit Job Industries View
	*/
	public function editJobIndustry($id) {
		if(Auth::user()->can('edit_job_industry')) {
			$jobIndustry = JobIndustry::where('id', $id)->get();
			return view('misc/job_industries/edit_job_industry', [ 'jobIndustry' => $jobIndustry ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	
	/**
	 * This function is used to Update Job Industry
	*/
	public function updateJobIndustry(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required',
		], [
			'name.required' => 'Job Name is required',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$jobSlug = strtolower($slugTrimmed);

		$jobIndustryId = $request->id;
		$jobIndustry = [
			'name' => $request->name,
			'slug' => $jobSlug,
			'status' => $request->status,
		];
		$jobIndustryUpdate = JobIndustry::where('id', $jobIndustryId)->update($jobIndustry);
		if($jobIndustryUpdate) {
			$jobIndustriesList = JobIndustry::all();
			return redirect()->route('job_industries_list', [ 'jobIndustriesList' => $jobIndustriesList ])->with('success', 'Job Industry Updated Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to delete Job Industry
	*/
	public function deleteJobIndustry(Request $request) {
		$industryId = $request->id;
		$deleteJobIndustry = JobIndustry::where('id', $industryId)->delete();
		if($deleteJobIndustry) {
			$jobIndustriesList = JobIndustry::all();
			$res['success'] = 1;
			$res['data'] = $jobIndustriesList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	/**
	 * This function is used to Show Deleted Job Industries Listing
	*/
	public function deletedJobIndustries() {
		if(Auth::user()->can('restore_job_industries')) {
			$deletedJobIndustries = JobIndustry::onlyTrashed()->orderByDesc('id')->get();
			return view('misc/job_industries/deleted_job_industries_list', ['deletedJobIndustries' => $deletedJobIndustries]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Restore Job Industry
	*/
	public function restoreJobIndustry(Request $request) {
		$industryId = $request->id;
		$jobIndustry = JobIndustry::where('id', $industryId);
		$restoreJobIndustry = $jobIndustry->restore();
		if($restoreJobIndustry) {
			$jobIndustriesList = JobIndustry::all();
			$res['success'] = 1;
			$res['data'] = $jobIndustriesList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}
	
	/**
	 * This function is used to Get Job Function Details
	*/
	public function viewJobFunction($id) {
		if(Auth::user()->can('view_job_function')) {
			$jobFunction = JobFunction::where('id', $id)->get();
			return view('misc/job_functions/view_job_function', [ 'jobFunction' => $jobFunction ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Get Job Functions List
	*/
	public function jobFunctionsList() {
		if(Auth::user()->can('manage_job_function')) {
			$jobFunctionsList = JobFunction::orderByDesc('id')->get();
			return view('misc/job_functions/job_functions_list', [ 'jobFunctionsList' => $jobFunctionsList ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Get Add Job Industry View
	*/
	public function addJobFunction() {
		if(Auth::user()->can('add_job_function')) {
			return view('misc/job_functions/add_job_function');
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	
	/**
	 * This function is used to Save Job Function
	*/
	public function saveJobFunction(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required|unique:job_functions',
		], [
			'name.required' => 'The Job Function Name is required.',
			'name.unique' => 'The Job Function Name must be unique.',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$jobFunctionSlug = strtolower($slugTrimmed);

		$jobFunction = new JobFunction;
		$jobFunction->name = $request->name;
		$jobFunction->slug = $jobFunctionSlug;
		$jobFunction->status = $request->status;

		if($jobFunction->save()) {
			$jobFunctionsList = JobFunction::all();
			return redirect()->route('job_functions_list', [ 'jobFunctionsList' => $jobFunctionsList ])->with('success', 'Job Function Added Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}
	
	/**
	 * This function is used to Get Edit Job Functions View
	*/
	public function editJobFunction($id) {
		if(Auth::user()->can('edit_job_function')) {
			$jobFunction = JobFunction::where('id', $id)->get();
			return view('misc/job_functions/edit_job_function', [ 'jobFunction' => $jobFunction ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	
	/**
	 * This function is used to Update Job Function
	*/
	public function updateJobFunction(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required',
		], [
			'name.required' => 'Job Name is required',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$jobSlug = strtolower($slugTrimmed);

		$jobFunctionId = $request->id;
		$jobFunction = [
			'name' => $request->name,
			'slug' => $jobSlug,
			'status' => $request->status,
		];
		$jobFunctionUpdate = JobFunction::where('id', $jobFunctionId)->update($jobFunction);
		if($jobFunctionUpdate) {
			$jobFunctionsList = JobFunction::all();
			return redirect()->route('job_functions_list', [ 'jobFunctionsList' => $jobFunctionsList ])->with('success', 'Job Function Updated Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to delete Job Function
	*/
	public function deleteJobFunction(Request $request) {
		$functionId = $request->id;
		$deleteJobFunction = JobFunction::where('id', $functionId)->delete();
		if($deleteJobFunction) {
      $jobFunctionsList = JobFunction::all();
			$res['success'] = 1;
			$res['data'] = $jobFunctionsList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	/**
	 * This function is used to Show Deleted Job Functions Listing
	*/
	public function deletedJobFunctions() {
		if(Auth::user()->can('restore_job_functions')) {
			$deletedJobFunctions = JobFunction::onlyTrashed()->orderByDesc('id')->get();
			return view('misc/job_functions/deleted_job_functions_list', ['deletedJobFunctions' => $deletedJobFunctions]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Restore Job Function
	*/
	public function restoreJobFunction(Request $request) {
		$functionId = $request->id;
		$jobFunction = JobFunction::where('id', $functionId);
		$restoreJobFunction = $jobFunction->restore();
		if($restoreJobFunction) {
			$jobFunctionsList = JobFunction::all();
			$res['success'] = 1;
			$res['data'] = $jobFunctionsList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}
	
	/**
	 * This function is used to Get Job Function Details
	*/
	public function viewSkill($id) {
		if(Auth::user()->can('view_skill')) {
			$skill = Skill::where('id', $id)->get();
			return view('misc/skills/view_skill', [ 'skill' => $skill ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	
	/**
	 * This function is used to Get Skills List
	*/
	public function skillsList() {
		if(Auth::user()->can('manage_skills')) {
			$skillsList = Skill::orderByDesc('id')->get();
			return view('misc/skills/skills_list', [ 'skillsList' => $skillsList ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Get Add Job Industry View
	*/
	public function addSkill() {
		if(Auth::user()->can('add_skill')) {
			return view('misc/skills/add_skill');
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	
	/**
	 * This function is used to Save Job Function
	*/
	public function saveSkill(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required|unique:skills',
		], [
			'name.required' => 'The Skill Name is required.',
			'name.unique' => 'The Skill Name must be unique.',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$slillSlug = strtolower($slugTrimmed);

		$skill = new Skill;
		$skill->name = $request->name;
		$skill->slug = $slillSlug;
		$skill->status = $request->status;

		if($skill->save()) {
			$skillsList = Skill::all();
			return redirect()->route('skills_list', [ 'skillsList' => $skillsList ])->with('success', 'Skill Added Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}
	
	/**
	 * This function is used to Get Edit Job Functions View
	*/
	public function editSkill($id) {
		if(Auth::user()->can('edit_skill')) {
			$skill = Skill::where('id', $id)->get();
			return view('misc/skills/edit_skill', [ 'skill' => $skill ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	
	/**
	 * This function is used to Update Skill
	*/
	public function updateSkill(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required',
		], [
			'name.required' => 'Skill Name is required',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$skillSlug = strtolower($slugTrimmed);

		$skillId = $request->id;
		$skill = [
			'name' => $request->name,
			'slug' => $skillSlug,
			'status' => $request->status,
		];
		$skillUpdate = Skill::where('id', $skillId)->update($skill);
		if($skillUpdate) {
			$skillsList = Skill::all();
			return redirect()->route('skills_list', [ 'skillsList' => $skillsList ])->with('success', 'Skill Updated Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to delete Skill
	*/
	public function deleteSkill(Request $request) {
		$skillId = $request->id;
		$deleteSkill = Skill::where('id', $skillId)->delete();
		if($deleteSkill) {
      $skillsList = Skill::all();
			$res['success'] = 1;
			$res['data'] = $skillsList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	/**
	 * This function is used to Show Deleted Skills Listing
	*/
	public function deletedSkills() {
		if(Auth::user()->can('restore_skills')) {
			$deletedSkills = Skill::onlyTrashed()->orderByDesc('id')->get();
			return view('misc/skills/deleted_skills_list', ['deletedSkills' => $deletedSkills]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Restore Skill
	*/
	public function restoreSkill(Request $request) {
		$skillId = $request->id;
		$skill = Skill::where('id', $skillId);
		$restoreSkill = $skill->restore();
		if($restoreSkill) {
			$skillsList = Skill::all();
			$res['success'] = 1;
			$res['data'] = $skillsList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}
	
	/**
	 * This function is used to Get Job Function Details
	*/
	public function viewJobLocation($id) {
		if(Auth::user()->can('view_job_location')) {
			$jobLocation = JobLocation::where('id', $id)->get();
			return view('misc/job_locations/view_job_location', [ 'jobLocation' => $jobLocation ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	
	/**
	 * This function is used to Get JobLocations List
	*/
	public function jobLocationsList() {
		if(Auth::user()->can('manage_job_location')) {
			$jobLocationsList = JobLocation::orderByDesc('id')->get();
			return view('misc/job_locations/job_locations_list', [ 'jobLocationsList' => $jobLocationsList ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Get Add Job Industry View
	*/
	public function addJobLocation() {
		if(Auth::user()->can('add_job_location')) {
			return view('misc/job_locations/add_job_location');
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	
	/**
	 * This function is used to Save Job Function
	*/
	public function saveJobLocation(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required|unique:job_locations',
		], [
			'name.required' => 'The JobLocation Name is required.',
			'name.unique' => 'The JobLocation Name must be unique.',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$slillSlug = strtolower($slugTrimmed);

		$jobLocation = new JobLocation;
		$jobLocation->name = $request->name;
		$jobLocation->slug = $slillSlug;
		$jobLocation->status = $request->status;

		if($jobLocation->save()) {
			$jobLocationsList = JobLocation::all();
			return redirect()->route('job_locations_list', [ 'jobLocationsList' => $jobLocationsList ])->with('success', 'Job Location Added Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}
	
	/**
	 * This function is used to Get Edit Job Functions View
	*/
	public function editJobLocation($id) {
		if(Auth::user()->can('edit_job_location')) {
			$jobLocation = JobLocation::where('id', $id)->get();
			return view('misc/job_locations/edit_job_location', [ 'jobLocation' => $jobLocation ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	
	/**
	 * This function is used to Update JobLocation
	*/
	public function updateJobLocation(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required',
		], [
			'name.required' => 'JobLocation Name is required',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$jobLocationSlug = strtolower($slugTrimmed);

		$jobLocationId = $request->id;
		$jobLocation = [
			'name' => $request->name,
			'slug' => $jobLocationSlug,
			'status' => $request->status,
		];
		$jobLocationUpdate = JobLocation::where('id', $jobLocationId)->update($jobLocation);
		if($jobLocationUpdate) {
			$jobLocationsList = JobLocation::all();
			return redirect()->route('job_locations_list', [ 'jobLocationsList' => $jobLocationsList ])->with('success', 'JobLocation Updated Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to delete JobLocation
	*/
	public function deleteJobLocation(Request $request) {
		$jobLocationId = $request->id;
		$deleteJobLocation = JobLocation::where('id', $jobLocationId)->delete();
		if($deleteJobLocation) {
      $jobLocationsList = JobLocation::all();
			$res['success'] = 1;
			$res['data'] = $jobLocationsList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	/**
	 * This function is used to Show Deleted JobLocations Listing
	*/
	public function deletedJobLocations() {
		if(Auth::user()->can('restore_job_locations')) {
			$deletedJobLocations = JobLocation::onlyTrashed()->orderByDesc('id')->get();
			return view('misc/job_locations/deleted_job_locations_list', ['deletedJobLocations' => $deletedJobLocations]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Restore JobLocation
	*/
	public function restoreJobLocation(Request $request) {
		$jobLocationId = $request->id;
		$jobLocation = JobLocation::where('id', $jobLocationId);
		$restoreJobLocation = $jobLocation->restore();
		if($restoreJobLocation) {
			$jobLocationsList = JobLocation::all();
			$res['success'] = 1;
			$res['data'] = $jobLocationsList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}
	
	/**
	 * This function is used to Get Cities List
	*/
	public function CitiesList() {
		if(Auth::user()->can('manage_cities')) {
			$citiesList = City::orderByDesc('id')->get();
			return view('misc/cities/cities_list', [ 'citiesList' => $citiesList ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to view City
	*/
	public function viewCity($id) {
		if(Auth::user()->can('view_city')) {
			$city = City::find($id);
			return view('misc/cities/view_city', [ 'city' => $city ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Show Add City View
	*/
	public function addCity() {
		if(Auth::user()->can('add_city')) {
			return view('misc/cities/add_city');
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Save City
	*/
	public function saveCity(Request $request) {
		$validatedData = $request->validate([
			'city' => 'required',
		], [
			'city.required' => 'City Name is required',
		]);
		$city = new City;
		$city->city = $request->city;
		if($city->save()) {
			$citiesList = City::all();
			return redirect()->route('cities_list', [ 'citiesList' => $citiesList ])->with('success', 'City Added Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}
	
	/**
	 * This function is used to Show Edit City View
	*/
	public function editCity($id) {
		if(Auth::user()->can('edit_city')) {
			$city = City::find($id);
			return view('misc/cities/edit_city', ['city' => $city]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Update City
	*/
	public function updateCity(Request $request) {
		$validatedData = $request->validate([
			'city' => 'required',
		], [
			'city.required' => 'City Name is required',
		]);
		$updateCity = City::where('id', $request->id)->update(['city' => $request->city]);
		if($updateCity) {
			$citiesList = City::all();
			return redirect()->route('cities_list', [ 'citiesList' => $citiesList ])->with('success', 'City Updated Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to Delete City
	*/
	public function deleteCity(Request $request) {
		$cityId = $request->id;
		$deleteCity = City::where('id', $cityId)->delete();
		if($deleteCity) {
			$citiesList = City::all();
			$res['success'] = 1;
			$res['data'] = $citiesList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	/**
	 * This function is used to Show Deleted Cities Listing
	*/
	public function deletedCities() {
		if(Auth::user()->can('restore_cities')) {
			$deletedCities = City::onlyTrashed()->orderByDesc('id')->get();
			return view('misc/cities/deleted_cities_list', ['deletedCities' => $deletedCities]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Restore City
	*/
	public function restoreCity(Request $request) {
		$cityId = $request->id;
		$city = City::where('id', $cityId);
		$restoreCity = $city->restore();
		if($restoreCity) {
			$citiesList = City::all();
			$res['success'] = 1;
			$res['data'] = $citiesList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}
	
	/**
	 * This function is used to Get Counties List
	*/
	public function CountiesList() {
		if(Auth::user()->can('manage_counties')) {
			$countiesList = County::orderByDesc('id')->get();
			return view('misc/counties/counties_list', [ 'countiesList' => $countiesList ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to view City
	*/
	public function viewCounty($id) {
		if(Auth::user()->can('view_county')) {
			$county = County::find($id);
			return view('misc/counties/view_county', [ 'county' => $county ]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Show Add City View
	*/
	public function addCounty() {
		if(Auth::user()->can('add_county')) {
			$countries = Country::all();
			return view('misc/counties/add_county', ['countries' => $countries]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Save City
	*/
	public function saveCounty(Request $request) {
		$validatedData = $request->validate([
			'county' => 'required',
			'country' => 'required',
		], [
			'county.required' => 'County Name is required',
			'country.required' => 'Country is required',
		]);
		$county = new County;
		$county->county = $request->county;
		$county->country = $request->country;
		if($county->save()) {
			$countiesList = County::all();
			return redirect()->route('counties_list', [ 'countiesList' => $countiesList ])->with('success', 'County Added Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}
	
	/**
	 * This function is used to Show Edit City View
	*/
	public function editCounty($id) {
		if(Auth::user()->can('edit_county')) {
			$county = County::find($id);
			$countries = Country::all();
			return view('misc/counties/edit_county', [
				'county' => $county,
				'countries' => $countries,
			]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	
	/**
	 * This function is used to Update City
	*/
	public function updateCounty(Request $request) {
		$validatedData = $request->validate([
			'county' => 'required',
			'country' => 'required',
		], [
			'county.required' => 'County Name is required',
			'country.required' => 'Country is required',
		]);
		$updateCounty = County::where('id', $request->id)->update([
			'county' => $request->county,
			'country' => $request->country
		]);
		if($updateCounty) {
			$countiesList = County::all();
			return redirect()->route('counties_list', [ 'countiesList' => $countiesList ])->with('success', 'County Updated Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to Delete County
	*/
	public function deleteCounty(Request $request) {
		$countyId = $request->id;
		$deleteCounty = County::where('id', $countyId)->delete();
		if($deleteCounty) {
			$citiesList = County::all();
			$res['success'] = 1;
			$res['data'] = $citiesList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	/**
	 * This function is used to Show Deleted Cities Listing
	*/
	public function deletedCounties() {
		if(Auth::user()->can('restore_counties')) {
			$deletedCounties = County::onlyTrashed()->orderByDesc('id')->get();
			return view('misc/counties/deleted_counties_list', ['deletedCounties' => $deletedCounties]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Restore County
	*/
	public function restoreCounty(Request $request) {
		$countyId = $request->id;
		$county = County::where('id', $countyId);
		$restoreCounty = $county->restore();
		if($restoreCounty) {
			$countiesList = County::all();
			$res['success'] = 1;
			$res['data'] = $countiesList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	/**
	 * This function is used to Show Job Qualifications List
	*/
	public function jobQualificationsList(Request $request) {
		// if(Auth::user()->can('manage_job_qualification')) {
			$jobQualifications = JobQualification::orderByDesc('id')->get();
			return view('misc/job_qualifications/job_qualifications_list')->with([
				'jobQualifications' => $jobQualifications,
			]);
		// }
		// else {
		// 	return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		// }
	}

	/**
	 * This function is used to Show Job Qualifications List
	*/
	public function addJobQualification() {
		// if(Auth::user()->can('add_job_qualification')) {
			$jobIndustries = JobIndustry::all();
			return view('misc/job_qualifications/add_job_qualification')->with([
				'jobIndustries' => $jobIndustries,
			]);
		// }
		// else {
		// 	return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		// }
	}

	/**
	 * This function is used to Show Job Qualifications List
	*/
	public function saveJobQualification(Request $request) {
		$validatedData = $request->validate([
			'job_industry_id' => 'required',
			'name' => 'required',
		], [
			'job_industry_id.required' => 'The Job Industry field is required.',
			'name.required' => 'The Job Qualification Name is required.',
		]);

		$jobQualification = new JobQualification;
		$jobQualification->job_industry_id = $request->job_industry_id;
		$jobQualification->name = $request->name;
		$jobQualification->status = $request->status;

		if($jobQualification->save()) {
			$jobQualification = JobQualification::all();
			return redirect()->route('job_qualifications_list');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to Show Job Qualifications List
	*/
	public function viewJobQualification($id) {
		// if(Auth::user()->can('view_job_qualification')) {
			$jobQualification = JobQualification::find($id);
			return view('misc/job_qualifications/view_job_qualification', [ 'jobQualification' => $jobQualification ]);
		// }
		// else {
		// 	return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		// }
	}

	public function editJobQualification($id) {
		// if(Auth::user()->can('edit_job_qualification')) {
			$jobIndustries = JobIndustry::all();
			$jobQualification = JobQualification::find($id);
			return view('misc/job_qualifications/edit_job_qualification')->with([
				'jobIndustries' => $jobIndustries,
				'jobQualification' => $jobQualification,
			]);
		// }
		// else {
		// 	return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		// }
	}

	public function updateJobQualification(Request $request) {
		$validatedData = $request->validate([
			'job_industry_id' => 'required',
			'name' => 'required',
		], [
			'job_industry_id.required' => 'The Job Industry field is required.',
			'name.required' => 'The Job Qualification Name is required.',
		]);
		$updateJobQualification = JobQualification::find($request->id)->update([
			'job_industry_id' => $request->job_industry_id,
			'name' => $request->name,
		]);
		if($updateJobQualification) {
			$jobQualification = JobQualification::all();
			return redirect()->route('job_qualifications_list');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	public function deleteJobQualification(Request $request) {
		$deleteJobQualification = JobQualification::find($request->id)->delete();
		if($deleteJobQualification) {
			$jobQualifications = JobQualification::all();
			$res['success'] = 1;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	public function restoreJobQualification($id) {

	}

}
