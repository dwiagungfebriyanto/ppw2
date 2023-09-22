<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BukuController;

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

Route::get('/beranda', [PostController::class, 'home']);
Route::get('/tentang', [PostController::class, 'about']);

Route::get('/buku', [BukuController::class, 'index']);
// menambah buku
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
//menghapus buku
Route::post('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
// update/edit buku
Route::get('buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
// store update
Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');