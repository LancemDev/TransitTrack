<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


// Middlewares
use App\Http\Middleware\UserMiddleware as usermid;
use App\Http\Middleware\AdminMiddleware as  adminmid;
use App\Http\Middleware\SaccoMiddleware as saccomid;
use App\Http\Middleware\DriverMiddleware as drivermid;

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Livewire\HomePage;
use App\Livewire\Users\Home as UsersHome;
use App\Livewire\Admin\Home as AdminHome;
use App\Livewire\Sacco\Home as SaccoHome;
use App\Livewire\Driver\Home as DriverHome;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthLoginController;

use App\Livewire\Admin\ViewUsers;
use App\Livewire\Admin\ViewSaccos;
use App\Livewire\Admin\ViewDrivers;
use App\Livewire\Admin\ViewVehicles;

use App\Livewire\Admin\AddSacco;
use App\Livewire\Admin\AddVehicle;
use App\Livewire\Admin\AddDrivers as AddDriver;
use App\Livewire\Admin\AddUser;

use App\Livewire\Sacco\ManageDrivers;
use App\Livewire\Sacco\ManageVehicles;

use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/new/login', [AuthLoginController::class, 'login'])->name('new.auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

/*
 * -------------------------
 * Socialite Oauth2 routes
 * -------------------------
 */
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});
 

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    $newUser = \App\Models\User::firstOrCreate(
        ['email' => $user->email],
        [
            'name' => $user->name,
            'password' => Hash::make(Str::random(24)), 
        ]
    );

    // Log the user in
    Auth::login($newUser, true);

    return redirect('/home');
});


Route::get('/google/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});


Route::get('/login/google/callback', function () {
    $user = Socialite::driver('google')->user();

    $newUser = \App\Models\User::firstOrCreate(
        ['email' => $user->email],
        [
            'name' => $user->name,
            'password' => Hash::make(Str::random(24)), 
        ]
    );

    // Log the user in using a custom guard
    Auth::guard('users')->login($newUser);

    return redirect('/users/home');
});

Route::get('/test', function () {
    return view('welcomeTest');
});

Route::get('/home', HomePage::class);

/* Authentication routes */
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/logout', function () {
    $guards = array_keys(config('auth.guards'));

    foreach ($guards as $guard) {
        if (auth()->guard($guard)->check()) {
            auth()->guard($guard)->logout();
        }
    }

    return redirect('/');
})->name('logout');

Route::get('/auth-check', function(){
    return response()->json([
        'user' => auth()->user(),
        'guard' => auth()->getDefaultDriver()
    ]);
});


/*
 * -------------------------
 * Sacco Admin routes
 * -------------------------
 */
Route::middleware('auth:sacco_admin')->group(function () {
    Route::get('sacco/home', SaccoHome::class)->name('sacco_admin.home');
    Route::get('sacco/manage-drivers', ManageDrivers::class)->name('sacco.manage-drivers');
    Route::get('sacco/manage-vehicles', ManageVehicles::class)->name('sacco.manage-vehicles');
});

/*
 * -------------------------
 * Admin routes
 * -------------------------
 */

Route::middleware('auth:admin')->group(function () {
    Route::get('admin/home', AdminHome::class)->name('admin.home');
    Route::get('admin/view-users', ViewUsers::class)->name('admin.view-users');
    Route::get('admin/view-saccos', ViewSaccos::class)->name('admin.view-saccos');
    Route::get('admin/view-drivers', ViewDrivers::class)->name('admin.view-drivers');
    Route::get('admin/view-vehicles', ViewVehicles::class)->name('admin.view-vehicles');
    Route::get('admin/add-user', AddUser::class)->name('admin.add-user');
    Route::get('admin/add-sacco', AddSacco::class)->name('admin.add-sacco');
    Route::get('admin/add-vehicle', AddVehicle::class)->name('admin.add-vehicle');
    Route::get('admin/add-driver', AddDriver::class)->name('admin.add-driver');
});


/*
 * -------------------------
 * User routes
 * -------------------------
 */
Route::middleware('auth:users')->group(function () {
    Route::get('users/home', UsersHome::class)->name('user.home');
});

/*
 * -------------------------
 * Driver routes
 * -------------------------
 */
Route::middleware('auth:driver')->group(function () {
    Route::get('driver/home', DriverHome::class)->name('driver.home');
});
