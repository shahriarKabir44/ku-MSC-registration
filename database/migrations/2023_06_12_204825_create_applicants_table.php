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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('name');
            $table->string('fatherName');
            $table->string('motherName');
            $table->string('gender');
            $table->string('religion');
            $table->string('email');
            $table->string('phone');
            $table->string('permanentAddress');
            $table->string('birthDate');
            $table->string('nationality');
            $table->string('discipline');
            $table->string('presentAddress');
            $table->string('hons_passing_yr');
            $table->string('hons_university');
            $table->string('hons_GPA');
            $table->string('hsc_GPA');
            $table->string('hsc_board_name');
            $table->string('hsc_passing_yr');
            $table->string('ssc_passing_yr');
            $table->string('ssc_board_name');
            $table->string('ssc_GPA');
            $table->string('companyName')->nullable();
            $table->string('companyPosition')->nullable();
            $table->string('joiningDate')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};