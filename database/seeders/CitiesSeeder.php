<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
  */
  public function run() {

    \DB::table('cities')->delete();

    $cities = [
      ['city' => 'Aberdeen'],
      ['city' => 'Armagh'],
      ['city' => 'Bangor'],
      ['city' => 'Bath'],
      ['city' => 'Belfast'],
      ['city' => 'Birmingham'],
      ['city' => 'Bradford'],
      ['city' => 'Brighton and Hove'],
      ['city' => 'Bristol'],
      ['city' => 'Cambridge'],
      ['city' => 'Canterbury'],
      ['city' => 'Cardiff'],
      ['city' => 'Carlisle'],
      ['city' => 'Chelmsford'],
      ['city' => 'Chester'],
      ['city' => 'Chichester'],
      ['city' => 'City of London'],
      ['city' => 'Coventry'],
      ['city' => 'Derby'],
      ['city' => 'Dundee'],
      ['city' => 'Durham'],
      ['city' => 'Edinburgh'],
      ['city' => 'Ely'],
      ['city' => 'Exeter'],
      ['city' => 'Glasgow'],
      ['city' => 'Gloucester'],
      ['city' => 'Hereford'],
      ['city' => 'Inverness'],
      ['city' => 'Kingston upon Hull'],
      ['city' => 'Lancaster'],
      ['city' => 'Leeds'],
      ['city' => 'Leicester'],
      ['city' => 'Lichfield'],
      ['city' => 'Lincoln'],
      ['city' => 'Lisburn'],
      ['city' => 'Liverpool'],
      ['city' => 'Londonderry'],
      ['city' => 'Manchester'],
      ['city' => 'Newcastle upon Tyne'],
      ['city' => 'Newport'],
      ['city' => 'Newry'],
      ['city' => 'Norwich'],
      ['city' => 'Nottingham'],
      ['city' => 'Oxford'],
      ['city' => 'Perth'],
      ['city' => 'Peterborough'],
      ['city' => 'Plymouth'],
      ['city' => 'Portsmouth'],
      ['city' => 'Preston'],
      ['city' => 'Ripon'],
      ['city' => 'Salford'],
      ['city' => 'Salisbury'],
      ['city' => 'Sheffield'],
      ['city' => 'Southampton'],
      ['city' => 'St Albans'],
      ['city' => 'St Davids'],
      ['city' => 'Stirling'],
      ['city' => 'Stoke-on-Trent'],
      ['city' => 'Sunderland'],
      ['city' => 'Swansea'],
      ['city' => 'Truro'],
      ['city' => 'Wakefield'],
      ['city' => 'Wells'],
      ['city' => 'Westminster'],
      ['city' => 'Winchester'],
      ['city' => 'Wolverhampton'],
      ['city' => 'Worcester'],
      ['city' => 'York']
    ];

    \DB::table('cities')->insert($cities);
  }
}
