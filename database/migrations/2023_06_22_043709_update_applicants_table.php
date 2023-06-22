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

            $table->dropColumn('hons_passing_yr');
            $table->dropColumn('hons_university');
            $table->dropColumn('hons_GPA');
            $table->dropColumn('hsc_GPA');
            $table->dropColumn('hsc_board_name');
            $table->dropColumn('hsc_passing_yr');
            $table->dropColumn('ssc_passing_yr');
            $table->dropColumn('ssc_board_name');
            $table->dropColumn('ssc_GPA');
            $table->dropColumn('companyName');
            $table->dropColumn('companyPosition');
            $table->dropColumn('joiningDate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicants', function (Blueprint $table) {

        });
    }
};