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


        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('publishingDate');
            $table->string('paperLink');
            $table->integer('applicantId');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research');
    }
};