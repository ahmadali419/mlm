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
        Schema::table('user_funds', function (Blueprint $table) {
            // $table->string('status')->default(0);
            // $table->string('transaction_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_funds', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('transaction_image');
        });
    }
};
