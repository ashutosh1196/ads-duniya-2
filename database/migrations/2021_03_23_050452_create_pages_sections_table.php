<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesSectionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	*/
	public function up() {
		Schema::create('pages_sections', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('slug');
			$table->enum('device_type', ['web', 'mobile'])->default('web');
			$table->enum('status', ['active', 'inactive'])->default('active');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	*/
	public function down() {
		Schema::dropIfExists('pages_sections');
	}
}
