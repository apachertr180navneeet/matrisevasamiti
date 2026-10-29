<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news_events', function (Blueprint $table) {
            if (!Schema::hasColumn('news_events', 'meta_title')) {
                $table->string('meta_title')->nullable()->after('content');
            }
            if (!Schema::hasColumn('news_events', 'meta_keywords')) {
                $table->text('meta_keywords')->nullable()->after('meta_title');
            }
            if (!Schema::hasColumn('news_events', 'meta_description')) {
                $table->text('meta_description')->nullable()->after('meta_keywords');
            }
        });
    }

    public function down(): void
    {
        Schema::table('news_events', function (Blueprint $table) {
            $table->dropColumn(['meta_title', 'meta_keywords', 'meta_description']);
        });
    }
};

