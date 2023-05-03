<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_account_details', function (Blueprint $table) {
            $table->string('user_id')->nullable()->change();
            $table->string('account_title')->nullable()->change();
            $table->string('account_number')->nullable()->change();
            $table->string('bank_name')->nullable()->change();
            $table->string('wallet_address')->nullable()->change();
            $table->string('status')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_account_details', function (Blueprint $table) {
            $table->string('user_id')->nullable()->change();
            $table->string('account_title')->nullable()->change();
            $table->string('account_number')->nullable()->change();
            $table->string('bank_name')->nullable()->change();
            $table->string('wallet_address')->nullable()->change();
            $table->string('status')->nullable()->change();
        });
    }
};
