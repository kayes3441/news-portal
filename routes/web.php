<?php

use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\AllNewsController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\MessageController;
use App\Http\Controllers\Web\NewsDetailsController;
use App\Http\Controllers\Web\PageController;
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
    Route::any('saved-news',[NewsDetailsController::class,'store_saved_news'])->name('saved-news');
    Route::post('comment',[NewsDetailsController::class,'comment'])->name('comment');
    Route::post('reply',[NewsDetailsController::class,'reply'])->name('reply');
    Route::get('contact-us',[PageController::class,'contact_us_page'])->name('contact-us');
    Route::post('message-store',[PageController::class,'message_store'])->name('message-store');
    Route::post('newslatter',[PageController::class,'newslatter'])->name('newslatter');

});
// Admin login-form

