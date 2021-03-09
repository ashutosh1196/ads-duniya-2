<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Recruiter;
use App\Models\Country;
use App\Mail\VerifyUser;
use Mail;
use DB;
use Illuminate\Support\Facades\Gate;

class OrganizationsController extends Controller {
	
	/**
	 * This function is used to Check if the email exists in the table
	*/
	public function checkEmail() {
		$tableName = $_GET['table_name'];
		if(isset($_GET['id'])) {
			$emailExists = DB::table($tableName)->where('email', $_GET['email'])->where('id', '!=', $_GET['id'])->get();
			if ($emailExists->isNotEmpty()) {
				return true;
			}
			else {
				return false;
			}
			exit;
		}
		else {
			$emailExists = DB::table($tableName)->where('email', $_GET['email'])->get();
			if ($emailExists->isNotEmpty()) {
				return true;
			}
			else {
				return false;
			}
			exit;
		}
	}
	
	/**
	 * This function is used to Show Add Job Seeker View
	*/
	public function addCustomer() {
		$countries = Country::all()->toArray();
		return view('customers/add_customer', ['countries' => $countries]);
	}

	/**
	 * This function is used to Save Customer
	*/
	public function saveCustomer(Request $request) {
		$validatedData = $request->validate([
			'address' => 'required',
			'name' => 'required',
			'email' => 'required|email|unique:organizations',
			'country_code' => 'required',
			'state' => 'required',
			'pincode' => 'required',
			'contact_number' => 'required',
			'url' => 'required',
		], [
			'address.required' => 'Address is required',
			'name.required' => 'Company Name is required',
			'email.required' => 'Company Or Consultants Email is required',
			'email.email' => 'Company Or Consultants Email is not valid',
			'email.unique' => 'Company Or Consultants Email must be unique',
			'country_code.required' => 'Country Code is required',
			'state.required' => 'State is required',
			'pincode.required' => 'Zip / Postcode is required',
			'contact_number.required' => 'Contact Number is required',
			'url.required' => 'Company Domain URL is required',
		]);
		$customer = new Organization;
		$customer->name = $request->first_name.$request->name;
		$customer->email = $request->email;
		$customer->country_code = $request->country_code;
		$customer->contact_number = $request->contact_number;
		$customer->vat_number = $request->vat_number;
		$customer->url = $request->url;
		$customer->domain = parse_url($request->url)['host'];
		$customer->address = $request->address;
		$customer->city = $request->city;
		$customer->state = $request->state;
		$customer->pincode = $request->pincode;
		$customer->country = $request->country;
		$customer->county = $request->county;
		if($customer->save()) {
			$recruiter = new Recruiter;
			$recruiter->email = $customer->email;
			$recruiter->organization_id = $customer->id;
			$recruiter->ip_address = $_SERVER["REMOTE_ADDR"];
			if($recruiter->save()) {
				$pendingCustomersList = Organization::where('is_whitelisted', 0)->get();
				return redirect()->route('pending_customers', ['pendingCustomersList' => $pendingCustomersList])->with('success', 'Recruiter added successfully. Please approve.');
				// return view('customers/add_recruiter', ['email' => $request->email, 'organization_id' => $customer->organization_id]);
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
	public function viewCustomer($from_page, $id) {
		$viewCustomer = Organization::where('id', $id)->get();
		$deletedCustomers = Organization::onlyTrashed()->get();
		if($viewCustomer->isNotEmpty()) {
			return view('customers/view_customers')->with('viewCustomer', $viewCustomer);
		}
		else {
			return view('customers/view_customers')->with('viewCustomer', $deletedCustomers);
		}
	}

	/**
	 * This function is used to Show Listing
	*/
	public function pendingCustomersList(Request $request) {
		$pendingCustomersList = Organization::where('is_whitelisted', 0)->get();
		return view('customers/pending_customers')->with('pendingCustomersList', $pendingCustomersList);
	}

	/**
	 * This function is used to Show Listing
	*/
	public function whitelistedCustomersList(Request $request) {
		$whitelistedCustomersList = Organization::where('is_whitelisted', 1)->get();
		return view('customers/whitelisted_customers')->with('whitelistedCustomersList', $whitelistedCustomersList);
	}

	/**
	 * This function is used to Show Listing
	*/
	public function rejectedCustomersList(Request $request) {
		$rejectedCustomersList = Organization::where('is_whitelisted', 2)->get();
		return view('customers/rejected_customers')->with('rejectedCustomersList', $rejectedCustomersList);
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
			$link = config("adminlte.email_verify_url").$random_pass;
			// $link = config("adminlte.email_verify_url").$random_pass.'?email='.$customer[0]->email;
			// $link = config("adminlte.email_verify_url").$random_pass.'/'.$customer[0]->email;
			$mailSent = Mail::to($customer[0]->email)->cc(['sandeep@rvtechnologies.com'])->send(new VerifyUser($customer[0]->name, $link));
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
		return view('customers/deleted_customers_list', ['deletedCustomers' => $deletedCustomers]);
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

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function editCustomer($from_page, $id) {
		$countries = Country::all()->toArray();
		$customer = Organization::where('id', $id)->get();
		return view('customers/edit_customer', ['countries' => $countries, 'customer' => $customer, 'from_page' => $from_page ]);
	}

	/**
	 * This function is used to Show Job Seekers Listing
	*/
	public function updateCustomer(Request $request) {
		$validatedData = $request->validate([
			'address' => 'required',
			'city' => 'required',
			'pincode' => 'required',
			'state' => 'required',
			'country' => 'required',
			'name' => 'required',
			'email' => 'required|email',
			'country_code' => 'required',
			'contact_number' => 'required',
			'url' => 'required',
		], [
			'address.required' => 'Address is required',
			'city.required' => 'City is required',
			'pincode.required' => 'Zipcode is required',
			'state.required' => 'State is required',
			'country.required' => 'Country is required',
			'name.required' => 'Company Name is required',
			'email.required' => 'Company Or Consultants Email is required',
			'email.email' => 'Company Or Consultants Email is not valid',
			'country_code.required' => 'Country Code is required',
			'contact_number.required' => 'Contact Number is required',
			'url.required' => 'Company Domain URL is required',
		]);
		$dataToUpdate = [
			// 'name' => $request->name,
			// 'email' => $request->email,
			'country_code' => $request->country_code,
			'contact_number' => $request->contact_number,
			'vat_number' => $request->vat_number,
			'url' => $request->url,
			'domain' => parse_url($request->url)['host'],
			'address' => $request->address,
			'city' => $request->city,
			'state' => $request->state,
			'pincode' => $request->pincode,
			'country' => $request->country,
			'county' => $request->county
		];
		$updateCustomer = Organization::where('id', $request->id)->update($dataToUpdate);
		if($updateCustomer) {
			if($request->from_page == 'whitelisted') {
				$redirectTo = 'whitelisted_customers';
			}
			else if($request->from_page == 'rejected') {
				$redirectTo = 'rejected_customers';
			}
			else {
				$redirectTo = 'pending_customers';
			}
			$pendingCustomersList = Organization::where('is_whitelisted', 0)->get();
			return redirect()->route($redirectTo, ['pendingCustomersList' => $pendingCustomersList])->with('success', 'Cutomer Updated Successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

}
