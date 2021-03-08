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
            $table->enum('job_type',['full_time','contract_basis','part_time','graduate','public_sector','work_from_home']);
            $table->tinyInteger('is_featured')->default(0);
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('state')->nullable();
            $table->string('country');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('job_url');
            $table->foreignId('job_industry_id')->constrained();
            $table->foreignId('job_function_id')->constrained();
            $table->foreignId('job_location_id')->constrained();
            $table->double('package_range_from')->nullable();
            $table->double('package_range_to')->nullable();
            $table->enum('salary_currency', ['pounds','dollars']);
            $table->float('experience_range_min')->nullable();
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
