<?php

use App\Http\Controllers\Hike;
use App\Http\Controllers\Home;
use App\Http\Controllers\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [Home::class, 'home'])->name('home');

Route::get('/hikes', [Hike::class, 'index'])->name('hikes.index');
Route::get('/hike/{id}', [Hike::class, 'hikeDetails'])->name('hike.details');


// USERS
Route::get('/login', [Authentication::class, 'show'])->name('login');   
Route::post('/login', [Authentication::class, 'authenticate']);
Route::get('/logout', [Authentication::class, 'logout']);
Route::get('/register', [Register::class, 'register'])->name('register');   
Route::post('/register', [Register::class, 'addUser']);   
Route::get('/user-profile', [UserController::class, 'index']);
Route::get('/admin', [UserController::class, 'adminDashboard']);
Route::get('/user-profile/edit', [UserController::class, 'editProfile']);
Route::get('/user-profile/change-password', [UserController::class, 'changePassword']);


