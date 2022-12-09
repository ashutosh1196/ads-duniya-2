<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreditCardType;
use App\Models\CreditCard;
use App\Models\Bank;

class CreditCardController extends Controller
{
    public function creditCardTypes(){
        $credit_card_types = CreditCardType::all();
    	return view('credit_card_types.index')->with([
            'credit_card_types' => $credit_card_types
        ]);
    }

    public function addCreditCardType(){
    	return view('credit_card_types.add');
    }

    public function editCreditCardType($id){
        $credit_card_type = CreditCardType::find($id);
        return view('credit_card_types.edit')->with([
            'credit_card_type' => $credit_card_type
        ]);
    }

    public function saveCreditCardType(Request $request){
        try{
            $credit_card_type = new CreditCardType;
            $credit_card_type->name = $request->name;

            $credit_card_type->save();

            return redirect()->route('credit-card-types')->with('success','Credit Card Type added successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function updateCreditCardType(Request $request){
        try{
            $credit_card_type = CreditCardType::find($request->id);
            $credit_card_type->name = $request->name;
            $credit_card_type->status = $request->status;

            $credit_card_type->save();

            return redirect()->route('credit-card-types')->with('success','Credit Card Type updated successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function deleteCreditCardType(Request $request){
        try{
            $credit_card_type = CreditCardType::find($request->id);
            $credit_card_type->delete();

            return response()->json([
                'status' => true,
                'message' => 'Credit Card Type deleted successfully!'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile()
            ],200);
        }
    }


    // credit card
    public function creditCards(){
        $credit_cards = CreditCard::all();
        return view('credit_cards.index')->with([
            'credit_cards' => $credit_cards
        ]);
    }

    public function addCreditCard(){
        $types = CreditCardType::where('status',CreditCardType::ACTIVE)->get();
        $banks = Bank::where('status',Bank::ACTIVE)->get();
        return view('credit_cards.add')->with([
            'types' => $types,
            'banks' => $banks,
        ]);
    }

    public function editCreditCard($id){
        $types = CreditCardType::where('status',CreditCardType::ACTIVE)->get();
        $banks = Bank::where('status',Bank::ACTIVE)->get();
        $credit_card = CreditCard::find($id);
        return view('credit_cards.edit')->with([
            'credit_card' => $credit_card,
            'types' => $types,
            'banks' => $banks,
        ]);
    }

    public function saveCreditCard(Request $request){
        try{
            $credit_card = new CreditCard;
            $credit_card->name = $request->name;
            $credit_card->type = $request->type;
            $credit_card->bank_id = $request->bank_id;
            $credit_card->annual_fee = $request->annual_fee;
            $credit_card->joining_fee = $request->joining_fee;
            $credit_card->details = $request->content;
            $credit_card->apply_url = $request->apply_url;

            if ($request->file("image")) {

                $image = $request->file("image");
                $file_name = time() . "." . $image->getClientOriginalExtension();
                $image->move("credit-cards/", $file_name);

                $credit_card->image = $file_name;
            }

            $credit_card->save();

            return redirect()->route('credit-cards')->with('success','Credit Card added successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function updateCreditCard(Request $request){
        try{
            $credit_card = CreditCard::find($request->id);
            $credit_card->name = $request->name;
            $credit_card->type = $request->type;
            $credit_card->bank_id = $request->bank_id;
            $credit_card->annual_fee = $request->annual_fee;
            $credit_card->joining_fee = $request->joining_fee;
            $credit_card->details = $request->content;
            $credit_card->apply_url = $request->apply_url;
            $credit_card->status = $request->status;

            if ($request->file("image")) {
                
                if(file_exists("credit-cards/".$credit_card->image)){
                    unlink("credit-cards/".$credit_card->image);
                }

                $image = $request->file("image");
                $file_name = time() . "." . $image->getClientOriginalExtension();
                $image->move("credit-cards/", $file_name);

                $credit_card->image = $file_name;
            }

            $credit_card->save();

            return redirect()->route('credit-cards')->with('success','Credit Card updated successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function deleteCreditCard(Request $request){
        try{
            $credit_card = CreditCard::find($request->id);
            $credit_card->delete();

            return response()->json([
                'status' => true,
                'message' => 'Credit Card deleted successfully!'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile()
            ],200);
        }
    }
}
