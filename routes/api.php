<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
$url = "App\Http\Controllers";

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

// Route::resource('/murid',$url . '\MuridController');
// Route::resource('/kelas',$url . '\KelasController');
Route::get('login',$url . '\UserController@loginError');
Route::post('login',$url . '\UserController@login')->name('login');
Route::post('register',$url . '\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('user/detail', 'App\Http\Controllers\UserController@details');
    Route::post('logout', 'App\Http\Controllers\UserController@logout');
    Route::resource('/murid','App\Http\Controllers\MuridController');
});