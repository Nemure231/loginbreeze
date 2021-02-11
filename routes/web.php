<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/barang', [BarangController::class, 'index'])->name('daftar_barang');
Route::post('/barang', [BarangController:: class, 'store']);
Route::put('/barang/{barang}', [BarangCOntroller::class, 'update']);
Route::delete('/barang/{barang}', [BarangController::class, 'destroy']);