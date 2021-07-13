<?php

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
Route::get('/', function () {
    echo 'Welcome to our API';
});

// Route::group([ 'prefix' => 'public'], function(){
Route::get('get-all-data', 'App\Http\Controllers\DirectoryController@getAllData');
Route::post('save-data', 'App\Http\Controllers\DirectoryController@save');
Route::get('delete-data/{type}/{id}', 'App\Http\Controllers\DirectoryController@delete');
// });