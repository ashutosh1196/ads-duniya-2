<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMdModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_models', function (Blueprint $table) {
           $table->id();
           $table->string('model_name_en');
           $table->string('model_name_es');
           $table->string('model_name_fr');
           $table->string('model_name_ht');
           $table->unsignedBigInteger('brand_id');
           $table->foreign('brand_id')->references('id')->on('md_brands')->onDelete('cascade');
           $table->string('slug');
           $table->string('value');
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
        Schema::dropIfExists('md_models');
    }
}
