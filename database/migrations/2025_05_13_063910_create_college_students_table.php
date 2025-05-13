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
        Schema::create('college_students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('teachers_id')->nullable();
            $table->unsignedBigInteger('courses_id')->nullable();
            $table->timestamps();

            /**
             * foreign key implementation 
             */
            $table->foreign('teachers_id')
                  ->references('id')
                  ->on('teachers')
                  ->onDelete('set null');

            $table->foreign('courses_id')
                  ->references('id')
                  ->on('courses')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('college_students');
    }
};
