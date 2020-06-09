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

Route::get('/user/{username}/friends', function ($username,Request $request) {
    return 'Hello world '.$username;
})->where('username', '[A-Za-z0-9]+');
Route::get('/user/{username}/friendsoffriends', function ($username) {
    return 'Hello world '.$username;
})->where('username', '[A-Za-z0-9]+');
Route::patch('/user/{username}/friends', function ($username) {
    return 'Hello world '.$username;
})->where('username', '[A-Za-z0-9]+');
