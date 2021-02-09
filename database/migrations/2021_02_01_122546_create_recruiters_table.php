<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitersTable extends Migration
{
    /**********************
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruiters', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('is_email_verified')->default(0);
            $table->string('phone_number')->nullable();
            $table->rememberToken();
            $table->enum('login_with',['email','facebook','google']);
            $table->tinyInteger('is_parent')->default(1);
            $table->enum('status',['active','inactive']);
            $table->ipAddress('ip_address');
            $table->tinyInteger('is_user_locked')->default(0);
            $table->timestamp('user_locked_at')->nullable();
            $table->timestamp('last_logged_in_at')->nullable();
            $table->foreignId('organization_id')->constrained();
            $table->string('signup_token')->nullable();
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
        Schema::dropIfExists('recruiters');
    }
}
