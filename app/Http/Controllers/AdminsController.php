<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Auth;
use Illuminate\Support\Facades\Validator;
use Hash;

class AdminsController extends Controller {
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:recruiters'],
			'role' => ['required']
		]);
	}
	/**
	 * This function is used to Show Admins Listing
	*/
	public function adminsList(Request $request) {
		$adminsList = Admin::where('role_id', '!=', 1)->get();
		return view('admins_list', ['adminsList' => $adminsList]);
	}

	/**
	 * This function is used to Show Admins Listing
	*/
	public function addAdmin(Request $request) {
		$roles = Role::where('id', '!=', 1)->get();
		return view('add_admin', ['roles' => $roles]);
	}

	/**
	 * This function is used to Show Admins Listing
	*/
	public function saveAdmin(Request $request) {
		/* $validatedData = $request->validate([
			'name' => 'required',
			'email' => 'required|email|unique:admins',
			'role_id' => 'required',
			'password' => 'required',
		], [
			'name.required' => 'Name is required',
			'email.required' => 'Email is required',
			'email.email' => 'Email is not valid',
			'email.unique' => 'Email must be unique',
			'role_id.required' => 'Role is required',
			'password.required' => 'Password is required',
		]); */
		// $this->validator($request->all())->validate();
		$admin = new Admin;
		$admin->name = $request->name;
		$admin->email = $request->email;
		$admin->role_id = $request->role_id;
		$admin->password = Hash::make($request->password);
		dd($admin->save());
		if($admin->save()) {
			return redirect()->route('admins_list', ['admin' => $admin])->with('success', 'Admin Creaed Successfully!');
		}
		else {
			return redirect()->back()->with('error', 'Something went wrong!');
		}
		return view('add_admin');
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function viewAdmin($id) {
		$viewAdmin = Admin::where('id', $id)->get();
		$deletedAdmins = Admin::onlyTrashed()->get();
		if($viewAdmin->isNotEmpty()) {
			return view('view_admin', ['viewAdmin' => $viewAdmin]);
		}
		else {
			return view('view_admin', ['viewAdmin' => $deletedAdmins]);
		}
	}

	/**
	 * This function is used to Show Admins Listing
	*/
	public function editAdmin($id) {
		$roles = Role::where('id', '!=', 1)->get();
		$admin = Admin::where('id', $id)->get();
		return view('edit_admin', ['roles' => $roles, 'admin' => $admin]);
	}

	/**
	 * This function is used to Show Admins Listing
	*/
	public function updateAdmin(Request $request) {
		$updateAdmin = Admin::where('id', $request->id)->update([
			'name' => $request->name,
			'email' => $request->email,
			'role_id' => $request->role_id,
		]);
		if($updateAdmin) {
			$adminsList = Admin::where('role_id', '!=', 1)->get();
			return redirect()->route('admins_list', ['adminsList' => $adminsList])->with('success', "Admin Updated Successfully!");
		}
		else {
			return back()->with('error', "Something went wrong! Please try again.");
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function deleteAdmin(Request $request) {
		$userId = $request->id;
		$deleteAdmin = Admin::where('id', $userId)->delete();
		$adminsList = Admin::where('role_id', '!=', 1)->get();
		if($deleteAdmin) {
			$res['success'] = 1;
			$res['data'] = $adminsList;
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
	public function deletedAdminsList() {
		$deletedAdmins = Admin::onlyTrashed()->get();
		return view('deleted_admins_list', ['deletedAdmins' => $deletedAdmins]);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function restoreAdmin(Request $request) {
		$adminId = $request->id;
		$restoreAdmin = Admin::where('id', $adminId)->restore();
		if($restoreAdmin) {
			$adminsList = Admin::all();
			$res['success'] = 1;
			$res['data'] = $adminsList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}
}
