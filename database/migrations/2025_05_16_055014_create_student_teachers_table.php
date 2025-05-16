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
        Schema::create('student_teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('college_student_id');
            $table->unsignedBigInteger('teachers_id');
            $table->timestamps();

            //Foreign key declaration 
            $table->foreign('college_student_id')
                  ->references('id')
                  ->on('college_students')
                  ->onDelete('cascade');

            $table->foreign('teachers_id')
                  ->references('id')
                  ->on('teachers')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_teachers');
    }
};
