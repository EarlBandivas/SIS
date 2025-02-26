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
        Schema::create('classlist', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->primary(); // Make student_id the primary key
            $table->string('first_name');
            $table->string('last_name');
            $table->string('course');
            $table->timestamps();
    
            // Foreign key linking student_id to user_id in enrollments
            $table->foreign('student_id')->references('user_id')->on('enrollments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classlist');
    }
};
