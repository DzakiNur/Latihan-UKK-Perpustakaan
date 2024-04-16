<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PeminjamanController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'indexLogin']);


// Route Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Route Buku
Route::get('/admin/books', [AdminController::class, 'buku'])->name('admin.book')->middleware('login');
Route::get('/admin/books/create', [BukuController::class, 'create'])->name('admin.add-book')->middleware('login');
Route::post('/admin/books/store', [BukuController::class, 'store'])->name('admin.book.store')->middleware('login');
Route::get('/admin/books/edit/{id}', [BukuController::class, 'edit'])->name('admin.book.edit')->middleware('login');
Route::post('/admin/books/update/{id}', [BukuController::class, 'update'])->name('admin.book.update')->middleware('login');
Route::post('/admin/books/delete/{id}', [BukuController::class, 'delete'])->name('admin.book.delete')->middleware('login');


// Route Kategori
Route::get('/admin/category', [AdminController::class, 'kategori'])->name('admin.category')->middleware('login');
Route::get('/admin/categories/create', [KategoriController::class, 'create'])->name('admin.add-category')->middleware('login');
Route::post('/admin/category/store', [KategoriController::class, 'store'])->name('admin.category.store')->middleware('login');
Route::get('/admin/category/edit/{id}', [KategoriController::class, 'edit'])->name('admin.category.edit')->middleware('login');
Route::post('/admin/category/update/{id}', [KategoriController::class, 'update'])->name('admin.category.update')->middleware('login');
Route::post('/admin/category/delete/{id}', [KategoriController::class, 'delete'])->name('admin.category.delete')->middleware('login');

// Route Koleksi
Route::get('/admin/books/collections', [AdminController::class, 'koleksi'])->name('admin.collection')->middleware('login');
Route::post('/admin/books/collections/store', [KoleksiController::class, 'store'])->name('admin.collection.store')->middleware('login');

// Route User
Route::get('/admin/users/', [AdminController::class, 'user'])->name('admin.user')->middleware('login');
Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.add-user')->middleware('login');
Route::post('/admin/users/store', [AdminController::class, 'storeUser'])->name('admin.user.store')->middleware('login');
Route::get('/admin/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.user.edit')->middleware('login');
Route::post('/admin/users/update/{id}', [AdminController::class, 'updateUser'])->name('admin.user.update')->middleware('login');
Route::post('/admin/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete')->middleware('login');

// Route Peminjaman
Route::get('/admin/books/borrow/', [AdminController::class, 'peminjaman'])->name('admin.borrow')->middleware('login');
Route::post('/admin/books/borrow/store', [PeminjamanController::class, 'store'])->name('admin.borrow.store')->middleware('login');


// Route Login
Route::get('/login', [AuthController::class, 'indexLogin'])->name('indexLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route Register
Route::get('/register', [AuthController::class, 'indexRegister'])->name('indexRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
