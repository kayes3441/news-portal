<?php

use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\AllNewsController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\NewsDetailsController;
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
Route::group(['namespace'=>'web'],function (){
    Route::post('registration',[UserController::class,'registration'])->name('registration');
    Route::post('login',[UserController::class,'login'])->name('login');
    Route::get('logout',[UserController::class,'logout'])->name('logout');
    Route::get('/',[HomeController::class,'home'])->name('home');
    Route::get('/details/{id}',[NewsDetailsController::class,'news_details'])->name('details');
    Route::get('/all-news',[AllNewsController::class,'all_news'])->name('all-news');

});
// Admin login-form

