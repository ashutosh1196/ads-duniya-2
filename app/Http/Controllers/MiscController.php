<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobIndustry;
use App\Models\JobFunction;
use App\Models\Skill;
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
		$jobIndustriesList = JobIndustry::all();
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
			'description' => 'required',
		], [
			'name.required' => 'The Job Industry Name is required.',
			'name.unique' => 'The Job Industry Name must be unique.',
			'description.required' => 'The Job Industry Description is required.',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$jobSlug = strtolower($slugTrimmed);

		$jobIndustry = new JobIndustry;
		$jobIndustry->name = $request->name;
		$jobIndustry->slug = $jobSlug;
		$jobIndustry->description = $request->description;
		$jobIndustry->status = 1;

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
			'description' => 'required',
		], [
			'name.required' => 'Job Name is required',
			'description.required' => 'Job Description is required',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$jobSlug = strtolower($slugTrimmed);

		$jobIndustryId = $request->id;
		$jobIndustry = [
			'name' => $request->name,
			'slug' => $jobSlug,
			'description' => $request->description
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
		$deleteJobFunction = JobFunction::where('job_industry_id', $industryId)->delete();
		if($deleteJobFunction) {
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
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	/**
	 * This function is used to Show Deleted Job Industries Listing
	*/
	public function deletedJobIndustries() {
		$deletedJobIndustries = JobIndustry::onlyTrashed()->get();
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
		$jobFunctionsList = JobFunction::all();
		return view('misc/job_functions/job_functions_list', [ 'jobFunctionsList' => $jobFunctionsList ]);
	}
	
	/**
	 * This function is used to Get Add Job Industry View
	*/
	public function addJobFunction() {
		$jobIndustries = JobIndustry::all();
		return view('misc/job_functions/add_job_function', [ 'jobIndustries' => $jobIndustries ]);
	}
	
	
	/**
	 * This function is used to Save Job Function
	*/
	public function saveJobFunction(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required|unique:job_functions',
			'description' => 'required',
			'job_industry_id' => 'required',
		], [
			'name.required' => 'The Job Function Name is required.',
			'name.unique' => 'The Job Function Name must be unique.',
			'description.required' => 'The Job Function Description is required.',
			'job_industry_id.required' => 'The Job Industry is required.',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$jobFunctionSlug = strtolower($slugTrimmed);

		$jobFunction = new JobFunction;
		$jobFunction->name = $request->name;
		$jobFunction->slug = $jobFunctionSlug;
		$jobFunction->description = $request->description;
		$jobFunction->job_industry_id = $request->job_industry_id;
		$jobFunction->status = 1;

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
			'description' => 'required',
		], [
			'name.required' => 'Job Name is required',
			'description.required' => 'Job Description is required',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$jobSlug = strtolower($slugTrimmed);

		$jobFunctionId = $request->id;
		$jobFunction = [
			'name' => $request->name,
			'slug' => $jobSlug,
			'description' => $request->description
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
		$deletedJobFunctions = JobFunction::onlyTrashed()->get();
		return view('misc/job_functions/deleted_job_functions_list', ['deletedJobFunctions' => $deletedJobFunctions]);
	}

	/**
	 * This function is used to Restore Job Function
	*/
	public function restoreJobFunction(Request $request) {
		$functionId = $request->id;
		$jobFunctionDeleted = JobFunction::where('id', $functionId)->onlyTrashed()->get();
		$jobIndustry = JobIndustry::where('id', $jobFunctionDeleted[0]->job_industry_id);
		$restoreJobIndustry = $jobIndustry->restore();
		if($restoreJobIndustry) {
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
		$skillsList = Skill::all();
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
			'description' => 'required',
		], [
			'name.required' => 'The Skill Name is required.',
			'name.unique' => 'The Skill Name must be unique.',
			'description.required' => 'The Skill Description is required.',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$slillSlug = strtolower($slugTrimmed);

		$skill = new Skill;
		$skill->name = $request->name;
		$skill->slug = $slillSlug;
		$skill->description = $request->description;
		$skill->status = 1;

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
			'description' => 'required',
		], [
			'name.required' => 'Skill Name is required',
			'description.required' => 'Skill Description is required',
		]);

		$slugTrimmed = str_replace(' ', '_', $request->name);
		$skillSlug = strtolower($slugTrimmed);

		$skillId = $request->id;
		$skill = [
			'name' => $request->name,
			'slug' => $skillSlug,
			'description' => $request->description
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
		$deletedSkills = Skill::onlyTrashed()->get();
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
}
