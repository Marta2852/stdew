<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChecklistItemController;
use App\Http\Controllers\AchievementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class);
    Route::resource('items', ChecklistItemController::class);

    Route::patch('/items/{item}/toggle', [ChecklistItemController::class, 'toggle'])->name('items.toggle');

    Route::get('/user/achievements', [AchievementController::class, 'index'])->name('achievements.index');
    Route::patch('/user/achievements/{achievement}/toggle', [AchievementController::class, 'toggle'])->name('achievements.toggle');
});