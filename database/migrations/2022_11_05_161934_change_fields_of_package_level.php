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
        Schema::table('package_levels', function ($table) {
            $table->string('bonus_percentage')->nullable()->change();
            $table->string('profit_percentage')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_levels', function (Blueprint $table) {
            $table->dropColumn('bonus_percentage');
            $table->dropColumn('profit_percentage');
        });
    }
};
