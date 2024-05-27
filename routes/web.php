<?php

use App\Http\Controllers\Hike;
use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use App\Models\Hikes;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [Home::class, 'home']);
Route::get('/hike/{id}', [Hike::class, 'hikeDetails']);   

