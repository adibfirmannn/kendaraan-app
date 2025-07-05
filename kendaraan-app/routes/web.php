<?php

use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Approver\DashboardApproverController;

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

Route::redirect('/', '/login');

Auth::routes();

// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/booking', [BookingController::class, 'index'])->name('admin.booking');
    Route::post('/admin/booking', [BookingController::class, 'store'])->name('admin.booking.store');
    Route::get('/admin/booking/export', [BookingController::class, 'export_excel'])->name('admin.booking.export');
});

// Approver
Route::middleware(['auth', 'role:approver'])->group(function () {
    Route::get('/approver/dashboard', [DashboardApproverController::class, 'index'])->name('approver.dashboard');
    Route::post('/approver/booking/approve', [DashboardApproverController::class, 'approve'])->name('approver.booking.approve');
    Route::get('/approver/booking/export', [DashboardApproverController::class, 'export_excel'])->name('approver.booking.export');
});
