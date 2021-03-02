<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentTransaction;
use App\Models\PaymentLog;
use App\Models\Organization;
use App\Models\Recruiter;

class PaymentsController extends Controller {

	/**
	 * This function is used to Show Payments Transactions
	*/
	public function paymentTransactionsList(Request $request) {
		$paymentTransactionsList = PaymentLog::all();
		return view('payments/payment_transactions_list', [ 'paymentTransactionsList' => $paymentTransactionsList ]);
	}

	/**
	 * This function is used to View Payment Transaction
	*/
	public function viewPaymentTransaction($id) {
		$paymentTransaction = PaymentLog::where('id', $id)->get();
		$organization = Organization::where('id', $paymentTransaction[0]->organization_id)->get();
		$recruiter = Recruiter::where('id', $paymentTransaction[0]->recruiter_id)->get();
		return view('payments/view_payment_transaction', [
			'paymentTransaction' => $paymentTransaction,
			'organization' => $organization,
			'recruiter' => $recruiter,
			]);
	}
}
