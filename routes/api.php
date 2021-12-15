<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\Auth\LoginController;

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

// Login route
Route::post('/login', [LoginController::class, 'login']);
Route::get('/category', [App\Http\Controllers\base\CategoriesController::class, 'index']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //     return $request->user();
    // });

Route::middleware('auth:sanctum')->group(function () {
    // get the current user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // logout
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::resource('countries', CountriesController::class);
});
