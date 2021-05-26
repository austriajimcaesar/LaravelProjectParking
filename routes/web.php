<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Route::resources([
//     '/admin' => AdminController::class,
//     '/customer' => VehicleController::class,
//     '/home' => HomeController::class,
//     '/login' => Auth\LoginController::class,
//     '/transaction' => TransactionController::class
// ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
//Route::get('/vehicle', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicle');
Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction');

//Route::resource('/admin', 'App\Http\Controllers\AdminController');
Route::resource('/vehicle', 'App\Http\Controllers\VehicleController');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');