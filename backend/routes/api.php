<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Facades\App\Repositories\UserRepository as User;

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
    $results = User::getUserWithRefs($username,'friends')->friends;
    if (!$results)  return 'no friends';
    return $results;
});
Route::get('/user/{username}/friendsoffriends', function ($username, Request $request) {
    $results = User::getUserWithRefs($username,'friendsFriends')->friendsFriends;
    if (!$results)  return 'no friends';
    return $results;
});
Route::patch('/user/{username}/friends', function ($username, Request $request) {
    $result = User::addUserNewFriend($username, $request->username);
    if(!$result) return 'username not found';
    return response()->json($result);
});
