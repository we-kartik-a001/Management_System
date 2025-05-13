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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->unsignedBigInteger('courses_id')->nullable(); // make it nullable if you want "set null" on delete
            $table->timestamps();

            // Correct foreign key implementation
            $table->foreign('courses_id') // fix typo here
                  ->references('id')
                  ->on('courses')
                  ->onDelete('set null'); // correct onDelete action
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
