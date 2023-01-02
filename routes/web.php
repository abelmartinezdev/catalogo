<?php

use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\UserController;
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

Auth::routes(['verify' => true]);
// Private Routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/without/breadcrumbs', [App\Http\Controllers\HomeController::class, 'about'])->name('about');


    Route::get('/customers/list',[App\Http\Controllers\CustomerController::class,'list'])->name('customer.list');
    Route::get('/customers/{customer}/get-customer',[App\Http\Controllers\CustomerController::class,'getCustomer'])->name('customer.getCustomer');
    Route::get('/customers/{customer}/edit',[App\Http\Controllers\CustomerController::class,'edit'])->name('customer.edit');
    Route::put('/customers/{customer}/update',[App\Http\Controllers\CustomerController::class,'update'])->name('customer.update');
    Route::get('/customers/create',[App\Http\Controllers\CustomerController::class,'create'])->name('customer.create');
    Route::get('/customers/search-rfc',[App\Http\Controllers\CustomerController::class,'search'])->name('customer.searchRfc');
    Route::post('/customers/store',[App\Http\Controllers\CustomerController::class,'store'])->name('customer.store');
    Route::delete('/customers/{customer}/destroy',[App\Http\Controllers\CustomerController::class,'destroy'])->name('customer.destroy');
});

Route::fallback(function () {
    abort(404);
});
