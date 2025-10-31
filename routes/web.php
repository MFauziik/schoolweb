<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('inventories', InventoryController::class);
});

// API Routes for real-time updates
Route::prefix('api/dashboard')->group(function () {
    Route::get('/activities', [DashboardController::class, 'apiRecentActivities'])->name('dashboard.activities');
    Route::get('/stats', [DashboardController::class, 'apiDashboardStats'])->name('dashboard.stats');
});

require __DIR__.'/auth.php';  // Jika pakai Breeze