<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\TwoFactor;
use Laravel\Fortify\Features;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::redirect('/dashboard', '/admin/dashboard');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/skills', [HomeController::class, 'skills'])->name('skills');
Route::get('/career', [HomeController::class, 'career'])->name('career');
Route::get('/career/{experience:slug}', [HomeController::class, 'careerShow'])->name('career.show');
Route::get('/activity', [HomeController::class, 'activity'])->name('activity');
Route::get('/cv/download', [HomeController::class, 'downloadCv'])->name('cv.download');

// AI Endpoint
Route::post('/api/ask-me', [AiController::class, 'ask'])->name('ai.ask');

// Admin / Dashboard Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Resource Routes
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('skills', \App\Http\Controllers\Admin\SkillController::class);
    Route::resource('achievements', \App\Http\Controllers\Admin\AchievementController::class);
    Route::resource('publications', \App\Http\Controllers\Admin\PublicationController::class);
    Route::resource('experiences', \App\Http\Controllers\Admin\ExperienceController::class);
    Route::resource('educations', \App\Http\Controllers\Admin\EducationController::class);
    Route::resource('activities', \App\Http\Controllers\Admin\ActivityController::class);
    Route::resource('socials', \App\Http\Controllers\Admin\SocialLinkController::class);
    Route::get('cv', [\App\Http\Controllers\Admin\CvController::class, 'index'])->name('cv.index');
    Route::post('cv', [\App\Http\Controllers\Admin\CvController::class, 'store'])->name('cv.store');
    Route::resource('settings', \App\Http\Controllers\Admin\SiteSettingController::class)->only(['index', 'store']);

    Route::redirect('account', 'account/profile');

    Route::get('account/profile', Profile::class)->name('profile.edit');
    Route::get('account/password', Password::class)->name('user-password.edit');
    Route::get('account/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
