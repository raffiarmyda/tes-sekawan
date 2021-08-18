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


Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
Route::get('login', function () {
    return view('login', ["title" => "Login"]);
})->middleware('guest');
Route::get('logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/login');
});

Route::middleware('auth')->group(function(){

Route::get('/', function () {
    return view('home', ["title" => "Home"]);
});
Route::get('/home', function () {
    return view('home', ["title" => "Home"]);
});

Route::get('/user', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/user/create_user', [\App\Http\Controllers\UserController::class, 'create']);
Route::post('/user', [\App\Http\Controllers\UserController::class, 'store']);
Route::get('/user/delete_user/{user}', [\App\Http\Controllers\UserController::class, 'destroy']);
Route::get('/user/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit']);
Route::post('/update_user/{user}', [\App\Http\Controllers\UserController::class, 'update']);

Route::get('/driver', [\App\Http\Controllers\DriverController::class, 'index']);
Route::get('/driver/create_driver', [\App\Http\Controllers\DriverController::class, 'create']);
Route::post('/driver', [\App\Http\Controllers\DriverController::class, 'store']);
Route::get('/driver/delete_driver/{driver}', [\App\Http\Controllers\DriverController::class, 'destroy']);
Route::get('/driver/{driver}/edit', [\App\Http\Controllers\DriverController::class, 'edit']);
Route::post('/update_driver/{driver}', [\App\Http\Controllers\DriverController::class, 'update']);

Route::get('/vehicle', [\App\Http\Controllers\VehicleController::class, 'index']);
Route::get('/vehicle/create_vehicle', [\App\Http\Controllers\VehicleController::class, 'create']);
Route::post('/vehicle', [\App\Http\Controllers\VehicleController::class, 'store']);
Route::get('/vehicle/delete_vehicle/{vehicle}', [\App\Http\Controllers\VehicleController::class, 'destroy']);
Route::get('/vehicle/{vehicle}/edit', [\App\Http\Controllers\VehicleController::class, 'edit']);
Route::post('/update_vehicle/{vehicle}', [\App\Http\Controllers\VehicleController::class, 'update']);

Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index']);
Route::get('/order/create_order', [\App\Http\Controllers\OrderController::class, 'create']);
Route::post('/order', [\App\Http\Controllers\OrderController::class, 'store']);
Route::get('/order/delete_order/{order}', [\App\Http\Controllers\OrderController::class, 'destroy']);
Route::get('/order/{vehicle}/edit', [\App\Http\Controllers\OrderController::class, 'edit']);
Route::post('/update_order/{order}', [\App\Http\Controllers\OrderController::class, 'update']);

Route::get('/order/{order}/accept',[\App\Http\Controllers\OrderController::class,'accept']);
Route::get('/order/{order}/decline',[\App\Http\Controllers\OrderController::class,'decline']);
});
