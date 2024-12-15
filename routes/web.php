<?php
use App\Http\Controllers\FeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChildController;

use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class, 'login']);
Route::get('/DASHBORD', [UserController::class, 'index1'])->name('bb');
Route::get('/dash', function () {
    return view('partials.master');
});
Route::resource('fees', FeeController::class);
Route::resource('users', UserController::class);

Route::get('/users/activate', [UserController::class, 'activate'])->name('users.activate');
Route::post('/users/set-password', [UserController::class, 'setPassword'])->name('users.set_password');


Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth', 'parent'])->group(function () {
    Route::get('/children', [ChildController::class, 'index'])->name('children.index'); // Affichage de la liste et formulaire
    Route::post('/children', [ChildController::class, 'store'])->name('children.store'); // Enregistrement d'un enfant
});
