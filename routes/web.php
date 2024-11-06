<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerusahaanController;

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
    return view('user.index');
});

Auth::routes();

//Normal Users Routes List
Route::middleware(['auth', 'UserAccess:user'])->group(function () {
   
    Route::get('/home', [HomeController::class, 'index'])->name('index');
});
   
//Admin Routes List
Route::middleware(['auth', 'UserAccess:admin'])->group(function () {
   
    Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin');
});
   
// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/report/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/report/store', [ReportController::class, 'store'])->name('reports.store');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/tentang-kami', [UserController::class, 'tentangKami'])->name('tentangKami');
    Route::get('/laporan', [UserController::class, 'laporan'])->name('laporan');
    Route::get('/data-laporan', [UserController::class, 'dataLaporan'])->name('dataLaporan');
    Route::get('/kontak', [UserController::class, 'kontak'])->name('kontak');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
