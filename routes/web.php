<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MutliuploadsController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionControllers;
use App\Http\Controllers\UserControllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: ' . $param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: ' . $param1;
});

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/mk', [PegawaiController::class, 'index']);

Route::post('question/store', [QuestionControllers::class, 'store'])->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('checkislogin');

Route::resource('pelanggan', PelangganController::class);

Route::resource('user', UserControllers::class);

Route::get('/multipleuploads', [MutliuploadsController::class, 'index'])->name('uploads');
Route::post('/save', [MutliuploadsController::class, 'store'])->name('uploads.store');
// Auth Routes
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['checkrole:admin']], function () {
    Route::get('user', [UserControllers::class , 'index'])->name('user.list');
});
