<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdBrand;
use App\Models\MdModel;
use App\Models\MdDropdown;
use App\Models\Inventory;
use App\Models\InventoryFile;

class SellController extends Controller
{
   public function addCar() {
		    $make = MdBrand::all();
		    $fuel_type = MdDropdown::where('belongs_to','fuel_type')->get();
		    $transmission = MdDropdown::where('belongs_to','transmission')->get();
		    $mpg_highway = MdDropdown::where('belongs_to','mpg_highway')->get();
			return view('sells/car/car')->with(['make'=>$make,'fuel_types'=>$fuel_type,'transmissions'=>$transmission,'mpg_highway'=>$mpg_highway]);
		
	}
	public function getModel(Request $request){
       $models = MdModel::where('brand_id',$request->brand_id)->get();
       $res['status'] = true;
       $res['data'] = $models;
       return $res;
   }
	
	public function saveCar(Request $request) {
 
        $request->validate([
            'title' => 'required',
            'vehicle_make' => 'required',
            'vehicle_model' => 'required',
            'manufacturing_date' => 'required',
            'fuel_type' => 'required',
            'trim' => 'required',
            'drives' => 'required',
            'transmission' => 'required',
            'vin' => 'required',
            'vehicle_model_year' => 'required',
            'mileage' => 'required',
            'selling_price' => 'required',
            'exterior_color' => 'required',
            'interior_color' => 'required',
            'mpg_highway' => 'required',
            'description' => 'required',
        ]);
		$inventory = new Inventory;
    	$inventory->title = $request->title;
    	$inventory->type = 0;
    	$inventory->vehicle_type = 0;
    	$inventory->make_id = $request->vehicle_make;
    	$inventory->model_id = $request->vehicle_model;
    	$inventory->manufacturing_date = $request->manufacturing_date;
    	$inventory->fuel_type = $request->fuel_type;
    	$inventory->trim = $request->trim;
    	$inventory->drives = $request->drives;
    	$inventory->transmission = $request->transmission;
    	$inventory->vin = $request->vin;
    	$inventory->bluetooth_technology = $request->bluetooth_technology?1:0;
    	$inventory->navigation_system = $request->navigation_system?1:0;
    	$inventory->full_roof_rack = $request->full_roof_rack?1:0;
    	$inventory->running_boards = $request->running_boards?1:0;
    	$inventory->tow_hitch = $request->tow_hitch?1:0;
    	$inventory->abs_brakes = $request->abs_brakes?1:0;
    	$inventory->ac = $request->ac?1:0;
    	$inventory->cruise_control = $request->cruise_control?1:0;
    	$inventory->front_seat_heaters = $request->front_seat_heaters?1:0;
    	$inventory->leather_seats = $request->leather_seats?1:0;
    	$inventory->overhead_airbags = $request->overhead_airbags?1:0;
    	$inventory->power_locks = $request->power_locks?1:0;
    	$inventory->power_mirrors = $request->power_mirrors?1:0;
    	$inventory->power_seats = $request->power_seats?1:0;
    	$inventory->power_windows = $request->power_windows?1:0;
    	$inventory->rear_defroster = $request->rear_defroster?1:0;
    	$inventory->rear_view_camera = $request->rear_view_camera?1:0;
    	$inventory->side_airbags = $request->side_airbags?1:0;
    	$inventory->smart_keys = $request->smart_key?1:0;
    	$inventory->sunroof = $request->sun_roof?1:0;
    	$inventory->tractional_control = $request->traction_control?1:0;
    	$inventory->alloy_wheels = $request->alloy_wheels?1:0;
    	$inventory->am_fm_stereo = $request->am_fm_stereo?1:0;
    	$inventory->auxilary_audio_input = $request->auxiliary_audio_input?1:0;
    	$inventory->cd_audio = $request->cd_audio?1:0;
    	$inventory->satelite_radio_ready = $request->satellite_radio_ready?1:0;
    	$inventory->condition = $request->condition;
    	$inventory->vehicle_ever_been_in_accident = $request->vehicle_ever_been_in_accident;
    	$inventory->vehicle_has_any_flood_damage = $request->vehicle_has_any_flood_damage;
    	$inventory->vehicle_has_any_frame_damage = $request->vehicle_has_any_frame_damage;
    	$inventory->any_warning_lights_currently_visible = $request->any_warning_lights_currently_visible;
    	$inventory->any_panel_in_need_of_paint_or_body_work = $request->any_panel_in_need_of_paint_or_body_work;
    	$inventory->any_interior_parts_broken_or_inoperable = $request->any_interior_parts_broken_or_inoperable;
    	$inventory->any_rips_tears_or_strains_in_interior = $request->any_rips_tears_or_strains_in_interior;
    	$inventory->vehicle_has_any_mechanical_issues = $request->vehicle_has_any_mechanical_issues;
    	$inventory->vehicle_has_any_aftermarket_modification = $request->vehicle_has_any_aftermarket_modification;
    	$inventory->any_tyres_need_to_be_replaced = $request->any_tyres_need_to_be_replaced;
    	$inventory->how_many_vehicle_keys = $request->how_many_vehicle_keys;
    	$inventory->vehicle_model_year = $request->vehicle_model_year;
    	$inventory->mileage = $request->mileage;
    	$inventory->mpg_highway = $request->mpg_highway;
    	$inventory->exterior_color = $request->exterior_color;
    	$inventory->interior_color = $request->interior_color;
    	$inventory->description = $request->description;
    	$inventory->selling_price = $request->selling_price;

    	if($inventory->save()){
	    	if($request->image_array){
		    	$array = explode('data:image', $request->image_array);
		    	$folderPath = public_path()."/storage/inventory_files/";
		    	foreach ($array as $arr) {
		    		if($arr!='' && $arr!=null){
		    			$explodes = explode('base64,', $arr);
			    		$base_64 = $explodes[1];
			    		$extension = explode('/', $explodes[0])[1];
				        $image_type = explode(';', $extension)[0];
				        $image_base64 = base64_decode($base_64);
				        $file = $folderPath . uniqid() . '. '.$image_type;
				        file_put_contents($file, $image_base64);
                        // echo $folderPath."<br>".$file."<br>".explode($folderPath, $file)[1];
                        // die;
			    		$inventory_file = new InventoryFile;
			    		$inventory_file->file = explode($folderPath, $file)[1];
			    		$inventory_file->inventory_id = $inventory->id;
			    		$inventory_file->inventory_type = 0;
			    		$inventory_file->media_type = 0;
			    		$inventory_file->save();
		    		}
		    	}
	    	}

             // video upload
            if($request->has('video')){
                $file = $request->file('video');
                $filename = $file->getClientOriginalName();
                $path = public_path().'/storage/inventory_files/';
                $file->move($path, $filename);

                $inventory_file = new InventoryFile;
                $inventory_file->file = $filename;
                $inventory_file->inventory_id = $inventory->id;
                $inventory_file->inventory_type = 0;
                $inventory_file->media_type = 1;
                $inventory_file->save();

            }
             // video upload

            if($request->has('video_url') && $request->video_url!="" && $request->video_url!=null){
               
                $inventory_file = new InventoryFile;
                $inventory_file->file = $request->video_url;
                $inventory_file->inventory_id = $inventory->id;
                $inventory_file->inventory_type = 0;
                $inventory_file->media_type = 2;
                $inventory_file->save();

            }
             

            $carList = Inventory::orderByDesc('id')->get();
			return redirect()->route('car-list',[ 'carList' => $carList ])->with('success', 'Car Added Successfully');
	    }else{
	    	return back()->with('error', 'Something went wrong! Please try again.');
	    }
		
	}

	public function carList() {
		 $carList = Inventory::orderByDesc('id')->get();
		 return view('sells/car/car_list')->with('carList',$carList);
		
	}
	public function viewCar($id) {
		 $carList = Inventory::where('id', $id)->get();

			return view('sells/car/view_car', [ 'carList' => $carList ]);
			
	}
	public function addMoto() {
		   
			return view('sells/moto/moto');
		
	}
	public function addPowerEquipment() {
		   
			return view('sells/power_equipment/power_equipment');
		
	}
	public function addAutoMoto() {
		   
			return view('sells/auto_moto_parts/auto_moto_parts');
		
	}
}
