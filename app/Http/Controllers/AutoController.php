<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutoSeller;
use App\Models\Auto;

class AutoController extends Controller
{
    public function autoSeller(){
        $sellers = AutoSeller::all();
        return view('auto-sellers.index')->with([
            'sellers' => $sellers
        ]);
    }

    public function addAutoSeller(){
        return view('auto-sellers.add');
    }

    public function editAutoSeller($id){
        $seller = AutoSeller::find($id);
        return view('auto-sellers.edit')->with([
            'seller' => $seller
        ]);
    }

    public function saveAutoSeller(Request $request){
        try{
            $seller = new AutoSeller;
            $seller->name = $request->name;
            
            if ($request->file("logo")) {
                $logo = $request->file("logo");
                $file_name = time() . "." . $logo->getClientOriginalExtension();
                $logo->move("seller/", $file_name);

                $seller->logo = $file_name;
            }

            $seller->save();

            return redirect()->route('auto-seller.list')->with('success','Seller added successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function updateAutoSeller(Request $request){
        try{
            $seller = AutoSeller::find($request->id);
            $seller->name = $request->name;
            
            if ($request->file("logo")) {

                if(file_exists("seller/".$seller->logo)){
                    unlink("seller/".$seller->logo);
                }

                $logo = $request->file("logo");
                $file_name = time() . "." . $logo->getClientOriginalExtension();
                $logo->move("seller/", $file_name);

                $seller->logo = $file_name;
            }

            $seller->save();

            return redirect()->route('auto-seller.list')->with('success','Seller updated successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function deleteAutoSeller(Request $request){
        try{
            $bank = AutoSeller::find($request->id);
            $bank->delete();

            return response()->json([
                'status' => true,
                'message' => 'Seller deleted successfully!'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile()
            ],200);
        }
    }

    // auto
    public function auto(){
        $autos = Auto::all();
        return view('auto.index')->with([
            'autos' => $autos
        ]);
    }

    public function addAuto(){
        $sellers = AutoSeller::all();
        return view('auto.add')->with([
            'sellers' => $sellers
        ]);
    }

    public function editAuto($id){
        $auto = Auto::find($id);
        $sellers = AutoSeller::all();
        return view('auto.edit')->with([
            'auto' => $auto,
            'sellers' => $sellers
        ]);
    }

    public function saveAuto(Request $request){

        try{
            $auto = new Auto;
            $auto->title = $request->name;
            $auto->seller_id = $request->seller;
            $auto->inspection_charge = $request->inspection_charge;
            $auto->time_duration = $request->time_duration;
            $auto->apply_url = $request->apply_url;
            $auto->details = $request->content;

            $auto->save();

            return redirect()->route('auto.list')->with('success','Auto added successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function updateAuto(Request $request){
        try{
            $auto = Auto::find($request->id);
            $auto->title = $request->name;
            $auto->seller_id = $request->seller;
            $auto->inspection_charge = $request->inspection_charge;
            $auto->time_duration = $request->time_duration;
            $auto->apply_url = $request->apply_url;
            $auto->details = $request->content;

            $auto->save();

            return redirect()->route('auto.list')->with('success','Auto updated successfully!');

        }catch(\Exception $e){

            return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in filen '.$e->getFile());
        }
    }

    public function deleteAuto(Request $request){
        try{
            $auto = Auto::find($request->id);
            $auto->delete();

            return response()->json([
                'status' => true,
                'message' => 'Auto deleted successfully!'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile()
            ],200);
        }
    }
}
