<?php

use App\Http\Controllers\HomeControlelr;
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
    Route::get('/',[HomeControlelr::class,'home'])->name('home');
});
// Admin login-form

