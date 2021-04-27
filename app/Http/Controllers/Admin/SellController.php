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
            $fuel_types = MdDropdown::where('type',0)->where('belongs_to','fuel_type')->get();
            $transmissions = MdDropdown::where('type',0)->where('belongs_to','transmission')->get();
            $extra_features = MdDropdown::where('type',0)->where('belongs_to','extra_features')->get();
            $conditions = MdDropdown::where('type',2)->where('belongs_to','condition')->get();
            $accidents = MdDropdown::where('type',2)->where('belongs_to','accident')->get();
            $flood_damages = MdDropdown::where('type',2)->where('belongs_to','flood_damage')->get();
            $frame_damages = MdDropdown::where('type',2)->where('belongs_to','frame_damage')->get();
            $mechanical_issues = MdDropdown::where('type',2)->where('belongs_to','mechanical_issue')->get();
            $lights_warning = MdDropdown::where('type',2)->where('belongs_to','lights_warning')->get();
            $paint_or_body_work = MdDropdown::where('type',2)->where('belongs_to','paint_or_body_work')->get();
            $interior_part_broken = MdDropdown::where('type',2)->where('belongs_to','interior_part_broken')->get();
            $interior_tear_or_strain = MdDropdown::where('type',2)->where('belongs_to','interior_tear_or_strain')->get();
            $interior_tear_or_strain = MdDropdown::where('type',2)->where('belongs_to','interior_tear_or_strain')->get();
            $tyre_replacable = MdDropdown::where('type',0)->where('belongs_to','tyre_replacable')->get();
            $aftermarket_modification = MdDropdown::where('type',2)->where('belongs_to','aftermarket_modification')->get();
            $odometer_broken = MdDropdown::where('type',2)->where('belongs_to','odometer_broken')->get();
            $keys = MdDropdown::where('type',2)->where('belongs_to','keys')->get();
            $mpg_highway = MdDropdown::where('type',2)->where('belongs_to','mpg_highway')->get();
            $brands = MdBrand::where('brand_for',0)->get();
            return view('sells/car/car')->with(['make'=>$brands,'fuel_types'=>$fuel_types,'transmissions'=>$transmissions,'extra_features'=>$extra_features,'conditions'=>$conditions,'accidents'=>$accidents,'flood_damages'=>$flood_damages,'frame_damages'=>$frame_damages,'mechanical_issues'=>$mechanical_issues,'lights_warning'=>$lights_warning,'paint_or_body_work'=>$paint_or_body_work,'interior_part_broken'=>$interior_part_broken,'interior_tear_or_strain'=>$interior_tear_or_strain,'tyre_replacable'=>$tyre_replacable,'aftermarket_modification'=>$aftermarket_modification,'odometer_broken'=>$odometer_broken,'keys'=>$keys,'mpg_highway'=>$mpg_highway]);
		
	}


    public function addMoto(){
        $fuel_types = MdDropdown::where('type',0)->where('belongs_to','fuel_type')->get();
        $transmissions = MdDropdown::where('type',0)->where('belongs_to','transmission')->get();
        $extra_features = MdDropdown::where('type',1)->where('belongs_to','extra_features')->get();
        $conditions = MdDropdown::where('type',2)->where('belongs_to','condition')->get();
        $accidents = MdDropdown::where('type',2)->where('belongs_to','accident')->get();
        $flood_damages = MdDropdown::where('type',2)->where('belongs_to','flood_damage')->get();
        $frame_damages = MdDropdown::where('type',2)->where('belongs_to','frame_damage')->get();
        $mechanical_issues = MdDropdown::where('type',2)->where('belongs_to','mechanical_issue')->get();
        $lights_warning = MdDropdown::where('type',2)->where('belongs_to','lights_warning')->get();
        $paint_or_body_work = MdDropdown::where('type',2)->where('belongs_to','paint_or_body_work')->get();
        $interior_part_broken = MdDropdown::where('type',2)->where('belongs_to','interior_part_broken')->get();
        $interior_tear_or_strain = MdDropdown::where('type',2)->where('belongs_to','interior_tear_or_strain')->get();
        $interior_tear_or_strain = MdDropdown::where('type',2)->where('belongs_to','interior_tear_or_strain')->get();
        $tyre_replacable = MdDropdown::where('type',1)->where('belongs_to','tyre_replacable2')->get();
        $aftermarket_modification = MdDropdown::where('type',2)->where('belongs_to','aftermarket_modification')->get();
        $odometer_broken = MdDropdown::where('type',2)->where('belongs_to','odometer_broken')->get();
        $keys = MdDropdown::where('type',2)->where('belongs_to','keys')->get();
        $mpg_highway = MdDropdown::where('type',2)->where('belongs_to','mpg_highway')->get();
        $brands = MdBrand::where('brand_for',1)->get();
        return view('sells/moto/moto')->with(['brands'=>$brands,'fuel_types'=>$fuel_types,'transmissions'=>$transmissions,'extra_features'=>$extra_features,'conditions'=>$conditions,'accidents'=>$accidents,'flood_damages'=>$flood_damages,'frame_damages'=>$frame_damages,'mechanical_issues'=>$mechanical_issues,'lights_warning'=>$lights_warning,'paint_or_body_work'=>$paint_or_body_work,'interior_part_broken'=>$interior_part_broken,'interior_tear_or_strain'=>$interior_tear_or_strain,'tyre_replacable'=>$tyre_replacable,'aftermarket_modification'=>$aftermarket_modification,'odometer_broken'=>$odometer_broken,'keys'=>$keys,'mpg_highway'=>$mpg_highway]);
    }


    public function saveMoto(Request $request){
        $inventory = new Inventory;
        $inventory->title = $request->title;
        $inventory->type = 1;
        $inventory->vehicle_type = 1;
        $inventory->make_id = $request->make;
        $inventory->model_id = $request->model;
        // $inventory->user_id = Auth::user()->id;
        $inventory->manufacturing_date = $request->manufacturing_date;
        $inventory->fuel_type = $request->fuel_type;
        $inventory->trim = $request->trim;
        $inventory->transmission = $request->transmission;
        $inventory->vin = $request->vin;
        $inventory->displacement = $request->displacement;
        $inventory->bluetooth_technology = $request->bluetooth_technology?1:0;
        $inventory->navigation_system = $request->navigation_system?1:0;
        $inventory->keyless_ignition = $request->keyless_ignition?1:0;
        $inventory->sports_bike_gas_tank = $request->sports_bike_gas_tank?1:0;
        $inventory->leg_guards = $request->leg_guards?1:0;
        $inventory->motorbike_alarm = $request->motorbike_alarm?1:0;
        $inventory->sound_system = $request->sound_system?1:0;
        $inventory->front_disk_break = $request->front_disk_break?1:0;
        $inventory->rear_disk_break = $request->rear_disk_break?1:0;
        $inventory->digital_console = $request->digital_console?1:0; 
        $inventory->power_locks = $request->power_locks?1:0;
        $inventory->smart_keys = $request->smart_keys?1:0;
        $inventory->alloy_wheels = $request->alloy_wheels?1:0;
        $inventory->tubeless_tyres = $request->tubeless_tyres?1:0;

        $inventory->condition = $request->condition;
        $inventory->vehicle_ever_been_in_accident = $request->vehicle_ever_been_in_accident;
        $inventory->vehicle_has_any_flood_damage = $request->vehicle_has_any_flood_damage;
        $inventory->vehicle_has_any_frame_damage = $request->vehicle_has_any_frame_damage;

        $inventory->vehicle_has_any_mechanical_issues = $request->vehicle_has_any_mechanical_issues;

        $inventory->vehicle_has_any_aftermarket_modification = $request->vehicle_has_any_aftermarket_modification;

        $inventory->any_tyres_need_to_be_replaced = $request->any_tyres_need_to_be_replaced;

        $inventory->how_many_vehicle_keys = $request->how_many_vehicle_keys;
        $inventory->vehicle_model_year = $request->model_year;
        $inventory->mileage = $request->mileage;
        $inventory->miles_traveled = $request->miles_traveled;

        $inventory->mpg_highway = $request->mpg_highway;
        $inventory->exterior_color = $request->color;
        $inventory->interior_color = $request->color;
        $inventory->description = $request->description;

        $inventory->selling_price = $request->selling_price;

        if($inventory->save()){
            if($request->image_array){
                $array = explode('data:image', $request->image_array);
                $folderPath = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
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
                $path = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
                $file->move($path, $filename);

                $inventory_file = new InventoryFile;
                $inventory_file->file = $filename;
                $inventory_file->inventory_id = $inventory->id;
                $inventory_file->inventory_type = 0;
                $inventory_file->media_type = 1;
                $inventory_file->save();

            }

            if($request->has('video_url') && $request->video_url!="" && $request->video_url!=null){
               
                $inventory_file = new InventoryFile;
                $inventory_file->file = $request->video_url;
                $inventory_file->inventory_id = $inventory->id;
                $inventory_file->inventory_type = 0;
                $inventory_file->media_type = 2;
                $inventory_file->save();

            }
            // video upload

        }
        
        return redirect()->route('moto-list')->with('success','Moto added successfully!');
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
    	$inventory->smart_keys = $request->smart_keys?1:0;
    	$inventory->sunroof = $request->sunroof?1:0;
    	$inventory->tractional_control = $request->tractional_control?1:0;
    	$inventory->alloy_wheels = $request->alloy_wheels?1:0;
        $inventory->tubeless_tyres = $request->tubeless_tyres?1:0;
    	$inventory->am_fm_stereo = $request->am_fm_stereo?1:0;
    	$inventory->auxilary_audio_input = $request->auxilary_audio_input?1:0;
    	$inventory->cd_audio = $request->cd_audio?1:0;
    	$inventory->satelite_radio_ready = $request->satelite_radio_ready?1:0;
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
        $inventory->odometer_broken_or_replaced = $request->odometer_broken_or_replaced;
    	$inventory->any_tyres_need_to_be_replaced = $request->any_tyres_need_to_be_replaced;
    	$inventory->how_many_vehicle_keys = $request->how_many_vehicle_keys;
    	$inventory->vehicle_model_year = $request->vehicle_model_year;
    	$inventory->mileage = $request->mileage;
    	$inventory->mpg_highway = $request->mpg_highway;
    	$inventory->exterior_color = $request->exterior_color;
    	$inventory->interior_color = $request->interior_color;
    	$inventory->description = $request->description;
    	$inventory->selling_price = $request->selling_price;
        $inventory->miles_traveled = $request->miles_traveled;

    	if($inventory->save()){
	    	if($request->image_array){
		    	$array = explode('data:image', $request->image_array);
		    	$folderPath = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
		    	foreach ($array as $arr) {
		    		if($arr!='' && $arr!=null){
		    			$explodes = explode('base64,', $arr);
			    		$base_64 = $explodes[1];
			    		$extension = explode('/', $explodes[0])[1];
				        $image_type = explode(';', $extension)[0];
				        $image_base64 = base64_decode($base_64);
				        $file = $folderPath . uniqid() . '.'.$image_type;
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

            // panorama file
            if($request->panorama_array){
                $array = explode('data:image', $request->panorama_array);
                $folderPath = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/interior_panorama/";
                foreach ($array as $arr) {
                    if($arr!='' && $arr!=null){
                        $explodes = explode('base64,', $arr);
                        $base_64 = $explodes[1];
                        $extension = explode('/', $explodes[0])[1];
                        $image_type = explode(';', $extension)[0];
                        $image_base64 = base64_decode($base_64);
                        $file = $folderPath . uniqid() . '.'.$image_type;
                        file_put_contents($file, $image_base64);
                        // echo $folderPath."<br>".$file."<br>".explode($folderPath, $file)[1];
                        // die;
                        $inventory_file = new InventoryFile;
                        $inventory_file->file = explode($folderPath, $file)[1];
                        $inventory_file->inventory_id = $inventory->id;
                        $inventory_file->inventory_type = 0;
                        $inventory_file->media_type = 0;
                        $inventory_file->is_interior = 1;
                        $inventory_file->save();
                    }
                }
            }
            // panorama file

             // video upload
            if($request->has('video')){
                $file = $request->file('video');
                $filename = $file->getClientOriginalName();
                $path = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
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
		 $carList = Inventory::orderBy('created_at','DESC')->where('type',0)->get();
		 return view('sells/car/car_list')->with('carList',$carList);
	}

    public function motoList() {
         $motoList = Inventory::orderByDesc('id')->where('type',1)->get();
         return view('sells/moto/moto_list')->with('motoList',$motoList);
    }

    public function powerEquipments() {
         $equipments = Inventory::orderByDesc('id')->where('type',2)->get();
         return view('sells/power_equipment/power_equipment_list')->with('equipments',$equipments);
    }

	public function viewCar($id) {
		$carList = Inventory::where('id', $id)->with('images','video','video_url','interior_image')->first();
		return view('sells/car/view_car', [ 'carList' => $carList ]);
	}

    public function viewMoto($id){
        $carList = Inventory::where('id', $id)->with('images','video','video_url')->first();
        return view('sells/moto/view_moto', [ 'carList' => $carList ]);
    }
	
	public function addPowerEquipment() {
        $brands = MdBrand::where('brand_for',2)->get();
		return view('sells/power_equipment/power_equipment')->with(['brands'=>$brands]);	
	}
	public function autoAndMotoParts() {
        $auto_and_moto_parts = Inventory::orderByDesc('id')->where('type',3)->get();
		return view('sells/auto_moto_parts/auto_moto_list')->with('auto_and_moto_parts',$auto_and_moto_parts);
	}

    public function addAutoAndMotoPart(){
        $vehicle_types = MdDropdown::where('type',2)->where('belongs_to','vehicle_type')->get();
        return view('sells.auto_moto_parts.auto_moto_parts')->with(['vehicle_types'=>$vehicle_types]);
    }

    public function editCarDetails($id){
        $fuel_types = MdDropdown::where('type',0)->where('belongs_to','fuel_type')->get();
        $transmissions = MdDropdown::where('type',0)->where('belongs_to','transmission')->get();
        $extra_features = MdDropdown::where('type',0)->where('belongs_to','extra_features')->get();
        $conditions = MdDropdown::where('type',2)->where('belongs_to','condition')->get();
        $accidents = MdDropdown::where('type',2)->where('belongs_to','accident')->get();
        $flood_damages = MdDropdown::where('type',2)->where('belongs_to','flood_damage')->get();
        $frame_damages = MdDropdown::where('type',2)->where('belongs_to','frame_damage')->get();
        $mechanical_issues = MdDropdown::where('type',2)->where('belongs_to','mechanical_issue')->get();
        $lights_warning = MdDropdown::where('type',2)->where('belongs_to','lights_warning')->get();
        $paint_or_body_work = MdDropdown::where('type',2)->where('belongs_to','paint_or_body_work')->get();
        $interior_part_broken = MdDropdown::where('type',2)->where('belongs_to','interior_part_broken')->get();
        $interior_tear_or_strain = MdDropdown::where('type',2)->where('belongs_to','interior_tear_or_strain')->get();
        $interior_tear_or_strain = MdDropdown::where('type',2)->where('belongs_to','interior_tear_or_strain')->get();
        $tyre_replacable = MdDropdown::where('type',0)->where('belongs_to','tyre_replacable')->get();
        $aftermarket_modification = MdDropdown::where('type',2)->where('belongs_to','aftermarket_modification')->get();
        $odometer_broken = MdDropdown::where('type',2)->where('belongs_to','odometer_broken')->get();
        $keys = MdDropdown::where('type',2)->where('belongs_to','keys')->get();
        $mpg_highway = MdDropdown::where('type',2)->where('belongs_to','mpg_highway')->get();
        $brands = MdBrand::where('brand_for',0)->get();
        $inventory = Inventory::with('images','video','video_url','interior_image')->find($id);
        return view('sells/car/edit_car')->with(['inventory'=>$inventory,'make'=>$brands,'fuel_types'=>$fuel_types,'transmissions'=>$transmissions,'extra_features'=>$extra_features,'conditions'=>$conditions,'accidents'=>$accidents,'flood_damages'=>$flood_damages,'frame_damages'=>$frame_damages,'mechanical_issues'=>$mechanical_issues,'lights_warning'=>$lights_warning,'paint_or_body_work'=>$paint_or_body_work,'interior_part_broken'=>$interior_part_broken,'interior_tear_or_strain'=>$interior_tear_or_strain,'tyre_replacable'=>$tyre_replacable,'aftermarket_modification'=>$aftermarket_modification,'odometer_broken'=>$odometer_broken,'keys'=>$keys,'mpg_highway'=>$mpg_highway]);
    }

    public function editMotoDetails($id){
        $fuel_types = MdDropdown::where('type',0)->where('belongs_to','fuel_type')->get();
        $transmissions = MdDropdown::where('type',0)->where('belongs_to','transmission')->get();
        $extra_features = MdDropdown::where('type',1)->where('belongs_to','extra_features')->get();
        $conditions = MdDropdown::where('type',2)->where('belongs_to','condition')->get();
        $accidents = MdDropdown::where('type',2)->where('belongs_to','accident')->get();
        $flood_damages = MdDropdown::where('type',2)->where('belongs_to','flood_damage')->get();
        $frame_damages = MdDropdown::where('type',2)->where('belongs_to','frame_damage')->get();
        $mechanical_issues = MdDropdown::where('type',2)->where('belongs_to','mechanical_issue')->get();
        $lights_warning = MdDropdown::where('type',2)->where('belongs_to','lights_warning')->get();
        $paint_or_body_work = MdDropdown::where('type',2)->where('belongs_to','paint_or_body_work')->get();
        $interior_part_broken = MdDropdown::where('type',2)->where('belongs_to','interior_part_broken')->get();
        $interior_tear_or_strain = MdDropdown::where('type',2)->where('belongs_to','interior_tear_or_strain')->get();
        $interior_tear_or_strain = MdDropdown::where('type',2)->where('belongs_to','interior_tear_or_strain')->get();
        $tyre_replacable = MdDropdown::where('type',1)->where('belongs_to','tyre_replacable2')->get();
        $aftermarket_modification = MdDropdown::where('type',2)->where('belongs_to','aftermarket_modification')->get();
        $odometer_broken = MdDropdown::where('type',2)->where('belongs_to','odometer_broken')->get();
        $keys = MdDropdown::where('type',2)->where('belongs_to','keys')->get();
        $mpg_highway = MdDropdown::where('type',2)->where('belongs_to','mpg_highway')->get();
        $brands = MdBrand::where('brand_for',1)->get();

        $inventory = Inventory::with('images','video','video_url')->find($id);

        return view('sells/moto/edit')->with(['inventory'=>$inventory,'brands'=>$brands,'fuel_types'=>$fuel_types,'transmissions'=>$transmissions,'extra_features'=>$extra_features,'conditions'=>$conditions,'accidents'=>$accidents,'flood_damages'=>$flood_damages,'frame_damages'=>$frame_damages,'mechanical_issues'=>$mechanical_issues,'lights_warning'=>$lights_warning,'paint_or_body_work'=>$paint_or_body_work,'interior_part_broken'=>$interior_part_broken,'interior_tear_or_strain'=>$interior_tear_or_strain,'tyre_replacable'=>$tyre_replacable,'aftermarket_modification'=>$aftermarket_modification,'odometer_broken'=>$odometer_broken,'keys'=>$keys,'mpg_highway'=>$mpg_highway]);
    }

    public function editPowerEquipmentDetails($id){
        $inventory = Inventory::with('images','video','video_url')->find($id);
        $brands = MdBrand::where('brand_for',2)->get();
        return view('sells.power_equipment.edit')->with(['inventory'=>$inventory,'brands'=>$brands]);
    }

    public function editAutoAndMotoPart($id){
        $inventory = Inventory::with('images','video','video_url')->find($id);
        $vehicle_types = MdDropdown::where('type',2)->where('belongs_to','vehicle_type')->get();
        return view('sells.auto_moto_parts.edit')->with(['vehicle_types'=>$vehicle_types,'inventory'=>$inventory]);
    }

    public function deleteInventory(Request $request){
        $inventory = Inventory::with('images','video','video_url')->find($request->id);
        $inventory->delete();
        $res['status'] = true;
        $res['message'] = 'Data deleted!';
        return $res;
    }


    public function savePowerEquipment(Request $request){
        $inventory = new Inventory;
        $inventory->title = $request->title;
        $inventory->description = $request->description;
        $inventory->type = 2;
        $inventory->make_id = $request->make;
        $inventory->model_id = $request->model;
        // $inventory->user_id = Auth::user()->id;
        $inventory->manufacturing_date = $request->manufacturing_date;
        $inventory->selling_price = $request->selling_price;

        $inventory->exterior_color = $request->color;
        $inventory->interior_color = $request->color;

        $inventory->output_frequency = $request->output_frequency;


        if($inventory->save()){
            if($request->image_array){
                $array = explode('data:image', $request->image_array);
                $folderPath = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
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
                $path = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
                $file->move($path, $filename);

                $inventory_file = new InventoryFile;
                $inventory_file->file = $filename;
                $inventory_file->inventory_id = $inventory->id;
                $inventory_file->inventory_type = 0;
                $inventory_file->media_type = 1;
                $inventory_file->save();

            }

            if($request->has('video_url') && $request->video_url!="" && $request->video_url!=null){
               
                $inventory_file = new InventoryFile;
                $inventory_file->file = $request->video_url;
                $inventory_file->inventory_id = $inventory->id;
                $inventory_file->inventory_type = 0;
                $inventory_file->media_type = 2;
                $inventory_file->save();

            }
            // video upload

        }
       
        return redirect()->route('power-equipment-list')->with('success','Power Equipment added successfully!');
    }

    public function viewPowerEquipment($id){
        $equipment = Inventory::where('id', $id)->with('images','video','video_url')->first();
        return view('sells.power_equipment.view')->with(['equipment'=>$equipment]);
    }


    public function saveAutoAndMotoPart(Request $request){
        $inventory = new Inventory;
        $inventory->title = $request->title;
        $inventory->description = $request->description;
        $inventory->type = 3;
        $inventory->vehicle_type = $request->vehicle_type;
        $inventory->make_id = $request->make;
        $inventory->model_id = $request->model;
        // $inventory->user_id = Auth::user()->id;
        $inventory->manufacturing_date = $request->manufacturing_date;
        $inventory->selling_price = $request->selling_price;

        $inventory->exterior_color = $request->color;
        $inventory->interior_color = $request->color;

        $inventory->vehicle_model_year = $request->model_year;


        if($inventory->save()){
            if($request->image_array){
                $array = explode('data:image', $request->image_array);
                $folderPath = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
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
                $path = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
                $file->move($path, $filename);

                $inventory_file = new InventoryFile;
                $inventory_file->file = $filename;
                $inventory_file->inventory_id = $inventory->id;
                $inventory_file->inventory_type = 0;
                $inventory_file->media_type = 1;
                $inventory_file->save();

            }

            if($request->has('video_url') && $request->video_url!="" && $request->video_url!=null){
               
                $inventory_file = new InventoryFile;
                $inventory_file->file = $request->video_url;
                $inventory_file->inventory_id = $inventory->id;
                $inventory_file->inventory_type = 0;
                $inventory_file->media_type = 2;
                $inventory_file->save();

            }
            // video upload

        }
        
        return redirect()->route('auto-and-moto-part-list')->with('success','Data saved successfully!');
    }


    public function viewAutoAndMotoPart($id){
        $auto_and_moto_part = Inventory::where('id', $id)->with('images','video','video_url')->first();
        return view('sells.auto_moto_parts.view')->with(['auto_and_moto_part'=>$auto_and_moto_part]);
    }

    public function getBrands(Request $request){
       $models = MdBrand::where('brand_for',$request->type)->get();
       $res['status'] = true;
       $res['data'] = $models;
       return $res;
    }


    public function removeImage(Request $request){
        $image = InventoryFile::find($request->image_id);
        if($image->delete()){
            if(file_exists($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$request->image_name)){

                unlink($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$request->image_name);
            }
        }
        $res['status'] = true;
        $res['message'] = "Image deleted!";
        return $res;
    }


    public function updateCarDetails(Request $request){

        $inventory = Inventory::find($request->id);
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
        $inventory->smart_keys = $request->smart_keys?1:0;
        $inventory->sunroof = $request->sunroof?1:0;
        $inventory->tractional_control = $request->tractional_control?1:0;
        $inventory->alloy_wheels = $request->alloy_wheels?1:0;
        $inventory->tubeless_tyres = $request->tubeless_tyres?1:0;
        $inventory->am_fm_stereo = $request->am_fm_stereo?1:0;
        $inventory->auxilary_audio_input = $request->auxilary_audio_input?1:0;
        $inventory->cd_audio = $request->cd_audio?1:0;
        $inventory->satelite_radio_ready = $request->satelite_radio_ready?1:0;
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
        $inventory->odometer_broken_or_replaced = $request->odometer_broken_or_replaced;
        $inventory->any_tyres_need_to_be_replaced = $request->any_tyres_need_to_be_replaced;
        $inventory->how_many_vehicle_keys = $request->how_many_vehicle_keys;
        $inventory->vehicle_model_year = $request->vehicle_model_year;
        $inventory->mileage = $request->mileage;
        $inventory->mpg_highway = $request->mpg_highway;
        $inventory->exterior_color = $request->exterior_color;
        $inventory->interior_color = $request->interior_color;
        $inventory->description = $request->description;
        $inventory->selling_price = $request->selling_price;
        $inventory->miles_traveled = $request->miles_traveled;

        if($inventory->save()){
            if($request->image_array){
                $array = explode('data:image', $request->image_array);
                $folderPath = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
                foreach ($array as $arr) {
                    if($arr!='' && $arr!=null){
                        $explodes = explode('base64,', $arr);
                        $base_64 = $explodes[1];
                        $extension = explode('/', $explodes[0])[1];
                        $image_type = explode(';', $extension)[0];
                        $image_base64 = base64_decode($base_64);
                        $file = $folderPath . uniqid() . '.'.$image_type;
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

            // panorama file
            if($request->panorama_array){
                $array = explode('data:image', $request->panorama_array);
                $folderPath = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/interior_panorama/";

                // unlink
                $interior_file = InventoryFile::where('inventory_id',$request->id)->where('media_type',0)->where('is_interior',1)->first();
                if($interior_file){
                    unlink($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/interior_panorama/".$interior_file->file);
                }
                // unlink

                foreach ($array as $arr) {
                    if($arr!='' && $arr!=null){
                        $explodes = explode('base64,', $arr);
                        $base_64 = $explodes[1];
                        $extension = explode('/', $explodes[0])[1];
                        $image_type = explode(';', $extension)[0];
                        $image_base64 = base64_decode($base_64);
                        $file = $folderPath . uniqid() . '.'.$image_type;
                        file_put_contents($file, $image_base64);
                        // echo $folderPath."<br>".$file."<br>".explode($folderPath, $file)[1];
                        // die;
                        if($interior_file){
                            $interior_file->file = explode($folderPath, $file)[1];
                            $interior_file->save();
                        }else{
                            $inventory_file = new InventoryFile;
                            $inventory_file->file = explode($folderPath, $file)[1];
                            $inventory_file->inventory_id = $inventory->id;
                            $inventory_file->inventory_type = 0;
                            $inventory_file->media_type = 0;
                            $inventory_file->is_interior = 1;
                            $inventory_file->save();
                        }
                    }
                }
            }
            // panorama file

             // video upload
            if($request->has('video')){


                // delete video url
                $video_url = InventoryFile::where('inventory_id',$request->id)->where('media_type',2)->first();
                if($video_url){
                    $video_url->delete();
                }
                // delete video url

                $video_file = InventoryFile::where('inventory_id',$inventory->id)->where('media_type',1)->first();
                if($video_file){
                    if(file_exists($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video_file->file)){

                        unlink($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video_file->file);
                    }
                }

                $file = $request->file('video');
                $filename = $file->getClientOriginalName();
                $path = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
                $file->move($path, $filename);

                if($video_file){
                    $video_file->file = $filename;
                    $video_file->save();
                }else{
                    $inventory_file = new InventoryFile;
                    $inventory_file->file = $filename;
                    $inventory_file->inventory_id = $inventory->id;
                    $inventory_file->inventory_type = 0;
                    $inventory_file->media_type = 1;
                    $inventory_file->save();
                }

            }else{

                if($request->has('video_url') && $request->video_url!="" && $request->video_url!=null){
                    // delete video file
                    $video = InventoryFile::where('inventory_id',$inventory->id)->where('media_type',1)->first();
                    if($video){
                        $video->delete();
                        if(file_exists($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video->file)){

                            unlink($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video->file);
                        }
                    }
                    // delete video file
                    $inventory_file = InventoryFile::where('inventory_id',$request->id)->where('media_type',2)->first();
                    if($inventory_file){
                        $inventory_file->file = $request->video_url;
                        $inventory_file->save();    
                    }else{
                        $inventory_file = new InventoryFile;
                        $inventory_file->file = $request->video_url;
                        $inventory_file->inventory_id = $inventory->id;
                        $inventory_file->inventory_type = 0;
                        $inventory_file->media_type = 2;
                        $inventory_file->save();
                    }

                }
            }
            // video upload
             
            return redirect()->route('car-list')->with('success', 'Car Details Updated Successfully');
        }else{
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }


    public function updateMotoDetails(Request $request){

        $inventory = Inventory::find($request->id);
        $inventory->title = $request->title;
        $inventory->type = 1;
        $inventory->vehicle_type = 1;
        $inventory->make_id = $request->make;
        $inventory->model_id = $request->model;
        // $inventory->user_id = Auth::user()->id;
        $inventory->manufacturing_date = $request->manufacturing_date;
        $inventory->fuel_type = $request->fuel_type;
        $inventory->trim = $request->trim;
        $inventory->transmission = $request->transmission;
        $inventory->vin = $request->vin;
        $inventory->displacement = $request->displacement;
        $inventory->bluetooth_technology = $request->bluetooth_technology?1:0;
        $inventory->navigation_system = $request->navigation_system?1:0;
        $inventory->keyless_ignition = $request->keyless_ignition?1:0;
        $inventory->sports_bike_gas_tank = $request->sports_bike_gas_tank?1:0;
        $inventory->leg_guards = $request->leg_guards?1:0;
        $inventory->motorbike_alarm = $request->motorbike_alarm?1:0;
        $inventory->sound_system = $request->sound_system?1:0;
        $inventory->front_disk_break = $request->front_disk_break?1:0;
        $inventory->rear_disk_break = $request->rear_disk_break?1:0;
        $inventory->digital_console = $request->digital_console?1:0; 
        $inventory->power_locks = $request->power_locks?1:0;
        $inventory->smart_keys = $request->smart_keys?1:0;
        $inventory->alloy_wheels = $request->alloy_wheels?1:0;
        $inventory->tubeless_tyres = $request->tubeless_tyres?1:0;

        $inventory->condition = $request->condition;
        $inventory->vehicle_ever_been_in_accident = $request->vehicle_ever_been_in_accident;
        $inventory->vehicle_has_any_flood_damage = $request->vehicle_has_any_flood_damage;
        $inventory->vehicle_has_any_frame_damage = $request->vehicle_has_any_frame_damage;

        $inventory->vehicle_has_any_mechanical_issues = $request->vehicle_has_any_mechanical_issues;

        $inventory->vehicle_has_any_aftermarket_modification = $request->vehicle_has_any_aftermarket_modification;

        $inventory->any_tyres_need_to_be_replaced = $request->any_tyres_need_to_be_replaced;

        $inventory->how_many_vehicle_keys = $request->how_many_vehicle_keys;
        $inventory->vehicle_model_year = $request->model_year;
        $inventory->mileage = $request->mileage;
        $inventory->miles_traveled = $request->miles_traveled;

        $inventory->mpg_highway = $request->mpg_highway;
        $inventory->exterior_color = $request->color;
        $inventory->interior_color = $request->color;
        $inventory->description = $request->description;

        $inventory->selling_price = $request->selling_price;

        if($inventory->save()){
            if($request->image_array){
                $array = explode('data:image', $request->image_array);
                $folderPath = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
                foreach ($array as $arr) {
                    if($arr!='' && $arr!=null){
                        $explodes = explode('base64,', $arr);
                        $base_64 = $explodes[1];
                        $extension = explode('/', $explodes[0])[1];
                        $image_type = explode(';', $extension)[0];
                        $image_base64 = base64_decode($base_64);
                        $file = $folderPath . uniqid() . '.'.$image_type;
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


                // delete video url
                $video_url = InventoryFile::where('inventory_id',$request->id)->where('media_type',2)->first();
                if($video_url){
                    $video_url->delete();
                }
                // delete video url

                $video_file = InventoryFile::where('inventory_id',$inventory->id)->where('media_type',1)->first();
                if($video_file){
                    if(file_exists($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video_file->file)){

                        unlink($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video_file->file);
                    }
                }

                $file = $request->file('video');
                $filename = $file->getClientOriginalName();
                $path = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
                $file->move($path, $filename);

                if($video_file){
                    $video_file->file = $filename;
                    $video_file->save();
                }else{
                    $inventory_file = new InventoryFile;
                    $inventory_file->file = $filename;
                    $inventory_file->inventory_id = $inventory->id;
                    $inventory_file->inventory_type = 0;
                    $inventory_file->media_type = 1;
                    $inventory_file->save();
                }

            }else{

                if($request->has('video_url') && $request->video_url!="" && $request->video_url!=null){
                    // delete video file
                    $video = InventoryFile::where('inventory_id',$inventory->id)->where('media_type',1)->first();
                    if($video){
                        $video->delete();
                        if(file_exists($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video->file)){

                            unlink($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video->file);
                        }
                    }
                    // delete video file
                    $inventory_file = InventoryFile::where('inventory_id',$request->id)->where('media_type',2)->first();
                    if($inventory_file){
                        $inventory_file->file = $request->video_url;
                        $inventory_file->save();    
                    }else{
                        $inventory_file = new InventoryFile;
                        $inventory_file->file = $request->video_url;
                        $inventory_file->inventory_id = $inventory->id;
                        $inventory_file->inventory_type = 0;
                        $inventory_file->media_type = 2;
                        $inventory_file->save();
                    }

                }
            }
            // video upload
             
            return redirect()->route('moto-list')->with('success', 'Moto Details Updated Successfully');
        }else{
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }


    public function updatePowerEquipmentDetails(Request $request){

        $inventory = Inventory::find($request->id);
        $inventory->title = $request->title;
        $inventory->description = $request->description;
        $inventory->type = 2;
        $inventory->make_id = $request->make;
        $inventory->model_id = $request->model;
        // $inventory->user_id = Auth::user()->id;
        $inventory->manufacturing_date = $request->manufacturing_date;
        $inventory->selling_price = $request->selling_price;

        $inventory->exterior_color = $request->color;
        $inventory->interior_color = $request->color;

        $inventory->output_frequency = $request->output_frequency;


        if($inventory->save()){
            if($request->image_array){
                $array = explode('data:image', $request->image_array);
                $folderPath = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
                foreach ($array as $arr) {
                    if($arr!='' && $arr!=null){
                        $explodes = explode('base64,', $arr);
                        $base_64 = $explodes[1];
                        $extension = explode('/', $explodes[0])[1];
                        $image_type = explode(';', $extension)[0];
                        $image_base64 = base64_decode($base_64);
                        $file = $folderPath . uniqid() . '.'.$image_type;
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


                // delete video url
                $video_url = InventoryFile::where('inventory_id',$request->id)->where('media_type',2)->first();
                if($video_url){
                    $video_url->delete();
                }
                // delete video url

                $video_file = InventoryFile::where('inventory_id',$inventory->id)->where('media_type',1)->first();
                if($video_file){
                    if(file_exists($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video_file->file)){

                        unlink($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video_file->file);
                    }
                }

                $file = $request->file('video');
                $filename = $file->getClientOriginalName();
                $path = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
                $file->move($path, $filename);

                if($video_file){
                    $video_file->file = $filename;
                    $video_file->save();
                }else{
                    $inventory_file = new InventoryFile;
                    $inventory_file->file = $filename;
                    $inventory_file->inventory_id = $inventory->id;
                    $inventory_file->inventory_type = 0;
                    $inventory_file->media_type = 1;
                    $inventory_file->save();
                }

            }else{

                if($request->has('video_url') && $request->video_url!="" && $request->video_url!=null){
                    // delete video file
                    $video = InventoryFile::where('inventory_id',$inventory->id)->where('media_type',1)->first();
                    if($video){
                        $video->delete();
                        if(file_exists($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video->file)){

                            unlink($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video->file);
                        }
                    }
                    // delete video file
                    $inventory_file = InventoryFile::where('inventory_id',$request->id)->where('media_type',2)->first();
                    if($inventory_file){
                        $inventory_file->file = $request->video_url;
                        $inventory_file->save();    
                    }else{
                        $inventory_file = new InventoryFile;
                        $inventory_file->file = $request->video_url;
                        $inventory_file->inventory_id = $inventory->id;
                        $inventory_file->inventory_type = 0;
                        $inventory_file->media_type = 2;
                        $inventory_file->save();
                    }

                }
            }
            // video upload
             
            return redirect()->route('power-equipment-list')->with('success', 'Power Equipment Details Updated Successfully');
        }else{
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }


    public function updateAutoAndMotoPart(Request $request){
        $inventory = Inventory::find($request->id);
        $inventory->title = $request->title;
        $inventory->description = $request->description;
        $inventory->type = 3;
        $inventory->vehicle_type = $request->vehicle_type;
        $inventory->make_id = $request->make;
        $inventory->model_id = $request->model;
        // $inventory->user_id = Auth::user()->id;
        $inventory->manufacturing_date = $request->manufacturing_date;
        $inventory->selling_price = $request->selling_price;

        $inventory->exterior_color = $request->color;
        $inventory->interior_color = $request->color;

        $inventory->vehicle_model_year = $request->model_year;


        if($inventory->save()){
            if($request->image_array){
                $array = explode('data:image', $request->image_array);
                $folderPath = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
                foreach ($array as $arr) {
                    if($arr!='' && $arr!=null){
                        $explodes = explode('base64,', $arr);
                        $base_64 = $explodes[1];
                        $extension = explode('/', $explodes[0])[1];
                        $image_type = explode(';', $extension)[0];
                        $image_base64 = base64_decode($base_64);
                        $file = $folderPath . uniqid() . '.'.$image_type;
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

                // delete video url
                $video_url = InventoryFile::where('inventory_id',$request->id)->where('media_type',2)->first();
                if($video_url){
                    $video_url->delete();
                }
                // delete video url

                $video_file = InventoryFile::where('inventory_id',$inventory->id)->where('media_type',1)->first();
                if($video_file){
                    if(file_exists($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video_file->file)){

                        unlink($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video_file->file);
                    }
                }

                $file = $request->file('video');
                $filename = $file->getClientOriginalName();
                $path = $_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/";
                $file->move($path, $filename);

                if($video_file){
                    $video_file->file = $filename;
                    $video_file->save();
                }else{
                    $inventory_file = new InventoryFile;
                    $inventory_file->file = $filename;
                    $inventory_file->inventory_id = $inventory->id;
                    $inventory_file->inventory_type = 0;
                    $inventory_file->media_type = 1;
                    $inventory_file->save();
                }

            }else{

                if($request->has('video_url') && $request->video_url!="" && $request->video_url!=null){
                    // delete video file
                    $video = InventoryFile::where('inventory_id',$inventory->id)->where('media_type',1)->first();
                    if($video){
                        $video->delete();
                        if(file_exists($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video->file)){

                            unlink($_SERVER['DOCUMENT_ROOT']."/".env('FRONT_END_PROJECT_NAME')."/public/storage/inventory_files/".$video->file);
                        }
                    }
                    // delete video file
                    $inventory_file = InventoryFile::where('inventory_id',$request->id)->where('media_type',2)->first();
                    if($inventory_file){
                        $inventory_file->file = $request->video_url;
                        $inventory_file->save();    
                    }else{
                        $inventory_file = new InventoryFile;
                        $inventory_file->file = $request->video_url;
                        $inventory_file->inventory_id = $inventory->id;
                        $inventory_file->inventory_type = 0;
                        $inventory_file->media_type = 2;
                        $inventory_file->save();
                    }

                }
            }
            // video upload
             
            return redirect()->route('auto-and-moto-part-list')->with('success', 'Auto & Moto Parts Updated Successfully');
        }else{
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }


}
