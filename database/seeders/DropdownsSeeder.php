<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DropdownsSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	*/
	public function run() {

		\DB::table('dropdowns')->delete();
		$dropdowns = [
			['name'=>'employment_eligibility','slug'=>'visa_considered','value'=>'Visa considered'],
			['name'=>'employment_eligibility','slug'=>'sponsorship_offered','value'=>'Sponsorship offered'],
			['name'=>'currency','slug'=>'pounds','value'=>'GBP Pound'],
			['name'=>'currency','slug'=>'dollars','value'=>'USD'],
			['name'=>'job_type','slug'=>'full_time','value'=>'Full Time'],
			['name'=>'job_type','slug'=>'contract_basis','value'=>'Contract Basis'],
			['name'=>'job_type','slug'=>'part_time','value'=>'Part Time'],
			['name'=>'job_type','slug'=>'graduate','value'=>'Graduate'],
			['name'=>'job_type','slug'=>'public_sector','value'=>'Public Sector'],
			['name'=>'job_type','slug'=>'work_from_home','value'=>'Work From Home'],
		];
		\DB::table('dropdowns')->insert($dropdowns);
	}
}
