<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('bookings/create/{room_id}',[BookingController::class,'create']);
Route::post('bookings/store/{user_id}/{room_id}',[BookingController::class,'store']);
Route::get('bookings/{booking_id}/delete',[BookingController::class,'destroy'])->middleware('role:super-admin');
Route::resource('bookings', BookingController::class)->middleware('role:super-admin|staff|user');


Route::get('rooms/{room_id}/delete',[RoomController::class,'destroy'])->middleware('role:super-admin');
Route::resource('rooms', RoomController::class);


Route::get('permissions/{id}/delete',[PermissionController::class,'destroy'])->middleware('role:super-admin');
Route::resource('permissions', PermissionController::class)->middleware('role:super-admin');


Route::get('roles/{id}/delete',[RoleController::class,'destroy'])->middleware('role:super-admin');
Route::resource('roles', RoleController::class)->middleware('role:super-admin');


Route::get('users/{user_id}/delete',[UserController::class,'destroy'])->middleware('role:super-admin');
Route::resource('users', UserController::class)->middleware('role:super-admin|staff');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
