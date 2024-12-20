<?php
use App\Http\Controllers\FeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\RefundRequestController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\WhatsAppController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CinetPayController;
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

Route::get('/', [AuthController::class, 'login1']);
Route::get('/DASHBORD', [UserController::class, 'index1'])->name('bb');
Route::get('/dash', function () {
    return view('partials.master');
});

Route::get('/fraisgeneral', [FeeController::class, 'index2'])->name('frais.indexa');
Route::get('/parent/{id}/payments', [FeeController::class, 'show'])->name('frais.index');
Route::get('/feesbilanpay', [FeeController::class, 'showFees'])->name('frais.pay');
Route::get('/pay/{class_id}', [FeeController::class, 'pay'])->name('payment.pay');



Route::get('/parent/fees', [FeeController::class, 'index3'])->name('parent.fees');
Route::resource('fees', FeeController::class);
Route::resource('users', UserController::class);

Route::get('/users/activate', [UserController::class, 'activate'])->name('users.activate');
Route::post('/users/set-password', [UserController::class, 'setPassword'])->name('users.set_password');


Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/parents', [UserController::class, 'showParents'])->name('parents.index');
Route::post('/parents/email/{id}', [UserController::class, 'sendEmail'])->name('parents.sendEmail');
Route::post('/parents/whatsapp/{id}', [UserController::class, 'sendWhatsApp'])->name('parents.sendWhatsApp');




Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth', 'parent'])->group(function () {
    Route::get('/children', [ChildController::class, 'index'])->name('children.index'); // Affichage de la liste et formulaire
    Route::post('/children', [ChildController::class, 'store'])->name('children.store'); // Enregistrement d'un enfant
});



Route::middleware('auth')->group(function () {
    Route::get('/refunds/create', [RefundRequestController::class, 'create'])->name('refunds.create');
    Route::post('/refunds', [RefundRequestController::class, 'store'])->name('refunds.store');
    Route::get('/refund-requests', [RefundRequestController::class, 'index'])->name('refunds.index');
    Route::delete('/refund-requests/{id}', [RefundRequestController::class, 'destroy'])->name('refund-requests.destroy');

});

Route::prefix('payement')->name('cinetpay.')->controller(CinetPayController::class)->group(function () {

    Route::get('', [CinetPayController::class, 'index'])->name('cine.pay');
    

    Route::post('', [CinetPayController::class, 'Payment'])->name('fees.payment');

    Route::match(['get', 'post'], '/notify_url', [CinetPayController::class, 'notify_url'])->name('notify_url');

    Route::match(['get', 'post'], '/return_url', [CinetPayController::class, 'return_url'])->name('return_url');

});



Route::post('/send-email', [EmailController::class, 'sendEmail']);


Route::post('/send-whatsapp', [WhatsAppController::class, 'sendWhatsApp']);
