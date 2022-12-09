<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDematsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('exchange');
            $table->integer('bank_id');
            $table->string('trading_account_opening_fee');
            $table->string('demat_account_opening_fee');
            $table->string('apply_url');
            $table->tinyInteger('status')->comment('1=>active,0=>inactive')->default(1);
            $table->longText('details');
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
        Schema::dropIfExists('demats');
    }
}
