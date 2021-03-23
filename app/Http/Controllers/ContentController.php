<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\Admin;
use DB;
use Auth;

class ContentController extends Controller {

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function websitePagesList(Request $request) {
		$websitePagesList = Page::where('device_type', 'web')->get();
		return view('content/web/website_pages_list')->with('websitePagesList', $websitePagesList);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function addWebsitePage(Request $request) {
		$pageSections = DB::table('pages_sections')->get();
		return view('content/web/add_website_page', [ 'pageSections' => $pageSections ]);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function saveWebsitePage(Request $request) {
		// dd($request);
		$pageContent = Page::where("section", $request->section)
										->where("device_type", 'web')
										->get();
		if(count($pageContent) <= 0) {
			$pageContent = new Page;
			$pageContent->title = $request->title;
			$pageContent->content = $request->content;
			$pageContent->section = $request->section;
			$pageContent->device_type = 'web';
			$pageContent->added_by_id = Auth::id();
			$pageContent->updated_by_id = Auth::id();
			if($pageContent->save()) {
				return redirect()->back()->with('success', 'Page Created Successfully!');
			}
			else {
				return redirect()->back()->with('error', 'Something went wrong! Please try again later.');
			}
		}
		else {
			return redirect()->back()->with('error', 'The Page Already exists! Please Edit the Page to Change Content.');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function editWebsitePage($id) {
    $pageContent = Page::find($id);
		$pageSections = DB::table('pages_sections')->get();
		return view('content/web/edit_website_page', [
			'pageContent' => $pageContent,
			'pageSections' => $pageSections,
		]);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function updateWebsitePage(Request $request) {
		$validatedData = $request->validate([
			'title' => 'required',
			'content' => 'required',
		], [
			'title.required' => 'Title is required',
			'content.required' => 'Content is required',
		]);
		$data = [
			'content' => $request->content,
			'updated_by_id' => Auth::id(),
		];
		$updateContent = Page::where("id", $request->id)->update($data);
		if($updateContent) {
			$websitePagesList = Page::all();
			return redirect()->route('website_pages_list', ['websitePagesList' => $websitePagesList])->with('success', 'Page Updated successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong!');
		}
	}

	/**
	 * This function is used to View Website Content
	*/
	public function viewWebsitePage($id) {
		$pageContent = Page::find($id);
		$section = DB::table('pages_sections')->where('slug', $pageContent->section)->first();
		$addedBy = Admin::find($pageContent->added_by_id);
		$updatedBy = Admin::find($pageContent->updated_by_id);
		return view('content/web/view_website_page', [
			'addedBy' => $addedBy,
			'updatedBy' => $updatedBy,
			'section' => $section->title,
			'pageContent' => $pageContent
		]);
	}

	/**
	 * This function is used to View Website Content
	*/
	public function deleteWebsitePage(Request $request) {
		$page = Page::find($request->id);
		$deletePage = $page->delete();
		if($deletePage) {
			$res['success'] = 1;
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
	public function deletedWebsitePages() {
		if(Auth::user()->can('restore_website_page')) {
			$deletedWebsitePages = Page::onlyTrashed()->orderByDesc('id')->get();
			return view('content/web/deleted_website_pages_list', ['deletedWebsitePages' => $deletedWebsitePages]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function restoreWebsitePage(Request $request) {
		$restoreWebsitePage = Page::where('id', $request->id)->restore();
		if($restoreWebsitePage) {
			$res['success'] = 1;
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
	public function mobilePagesList(Request $request) {
		$mobilePagesList = Page::where('device_type', 'mobile')->get();
		return view('content/mobile/mobile_pages_list')->with('mobilePagesList', $mobilePagesList);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function addMobilePage(Request $request) {
		$pageSections = DB::table('pages_sections')->get();
		return view('content/mobile/add_mobile_page', [ 'pageSections' => $pageSections ]);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function saveMobilePage(Request $request) {
		// dd($request);
		$pageContent = Page::where("section", $request->section)
										->where("device_type", 'mobile')
										->get();
		if(count($pageContent) <= 0) {
			$pageContent = new Page;
			$pageContent->title = $request->title;
			$pageContent->content = $request->content;
			$pageContent->section = $request->section;
			$pageContent->device_type = 'mobile';
			$pageContent->added_by_id = Auth::id();
			$pageContent->updated_by_id = Auth::id();
			if($pageContent->save()) {
				return redirect()->back()->with('success', 'Page Created Successfully!');
			}
			else {
				return redirect()->back()->with('error', 'Something went wrong! Please try again later.');
			}
		}
		else {
			return redirect()->back()->with('error', 'The Page Already exists! Please Edit the Page to Change Content.');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function editMobilePage($id) {
		$pageContent = Page::find($id);
		$pageSections = DB::table('pages_sections')->get();
		return view('content/mobile/edit_mobile_page', [
			'pageContent' => $pageContent,
			'pageSections' => $pageSections,
		]);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function updateMobilePage(Request $request) {
		$validatedData = $request->validate([
			'title' => 'required',
			'content' => 'required',
		], [
			'title.required' => 'Title is required',
			'content.required' => 'Content is required',
		]);
		$data = [
			'content' => $request->content,
			'updated_by_id' => Auth::id(),
		];
		$updateContent = Page::where("id", $request->id)->update($data);
		if($updateContent) {
			$mobilePagesList = Page::all();
			return redirect()->route('mobile_pages_list', ['mobilePagesList' => $mobilePagesList])->with('success', 'Page Updated successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong!');
		}
	}

	/**
	 * This function is used to View Mobile Content
	*/
	public function viewMobilePage($id) {
		$pageContent = Page::find($id);
		$section = DB::table('pages_sections')->where('slug', $pageContent->section)->first();
		$addedBy = Admin::find($pageContent->added_by_id);
		$updatedBy = Admin::find($pageContent->updated_by_id);
		return view('content/mobile/view_mobile_page', [
			'addedBy' => $addedBy,
			'updatedBy' => $updatedBy,
			'section' => $section->title,
			'pageContent' => $pageContent
		]);
	}

	/**
	 * This function is used to View Mobile Content
	*/
	public function deleteMobilePage(Request $request) {
		$page = Page::find($request->id);
		$deletePage = $page->delete();
		if($deletePage) {
			$res['success'] = 1;
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
	public function deletedMobilePages() {
		if(Auth::user()->can('restore_mobile_page')) {
			$deletedMobilePages = Page::onlyTrashed()->orderByDesc('id')->get();
			return view('content/mobile/deleted_mobile_pages_list', ['deletedMobilePages' => $deletedMobilePages]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function restoreMobilePage(Request $request) {
		$restoreMobilePage = Page::where('id', $request->id)->restore();
		if($restoreMobilePage) {
			$res['success'] = 1;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

}
