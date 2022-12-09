<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\MiscController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\BlogController;


Route::get('/', function () {
  return redirect()->route('login');
})->name('admin_home');


Route::middleware(['auth:admin'])->group(function () {
  
  Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

  Route::group(['prefix' => 'banks'], function () {
    Route::get('/list', [BankController::class, 'banks'])->name('banks');
    Route::get('/add', [BankController::class, 'addBank'])->name('banks.add');
    Route::get('/edit/{id}', [BankController::class, 'editBank'])->name('banks.edit');
    Route::post('/save', [BankController::class, 'saveBank'])->name('banks.save');
    Route::post('/update', [BankController::class, 'updateBank'])->name('banks.update');
    Route::post('/delete', [BankController::class, 'deleteBank'])->name('banks.delete');
  });

  Route::group(['prefix' => 'saving-accounts'], function () {
    Route::get('/list', [AccountController::class, 'savingAccounts'])->name('saving-accounts');
    Route::get('/add', [AccountController::class, 'addSavingAccount'])->name('saving-accounts.add');
    Route::get('/edit/{id}', [AccountController::class, 'editSavingAccount'])->name('saving-accounts.edit');
    Route::post('/save', [AccountController::class, 'saveSavingAccount'])->name('saving-accounts.save');
    Route::post('/update', [AccountController::class, 'updateSavingAccount'])->name('saving-accounts.update');
    Route::post('/delete', [AccountController::class, 'deleteSavingAccount'])->name('saving-accounts.delete');
  });

  Route::group(['prefix' => 'loans'], function () {
    Route::get('/list', [AccountController::class, 'loans'])->name('loans');
    Route::get('/add', [AccountController::class, 'addloan'])->name('loans.add');
    Route::get('/edit/{id}', [AccountController::class, 'editloan'])->name('loans.edit');
    Route::post('/save', [AccountController::class, 'saveloan'])->name('loans.save');
    Route::post('/update', [AccountController::class, 'updateloan'])->name('loans.update');
    Route::post('/delete', [AccountController::class, 'deleteloan'])->name('loans.delete');
  });

  Route::group(['prefix' => 'credit-card-types'], function () {
    Route::get('/list', [CreditCardController::class, 'creditCardTypes'])->name('credit-card-types');
    Route::get('/add', [CreditCardController::class, 'addCreditCardType'])->name('credit-card-types.add');
    Route::get('/edit/{id}', [CreditCardController::class, 'editCreditCardType'])->name('credit-card-types.edit');
    Route::post('/save', [CreditCardController::class, 'saveCreditCardType'])->name('credit-card-types.save');
    Route::post('/update', [CreditCardController::class, 'updateCreditCardType'])->name('credit-card-types.update');
    Route::post('/delete', [CreditCardController::class, 'deleteCreditCardType'])->name('credit-card-types.delete');
  });

  Route::group(['prefix' => 'credit-cards'], function () {
    Route::get('/list', [CreditCardController::class, 'creditCards'])->name('credit-cards');
    Route::get('/add', [CreditCardController::class, 'addCreditCard'])->name('credit-cards.add');
    Route::get('/edit/{id}', [CreditCardController::class, 'editCreditCard'])->name('credit-cards.edit');
    Route::post('/save', [CreditCardController::class, 'saveCreditCard'])->name('credit-cards.save');
    Route::post('/update', [CreditCardController::class, 'updateCreditCard'])->name('credit-cards.update');
    Route::post('/delete', [CreditCardController::class, 'deleteCreditCard'])->name('credit-cards.delete');
  });

  Route::group(['prefix' => 'mutual-funds'], function () {
    Route::get('/list', [InvestmentController::class, 'mutualFunds'])->name('mutual-funds');
    Route::get('/add', [InvestmentController::class, 'addMutualFund'])->name('mutual-funds.add');
    Route::get('/edit/{id}', [InvestmentController::class, 'editMutualFund'])->name('mutual-funds.edit');
    Route::post('/save', [InvestmentController::class, 'saveMutualFund'])->name('mutual-funds.save');
    Route::post('/update', [InvestmentController::class, 'updateMutualFund'])->name('mutual-funds.update');
    Route::post('/delete', [InvestmentController::class, 'deleteMutualFund'])->name('mutual-funds.delete');
  });

  Route::group(['prefix' => 'demat'], function () {
    Route::get('/list', [InvestmentController::class, 'demats'])->name('demats');
    Route::get('/add', [InvestmentController::class, 'addDemat'])->name('demats.add');
    Route::get('/edit/{id}', [InvestmentController::class, 'editDemat'])->name('demats.edit');
    Route::post('/save', [InvestmentController::class, 'saveDemat'])->name('demats.save');
    Route::post('/update', [InvestmentController::class, 'updateDemat'])->name('demats.update');
    Route::post('/delete', [InvestmentController::class, 'deleteDemat'])->name('demats.delete');
  });

  Route::group(['prefix' => 'blogs'], function () {
    Route::get('/list', [BlogController::class, 'blogs'])->name('blogs');
    Route::get('/add', [BlogController::class, 'addBlog'])->name('blogs.add');
    Route::get('/edit/{id}', [BlogController::class, 'editBlog'])->name('blogs.edit');
    Route::post('/save', [BlogController::class, 'saveBlog'])->name('blogs.save');
    Route::post('/update', [BlogController::class, 'updateBlog'])->name('blogs.update');
    Route::post('/delete', [BlogController::class, 'deleteBlog'])->name('blogs.delete');
  });

  Route::group(['prefix' => 'choose-us'], function () {
    Route::get('/list', [BlogController::class, 'chooseUs'])->name('choose-us');
    Route::get('/edit/{id}', [BlogController::class, 'editChooseUs'])->name('choose-us.edit');
    Route::post('/update', [BlogController::class, 'updateChooseUs'])->name('choose-us.update');
  });

});

Auth::routes([
  'register' => false,
  'reset' => false,
  'verify' => false,
]);