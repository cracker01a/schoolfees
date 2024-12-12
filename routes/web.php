<?php
use App\Http\Controllers\FeeController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dash', function () {
    return view('partials.master');
});
Route::resource('fees', FeeController::class);
Route::resource('users', UserController::class);