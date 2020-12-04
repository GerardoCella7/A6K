<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::group(['auth:sanctum', 'verified'], function (){

    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/{id}', [BookingController::class, 'details'])->name('booking.details');

    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::get('/client/{id}', [ClientController::class, 'details'])->name('client.details');

    Route::get('/material', [MaterialController::class, 'index'])->name('material.index');
    Route::get('/material/create', [MaterialController::class, 'create'])->name('material.create');
    Route::post('/material/create', [MaterialController::class, 'store'])->name('material.store');
    Route::get('/material/edit/{id}', [MaterialController::class, 'edit'])->name('material.edit');
    Route::get('/material/{id}', [MaterialController::class, 'details'])->name('material.details');
    Route::patch('/material/{id}', [MaterialController::class, 'update'])->name('material.update');

    Route::get('/room', [RoomController::class, 'index'])->name('room.index');
    Route::get('/room/{id}', [RoomController::class, 'details'])->name('room.details');
    
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});