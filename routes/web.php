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

Route::group(['prefix' => '/admin', 'middleware' => 'admin', 'as' => 'admin.'], function (){
    Route::group(['prefix' => '/products', 'as' => 'products.'], function (){
        Route::get('/', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('index');
        Route::get('/export-excel', [\App\Http\Controllers\Admin\ProductController::class, 'exportExcel'])->name('export.excel');
        Route::get('/import-excel', [\App\Http\Controllers\Admin\ProductController::class, 'importExcel'])->name('import.excel');
        Route::get('/export-csv', [\App\Http\Controllers\Admin\ProductController::class, 'exportCSV'])->name('export.csv');

        Route::get('/create', [\App\Http\Controllers\Admin\ProductController::class, 'createView'])->name('create.view');
        Route::post('/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');

        Route::get('/update/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('update.view');
        Route::post('/update/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');

        Route::get('/delete/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('delete');
    });
});
