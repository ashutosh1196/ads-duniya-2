<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobIndustry;
use App\Models\JobFunction;
use App\Models\JobLocation;
use App\Models\Skill;
use App\Models\City;
use App\Models\County;
use App\Models\Country;
use DB;

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
		$jobIndustry = JobIndustry::where('id', $id)->get();
		return view('misc/job_industries/view_job_industry', [ 'jobIndustry' => $jobIndustry ]);
	}
	
	/**
	 * This function is used to Get Job Industries List
	*/
	public function jobIndustriesList() {
		$jobIndustriesList = JobIndustry::orderByDesc('id')->get();
		return view('misc/job_industries/job_industries_list', [ 'jobIndustriesList' => $jobIndustriesList ]);
	}
	
	/**
	 * This function is used to Get Add Job Industry View
	*/
	public function addJobIndustry() {
		return view('misc/job_industries/add_job_industry');
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
		$jobIndustry = JobIndustry::where('id', $id)->get();
		return view('misc/job_industries/edit_job_industry', [ 'jobIndustry' => $jobIndustry ]);
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
		$deletedJobIndustries = JobIndustry::onlyTrashed()->orderByDesc('id')->get();
		return view('misc/job_industries/deleted_job_industries_list', ['deletedJobIndustries' => $deletedJobIndustries]);
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
		$jobFunction = JobFunction::where('id', $id)->get();
		return view('misc/job_functions/view_job_function', [ 'jobFunction' => $jobFunction ]);
	}
	
	/**
	 * This function is used to Get Job Functions List
	*/
	public function jobFunctionsList() {
		$jobFunctionsList = JobFunction::orderByDesc('id')->get();
		return view('misc/job_functions/job_functions_list', [ 'jobFunctionsList' => $jobFunctionsList ]);
	}
	
	/**
	 * This function is used to Get Add Job Industry View
	*/
	public function addJobFunction() {
		return view('misc/job_functions/add_job_function');
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
		$jobFunction = JobFunction::where('id', $id)->get();
		return view('misc/job_functions/edit_job_function', [ 'jobFunction' => $jobFunction ]);
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
		$deletedJobFunctions = JobFunction::onlyTrashed()->orderByDesc('id')->get();
		return view('misc/job_functions/deleted_job_functions_list', ['deletedJobFunctions' => $deletedJobFunctions]);
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
		$skill = Skill::where('id', $id)->get();
		return view('misc/skills/view_skill', [ 'skill' => $skill ]);
	}
	
	
	/**
	 * This function is used to Get Skills List
	*/
	public function skillsList() {
		$skillsList = Skill::orderByDesc('id')->get();
		return view('misc/skills/skills_list', [ 'skillsList' => $skillsList ]);
	}
	
	/**
	 * This function is used to Get Add Job Industry View
	*/
	public function addSkill() {
		return view('misc/skills/add_skill');
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
		$skill = Skill::where('id', $id)->get();
		return view('misc/skills/edit_skill', [ 'skill' => $skill ]);
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
		$deletedSkills = Skill::onlyTrashed()->orderByDesc('id')->get();
		return view('misc/skills/deleted_skills_list', ['deletedSkills' => $deletedSkills]);
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
		$jobLocation = JobLocation::where('id', $id)->get();
		return view('misc/job_locations/view_job_location', [ 'jobLocation' => $jobLocation ]);
	}
	
	
	/**
	 * This function is used to Get JobLocations List
	*/
	public function jobLocationsList() {
		$jobLocationsList = JobLocation::orderByDesc('id')->get();
		return view('misc/job_locations/job_locations_list', [ 'jobLocationsList' => $jobLocationsList ]);
	}
	
	/**
	 * This function is used to Get Add Job Industry View
	*/
	public function addJobLocation() {
		return view('misc/job_locations/add_job_location');
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
		$jobLocation = JobLocation::where('id', $id)->get();
		return view('misc/job_locations/edit_job_location', [ 'jobLocation' => $jobLocation ]);
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
		$deletedJobLocations = JobLocation::onlyTrashed()->orderByDesc('id')->get();
		return view('misc/job_locations/deleted_job_locations_list', ['deletedJobLocations' => $deletedJobLocations]);
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
		$citiesList = City::orderByDesc('id')->get();
		return view('misc/cities/cities_list', [ 'citiesList' => $citiesList ]);
	}
	
	/**
	 * This function is used to view City
	*/
	public function viewCity($id) {
		$city = City::find($id);
		return view('misc/cities/view_city', [ 'city' => $city ]);
	}
	
	/**
	 * This function is used to Show Add City View
	*/
	public function addCity() {
		return view('misc/cities/add_city');
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
		$city = City::find($id);
		return view('misc/cities/edit_city', ['city' => $city]);
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
		$deletedCities = City::onlyTrashed()->orderByDesc('id')->get();
		return view('misc/cities/deleted_cities_list', ['deletedCities' => $deletedCities]);
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
		$countiesList = County::orderByDesc('id')->get();
		return view('misc/counties/counties_list', [ 'countiesList' => $countiesList ]);
	}
	
	/**
	 * This function is used to view City
	*/
	public function viewCounty($id) {
		$county = County::find($id);
		return view('misc/counties/view_county', [ 'county' => $county ]);
	}
	
	/**
	 * This function is used to Show Add City View
	*/
	public function addCounty() {
		$countries = Country::all();
		return view('misc/counties/add_county', ['countries' => $countries]);
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
		$county = County::find($id);
		$countries = Country::all();
		return view('misc/counties/edit_county', [
			'county' => $county,
			'countries' => $countries,
		]);
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
		$deletedCounties = County::onlyTrashed()->orderByDesc('id')->get();
		return view('misc/counties/deleted_counties_list', ['deletedCounties' => $deletedCounties]);
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
}
