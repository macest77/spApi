<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\MailingController::class, 'listing'])->name('home');
Route::get('/send', [App\Http\Controllers\MailingController::class, 'send'])->name('send');
Route::post('/send', [App\Http\Controllers\MailingController::class, 'sendpost'])->name('send');
Route::get('/show/{id}', [App\Http\Controllers\MailingController::class, 'show'])->name('show');
Route::get('/delete/{id}', [App\Http\Controllers\MailingController::class, 'delete'])->name('delete');