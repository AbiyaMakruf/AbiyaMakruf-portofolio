<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $withinTransaction = false;
    public function up(): void
    {
        if (Schema::hasTable('projects') && !Schema::hasColumn('projects', 'videos')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->json('videos')->nullable()->after('thumbnail_path');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('projects') && Schema::hasColumn('projects', 'videos')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropColumn('videos');
            });
        }
    }
};
