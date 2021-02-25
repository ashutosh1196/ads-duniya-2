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
            $table->string('state')->nullable();
            $table->string('country');
            $table->string('pincode');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('job_url');
            $table->foreignId('job_industry_id')->constrained();
            $table->foreignId('job_function_id')->constrained();
            $table->foreignId('job_location_id')->constrained();
            $table->bigInteger('package_range_from')->nullable();
            $table->bigInteger('package_range_to')->nullable();
            $table->enum('salary_currency', ['pounds','dollars']);
            $table->integer('experience_range_min')->nullable();
            $table->integer('experience_range_max')->nullable();
            $table->enum('status',['open','close']);
            $table->foreignId('recruiter_id')->constrained();
            $table->foreignId('organization_id')->constrained();
            $table->string('created_by')->nullable();
            $table->dateTime('expiring_at');
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
