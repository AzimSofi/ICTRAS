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
        Schema::create('endorsed_courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('university');
            // $table->string('course_name');
            $table->integer('department_id');
            $table->string('course_name');
            $table->string('endorsed_course_name');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endorsed_courses');
    }
};
