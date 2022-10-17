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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

//Socialite Login Routes
// return Socialite::driver('google')->redirect();
// $user = Socialite::driver('google')->user();

Route::get('/login/google',[App\Http\Controllers\LoginController::class, 'redirectToGoogle'])->name('login.google');
 
Route::get('/auth/google/callback', [\App\Http\Controllers\LoginController::class, 'handleGoogleCallback']);
