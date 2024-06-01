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
            $table->integer('category_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile')->unique();
            $table->text('image')->nullable();
            $table->text('address')->nullable();
            $table->string('nid')->unique()->nullable();
            $table->string('blood_group')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->timestamps();
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
