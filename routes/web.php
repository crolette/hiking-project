<?php

use App\Http\Controllers\Hike;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HikeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HikeUpdateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/hikes', [HikeController::class, 'index'])->name('hike.hikes');
Route::get('/hikes/tag={tag}', [HikeController::class, 'index'])->name("hike.tags");

Route::get('/hikes/id={id}', [HikeController::class, 'hikeDetails'])->name("hike.details");


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/addHike', [HikeController::class, 'create'])->name('hike.create');
    Route::post('/addHike', [HikeController::class, 'store'])->name('hike.store');

    Route::delete('/dashboard/id={id}', [HikeController::class, 'destroy'])->name('hike.destroy');

    Route::get('/dashboard/id={id}/edit', [HikeUpdateController::class, 'create'])->name('hike.edit');
    Route::patch('/dashboard/id={id}/patch', [HikeUpdateController::class, 'update'])->name('hike.update');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
