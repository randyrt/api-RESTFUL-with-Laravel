<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\InvoiceController;
use App\Http\Controllers\Api\v1\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    Route::apiResource('customer', CustomerController::class);
    Route::apiResource('invoice', InvoiceController::class);
}); */

/*REGISTER AND LOGIN*/
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

/*ROUTES ONLY FOR USER AUTHENTIFICATE */
Route::middleware('auth:sanctum')->group(function () {

    /*CUSTOMERS ROUTES*/ 
    Route::get('v1/customers', [CustomerController::class, 'index']);
    Route::post('v1/customers/create', [CustomerController::class, 'create']);
    Route::get('v1/customers', [CustomerController::class, 'show']);
    Route::put('v1/customers/edit/{customer}', [CustomerController::class, 'update']);
    Route::delete('v1/customers/delete/{customer}', [CustomerController::class, 'destroy']);

    /*INVOICES ROUTES*/
    Route::get('v1/invoices', [InvoiceController::class, 'index']);
    Route::post('v1/invoices/create', [InvoiceController::class, 'create']);
    Route::get('v1/invoices', [InvoiceController::class, 'show']);
    Route::put('v1/invoices/edit/{invoice}', [InvoiceController::class, 'update']);
    Route::delete('v1/invoices/delete/{invoice}', [InvoiceController::class, 'destroy']);

    
    Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
   


