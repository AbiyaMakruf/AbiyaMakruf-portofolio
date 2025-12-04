<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Disable transaction for this migration.
     */
    public $withinTransaction = false;

    public function up(): void
    {
        if (Schema::hasTable('social_links') && !Schema::hasColumn('social_links', 'icon_path')) {
            Schema::table('social_links', function (Blueprint $table) {
                $table->string('icon_path')->nullable()->after('icon_class');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('social_links') && Schema::hasColumn('social_links', 'icon_path')) {
            Schema::table('social_links', function (Blueprint $table) {
                $table->dropColumn('icon_path');
            });
        }
    }
};
