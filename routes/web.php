<?php

use App\Http\Controllers\Hike;
use App\Http\Controllers\Home;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Home::class, 'home'])->name("home");

Route::get('/hikes/id={id}', [Hike::class, 'hikeDetails'])->name("hike.details");

Route::get('/hikes', [Hike::class, 'index'])->name('hikes.index');
Route::get('/hike/{id}', [Hike::class, 'hikeDetails'])->name('hike.details');
Route::get('/addHike', [Hike::class, 'showCreateForm'])->name('hike.create');
Route::post('/addHike', [Hike::class, 'createHike'])->name('hike.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

