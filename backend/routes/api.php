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

Route::get('/user/{id}/friends', function ($id) {
    return 'Hello world '.$id;
});
Route::get('/user/{id}/friendsoffriends', function ($id) {
    return 'Hello world '.$id;
});
Route::patch('/user/{id}/friends', function ($id) {
    return 'Hello world '.$id;
});
