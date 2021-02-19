<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganizationCreditDetail;

class PaymentsController extends Controller {

	/**
	 * This function is used to Show Payments history
	*/
	public function paymentsHistory(Request $request) {
		$paymentsHistory = [];
		return view('payments/payments_list', [ 'paymentsHistory' => $paymentsHistory ]);
	}

	/**
	 * This function is used to View Payment history
	*/
	public function viewPayment($id) {
		$paymentHistory = OrganizationCreditDetail::where('id', $id)->get();
		return view('payments/view_payment_history', [ 'paymentHistory' => $paymentHistory ]);
	}
}
