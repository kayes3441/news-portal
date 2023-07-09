<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
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
        });

        Route::controller(SubCategoryController::class)->group(function (){
            Route::get('/sub-category','index')->name('sub-category.index');
            Route::post('/sub-category/create','create')->name('sub-category.create');
        });
        Route::controller(SubSubCategoryController::class)->group(function (){
            Route::get('/sub-sub-category','index')->name('sub-sub-category.index');
            Route::get('/sub_sub-category/get-sub-category','getSubCategory')->name('sub-sub-category.get-sub-category');
            Route::post('/sub-sub-category/create','create')->name('sub-sub-category.create');
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
        Route::controller(PostController::class)->group(function (){
            Route::get('/post/index','index')->name('post.index');
            Route::get('/post/post-form','postForm')->name('post.post-form');
            Route::get('/post/get-sub-category','getSubCategory')->name('post.get-sub-category');
            Route::get('/post/get-sub-sub-category','getSubSubCategory')->name('post.get-sub-sub-category');
            Route::any('/post/create','create')->name('post.create');
        });
    });

});
