<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('contacts',[ContactController::class,'list']);
Route::get('contacts/{id}', [ContactController::class, 'show']);
Route::post('contacts', [ContactController::class, 'create']);
Route::put('contacts/{id}', [ContactController::class, 'update']);
Route::delete('contacts/{id}', [ContactController::class, 'delete']);




Route::get('addresses', [AddressController::class, 'list']);
Route::get('addresses/{id}', [AddressController::class, 'show']);
Route::post('addresses', [AddressController::class, 'create']);
Route::put('addresses/{id}', [AddressController::class, 'update']);
Route::delete('addresses/{id}', [AddressController::class, 'delete']);
