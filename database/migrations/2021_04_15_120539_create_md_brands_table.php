<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMdBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_brands', function (Blueprint $table) {
           $table->id();
           $table->string('brand_name_en');
           $table->string('brand_name_es');
           $table->string('brand_name_fr');
           $table->string('brand_name_ht');
           $table->string('brand_slug');
           $table->tinyInteger('brand_for')->comment('0=>car,1=>motor,2=>other');
           $table->tinyInteger('status')->comment('0=>Active,1=>Inactive');
           $table->unsignedBigInteger('created_by');
           $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('md_brands');
    }
}
