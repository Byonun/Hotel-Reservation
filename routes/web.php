<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/', [AdminController::class, 'home']);
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/add_room', [AdminController::class, 'addRoomForm'])->name('admin.add_room');
Route::post('/add_room', [AdminController::class, 'storeRoom'])->name('admin.store_room');
Route::get('/room_data', [AdminController::class, 'room_data']);
Route::get('/room_update/{id}', [AdminController::class, 'roomUpdateForm'])->name('admin.room_update');
Route::post('/update_room/{id}', [AdminController::class, 'updateRoom'])->name('admin.update_room');
Route::get('/room_delete/{id}', [AdminController::class, 'room_delete']);
Route::get('/room_detail/{id}', [HomeController::class, 'room_detail']);
Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);
Route::get('/booked_data', [HomeController::class, 'booked_data']);
Route::get('/booked_update/{id}', [HomeController::class, 'bookedUpdate'])->name('admin.booked_update');
Route::post('/update_booked/{id}', [HomeController::class, 'updateBooked'])->name('admin.update_booked');
Route::get('/bookedDelete/{id}', [HomeController::class, 'bookedDelete']);