<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobSeekersController;
use App\Http\Controllers\RecruitersController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\RolesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::middleware(['auth:admin'])->group(function () {
  
  // Admin Routes
  Route::group(['prefix' => 'admin_panel'], function () {
    
    // Common Routes
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');

    // Customers Routes
    Route::group(['prefix' => 'customers'], function () {
      Route::get('/pending', [OrganizationsController::class, 'pendingCustomersList'])->name('pending_customers');
      Route::get('/whitelisted', [OrganizationsController::class, 'whitelistedCustomersList'])->name('whitelisted_customers');
      Route::get('/rejected', [OrganizationsController::class, 'rejectedCustomersList'])->name('rejected_customers');
      Route::get('/whitelist/{id}', [OrganizationsController::class, 'whitelistCustomer'])->name('whitelist_customer');
      Route::get('/reject/{id}', [OrganizationsController::class, 'rejectCustomer'])->name('reject_customer');
      Route::get('/view/{id}', [OrganizationsController::class, 'viewCustomer'])->name('view_customer');
      Route::get('/edit/{id}', [OrganizationsController::class, 'editCustomers'])->name('edit_customers');
      Route::post('/update', [OrganizationsController::class, 'updateCustomers'])->name('update_customers');
      Route::post('/delete', [OrganizationsController::class, 'deleteCustomers'])->name('delete_customer');
      Route::get('/deleted', [OrganizationsController::class, 'deletedCustomersList'])->name('deleted_customers_list');
      Route::post('/restore', [OrganizationsController::class, 'restoreCustomer'])->name('restore_customer');
    });

    // User/Job Seekers Routes
    Route::group(['prefix' => 'jobseekers'], function () {
      Route::get('/list', [JobSeekersController::class, 'jobseekersList'])->name('jobseekers_list');
      Route::get('/view/{id}', [JobSeekersController::class, 'viewJobseeker'])->name('view_jobseeker');
      Route::get('/edit/{id}', [JobSeekersController::class, 'editJobseeker'])->name('edit_jobseeker');
      Route::post('/update', [JobSeekersController::class, 'updateJobseeker'])->name('update_jobseeker');
      Route::post('/delete', [JobSeekersController::class, 'deleteJobseeker'])->name('delete_jobseeker');
      Route::get('/deleted', [JobSeekersController::class, 'deletedJobseekersList'])->name('deleted_jobseekers_list');
      Route::post('/restore', [JobSeekersController::class, 'restoreJobseeker'])->name('restore_jobseeker');
      Route::get('/add', [JobSeekersController::class, 'addJobseeker'])->name('add_jobseeker');
      Route::post('/save', [JobSeekersController::class, 'saveJobseeker'])->name('save_jobseeker');
    });

    // Recruiters Routes
    Route::group(['prefix' => 'recruiters'], function () {
      Route::get('/list', [RecruitersController::class, 'recruitersList'])->name('recruiters_list');
      Route::get('/view/{id}', [RecruitersController::class, 'viewRecruiter'])->name('view_recruiter');
      Route::get('/edit/{id}', [RecruitersController::class, 'editRecruiter'])->name('edit_recruiter');
      Route::post('/update', [RecruitersController::class, 'updateRecruiter'])->name('update_recruiter');
      Route::post('/delete', [RecruitersController::class, 'deleteRecruiter'])->name('delete_recruiter');
      Route::get('/deleted', [RecruitersController::class, 'deletedRecruitersList'])->name('deleted_recruiters_list');
      Route::post('/restore', [RecruitersController::class, 'restoreRecruiter'])->name('restore_recruiter');
    });

    Route::group(['prefix' => 'admins'], function () {
      Route::get('/list', [AdminsController::class, 'adminsList'])->name('admins_list');
      Route::get('/view/{id}', [AdminsController::class, 'viewAdmin'])->name('view_admin');
      Route::get('/edit/{id}', [AdminsController::class, 'editAdmin'])->name('edit_admin');
      Route::post('/update', [AdminsController::class, 'updateAdmin'])->name('update_admin');
      Route::post('/delete', [AdminsController::class, 'deleteAdmin'])->name('delete_admin');
      Route::get('/deleted', [AdminsController::class, 'deletedAdminsList'])->name('deleted_admins_list');
      Route::post('/restore', [AdminsController::class, 'restoreAdmin'])->name('restore_admin');
      Route::get('/add', [AdminsController::class, 'addAdmin'])->name('add_admin');
      Route::post('/save', [AdminsController::class, 'saveAdmin'])->name('save_admin');
    });

    // Recruiters Routes
    Route::group(['prefix' => 'jobs'], function () {
      Route::get('/bookmarked_jobs', [JobsController::class, 'bookmarkedJobs'])->name('bookmarked_jobs');
      Route::get('/published_jobs', [JobsController::class, 'publishedJobsList'])->name('published_jobs');
    });

    // Content Pages Routes
    Route::group(['prefix' => 'content'], function () {
      Route::get('/website', [ContentController::class, 'websitePagesList'])->name('content_website');
      Route::get('/mobile', [ContentController::class, 'mobilePagesList'])->name('content_mobile');
      Route::get('/edit/{id}', [ContentController::class, 'editPagesContentView'])->name('edit_content');
      Route::post('/update', [ContentController::class, 'updateContent'])->name('update_content');
      /* Route::get('/add', [ContentController::class, 'addPagesContentView'])->name('add_content');
      Route::post('/save', [ContentController::class, 'saveContent'])->name('save_content'); */
    });

    // Roles Routes
    Route::group(['prefix' => 'roles'], function () {
      Route::get('/list', [RolesController::class, 'rolesList'])->name('roles_list');
      Route::get('/add', [RolesController::class, 'addRole'])->name('add_role');
      Route::post('/save', [RolesController::class, 'saveRole'])->name('save_role');
      Route::get('/delete', [RolesController::class, 'deleteRole'])->name('delete_role');
    });

  });

});

Auth::routes([
  'register' => false,
  'reset' => false,
  'verify' => false,
]);
