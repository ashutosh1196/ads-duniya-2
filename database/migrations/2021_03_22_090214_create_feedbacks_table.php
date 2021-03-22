<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	*/
	public function up() {
		Schema::create('feedbacks', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->constrained();
			$table->enum('rating', [1, 2, 3, 4, 5]);
			$table->longtext('message')->nullable();
			$table->string('file')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	*/
	public function down() {
		Schema::dropIfExists('feedbacks');
	}
}
