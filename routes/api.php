<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PilocoCrudController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authentificated', function () {
    return true;
});

Route::post('register', [RegisterController::class, 'index']);
Route::post('login', [LoginController::class, 'index']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('dashboard', [PilocoCrudController::class, 'index']);



Route::group(['prefix' => 'piloco'], function () {
    Route::post('add', [PilocoCrudController::class, 'store']);
    Route::get('edit/{id}', [PilocoCrudController::class, 'edit']);
    Route::post('update/{id}', [PilocoCrudController::class, 'update']);
    Route::delete('delete/{id}', [PilocoCrudController::class, 'destroy']);
});
