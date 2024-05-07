<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\Users\Home as UsersHome;
use App\Livewire\Admin\Home as AdminHome;
use App\Livewire\Sacco\Home as SaccoHome;
use App\Livewire\Driver\Home as DriverHome;
use App\Livewire\Login;
use App\Livewire\Register;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', HomePage::class);
Route::get('/login', Login::class);
Route::get('/register', Register::class);

// User routes with middleware to be created later
Route::prefix('users')->group(function () {
    Route::get('/home', UsersHome::class);

});

// Admin routes with middleware to be created later
Route::prefix('admin')->group(function () {
    Route::get('/home', AdminHome::class);

});

// Sacco routes with middleware to be created later
Route::prefix('sacco')->group(function () {
    Route::get('/home', SaccoHome::class);

});


// Driver routes with middleware to be created later
Route::prefix('driver')->group(function () {
    Route::get('/home', DriverHome::class);
    
});
