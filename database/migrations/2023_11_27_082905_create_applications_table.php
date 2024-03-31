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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string("user");
            $table->foreign('user')->references('matric_no')->on('users')->onDelete('cascade');
            $table->string('course_name');
            $table->string('course_code');
            $table->string('endorsed_course_name');
            $table->string('endorsed_course_code');
            $table->float("credit_hours");
            $table->char("grade_obtained");
            $table->boolean("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
