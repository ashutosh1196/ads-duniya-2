<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
	        RolesSeeder::class,
	        AdminsSeeder::class,
	        CitiesTableSeeder::class,
	        CountiesTableSeeder::class,
	        CountriesTableSeeder::class,
	        DropdownsSeeder::class,
	        JobFunctionsSeeder::class,
	        JobIndustriesSeeder::class,
	        JobLocationsSeeder::class,
	        SkillsSeeder::class,
	    ]);
    }
}
