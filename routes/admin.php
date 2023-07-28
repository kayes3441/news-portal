<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\NewsController;

Route::group(['namespace' => 'Admin','prefix'=>'admin','as'=>'admin.',],function (){

    Route::get('/login-form',[AdminController::class,'loginForm'])->name('login-form');
    Route::post('/login',[AdminController::class,'login'])->name('login');
    Route::get('/reset-password-form',[AdminController::class,'resetPasswordForm'])->name('reset-password-form');
    Route::post('/reset-password',[AdminController::class,'resetPassword'])->name('reset-password');
    Route::get('/update-reset-password-form/{token}',[AdminController::class,'updateResetPasswordForm'])->name('update-reset-password-form');
    Route::post('/update-reset-password',[AdminController::class,'updateResetPassword'])->name('update-reset-password');

    Route::group(['middleware'=>'admin',],function (){
        Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('dashboard');
        Route::get('/logout',[AdminController::class,'logout'])->name('logout');

        Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function (){
            Route::get('/','index')->name('index');
            Route::post('/sotre','sotre')->name('store');
            Route::post('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','edit')->name('edit');
            Route::post('/status-update','status_update')->name('status_update');
        });
        Route::controller(SubCategoryController::class)->prefix('sub-category')->name('sub-category.')->group(function (){
            Route::get('/','index')->name('index');
            Route::post('/sotre','sotre')->name('store');
            Route::post('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','edit')->name('edit');
            Route::post('/status-update','status_update')->name('status_update');
        });
        Route::controller(SubSubCategoryController::class)->prefix('sub-sub-category')->name('sub-sub-category.')->group(function (){
            Route::get('/','index')->name('index');
            Route::get('/get-sub-category','get_sub_category')->name('get-sub-category');
            Route::post('/sotre','sotre')->name('store');
            Route::post('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','edit')->name('edit');
            Route::post('/status-update','status_update')->name('status_update');
        });
        Route::controller(BannerController::class)->group(function (){
            Route::get('/banner/index','index')->name('banner.index');
            Route::get('/banner/banner-form','bannerForm')->name('banner.banner-form');
            Route::any('/banner/create','create')->name('banner.create');
        });
        Route::controller(TagController::class)->group(function (){
            Route::get('/tag/index','index')->name('tag.index');
            Route::any('/tag/create','create')->name('tag.create');
        });
        Route::controller(NewsController::class)->prefix('news')->name('news.')->group(function (){
            Route::get('/','index')->name('index');
            Route::get('/add-news','add_news')->name('add-news');
            Route::post('/store','sotre')->name('store');
            Route::post('/news-type-store','news_type_store')->name('news-type-store');
            Route::get('/trending-news','trending_news')->name('trending-news');
            Route::get('/feature-news','feature_news')->name('feature-news');
            Route::get('/pending-news','pending_news')->name('pending-news');
            Route::get('/verified-news','verified_news')->name('verified-news');

        });
    });

});
