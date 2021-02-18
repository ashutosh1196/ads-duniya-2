<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_ref_number');
            $table->string('job_title');
            $table->text('job_description');
            $table->enum('job_type',['full_time','contract_basis','work_from_home']);
            $table->tinyInteger('is_featured')->default(0);
            $table->string('job_address');
            $table->string('city');
            $table->string('county')->nullable();
            $table->string('state');
            $table->string('country');
            $table->string('pincode');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('industry');
            $table->bigInteger('min_monthly_salary')->nullable();
            $table->bigInteger('max_monthly_salary')->nullable();
            $table->enum('salary_currency', ['pounds', 'dollars']);
            $table->integer('min_experience')->nullable();
            $table->integer('max_experience')->nullable();
            $table->enum('status',['full_time','contract_basis','work_from_home']);
            $table->foreignId('recruiter_id')->constrained();
            $table->foreignId('organization_id')->constrained();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
