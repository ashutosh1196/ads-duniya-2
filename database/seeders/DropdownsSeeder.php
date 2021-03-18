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

			['name'=>'job_distance','slug'=>'5','value'=>'5 Kms'],
			['name'=>'job_distance','slug'=>'10','value'=>'10 Kms'],
			['name'=>'job_distance','slug'=>'25','value'=>'25 Kms'],
			['name'=>'job_distance','slug'=>'50','value'=>'50 Kms'],
			['name'=>'job_distance','slug'=>'100','value'=>'100 Kms'],

			['name'=>'job_posted','slug'=>'7','value'=>'Within 7 days'],
			['name'=>'job_posted','slug'=>'30','value'=>'Within 30 days'],
			['name'=>'job_posted','slug'=>'60','value'=>'Within 60 days'],
			['name'=>'job_posted','slug'=>'90','value'=>'Within 90 days'],
		];
		\DB::table('dropdowns')->insert($dropdowns);
	}
}
