<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_industries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->longtext('description');
            $table->integer('status')->comment('1 => Active , 0 => Incative')->defualt(1);
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
        Schema::dropIfExists('job_industries');
    }
}
