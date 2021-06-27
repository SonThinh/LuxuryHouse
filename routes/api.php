<?php

use App\Http\Controllers\API\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')->group(function () {
    Route::post('login', [AdminController::class, 'login']);
    Route::middleware('auth:admins')->group(function () {
        Route::delete('logout', [AdminController::class, 'logout']);
        Route::get('profile', [AdminController::class, 'me']);
    });
});
