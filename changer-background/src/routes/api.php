<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Fortify::loginView(function(){
    return view('auth.login');
});

Fortify::authenticateUsing(function(Request $request){
    $user = User::where('email',$request->email)->first();
    if($user && Hash::check($request->password,$user->password)){
        return $user;
    }
});
Fortify::registerView(function(){
    return view('auth.register');
});

Route::post('/change-bg-submit',[\App\Http\Controllers\ChangeBackgroundController::class,'submit'])->name('change-bg-submit');
