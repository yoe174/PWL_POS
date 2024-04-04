<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
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
// Route::get('/', function () {
//     return view('welcome');
//     // return view('welcome2');
// });

Route::get('/',[WelcomeController::class, 'index']);

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);


// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kategori',[KategoriController::class, 'index']);

// Praktikum 3
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class, 'store']);

//Tugas 3 js5
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/edit_simpan/{id}', [KategoriController::class, 'edit_simpan'])->name('kategori.edit_simpan');

// tugas 4 js5
Route::get('/kategori/hapus/{id}', [KategoriController::class, 'hapus'])->name('kategori.hapus');

// A.JS 6
// Routing Form User dan Level
Route::get('/formUser', [UserController::class, 'formUser']);
Route::get('/formLevel', [UserController::class, 'formLevel']);

// D.JS 6
Route::resource('m_user', POSController::class);

// JS.7 Prak3 no.3
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);          //menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);      //menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);   //menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);         //menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);       //menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);  //menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);     //menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); //menghapus data user
});