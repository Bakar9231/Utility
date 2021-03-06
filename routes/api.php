<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cities/{value}', 'UtilityController@allcity');

Route::get('/states/{value}', 'UtilityController@allstates');

Route::get('/state/{coubtry}', 'UtilityController@allstatebycountry');

Route::get('/country/{key}/{value}', 'UtilityController@countries');

Route::get('/countries', 'UtilityController@allcountries');