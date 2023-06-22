<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->string("bengaliName");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->string('hons_passing_yr');
            $table->string('hons_university');
            $table->string('hons_GPA');
            $table->string('hsc_GPA');
            $table->string('hsc_board_name');
            $table->string('hsc_passing_yr');
            $table->string('ssc_passing_yr');
            $table->string('ssc_board_name');
            $table->string('ssc_GPA');
        });
    }
};