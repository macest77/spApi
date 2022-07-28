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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/listing', [App\Http\Controllers\ApiController::class, 'listing']);
Route::get('/show/{id}', [App\Http\Controllers\MailingController::class, 'show']);
Route::delete('/delete/{id}/{hash}', [App\Http\Controllers\MailingController::class, 'delete']);
