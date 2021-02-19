<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class CreditsController extends Controller {
	
	/**
	 * This function is used to Show Company Credits Listing
	*/
	public function companyCreditsList(Request $request) {
		$companyCreditsList = Organization::all();
		return view('company_credits/credits_list', [ 'companyCreditsList' => $companyCreditsList ]);

	}
	
	/**
	 * This function is used to Show Add Company Credit Page
	*/
	public function addCompanyCredit($id) {
		$organizations = Organization::all();
		return view('company_credits/add_credit', [ 'organizations' => $organizations, 'company_id' => $id ]);
	}
	
	/**
	 * This function is used to Save Company Credit
	*/
	public function saveCompanyCredit(Request $request) {
		$companyId = $request->company_id;
		$companyCreditsList = Organization::all();
		return redirect()->route('company_credits_list', [ 'companyCreditsList' => $companyCreditsList ])->with('success', 'Company Credits Added Successfully!');
	}
	
	/**
	 * This function is used to View Company Credit
	*/
	public function viewCompanyCredit($id) {
		$companyCreditsList = Organization::all();
		return view('company_credits/view_credit', [ 'companyCreditsList' => $companyCreditsList ]);
	}
}
