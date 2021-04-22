<?php

namespace App\Http\Controllers;
use App\Models\MdBrand;
use App\Models\MdModel;
use App\Models\MdDropdown;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function addMake() {
		    $type = MdDropdown::where('belongs_to','make_type')->get();
			return view('vehicle/make_vehicle/add_make_vehicle')->with('type',$type);
		
	}
	public function saveMake(Request $request) {
       
		$validatedData = $request->validate([
			'english' => 'required',
			'haitian' => 'required',
			'french' => 'required',
			'estonia' => 'required',
			'type' => 'required',
		], [
			'english.required' => 'The English Language is required.',
			'haitian.required' => 'The Haitian Language is required.',
			'french.required' => 'The French Language is required.',
			'estonia.required' => 'The Estonia Language is required.',
			'type.required' => 'The Vehicle Brand is required.',
		]);
		$slugTrimmed = str_replace(' ', '_', $request->english);
		$makeSlug = strtolower($slugTrimmed);;
      $brand = new MdBrand;
      $brand->brand_name_en = $request->english;
       $brand->brand_name_ht = $request->haitian;
        $brand->brand_name_fr = $request->french;
         $brand->brand_name_es = $request->estonia;
          $brand->brand_for = $request->type;
          $brand->created_by = 1;
          $brand->brand_slug = $makeSlug;
          $brand->status = $request->status;
          if($brand->save()){
          	$makeList = MdBrand::orderByDesc('id')->get();
			return redirect()->route('make-list',[ 'makeList' => $makeList ])->with('success', 'Make Added Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
		
	}
	public function makeList() {
		 $makeList = MdBrand::orderByDesc('id')->get();
			return view('vehicle/make_vehicle/make_vehicle_list', [ 'makeList' => $makeList ]);
		
	}
	public function viewMake($id) {
		 $makeList = MdBrand::where('id', $id)->get();

			return view('vehicle/make_vehicle/view_make_vehicle', [ 'makeList' => $makeList ]);
			
	}
	public function editMake($id) {
			$type = MdDropdown::where('belongs_to','make_type')->get();
			$editmake = MdBrand::where('id', $id)->get();
			return view('vehicle/make_vehicle/edit_make_vehicle', [ 'editmake' => $editmake ,'type'=>$type]);
	
		
	}
	public function updateMake(Request $request) {
       
		$validatedData = $request->validate([
			'english' => 'required',
			'haitian' => 'required',
			'french' => 'required',
			'estonia' => 'required',
			'type' => 'required',
		], [
			'english.required' => 'The English Language is required.',
			'haitian.required' => 'The Haitian Language is required.',
			'french.required' => 'The French Language is required.',
			'estonia.required' => 'The Estonia Language is required.',
			'type.required' => 'The Vehicle Brand is required.',
		]);
		$slugTrimmed = str_replace(' ', '_', $request->english);
		$makeSlug = strtolower($slugTrimmed);;
      $makeId = $request->id;
      $make = [
			'brand_name_en' => $request->english,
			'brand_name_ht' => $request->haitian,
			'brand_name_fr' => $request->french,
			'brand_name_es' => $request->estonia,
			'brand_for' => $request->type,
			'created_by' => 1,
			'brand_slug' => $makeSlug,
			'status' => $request->status,
		];
		$makeUpdate = MdBrand::where('id', $makeId)->update($make);
     
          if($makeUpdate){
          	$makeList = MdBrand::all();
			return view('vehicle/make_vehicle/make_vehicle_list',[ 'makeList' => $makeList ])->with('success', 'Make Updated Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
         

		
	}
	public function deleteMake(Request $request) {
		$makeId = $request->id;
		$deleteMake = MdBrand::where('id', $makeId)->delete();
		if($deleteMake) {
			$makeList = MdBrand::all();
			$res['success'] = 1;
			$res['data'] = $makeList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}
	public function getMake(Request $request){
		//return $request->brand_id;
       $models = MdBrand::where('brand_for',$request->brand_id)->get();
       $res['status'] = true;
       $res['data'] = $models;
       return $res;
   }
	public function addModel() {
		 //    $make = MdBrand::all();
			// return view('vehicle/model_vehicle/add_model_vehicle',['make' => $make]);
			$type = MdDropdown::where('belongs_to','make_type')->get();
			return view('vehicle/model_vehicle/add_model_vehicle')->with('type',$type);
		
	}
	public function saveModel(Request $request) {
        
        //print_r($request->english);die;
		$validatedData = $request->validate([
			'english' => 'required',
			'haitian' => 'required',
			'french' => 'required',
			'estonia' => 'required',
		], [
			'english.required' => 'The English Language is required.',
			'haitian.required' => 'The Haitian Language is required.',
			'french.required' => 'The French Language is required.',
			'estonia.required' => 'The Estonia Language is required.',
			
		]);
		$slugTrimmed = str_replace(' ', '_', $request->english);
		$makeSlug = strtolower($slugTrimmed);
      $model = new MdModel;
      $model->model_name_en = $request->english;
       $model->model_name_ht = $request->haitian;
        $model->model_name_fr = $request->french;
         $model->model_name_es = $request->estonia;
          $model->brand_id = $request->make;
          $model->value = strtolower($request->english);
          $model->slug = $makeSlug;
          if($model->save()){
          	$modelList = MdModel::orderByDesc('id')->with('make')->get();
			return redirect()->route('model-list',[ 'modelList' => $modelList ])->with('success', 'Model Added Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}

		
	}
	public function modelList() {
		
		  $modelList = MdModel::orderByDesc('id')->with('make')->get();
			return view('vehicle/model_vehicle/model_vehicle_list',[ 'modelList' => $modelList ]);
			
	}
	public function viewModel($id) {

		 $modelList = MdModel::where('id', $id)->get();

			return view('vehicle/model_vehicle/view_model_vehicle', [ 'modelList' => $modelList ]);
			
	}
	public function editModel($id) {
		
			$editmodel = MdModel::where('id', $id)->get();
			$make = MdBrand::all();
			return view('vehicle/model_vehicle/edit_model_vehicle', [ 'editmodel' => $editmodel,'make' => $make ]);
	
		
	}
	public function updateModel(Request $request) {
       
		$validatedData = $request->validate([
			'english' => 'required',
			'haitian' => 'required',
			'french' => 'required',
			'estonia' => 'required',
		], [
			'english.required' => 'The English Language is required.',
			'haitian.required' => 'The Haitian Language is required.',
			'french.required' => 'The French Language is required.',
			'estonia.required' => 'The Estonia Language is required.',
			
		]);
		$slugTrimmed = str_replace(' ', '_', $request->type);
		$makeSlug = strtolower($slugTrimmed);;
      $modelId = $request->id;
      $model = [
			'model_name_en' => $request->english,
			'model_name_ht' => $request->haitian,
			'model_name_fr' => $request->french,
			'model_name_es' => $request->estonia,
			'brand_id' => $request->make,
			'slug' => $makeSlug,
			'value' => strtolower($request->english),
		];
		$modelUpdate = MdModel::where('id', $modelId)->update($model);
     
          if($modelUpdate){
          	$modelList = MdModel::all();
			return view('vehicle/model_vehicle/model_vehicle_list',[ 'modelList' => $modelList ])->with('success', 'Model Updated Successfully');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
         

		
	}
	public function deleteModel(Request $request) {
		$modelId = $request->id;
		$deleteModel = MdModel::where('id', $modelId)->delete();
		if($deleteModel) {
			$modelList = MdModel::all();
			$res['success'] = 1;
			$res['data'] = $modelList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}
}
