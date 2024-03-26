<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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


// Route Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Route Buku
Route::get('/admin/buku', [AdminController::class, 'buku'])->name('admin.buku');

// Route Kategori
Route::get('/admin/kategori', [AdminController::class, 'kategori'])->name('admin.kategori');


// Route Login
Route::get('/login', [AuthController::class, 'indexLogin'])->name('indexLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route Register
Route::get('/register', [AuthController::class, 'indexRegister'])->name('indexRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
