<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('job_type')->default('Full Time'); // Full Time, Part Time, Internship, Volunteer, Contract
            $table->string('location')->nullable();
            $table->string('experience')->nullable();
            $table->string('qualification')->nullable();
            $table->string('stipend_salary')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->date('deadline')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
