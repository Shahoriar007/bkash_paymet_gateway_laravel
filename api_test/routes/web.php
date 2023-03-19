<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApitestController;

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

Route::get('/products', function () {
    return view('products');
});

Route::post('/getToken', [ApitestController::class, 'getToken'])->name('getToken');

Route::post('/executePayment', [ApitestController::class, 'executePayment'])->name('executePayment');



// Route::post('/postToken', [ApitestController::class, 'createPayment'])->name('postToken');

// Route::post('/postPaymentId', [ApitestController::class, 'executePayment'])->name('postPaymentId');
