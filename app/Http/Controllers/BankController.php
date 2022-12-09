<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\SavingAccount;
use App\Models\Loan;

class BankController extends Controller
{
    public function banks(){
        $banks = Bank::where('status',Bank::ACTIVE)->get();
    	return view('banks.index')->with([
            'banks' => $banks
        ]);
    }

    public function addBank(){
    	return view('banks.add');
    }

    public function editBank($id){
        $bank = Bank::find($id);
        return view('banks.edit')->with([
            'bank' => $bank
        ]);
    }

    public function saveBank(Request $request){
        try{
            $bank = new Bank;
            $bank->name = $request->name;
            
            if ($request->file("logo")) {
                $logo = $request->file("logo");
                $file_name = time() . "." . $logo->getClientOriginalExtension();
                $logo->move("banks/", $file_name);

                $bank->logo = $file_name;
            }

            $bank->save();

            return redirect()->route('banks')->with('success','Bank added successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function updateBank(Request $request){
        try{
            $bank = Bank::find($request->id);
            $bank->name = $request->name;
            $bank->status = $request->status;

            if ($request->file("logo")) {

                if(file_exists("banks/".$bank->logo)){
                    unlink("banks/".$bank->logo);
                }

                $logo = $request->file("logo");
                $file_name = time() . "." . $logo->getClientOriginalExtension();
                $logo->move("banks/", $file_name);

                $bank->logo = $file_name;
            }

            $bank->save();

            return redirect()->route('banks')->with('success','Bank updated successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function deleteBank(Request $request){
        try{
            $bank = Bank::find($request->id);
            $bank->delete();

            return response()->json([
                'status' => true,
                'message' => 'Bank deleted successfully!'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile()
            ],200);
        }
    }
}
