<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [
    DashboardController::class,
    'index'
])->name('dashboard');

Route::resource('room-types', RoomTypeController::class);

Route::resource('rooms', RoomController::class);

Route::resource('customers', CustomerController::class);

Route::resource('bookings', BookingController::class);

Route::resource('services', ServiceController::class);

Route::resource('invoices', InvoiceController::class);

Route::resource('payments', PaymentController::class);