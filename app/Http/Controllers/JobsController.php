<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobsController extends Controller {
	/**
	 * This function is used to Show Published Jobs Listing
	*/
	public function publishedJobsList(Request $request) {
		$publishedJobsList = Job::all();
		return view('published_jobs')->with('publishedJobsList', $publishedJobsList);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function bookmarkedJobs(Request $request) {
		$bookmarkedJobs = Job::all();
		return view('bookmarked_jobs')->with('bookmarkedJobs', $bookmarkedJobs);
	}
}
