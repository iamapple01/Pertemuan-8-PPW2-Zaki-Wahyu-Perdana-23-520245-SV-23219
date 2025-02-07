<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\BukuController;
use App\Models\Buku;
use Illuminate\Support\Facades\Route;

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

Route::get('/post', [PostController::class, 'index']);

Route::get('/buku', [BukuController::class, 'index']);

Route::get('/create', [BukuController::class, 'create'])->name('create');

Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');

Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

route::post('/buku/{id}/update', [BukuController::class, 'update'])->name('buku.update');

