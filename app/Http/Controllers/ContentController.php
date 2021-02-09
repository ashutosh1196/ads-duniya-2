<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class ContentController extends Controller {

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function websitePagesList(Request $request) {
		$websitePagesList = Page::where('view', '1')->get();
		return view('pages/website_pages')->with('websitePagesList', $websitePagesList);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function mobilePagesList(Request $request) {
		$mobilePagesList = Page::where('view', '0')->get();
		return view('pages/mobile_pages')->with('mobilePagesList', $mobilePagesList);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	// public function addPagesContentView(Request $request) {
	// 	return view('add_page');
	// }

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	/* public function saveContent(Request $request) {
		// dd($request);
		$pageContent = Page::where("section", $request->section)
										->where("view", $request->view)
										->get();
		if(count($pageContent) <= 0) {
			$pageContent = new Page;
			$pageContent->title = $request->title;
			$pageContent->section = $request->section;
			$pageContent->status = $request->status;
			$pageContent->view = $request->view;
			$pageContent->content = $request->content;
			// $pageContent->content = $_POST[ 'content' ];
			if($pageContent->save()) {
				return redirect()->back()->with('success', 'Page created successfully!');
			}
			else {
				return redirect()->back()->with('error', 'Something went wrong!');
			}
		}
		else {
			return redirect()->back()->with('error', 'The Page Already exists! Please Edit the Page to Change Content.');
		}
	} */

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function editPagesContentView($id) {
    $pageContent = Page::find($id);
		return view('edit_content')->with("pageContent", $pageContent);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function updateContent(Request $request) {
		// dd($request);
		$updateContent = Page::where("id", $request->id)
										->update([
											'title' => $request->title,
											'content' => $request->content,
										]);
		if($updateContent) {
			$pagesList = Page::all();
			return redirect()->route('pages_list', ['pagesList' => $pagesList])->with('success', 'Page Updated successfully!');
			// return view('pages_list')->with('success', 'Page Updated successfully!');
		}
		else {
			return view('pages_list')->with('error', 'Something went wrong!');
		}
	}

}
