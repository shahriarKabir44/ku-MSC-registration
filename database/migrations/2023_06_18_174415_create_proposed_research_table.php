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

        Schema::create('proposed_research', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('supervisorName');
            $table->string('supervisorPosition');
            $table->integer('applicantId');
            $table->timestamps();
            $table->foreign('applicantId')
                ->references('id')->on('applicants')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposed_research');
    }
};