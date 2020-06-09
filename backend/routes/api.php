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
});
Route::get('/user/{username}/friendsoffriends', function ($username, Request $request) {
    return 'Hello world '.$username;
});
Route::patch('/user/{username}/friends', function ($username, Request $request) {
    return 'Hello world '.$username;
});
