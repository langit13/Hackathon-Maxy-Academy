<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Normal Users Routes List
Route::middleware(['auth', 'UserAccess:user'])->group(function () {
   
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
   
//Admin Routes List
Route::middleware(['auth', 'UserAccess:admin'])->group(function () {
   
    Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin');
});
   
//Admin Routes List
Route::middleware(['auth', 'UserAccess:company'])->group(function () {
   
    Route::get('/company/home', [HomeController::class, 'company'])->name('company');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');