<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PengantarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoverController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\GiftController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
//invit
Route::get('/invit/{hashid}/{nama_tamu}', [LandingController::class, 'showInvitation'])->name('landing.invitation');
Route::put('/invit/update-status/{id}', [LandingController::class, 'update'])->name('landing.update');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'main'])->name('dashboard.main');
    //Guest
    Route::get('/dashboard/guest', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/guest/create', [DashboardController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard/guest/store', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/{id}/guest/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/{id}/guest/delete', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
    
    //cover
    Route::get('/dashboard/edit/cover', [CoverController::class, 'index'])->name('dashboard.edit.cover');
    Route::post('/dashboard/update-cover', [CoverController::class, 'update'])->name('dashboard.update.cover');
    //pengantar
    Route::get('/dashboard/edit/pengantar', [PengantarController::class, 'index'])->name('dashboard.edit.pengantar');
    Route::post('/dashboard/update-pengantar', [PengantarController::class, 'update'])->name('dashboard.update.pengantar');
    //home
    Route::get('/dashboard/edit/home', [HomeController::class, 'index'])->name('dashboard.edit.home');
    Route::post('/dashboard/update-home', [HomeController::class, 'update'])->name('dashboard.update.home');
    //Info
    Route::get('/dashboard/edit/info', [InfoController::class, 'index'])->name('dashboard.edit.info');
    Route::post('/dashboard/update-info', [InfoController::class, 'update'])->name('dashboard.update.info');
    //Galeri
    Route::get('/dashboard/edit/galeri', [GaleriController::class, 'index'])->name('dashboard.edit.galeri');
    Route::post('/dashboard/update-galeri', [GaleriController::class, 'update'])->name('dashboard.update.galeri');
    Route::get('/dashboard/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::post('/dashboard/galeri/upload-temp', [GaleriController::class, 'uploadToTemporary'])->name('galeri.upload.temp');
    Route::post('/dashboard/galeri/confirm', [GaleriController::class, 'confirmGallery'])->name('galeri.confirm');
    Route::delete('/dashboard/galeri/temp/{id}', [GaleriController::class, 'destroyTemporary'])->name('galeri.temp.destroy');
    Route::delete('/dashboard/galeri/{id}', [GaleriController::class, 'destroyGallery'])->name('galeri.destroy');
    Route::get('/galeri/temp', [GaleriController::class, 'fetchTemporary'])->name('galeri.temp.fetch');

    //story
    Route::get('/dashboard/story', [StoryController::class, 'index'])->name('dashboard.edit.story');
    Route::post('/dashboard/story/store', [StoryController::class, 'store'])->name('story.store');
    Route::get('/dashboardstory/{id}/edit', [StoryController::class, 'edit'])->name('story.edit');
    Route::put('/dashboard/story/{id}', [StoryController::class, 'update'])->name('story.update');
    Route::delete('/dashboard/story/{id}', [StoryController::class, 'destroy'])->name('story.destroy');
    //gift
    Route::get('/dashboard/edit/gift', [GiftController::class, 'edit'])->name('dashboard.edit.gift');
    Route::post('/dashboard/update-gift', [GiftController::class, 'updateOrCreate'])->name('dashboard.update.gift');
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::post('/home/update', [HomeController::class, 'update'])->name('home.update');
//     Route::post('/dashboard/info/update', [InfoController::class, 'update'])->name('info.update');
//     Route::post('/dashboard/galeri/update', [GaleriController::class, 'update'])->name('galeri.update');
// });




require __DIR__ . '/auth.php';
