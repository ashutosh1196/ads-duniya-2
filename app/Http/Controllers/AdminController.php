<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Page;
use App\Models\Role;
use Auth;
use Hash;
use App\Models\Bank;
use App\Models\SavingAccount;
use App\Models\Loan;
use App\Models\CreditCard;
use App\Models\Demat;
use App\Models\MutualFund;
use App\Models\Blog;

class AdminController extends Controller
{
	public function dashboard() {
		$bank_counts = Bank::where('status',Bank::ACTIVE)->count();
		$saving_account_counts = SavingAccount::count();
		$loan_info_counts = Loan::count();
		$credit_card_counts = CreditCard::count();
		$demats_count = Demat::count();
		$mutual_funds_count = MutualFund::count();
		$blogs_count = Blog::count();
		return view('dashboard')->with([
			'bank_counts' => $bank_counts,
			'saving_account_counts' => $saving_account_counts,
			'loan_info_counts' => $loan_info_counts,
			'credit_card_counts' => $credit_card_counts,
			'demats_count' => $demats_count,
			'mutual_funds_count' => $mutual_funds_count,
			'blogs_count' => $blogs_count,
		]);
	}

	// -----------------------------------------------------------

	public function adminProfile(Request $request) {
		$userDetails = Admin::findOrFail(Auth::id());
		return view('admin_profile')->with('userDetails', $userDetails );
	}

	public function updateProfile(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required',
		], [
			'name.required' => 'Name is required',
		]);
		$updateProfile = Admin::where('id', $request->id)->update(['name' => $request->name]);
		if($updateProfile) {
			return back()->with('success', 'Profile Updated Successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again later.');
		}
	}

	public function checkPassword(Request $request) {
		$passwordType = $request['password_type'];
		$admin = Admin::find(Auth::id());
		if($passwordType == 'old') {
			if(Hash::check($request->password, $admin->password) == false) {
				return true;
			}
			else if(Hash::check($request->password, $admin->password) == true) {
				return false;
			}
		}
		else if($passwordType == 'new') {
			if(Hash::check($request->password, $admin->password) == false) {
				return false;
			}
			else {
				return true;
			}
		} 
	}

	/**
	 * This function is used to Change Admin Password
	*/
	public function changePassword(Request $request) {
		$changePassword = Admin::where('id', Auth::id())->update(['password' => Hash::make($request->password)]);
		if($changePassword) {
			return back()->with('success', 'Password Updated Successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again later.');
		}
	}
}
