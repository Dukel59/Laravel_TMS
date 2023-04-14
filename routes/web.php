<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'main'])->name('main');
Route::get('/products', [MainController::class, 'products'])->name('products');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');

Route::group(['controller' => AuthController::class], function (){
    Route::get('/login',  'getLoginPage')->name('auth.loginPage');
    Route::post('/login', 'login')->name('auth.login');
    Route::get('/register', 'getRegisterPage')->name('auth.registerPage');
    Route::post('/register', 'register')->name('auth.register');
    Route::get('/logout', 'logout')->name('auth.logout');
});

Route::group(['prefix' => '/account', 'controller' => AccountController::class, 'middleware' => 'auth'], function (){
    Route::get('/', 'account')->name('account.show');
    Route::post('/', 'updateAccount')->name('account.update');
});
