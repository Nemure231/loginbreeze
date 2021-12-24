<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\AksesmenuController;
use App\Http\Controllers\SatuanController;

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

///route verifikasi email pada auth, yang artinya jika email belum pernah diverivikasi user tidak bisa
///mengakses halaman di dalam fungsi group ferivikasi
Route::middleware(['auth', 'verified'])->group(function(){
///////////Dashboard//////////
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

///Crud Barang///////////
Route::get('/barang', [BarangController::class, 'index'])->name('daftar_barang');
Route::post('/barang', [BarangController::class, 'store']);
Route::put('/barang/{barang}', [BarangController::class, 'update']);
Route::delete('/barang/{barang}', [BarangController::class, 'destroy']);
Route::get('/barang/export', [BarangController::class, 'export']);
Route::post('/barang/import', [BarangController::class, 'import']);


///////Crud Role/////////////
Route::get('/role', [RoleController::class, 'index'])->name('daftar_role');
Route::post('/role', [RoleController:: class, 'store']);
Route::put('/role/{role}', [RoleController::class, 'update']);
Route::delete('/role/{role}', [RoleController::class, 'destroy']);


////////menu/////////////
Route::get('/menu', [MenuController::class, 'index'])->name('daftar_menu');
Route::post('/menu', [MenuController::class, 'store']);
Route::put('/menu/{menu}', [MenuController::class, 'update']);
Route::delete('/menu/{menu}', [MenuController::class, 'destroy']);

////////menu/////////////
Route::get('/menu/submenu', [SubmenuController::class, 'index'])->name('daftar_submenu');
Route::post('/menu/submenu', [SubmenuController::class, 'store']);
Route::put('/menu/submenu/{submenu}', [SubmenuController::class, 'update']);
Route::delete('/menu/submenu/{submenu}', [SubmenuController::class, 'destroy']);


//////////////////akses menu//////////////
Route::get('/role/role_akses/{role_akses}', [AksesmenuController::class, 'edit']);
Route::put('/role/role_akses/ajax', [AksesmenuController::class, 'update']);


////////satuan/////////////
Route::get('/satuan', [SatuanController::class, 'index'])->name('daftar_satuan');
Route::post('/satuan', [SatuanController::class, 'store']);
Route::put('/satuan/{satuan}', [SatuanController::class, 'update']);
Route::delete('/satuan/{satuan}', [SatuanController::class, 'destroy']);

});
