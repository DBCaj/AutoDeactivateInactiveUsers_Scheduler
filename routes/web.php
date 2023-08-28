<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


////////////// login logout - start /////////////
Route::controller(AuthController::class)->group(function() {
  Route::get('/', 'login')->name('login.form');
  Route::post('/login-auth', 'loginAuth')->name('login.auth');
  Route::get('/logout', 'logout')->name('logout');
  Route::post('/register-auth', 'register')->name('register.auth');
  Route::view('/register', 'layouts.register')->name('register.form');
});
////////////// login logout - end //////////////


//////////// auth middleware - start ////////////
Route::middleware('custom_auth')->controller(AuthController::class)->group(function() {
  Route::get('/dashboard', 'dashboard')->name('dashboard');
  Route::get('/switch', 'switchAccount')->name('switch.account');
});
//////////// auth middleware - end ////////////
