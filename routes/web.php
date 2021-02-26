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
use App\Http\Controllers\MiscController;
use App\Http\Controllers\CreditsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\TicketsController;

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
  return redirect()->route('login');
  // return view('welcome');
});

Route::middleware(['auth:admin'])->group(function () {
  
  // Admin Panel Routes
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
      Route::get('/edit/{id}', [OrganizationsController::class, 'editCustomer'])->name('edit_customer');
      Route::post('/update', [OrganizationsController::class, 'updateCustomer'])->name('update_customer');
      Route::post('/delete', [OrganizationsController::class, 'deleteCustomers'])->name('delete_customer');
      Route::post('/restore', [OrganizationsController::class, 'restoreCustomer'])->name('restore_customer');
      Route::get('/check_email', [OrganizationsController::class, 'checkEmail'])->name('check_email');
      Route::get('/add', [OrganizationsController::class, 'addCustomer'])->name('add_customer');
      Route::post('/save', [OrganizationsController::class, 'saveCustomer'])->name('save_customer');
    });

    // Jobseekers Routes
    Route::group(['prefix' => 'users'], function () {
      Route::group(['prefix' => 'jobseekers'], function () {
        Route::get('/list', [JobSeekersController::class, 'jobseekersList'])->name('jobseekers_list');
        Route::get('/view/{id}', [JobSeekersController::class, 'viewJobseeker'])->name('view_jobseeker');
        Route::get('/edit/{id}', [JobSeekersController::class, 'editJobseeker'])->name('edit_jobseeker');
        Route::post('/update', [JobSeekersController::class, 'updateJobseeker'])->name('update_jobseeker');
        Route::post('/delete', [JobSeekersController::class, 'deleteJobseeker'])->name('delete_jobseeker');
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
        Route::post('/restore', [RecruitersController::class, 'restoreRecruiter'])->name('restore_recruiter');
        Route::get('/add', [RecruitersController::class, 'addRecruiter'])->name('add_recruiter');
        Route::post('/save', [RecruitersController::class, 'saveRecruiter'])->name('save_recruiter');
      });

      // Admins Routes
      Route::group(['prefix' => 'admins'], function () {
        Route::get('/list', [AdminsController::class, 'adminsList'])->name('admins_list');
        Route::get('/view/{id}', [AdminsController::class, 'viewAdmin'])->name('view_admin');
        Route::get('/edit/{id}', [AdminsController::class, 'editAdmin'])->name('edit_admin');
        Route::post('/update', [AdminsController::class, 'updateAdmin'])->name('update_admin');
        Route::post('/delete', [AdminsController::class, 'deleteAdmin'])->name('delete_admin');
        Route::post('/restore', [AdminsController::class, 'restoreAdmin'])->name('restore_admin');
        Route::get('/add', [AdminsController::class, 'addAdmin'])->name('add_admin');
        Route::post('/save', [AdminsController::class, 'saveAdmin'])->name('save_admin');
      });
    });

    // Recycle bin Routes
    Route::group(['prefix' => 'recycle_bin'], function () {
      Route::group(['prefix' => 'customers'], function () {
        Route::get('/deleted', [OrganizationsController::class, 'deletedCustomersList'])->name('deleted_customers_list');
      });
      Route::group(['prefix' => 'jobseekers'], function () {
        Route::get('/deleted', [JobSeekersController::class, 'deletedJobseekersList'])->name('deleted_jobseekers_list');
      });
      Route::group(['prefix' => 'recruiters'], function () {
        Route::get('/deleted', [RecruitersController::class, 'deletedRecruitersList'])->name('deleted_recruiters_list');
      });
      Route::group(['prefix' => 'admins'], function () {
        Route::get('/deleted', [AdminsController::class, 'deletedAdminsList'])->name('deleted_admins_list');
      });
      Route::group(['prefix' => 'jobs'], function () {
        Route::get('/deleted', [JobsController::class, 'deletedJobs'])->name('deleted_jobs_list');
      });
      Route::group(['prefix' => 'job_industries'], function () {
        Route::get('/deleted', [MiscController::class, 'deletedJobIndustries'])->name('deleted_job_industries');
      });
      Route::group(['prefix' => 'job_functions'], function () {
        Route::get('/deleted', [MiscController::class, 'deletedJobFunctions'])->name('deleted_job_functions');
      });
      Route::group(['prefix' => 'job_locations'], function () {
        Route::get('/deleted', [MiscController::class, 'deletedJobLocations'])->name('deleted_job_locations');
      });
      Route::group(['prefix' => 'skills'], function () {
        Route::get('/deleted', [MiscController::class, 'deletedskills'])->name('deleted_skills');
      });
    });

    // Jobs Routes
    Route::group(['prefix' => 'jobs'], function () {
      Route::get('/list', [JobsController::class, 'jobsList'])->name('jobs_list');
      Route::get('/add', [JobsController::class, 'addJob'])->name('add_job');
      Route::post('/save', [JobsController::class, 'saveJob'])->name('save_job');
      Route::post('/delete', [JobsController::class, 'deleteJob'])->name('delete_job');
      Route::post('/restore', [JobsController::class, 'restoreJob'])->name('restore_job');
      Route::get('/view/{id}', [JobsController::class, 'viewJob'])->name('view_job');
      Route::get('/edit/{id}', [JobsController::class, 'editJob'])->name('edit_job');
      Route::post('/update', [JobsController::class, 'updateJob'])->name('update_job');
      /* Route::get('/bookmarked', [JobsController::class, 'bookmarkedJobs'])->name('bookmarked_jobs'); */
    });

    // Recycle bin Routes
    Route::group(['prefix' => 'misc'], function () {
      Route::get('/check_if_exists', [MiscController::class, 'checkIfExists'])->name('check_if_exists');
      Route::group(['prefix' => 'job_industries'], function () {
        Route::get('/list', [MiscController::class, 'jobIndustriesList'])->name('job_industries_list');
        Route::get('/add', [MiscController::class, 'addJobIndustry'])->name('add_job_industry');
        Route::post('/save', [MiscController::class, 'saveJobIndustry'])->name('save_job_industry');
        Route::get('/view/{id}', [MiscController::class, 'viewJobIndustry'])->name('view_job_industry');
        Route::get('/edit/{id}', [MiscController::class, 'editJobIndustry'])->name('edit_job_industry');
        Route::post('/update', [MiscController::class, 'updateJobIndustry'])->name('update_job_industry');
        Route::post('/delete', [MiscController::class, 'deleteJobIndustry'])->name('delete_job_industry');
        Route::post('/restore', [MiscController::class, 'restoreJobIndustry'])->name('restore_job_industry');
      });
      Route::group(['prefix' => 'job_functions'], function () {
        Route::get('/list', [MiscController::class, 'jobFunctionsList'])->name('job_functions_list');
        Route::get('/add', [MiscController::class, 'addJobFunction'])->name('add_job_function');
        Route::post('/save', [MiscController::class, 'saveJobFunction'])->name('save_job_function');
        Route::get('/view/{id}', [MiscController::class, 'viewJobFunction'])->name('view_job_function');
        Route::get('/edit/{id}', [MiscController::class, 'editJobFunction'])->name('edit_job_function');
        Route::post('/update', [MiscController::class, 'updateJobFunction'])->name('update_job_function');
        Route::post('/delete', [MiscController::class, 'deleteJobFunction'])->name('delete_job_function');
        Route::post('/restore', [MiscController::class, 'restoreJobFunction'])->name('restore_job_function');
      });
      Route::group(['prefix' => 'skills'], function () {
        Route::get('/list', [MiscController::class, 'skillsList'])->name('skills_list');
        Route::get('/add', [MiscController::class, 'addSkill'])->name('add_skill');
        Route::post('/save', [MiscController::class, 'saveSkill'])->name('save_skill');
        Route::get('/view/{id}', [MiscController::class, 'viewSkill'])->name('view_skill');
        Route::get('/edit/{id}', [MiscController::class, 'editSkill'])->name('edit_skill');
        Route::post('/update', [MiscController::class, 'updateSkill'])->name('update_skill');
        Route::post('/delete', [MiscController::class, 'deleteSkill'])->name('delete_skill');
        Route::post('/restore', [MiscController::class, 'restoreSkill'])->name('restore_skill');
      });
      Route::group(['prefix' => 'job_locations'], function () {
        Route::get('/list', [MiscController::class, 'jobLocationsList'])->name('job_locations_list');
        Route::get('/add', [MiscController::class, 'addJobLocation'])->name('add_job_location');
        Route::post('/save', [MiscController::class, 'saveJobLocation'])->name('save_job_location');
        Route::get('/view/{id}', [MiscController::class, 'viewJobLocation'])->name('view_job_location');
        Route::get('/edit/{id}', [MiscController::class, 'editJobLocation'])->name('edit_job_location');
        Route::post('/update', [MiscController::class, 'updateJobLocation'])->name('update_job_location');
        Route::post('/delete', [MiscController::class, 'deleteJobLocation'])->name('delete_job_location');
        Route::post('/restore', [MiscController::class, 'restoreJobLocation'])->name('restore_job_location');
      });
    });

    // Credit Management Pages Routes
    Route::group(['prefix' => 'credits'], function () {
      Route::get('/list', [CreditsController::class, 'companyCreditsList'])->name('company_credits_list');
      Route::get('/view/{id}', [CreditsController::class, 'viewCompanyCredit'])->name('view_company_credit');
      Route::get('/add', [CreditsController::class, 'addCompanyCredit'])->name('add_company_credit');
      Route::post('/save', [CreditsController::class, 'saveCompanyCredit'])->name('save_company_credit');
    });

    // Credits History Pages Routes
    Route::group(['prefix' => 'credits_history'], function () {
      Route::get('/list', [CreditsController::class, 'creditsHistory'])->name('credits_history');
      Route::get('/view/{id}', [CreditsController::class, 'viewCreditHistory'])->name('view_credit_history');
    });

    // Payments History Pages Routes
    Route::group(['prefix' => 'payment_transactions'], function () {
      Route::get('/list', [PaymentsController::class, 'paymentTransactionsList'])->name('payment_transactions_list');
      Route::get('/view/{id}', [PaymentsController::class, 'viewPaymentTransaction'])->name('view_payment_transaction');
    });

    // Tickets Pages Routes
    Route::group(['prefix' => 'tickets'], function () {
      Route::get('/list', [TicketsController::class, 'ticketsList'])->name('tickets_list');
      Route::get('/view/{id}', [TicketsController::class, 'viewTicket'])->name('view_ticket');
      Route::post('/close', [TicketsController::class, 'closeTicket'])->name('close_ticket');
      Route::post('/open', [TicketsController::class, 'openTicket'])->name('open_ticket');
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
