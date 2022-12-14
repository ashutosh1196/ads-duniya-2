<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsTrendingToSavingAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saving_accounts', function (Blueprint $table) {
            $table->tinyInteger('is_trending')->default(0);
        });

        Schema::table('loans', function (Blueprint $table) {
            $table->tinyInteger('is_trending')->default(0);
        });

        Schema::table('credit_cards', function (Blueprint $table) {
            $table->tinyInteger('is_trending')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saving_accounts', function (Blueprint $table) {
            $table->dropColumn('is_trending');
        });

        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn('is_trending');
        });

        Schema::table('credit_cards', function (Blueprint $table) {
            $table->dropColumn('is_trending');
        });
    }
}
