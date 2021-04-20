<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellController extends Controller
{
   public function addCar() {
		   
			return view('sells/car/car');
		
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
