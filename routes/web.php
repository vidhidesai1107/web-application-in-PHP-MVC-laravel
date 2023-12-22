<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserSearchController;
use App\Http\Controllers\VerificationController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [UserController::class, 'showRegistrationForm']);
// Route::post('/register', [UserController::class, 'register']);
Route::get('/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/register', [UserController::class, 'register'])->name('register');


Route::middleware(['admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index']);
    Route::post('/admin/users/{user}/toggle-status', [AdminController::class, 'toggleStatus'])->name('admin.toggleStatus');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);
// Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');

Route::get('/admin/create', function () {
    return view('admin.create');
})->name('admin.create');

Route::get('/user/search', [UserSearchController::class, 'index'])->name('user.search');
Route::post('/user/search', [UserSearchController::class, 'search'])->name('user.search.submit');

Route::middleware(['jwt.auth'])->group(function () {
    Route::post('/user-details', [ApiController::class, 'getUserDetails']);
});