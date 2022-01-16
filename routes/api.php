<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\base\CitiesController;
use App\Http\Controllers\base\StatesController;
use App\Http\Controllers\base\CompanyController;
use App\Http\Controllers\base\CountriesController;

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
Route::get('/brand', [App\Http\Controllers\base\BrandController::class, 'index']);
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
    Route::resource('states', StatesController::class);
    Route::resource('cities', CitiesController::class);
    Route::resource('companies', CompanyController::class);
});
