<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('previous_institutions', function (Blueprint $table) {
            $table->id();
            $table->string('matric_no')->unique();
            $table->foreign('matric_no')->references('matric_no')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->boolean('degree_status');
            $table->string('degree_or_diploma_name');
            $table->integer('year_of_study');
            $table->string('reason_of_leaving');
            $table->float('cgpa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previous_institutions');
    }
};
