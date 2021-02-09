<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Recruiter;
use App\Mail\VerifyUser;
use Mail;
use Illuminate\Support\Facades\Gate;

class OrganizationsController extends Controller {
	
	/**
	 * This function is used to Show Add Job Seeker View
	*/
	public function addCustomer() {
		return view('add_customer');
	}

	/**
	 * This function is used to Save Customer
	*/
	public function saveCustomer(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required',
			'email' => 'required|email|unique:organizations',
			'contact_number' => 'required',
			'url' => 'required',
		], [
			'name.required' => 'Company Name is required',
			'email.required' => 'Company Or Consultants Email is required',
			'email.email' => 'Company Or Consultants Email is not valid',
			'email.unique' => 'Company Or Consultants Email must be unique',
			'contact_number.required' => 'Contact Number is required',
			'url.required' => 'Company Domain URL is required',
		]);
		$customer = new Organization;
		$customer->name = $request->first_name.$request->name;
		$customer->email = $request->email;
		$customer->contact_number = $request->contact_number;
		$customer->vat_number = $request->vat_number;
		$customer->url = $request->url;
		$customer->domain = parse_url($request->url)['host'];
		if($customer->save()) {
			$recruiter = new Recruiter;
			$recruiter->email = $customer->email;
			$recruiter->organization_id = $customer->id;
			$recruiter->ip_address = $_SERVER["REMOTE_ADDR"];
			if($recruiter->save()) {
				$recruitersList = Recruiter::all();
				return redirect()->route('recruiters_list', ['recruitersList' => $recruitersList])->with('success', 'Recruiter added successfully.');
				// return view('add_recruiter', ['email' => $request->email, 'organization_id' => $customer->organization_id]);
			}
			else {
				return back()->with('error', 'Something went wrong! Please try again.');
			}
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to Show Listing
	*/
	public function viewCustomer($id) {
		$viewCustomer = Organization::where('id', $id)->get();
		$deletedCustomers = Organization::onlyTrashed()->get();
		if($viewCustomer->isNotEmpty()) {
			return view('view_customers')->with('viewCustomer', $viewCustomer);
		}
		else {
			return view('view_customers')->with('viewCustomer', $deletedCustomers);
		}
	}

	/**
	 * This function is used to Show Listing
	*/
	public function pendingCustomersList(Request $request) {
		$pendingCustomersList = Organization::where('is_whitelisted', 0)->get();
		return view('pending_customers')->with('pendingCustomersList', $pendingCustomersList);
	}

	/**
	 * This function is used to Show Listing
	*/
	public function whitelistedCustomersList(Request $request) {
		$whitelistedCustomersList = Organization::where('is_whitelisted', 1)->get();
		return view('whitelisted_customers')->with('whitelistedCustomersList', $whitelistedCustomersList);
	}

	/**
	 * This function is used to Show Listing
	*/
	public function rejectedCustomersList(Request $request) {
		$rejectedCustomersList = Organization::where('is_whitelisted', 2)->get();
		return view('rejected_customers')->with('rejectedCustomersList', $rejectedCustomersList);
	}

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function whitelistCustomer($id) {
		$customerId = $id;
		$whitelistCustomer = Organization::where('id', $customerId)->update(['is_whitelisted' => '1']);
		if($whitelistCustomer) {
			$customer = Organization::where('id', $customerId)->get();
			$random_pass = uniqid();
			$link = env("EMAIL_VERIFY_URL").$random_pass;
			$mailSent = Mail::to($customer[0]->email)->send(new VerifyUser($customer[0]->name, $link));
			$updateRecruiter = Recruiter::where('email', $customer[0]->email)->update(['signup_token' => $random_pass]);
			if($updateRecruiter) {
				$whitelistedCustomersList = Organization::where('is_whitelisted', 1)->get();
				return redirect()->route('whitelisted_customers', ['whitelistedCustomersList' => $whitelistedCustomersList])->with('success', 'Customer Whitelisted Successfully!');
			}
			else {
				return back()->with('warning', 'Something went wrong!');
			}
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function rejectCustomer($id) {
		$customerId = $id;
		$rejectCustomer = Organization::where('id', $customerId)->update(['is_whitelisted' => '2']);
		if($rejectCustomer) {
			$rejectedCustomersList = Organization::where('is_whitelisted', 2)->get();
			return redirect()->route('rejected_customers', ['rejectedCustomersList' => $rejectedCustomersList])->with('success', 'Customer Rejected Successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function deleteCustomers(Request $request) {
		$customerId = $request->id;
		$deleteCustomer = Organization::where('id', $customerId)->delete();
		if($deleteCustomer) {
			$customersList = Organization::all();
			$res['success'] = 1;
			$res['data'] = $customersList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function deletedCustomersList() {
		$deletedCustomers = Organization::onlyTrashed()->get();
		return view('deleted_customers_list', ['deletedCustomers' => $deletedCustomers]);
	}

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function restoreCustomer(Request $request) {
		$customerId = $request->id;
		$customer = Organization::where('id', $customerId);
		$restoreCustomer = $customer->restore();
		if($restoreCustomer) {
			$customersList = Organization::all();
			$res['success'] = 1;
			$res['data'] = $customersList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

}
