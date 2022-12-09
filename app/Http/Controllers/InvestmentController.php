<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demat;
use App\Models\MutualFund;
use App\Models\Bank;

class InvestmentController extends Controller
{
    public function mutualFunds(){
    	$mutual_funds = MutualFund::all();
    	return view('mutual_funds.index')->with([
    		'mutual_funds' => $mutual_funds
    	]);
    }

    public function addMutualFund(){
    	$banks = Bank::where('status',Bank::ACTIVE)->get();
    	return view('mutual_funds.add')->with([
    		'banks' => $banks
    	]);
    }

    public function saveMutualFund(Request $request){
        try{

            $mutual_fund = new MutualFund;
            $mutual_fund->name = $request->name;
            $mutual_fund->category = $request->category;
            $mutual_fund->bank_id = $request->bank_id;
            $mutual_fund->minimum_investment = $request->minimum_investment;
            $mutual_fund->return = $request->return;
            $mutual_fund->apply_url = $request->apply_url;
            $mutual_fund->details = $request->content;

            $mutual_fund->save();

            return redirect()->route('mutual-funds')->with('success','Mutual Fund added successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function editMutualFund($id){
        $banks = Bank::where('status',Bank::ACTIVE)->get();
        $mutual_fund = MutualFund::find($id);
        return view('mutual_funds.edit')->with([
            'banks' => $banks,
            'mutual_fund' => $mutual_fund
        ]);
    }

    public function updateMutualFund(Request $request){
        try{

            $mutual_fund = MutualFund::find($request->id);
            $mutual_fund->name = $request->name;
            $mutual_fund->category = $request->category;
            $mutual_fund->bank_id = $request->bank_id;
            $mutual_fund->minimum_investment = $request->minimum_investment;
            $mutual_fund->return = $request->return;
            $mutual_fund->apply_url = $request->apply_url;
            $mutual_fund->details = $request->content;

            $mutual_fund->save();

            return redirect()->route('mutual-funds')->with('success','Mutual Fund updated successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function deleteMutualFund(Request $request){
        try{
            $mutual_fund = MutualFund::find($request->id);
            $mutual_fund->delete();

            return response()->json([
                'status' => true,
                'message' => 'Mutual Fund deleted successfully!'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile()
            ],200);
        }
    }


    // demat accounts
    public function demats(){
        $demats = Demat::all();
        return view('demats.index')->with([
            'demats' => $demats
        ]);
    }

    public function addDemat(){
        $banks = Bank::where('status',Bank::ACTIVE)->get();
        return view('demats.add')->with([
            'banks' => $banks
        ]);
    }

    public function saveDemat(Request $request){
        try{

            $demat = new Demat;
            $demat->name = $request->name;
            $demat->exchange = $request->exchange;
            $demat->trading_account_opening_fee = $request->trading_account_opening_fee;
            $demat->demat_account_opening_fee = $request->demat_account_opening_fee;
            $demat->bank_id = $request->bank_id;
            $demat->apply_url = $request->apply_url;
            $demat->details = $request->content;

            $demat->save();

            return redirect()->route('demats')->with('success','Demat info added successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function editDemat($id){
        $banks = Bank::where('status',Bank::ACTIVE)->get();
        $demat = Demat::find($id);
        return view('demats.edit')->with([
            'banks' => $banks,
            'demat' => $demat
        ]);
    }

    public function updateDemat(Request $request){
        try{

            $demat = Demat::find($request->id);
            $demat->name = $request->name;
            $demat->bank_id = $request->bank_id;
            $demat->exchange = $request->exchange;
            $demat->trading_account_opening_fee = $request->trading_account_opening_fee;
            $demat->demat_account_opening_fee = $request->demat_account_opening_fee;
            $demat->apply_url = $request->apply_url;
            $demat->details = $request->content;

            $demat->save();

            return redirect()->route('demats')->with('success','Demat updated successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function deleteDemat(Request $request){
        try{
            $demat = Demat::find($request->id);
            $demat->delete();

            return response()->json([
                'status' => true,
                'message' => 'Demat info deleted successfully!'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile()
            ],200);
        }
    }
}
