<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('choose_us')->truncate();
        \DB::table('choose_us')->insert([
            [
                'Title' => 'Super Admin',
                'description' => 'Super',
            ],
            [
                'Title' => 'Super Admin',
                'description' => 'Super',
            ],
            [
                'Title' => 'Super Admin',
                'description' => 'Super',
            ],
            [
                'Title' => 'Super Admin',
                'description' => 'Super',
            ],
        ]);
    }
}
