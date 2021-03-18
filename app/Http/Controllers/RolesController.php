<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Auth;

class RolesController extends Controller {
	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function rolesList(Request $request) {
		if(Auth::user()->can('manage_roles')) {
			$roles = Role::where('id', '!=', 1)->get();
			return view('roles/roles_list', ['roles' => $roles]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function viewRole($id) {
		if(Auth::user()->can('view_role')) {
			$role = Role::find($id);
			$permissions = \DB::table('permission_role')->where('role_id', $role->id)->get();
			return view('roles/view_role', [
				'role' => $role,
				'permissions' => $permissions,
			]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function addRole(Request $request) {
		if(Auth::user()->can('add_role')) {
			return view('roles/add_role');
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function saveRole(Request $request) {
		$nameToLowercase = strtolower($request->role_name);
		$roleTag = $name = str_replace(' ', '_', $nameToLowercase);
		$role = Role::where("tag", $roleTag)->get();
		if(count($role) <= 0) {
			$role = new Role;
			$role->name = $request->role_name;
			$role->tag = $roleTag;
			$role->status = 1;
			if($role->save()) {
				$roles = Role::where('id', '!=', 1)->get();
				return redirect()->route('roles_list', ['roles' => $roles])->with('success', 'Role Added successfully!');
			}
			else {
				return redirect()->back()->with('error', 'Something went wrong!');
			}
		}
		else {
			$roles = Role::where('id', '!=', 1)->get();
			return redirect()->route('roles_list', ['roles' => $roles])->with('error', 'The Role already exists! Please edit the Role if you want to make any changes.');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function editRole($id) {
		if(Auth::user()->can('edit_role')) {
			$role = Role::find($id);
			return view('roles/edit_role', [
				'role' => $role
			]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Update Role
	*/
	public function updateRole(Request $request) {
		$updateRole = Role::where('id', $request->id)->update([
			'name' => $request->name
		]);
		if($updateRole) {
			$roles = Role::orderByDesc('id')->get();
			return redirect()->route('roles_list', ['roles' => $roles])->with('success', 'Role Updated successfully!');
		}

	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function getRolePermissions(Request $request) {
		$rolePermissions = \DB::table('permission_role')->where('role_id', $request->role_id)->get();
		return json_encode($rolePermissions);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function rolePermissions(Request $request) {
		if(Auth::user()->can('add_permissions')) {
			$roles = Role::where('id', '!=', 1)->get();
			// $roles = Role::all();
			if($roles->isNotEmpty()) {
				$pendingCustomersPermissions = Permission::where('module_slug', 'pending_customers')->get();
				$whitelistedCustomersPermissions = Permission::where('module_slug', 'whitelisted_customers')->get();
				$rejectedCustomersPermissions = Permission::where('module_slug', 'rejected_customers')->get();
				$recruitersPermissions = Permission::where('module_slug', 'recruiters')->get();
				$jobseekersPermissions = Permission::where('module_slug', 'jobseekers')->get();
				$adminsPermissions = Permission::where('module_slug', 'admins')->get();
				$jobsPermissions = Permission::where('module_slug', 'jobs')->get();
				$jobHistoryPermissions = Permission::where('module_slug', 'job_history')->get();
				$companyCreditsPermissions = Permission::where('module_slug', 'company_credits')->get();
				$companyCreditsHistoryPermissions = Permission::where('module_slug', 'credits_history')->get();
				$paymentTransactionsPermissions = Permission::where('module_slug', 'payment_transactions')->get();
				$ticketsPermissions = Permission::where('module_slug', 'tickets')->get();
				$jobIndustriesPermissions = Permission::where('module_slug', 'job_industries')->get();
				$jobLocationsPermissions = Permission::where('module_slug', 'job_locations')->get();
				$skillsPermissions = Permission::where('module_slug', 'skills')->get();
				$citiesPermissions = Permission::where('module_slug', 'cities')->get();
				$countiesPermissions = Permission::where('module_slug', 'counties')->get();
				$rolesPermissions = Permission::where('module_slug', 'roles')->get();
				$accessPermissions = Permission::where('module_slug', 'permissions')->get();
				$restorePermissions = Permission::where('module_slug', 'restore')->get();
				return view('roles/role_permissions', [
					'roles' => $roles,
					'pendingCustomersPermissions' => $pendingCustomersPermissions,
					'whitelistedCustomersPermissions' => $whitelistedCustomersPermissions,
					'rejectedCustomersPermissions' => $rejectedCustomersPermissions,
					'recruitersPermissions' => $recruitersPermissions,
					'jobseekersPermissions' => $jobseekersPermissions,
					'adminsPermissions' => $adminsPermissions,
					'jobsPermissions' => $jobsPermissions,
					'jobHistoryPermissions' => $jobHistoryPermissions,
					'companyCreditsPermissions' => $companyCreditsPermissions,
					'companyCreditsHistoryPermissions' => $companyCreditsHistoryPermissions,
					'paymentTransactionsPermissions' => $paymentTransactionsPermissions,
					'ticketsPermissions' => $ticketsPermissions,
					'jobIndustriesPermissions' => $jobIndustriesPermissions,
					'jobLocationsPermissions' => $jobLocationsPermissions,
					'skillsPermissions' => $skillsPermissions,
					'citiesPermissions' => $citiesPermissions,
					'countiesPermissions' => $countiesPermissions,
					'rolesPermissions' => $rolesPermissions,
					'accessPermissions' => $accessPermissions,
					'restorePermissions' => $restorePermissions,
				]);
			}
			else {
				return redirect()->route('add_role')->with('warning', 'No Roles Found! Please add a Role first.');
			}
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function saveRolePermissions(Request $request) {
		$role = Role::find($request->role_id);
		$updatePermissions = $role->permissions()->sync($request->permissions);
		if($updatePermissions) {
			$roles = Role::where('id', '!=', 1)->get();
			return back()->with('success', 'Role Permissions Added successfully!');
		}
		else {
			return redirect()->back()->with('error', 'Something went wrong!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function deleteRole(Request $request) {
		$role = Role::find($request->id);
		\DB::table('permission_role')->where('role_id', $request->id)->update(['deleted_at' => \Carbon\Carbon::now()]);
		$deleteRole = $role->delete();
		if($deleteRole) {
			$roles = Role::all();
			$res['success'] = 1;
			$res['data'] = $roles;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	/**
	 * This function is used to Show deleted Roles
	*/
	public function deletedRoles() {
		if(Auth::user()->can('restore_roles')) {
			$deletedRoles = Role::onlyTrashed()->orderByDesc('id')->get();
			return view('roles/deleted_roles_list', ['deletedRoles' => $deletedRoles]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Restore Roles
	*/
	public function restoreRole(Request $request) {
		$role = Role::where('id', $request->id);
		$restoreRole = $role->restore();
		if($restoreRole) {
			\DB::table('permission_role')->where('role_id', $request->id)->update(['deleted_at' => NULL]);
			$roles = Role::all();
			$res['success'] = 1;
			$res['data'] = $roles;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	public function getAllPermissions(Request $request) {
		$permissions = Permission::all();
		for ($i=0; $i < count($permissions); $i++) { 
			echo $permissions[$i]->id.' : '.$permissions[$i]->slug."<br>";
			echo "\n";
		}
	}

	public function getUserPermissions(Request $request) {
		$user = $request->user();
		$permissions = $user->role->permissions;
		for ($i=0; $i < count($permissions); $i++) { 
			echo $permissions[$i]->id.' : '.$permissions[$i]->slug."<br>";
			echo "\n";
		}
	}
}
