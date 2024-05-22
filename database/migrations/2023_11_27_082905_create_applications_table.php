<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->unsignedBigInteger('department_id')->nullable(true);
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->string('endorsed_course_name');
            $table->string('endorsed_course_code');
            $table->float("credit_hours");
            $table->char("grade_obtained");
            $table->boolean("status")->nullable();
            $table->string('pdf_name')->nullable();
            $table->string('course_description')->nullable();
            // $table->binary('pdf_content')->nullable();
            // $table->longText('pdf_content')->nullable(); // Compatibility across DBMS
            // $table->mediumBlob('pdf_content')->nullable(); // Compatibility across DBMS
            $table->timestamps();
        });

        DB::statement("ALTER TABLE applications ADD pdf_content MEDIUMBLOB NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
