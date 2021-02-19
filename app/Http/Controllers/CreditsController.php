<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\OrganizationCredit;
use App\Models\OrganizationCreditDetail;
use App\Models\Recruiter;

class CreditsController extends Controller {
	
	/**
	 * This function is used to Show Company Credits List
	*/
	public function companyCreditsList(Request $request) {
		$companyCreditsList = OrganizationCredit::all();
		return view('company_credits/credits_list', [ 'companyCreditsList' => $companyCreditsList ]);
	}
	
	/**
	 * This function is used to Show Add Company Credit Page
	*/
	public function addCompanyCredit() {
		$organizations = Organization::all();
		return view('company_credits/add_credit', [ 'organizations' => $organizations]);
	}
	
	/**
	 * This function is used to Save Company Credit
	*/
	public function saveCompanyCredit(Request $request) {
		$organizationId = $request->organization_id;
		$validatedData = $request->validate([
			'total_credits' => 'required',
			'txn_type' => 'required',
			'credit_type' => 'required',
			'organization_id' => 'required'
		], [
			'total_credits.required' => 'Credit Amount is required',
			'txn_type.required' => 'Transaction Type is required',
			'credit_type.required' => 'Credit Type is required',
			'organization_id.required' => 'Company is required'
		]);
		$recruiter = Recruiter::where('organization_id', $organizationId)->where('is_parent', 1)->get();
		$recruiterId = $recruiter[0]->id;
		$creditsAvailable = OrganizationCredit::where('organization_id', $organizationId)->get();
		if($creditsAvailable->isNotEmpty()) {
			$newcredits = $creditsAvailable[0]->total_credits+$request->total_credits;
			$creditUpdate = OrganizationCredit::where('organization_id', $organizationId)->update([
				'total_credits' => $newcredits
			]);
			if($creditUpdate) {
				$updatedCredit = OrganizationCredit::where('organization_id', $organizationId)->get();
				$paymentDetail = new OrganizationCreditDetail;
				$paymentDetail->txn_type = $request->txn_type;
				$paymentDetail->credits = $request->total_credits;
				$paymentDetail->credit_type = $request->credit_type;
				$paymentDetail->organization_id = $organizationId;
				$paymentDetail->organization_credit_id = $updatedCredit[0]->id;
				if($paymentDetail->save()) {
					$companyCreditsList = Organization::all();
					return redirect()->route('company_credits_list', [ 'companyCreditsList' => $companyCreditsList ])->with('success', 'Company Credits Added Successfully!');
				}
				else {
					return back()->with('error', 'Something went wrong!');
				}
			}
			else {
				return back()->with('error', 'Something went wrong!');
			}
		}
		else {
			$credit = new OrganizationCredit;
			$credit->total_credits = $request->total_credits;
			$credit->organization_id = $organizationId;
			$credit->recruiter_id = $recruiterId;
			if($credit->save()) {
				$paymentDetail = new OrganizationCreditDetail;
				$paymentDetail->txn_type = $request->txn_type;
				$paymentDetail->credits = $request->total_credits;
				$paymentDetail->credit_type = $request->credit_type;
				$paymentDetail->organization_id = $organizationId;
				$paymentDetail->organization_credit_id = $credit->id;
				if($paymentDetail->save()) {
					$companyCreditsList = Organization::all();
					return redirect()->route('company_credits_list', [ 'companyCreditsList' => $companyCreditsList ])->with('success', 'Company Credits Added Successfully!');
				}
				else {
					return back()->with('error', 'Something went wrong!');
				}
			}
			else {
				return back()->with('error', 'Something went wrong!');
			}
		}
	}
	
	/**
	 * This function is used to View Company Credit
	*/
	public function viewCompanyCredit($id) {
		$companyCreditDetails = OrganizationCredit::where('id', $id)->get();
		$companyName = Organization::where('id', $companyCreditDetails[0]->id)->get();
		return view('company_credits/view_credit', [ 'companyCreditDetails' => $companyCreditDetails, 'companyName' => $companyName ]);
	}

	/**
	 * This function is used to Show Company Payments List
	*/
	public function companyPaymentsList(Request $request) {
		$companyPaymentsList = OrganizationCreditDetail::all();
		return view('company_payments/payments_list', [ 'companyPaymentsList' => $companyPaymentsList ]);
	}
	
	/**
	 * This function is used to View Company Payment
	*/
	public function viewCompanyPayment($id) {
		$companyPaymentDetails = OrganizationCreditDetail::where('id', $id)->get();
		$companyName = Organization::where('id', $companyPaymentDetails[0]->id)->get();
		return view('company_payments/view_payment', [ 'companyPaymentDetails' => $companyPaymentDetails, 'companyName' => $companyName ]);
	}

}
