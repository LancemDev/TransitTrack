<?php

// Middlewares
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SaccoMiddleware;
use App\Http\Middleware\DriverMiddleware;

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\Users\Home as UsersHome;
use App\Livewire\Admin\Home as AdminHome;
use App\Livewire\Sacco\Home as SaccoHome;
use App\Livewire\Driver\Home as DriverHome;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', HomePage::class);
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');


// User routes with middleware to be created later
Route::prefix('users')->group(function () {
    Route::get('/home', UsersHome::class)->name('user.home');
})->middleware(UserMiddleware::class);

// Admin routes with middleware to be created later
Route::prefix('admin')->group(function () {
    Route::get('/home', AdminHome::class)->name('admin.home');
})->middleware(AdminMiddleware::class);

// Sacco routes with middleware to be created later
Route::prefix('sacco')->group(function () {
    Route::get('/home', SaccoHome::class)->name('sacco.home');

})->middleware(SaccoMiddleware::class);


// Driver routes with middleware to be created later
Route::prefix('driver')->group(function () {
    Route::get('/home', DriverHome::class)->name('driver.home');
    
})->middleware(DriverMiddleware::class);
