<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyInteger('type')->comment('0=>car,1=>moto,2=>equipment,3=>auto & moto parts')->nullable();
            $table->tinyInteger('vehicle_type')->nullable()->comment('0=>car,1=>motos');
            $table->unsignedBigInteger('make_id')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->foreign('make_id')->references('id')->on('md_brands')->OnDelete('cascade');
            $table->foreign('model_id')->references('id')->on('md_models')->OnDelete('cascade');
            $table->dateTime('manufacturing_date');
            $table->tinyInteger('fuel_type')->comment('0=>petrol, 1=>diesel, 2=>electrical')->nullable();
            $table->string('trim')->nullable();
            $table->string('drives')->nullable();
            $table->tinyInteger('transmission')->comment('0=>auto,1=>manual')->nullable();
            $table->string('vin')->nullable();
            $table->string('displacement')->nullable();
            $table->string('brand')->nullable();
            $table->string('battery_capacity')->nullable();
            $table->string('vehicle_model_year')->nullable();
            $table->string('selling_price');
            $table->string('exterior_color');
            $table->string('interior_color');
            $table->string('mileage')->nullable();
            $table->string('mpg_highway')->nullable();
            $table->string('model_number')->nullable();
            $table->string('output_frequency')->nullable();
            $table->string('dimension')->nullable();
            $table->longText('description');
            $table->tinyInteger('bluetooth_technology')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('navigation_system')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('full_roof_rack')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('running_boards')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('tow_hitch')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('abs_brakes')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('ac')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('cruise_control')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('front_seat_heaters')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('leather_seats')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('overhead_airbags')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('power_locks')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('power_mirrors')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('power_seats')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('power_windows')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('rear_defroster')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('rear_view_camera')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('side_airbags')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('smart_keys')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('sunroof')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('tractional_control')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('alloy_wheels')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('am_fm_stereo')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('auxilary_audio_input')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('cd_audio')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('satelite_radio_ready')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('keyless_ignition')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('sports_bike_gas_tank')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('leg_guards')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('motorbike_alarm')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('sound_system')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('front_disk_break')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('rear_disk_break')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('digital_console')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('tubeless_tyres')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('condition')->comment('0=>Outstanding,1=>Clean,2=>Average,3=>Rough,4=>Damaged')->nullable();
            $table->tinyInteger('vehicle_ever_been_in_accident')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('vehicle_has_any_flood_damage')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('vehicle_has_any_frame_damage')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('any_warning_lights_currently_visible')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('any_panel_in_need_of_paint_or_body_work')->comment('1=>1,2=>2,3=>3,4=>more')->nullable();
            $table->tinyInteger('any_interior_parts_broken_or_inoperable')->comment('1=>1,2=>2,3=>3,4=>more')->nullable();
            $table->tinyInteger('any_rips_tears_or_strains_in_interior')->comment('1=>1,2=>2,3=>3,4=>more')->nullable();
            $table->tinyInteger('vehicle_has_any_mechanical_issues')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('vehicle_has_any_aftermarket_modification')->comment('0=>no,1=>yes')->nullable();
            $table->tinyInteger('any_tyres_need_to_be_replaced')->comment('1=>1,2=>2,3=>3,4=>more')->nullable();
            $table->tinyInteger('how_many_vehicle_keys')->comment('0=>1,1=>2 or more')->nullable();
            $table->tinyInteger('status')->comment('0=>closed,1=>open')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
