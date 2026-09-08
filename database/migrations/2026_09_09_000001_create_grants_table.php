<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grants', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('Education & Skills');
            $table->string('badge_color')->default('primary'); // primary, success, danger, warning, info
            $table->string('amount_range')->nullable(); // e.g. "₹5 - ₹10 Lakhs"
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('tags')->nullable(); // comma-separated tags/features e.g. "Equipment Support, Study Materials, Teacher Capacity"
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grants');
    }
};
