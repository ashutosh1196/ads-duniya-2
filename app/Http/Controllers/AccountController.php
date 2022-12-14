<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\SavingAccount;
use App\Models\Loan;

class AccountController extends Controller
{
    public function savingAccounts(){
        $saving_accounts = SavingAccount::all();
        return view('saving-account.index')->with([
            'saving_accounts' => $saving_accounts
        ]);
    }

    public function addSavingAccount(){
        $banks = Bank::where('status',Bank::ACTIVE)->get();
        return view('saving-account.add')->with([
            'banks' => $banks
        ]);
    }

    public function editSavingAccount($id){
        $saving_account = SavingAccount::find($id);
        $banks = Bank::where('status',Bank::ACTIVE)->get();
        return view('saving-account.edit')->with([
            'banks' => $banks,
            'saving_account' => $saving_account
        ]); 
    }

    public function saveSavingAccount(Request $request){
        try{
            $saving_account = new SavingAccount;
            $saving_account->bank_id = $request->bank;
            $saving_account->name = $request->name;
            $saving_account->opening_charge = $request->opening_charge;
            $saving_account->minimum_balance = $request->minimum_balance;
            $saving_account->interest_rate = $request->interest_rate;
            $saving_account->apply_url = $request->apply_url;
            $saving_account->details = $request->content;

            $saving_account->save();

            return redirect()->route('saving-accounts')->with('success','Saving account added successfully!');

        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile());
        }
    }

    public function updateSavingAccount(Request $request){
        try{
            $saving_account = SavingAccount::find($request->id);
            $saving_account->bank_id = $request->bank;
            $saving_account->name = $request->name;
            $saving_account->opening_charge = $request->opening_charge;
            $saving_account->minimum_balance = $request->minimum_balance;
            $saving_account->interest_rate = $request->interest_rate;
            $saving_account->apply_url = $request->apply_url;
            $saving_account->details = $request->content;
            $saving_account->is_trending = $request->trending;

            $saving_account->save();

            return redirect()->route('saving-accounts')->with('success','Saving account updated successfully!');

        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile());
        }
    }

    public function deleteSavingAccount(Request $request){
        try{
            $bank = SavingAccount::find($request->id);
            $bank->delete();

            return response()->json([
                'status' => true,
                'message' => 'Saving account deleted successfully!'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile()
            ],200);
        }
    }

    // LOANS
    public function loans(){
        $loans = Loan::all();
        return view('loans.index')->with([
            'loans' => $loans
        ]);
    }

    public function addLoan(){
        $banks = Bank::where('status',Bank::ACTIVE)->get();
        return view('loans.add')->with([
            'banks' => $banks
        ]);
    }

    public function editLoan($id){
        $loan = Loan::find($id);
        $banks = Bank::where('status',Bank::ACTIVE)->get();
        return view('loans.edit')->with([
            'banks' => $banks,
            'loan' => $loan
        ]); 
    }

    public function saveLoan(Request $request){
        try{
            $loan = new Loan;
            $loan->bank_id = $request->bank;
            $loan->name = $request->name;
            $loan->type = $request->type;
            $loan->interest_rate = $request->interest_rate;
            $loan->processing_fee = $request->processing_fee;
            $loan->tenure_range = $request->tenure_range;
            $loan->apply_url = $request->apply_url;
            $loan->details = $request->content;

            $loan->save();

            return redirect()->route('loans')->with('success','Loan added successfully!');

        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile());
        }
    }

    public function updateLoan(Request $request){
        try{
            $loan = Loan::find($request->id);
            $loan->bank_id = $request->bank;
            $loan->name = $request->name;
            $loan->type = $request->type;
            $loan->interest_rate = $request->interest_rate;
            $loan->processing_fee = $request->processing_fee;
            $loan->tenure_range = $request->tenure_range;
            $loan->apply_url = $request->apply_url;
            $loan->details = $request->content;
            $loan->is_trending = $request->trending;

            $loan->save();

            return redirect()->route('loans')->with('success','Loan updated successfully!');

        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile());
        }
    }

    public function deleteLoan(Request $request){
        try{
            $loan = Loan::find($request->id);
            $loan->delete();

            return response()->json([
                'status' => true,
                'message' => 'Loan deleted successfully!'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile()
            ],200);
        }
    }
}
