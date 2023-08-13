<?php

use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\AllNewsController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\MessageController;
use App\Http\Controllers\Web\NewsDetailsController;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\UserProfilController;
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
    Route::get('logout',[UserController::class,'logout'])->name('logout')->middleware('user');
    Route::get('/',[HomeController::class,'home'])->name('home');
    Route::get('/details/{id}',[NewsDetailsController::class,'news_details'])->name('details');
    Route::get('/all-news',[AllNewsController::class,'all_news'])->name('all-news');
    Route::any('saved-news',[NewsDetailsController::class,'store_saved_news'])->name('saved-news')->middleware('user');
    Route::any('saved-news-list',[UserProfilController::class,'saved_news_list'])->name('saved-news-list')->middleware('user');
    Route::any('delete-saved-news',[UserProfilController::class,'delete_saved_news'])->name('delete-saved-news')->middleware('user');
    Route::post('comment',[NewsDetailsController::class,'comment'])->name('comment')->middleware('user');
    Route::post('reply',[NewsDetailsController::class,'reply'])->name('reply')->middleware('user');
    Route::get('contact-us',[PageController::class,'contact_us_page'])->name('contact-us');
    Route::post('message-store',[PageController::class,'message_store'])->name('message-store');
    Route::post('newslatter',[PageController::class,'newslatter'])->name('newslatter');

});
// Admin login-form

