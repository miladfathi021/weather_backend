<?php

use App\Http\Controllers\V1\Weather\WeatherController;
use Illuminate\Http\Request;
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

Route::group(['prefix' => '/v1'], function () {
    Route::get('/current-weather', [WeatherController::class, 'index'])
        ->name('current.weather.index');

    Route::post('/current-weather', [WeatherController::class, 'store'])
        ->name('current.weather.store');
});
