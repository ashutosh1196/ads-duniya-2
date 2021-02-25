<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationCreditDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_credit_details', function (Blueprint $table) {
            $table->id();
            $table->enum('txn_type',['credit','debit']);
            $table->bigInteger('credits');
            $table->enum('credit_type',['paid','free']);
            $table->tinyInteger('status')->comment('1 => Active , 0 => Incative')->default(1);
            $table->foreignId('organization_id')->constrained();
            $table->foreignId('organization_credit_id')->constrained();
            $table->foreignId('recruiter_id')->nullable()->constrained()->default(null);
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
        Schema::dropIfExists('organization_credit_details');
    }
}
