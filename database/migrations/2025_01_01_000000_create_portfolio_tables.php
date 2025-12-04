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

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Site Settings
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Projects
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->text('full_description');
            $table->string('category'); // AI, Web, Mobile
            $table->json('tech_stack')->nullable(); // ["Laravel", "Vue"]
            $table->string('github_url')->nullable();
            $table->string('website_url')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });

        // Project Gallery Images
        Schema::create('project_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('image_path');
            $table->string('caption')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Activities / Blog Posts
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('thumbnail_path')->nullable();
            $table->json('gallery')->nullable();
            $table->json('tags')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        // Experience
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->string('company');
            $table->string('role');
            $table->string('category')->default('Professional');
            $table->string('location')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable(); // Null = Present
            $table->text('description')->nullable();
            $table->json('highlights')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->json('gallery')->nullable();
            $table->timestamps();
        });

        // Education
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('institution');
            $table->string('degree');
            $table->string('major')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->timestamps();
        });

        // Skills
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // Backend, Frontend, etc.
            $table->string('level')->nullable(); // Beginner, Intermediate, Advanced
            $table->string('icon_path')->nullable();
            $table->timestamps();
        });

        // Social Links
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('platform'); // GitHub, LinkedIn
            $table->string('url');
            $table->string('icon_class')->nullable(); // FontAwesome or SVG path
            $table->timestamps();
        });

        // CV Files
        Schema::create('cv_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_path');
            $table->string('public_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Achievements
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->string('image_path')->nullable();
            $table->string('certificate_url')->nullable();
            $table->json('gallery')->nullable();
            $table->timestamps();
        });

        // Publications
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('published_at')->nullable();
            $table->string('doi_url')->nullable();
            $table->string('certificate_image_path')->nullable();
            $table->json('gallery')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
        Schema::dropIfExists('achievements');
        Schema::dropIfExists('cv_files');
        Schema::dropIfExists('social_links');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('educations');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('project_images');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('site_settings');
    }
};
