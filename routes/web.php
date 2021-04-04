<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('{room}')->name('room.')->group(function () {
    Route::get('/', [RoomController::class, 'newPlay'])->name('newPlay');
    Route::get('controller', [RoomController::class, 'controller'])->name('controller');
    Route::get('/{player}', [RoomController::class, 'play'])->name('play');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
