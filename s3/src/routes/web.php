<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/avatar', [\App\Http\Controllers\AvatarUpload::class,'index'])->name('avatar-view');
Route::post('/avatar-save',[\App\Http\Controllers\AvatarUpload::class,'upload'])->name('avatar-submit');
