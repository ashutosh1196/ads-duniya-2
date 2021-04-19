<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMdDropdownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_dropdowns', function (Blueprint $table) {
           $table->id();
           $table->string('name_en');
           $table->string('name_es');
           $table->string('name_fr');
           $table->string('name_ht');
           $table->tinyInteger('type')->comment('0=>car,1=>moto,2=>both,3=>other');
           $table->string('slug');
           $table->string('belongs_to');
           $table->string('value')->nullable();
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
        Schema::dropIfExists('md_dropdowns');
    }
}
