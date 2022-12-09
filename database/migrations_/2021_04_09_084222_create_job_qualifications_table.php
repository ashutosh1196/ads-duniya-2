<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobQualificationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	*/
	public function up() {
		Schema::create('job_qualifications', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->foreignId('job_industry_id')->constrained();
			$table->integer('status')->comment('1 => Active , 0 => Incative')->default(1);
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
	public function down() {
		Schema::dropIfExists('job_qualifications');
	}
}
