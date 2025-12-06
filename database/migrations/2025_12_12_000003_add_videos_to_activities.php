<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $withinTransaction = false;
    public function up(): void
    {
        if (Schema::hasTable('activities') && !Schema::hasColumn('activities', 'videos')) {
            Schema::table('activities', function (Blueprint $table) {
                $table->json('videos')->nullable()->after('gallery');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('activities') && Schema::hasColumn('activities', 'videos')) {
            Schema::table('activities', function (Blueprint $table) {
                $table->dropColumn('videos');
            });
        }
    }
};
