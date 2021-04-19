<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPaymentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->float('amount')->default(0);
            $table->foreignId('job_id')->constrained();
            $table->foreignId('recruiter_id')->constrained();
            $table->string('transaction_id');
            $table->dateTime('payment_date');
            $table->enum('status', ['success', 'failed'] );
            $table->longText('response')->nullable();
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_payment_transactions');
    }
}
