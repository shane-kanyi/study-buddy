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
        Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->foreignId('tutor_session_id')->constrained('tutor_sessions')->onDelete('cascade');
        $table->foreignId('student_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreignId('tutor_id')->references('id')->on('users')->onDelete('cascade');
        $table->unsignedTinyInteger('rating'); // 1 to 5
        $table->text('comment')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
