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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('specialty_id');
             $table->string('name');
            $table->string('title')->nullable(); 
            $table->string('image')->nullable(); 
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();
             $table->foreign('specialty_id') ->references('id')->on('specialties') ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
