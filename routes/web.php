<?php

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

Route::get('/', function () {
    return view('welcome');
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


Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');


/*
 * -------------------------
 * Sacco Admin routes
 * -------------------------
 */
Route::get('sacco/home', SaccoHome::class)->name('sacco_admin.home');
Route::get('sacco/manage-drivers', ManageDrivers::class)->name('sacco.manage-drivers');
Route::get('sacco/manage-vehicles', ManageVehicles::class)->name('sacco.manage-vehicles');
// Route::get('sacco/home', SaccoHome::class)->name('sacco_admin.home')->middleware('auth:sacco_admin')->middleware(saccomid::class);

/*
 * -------------------------
 * Admin routes
 * -------------------------
 */
Route::get('admin/home', AdminHome::class)->name('admin.home');
// Route::get('admin/home', AdminHome::class)->name('admin.home')->middleware('auth:admin')->middleware(adminmid::class);
Route::get('admin/view-users', ViewUsers::class)->name('admin.view-users');
// Route::get('admin/view-users', ViewUsers::class)->name('admin.view-users')->middleware('auth:admin')->middleware(adminmid::class);
// Route::get('admin/add-user', AddUser::class)->name('admin.add-user')->middleware('auth:admin')->middleware(adminmid::class);
Route::get('admin/view-saccos', ViewSaccos::class)->name('admin.view-saccos');
// Route::get('admin/add-sacco', AddSacco::class)->name('admin.add-sacco')->middleware('auth:admin')->middleware(adminmid::class);
Route::get('admin/view-drivers', ViewDrivers::class)->name('admin.view-drivers');
Route::get('admin/view-vehicles', ViewVehicles::class)->name('admin.view-vehicles');
Route::get('admin/add-user', AddUser::class)->name('admin.add-user');
Route::get('admin/add-sacco', AddSacco::class)->name('admin.add-sacco');
Route::get('admin/add-vehicle', AddVehicle::class)->name('admin.add-vehicle');
Route::get('admin/add-driver', AddDriver::class)->name('admin.add-driver');

/*
 * -------------------------
 * User routes
 * -------------------------
 */
Route::get('users/home', UsersHome::class)->name('user.home');
// Route::get('users/home', UsersHome::class)->name('user.home')->middleware('auth:users')->middleware(usermid::class);

// Driver routes
Route::get('driver/home', DriverHome::class)->name('driver.home');
// Route::get('driver/home', DriverHome::class)->name('driver.home')->middleware('auth:driver')->middleware(drivermid::class);

