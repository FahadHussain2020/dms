<?php

use Illuminate\Http\Request;

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

// Route::post('registeruser', 'Controller@registeruser');

Route::post('loginuser', 'Controller@loginuser');
Route::get('getusers', 'Controller@getusers');
Route::get('getBreverages', 'Controller@getBreverages');
Route::get('getCosmetics', 'Controller@getCosmetics');
Route::get('getMedicine', 'Controller@getMedicine');
Route::get('getorders/{id}', 'Controller@getorders');
// Route::get('getorders', 'Controller@getorders');
Route::get('getuserbyId/{id}', 'Controller@getuserbyId');
Route::get('getorderbyId/{name}', 'Controller@getorderbyId');
Route::get('getorderbyordid/{id}', 'Controller@getorderbyordid');
Route::post('updateuser/{id}', 'Controller@updateuser');
Route::post('createordr', 'Controller@createordr');



