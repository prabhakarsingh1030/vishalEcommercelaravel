<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


// Route::get('admin/index', function(){
//     return view('admin.index');
// });
// login routes

Route::get('admin/login',[AdminController::class,'index']);
Route::post('/admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'], function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);

    // for category

    Route::get('/admin/category',[CategoryController::class,'index']);
    Route::get('/admin/category/manage_category',[CategoryController::class,'manage_category']);  
    Route::get('/admin/category/manage_category/{id}',[CategoryController::class,'manage_category']);  
    Route::post('/admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');
    Route::get('/admin/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    Route::get('/admin/category/status/{status}/{id}',[CategoryController::class,'status'])->name('category.status');



    // for coupons 



    Route::get('/admin/coupon',[CouponController::class,'index']);
    Route::get('/admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);  
    Route::get('/admin/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']);  
    Route::post('/admin/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon.manage_coupon_process');
    Route::get('/admin/coupon/delete/{id}',[CouponController::class,'delete'])->name('coupon.delete');
    Route::get('/admin/coupon/status/{status}/{id}',[CouponController::class,'status'])->name('coupon.status');



    // end coupons route




    // for size 


    

    Route::get('/admin/size',[SizeController::class,'index']);
    Route::get('/admin/size/manage_size',[SizeController::class,'manage_size']);  
    Route::get('/admin/size/manage_size/{id}',[SizeController::class,'manage_size']);  
    Route::post('/admin/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('size.manage_size_process');
    Route::get('/admin/size/delete/{id}',[SizeController::class,'delete'])->name('size.delete');
    Route::get('/admin/size/status/{status}/{id}',[SizeController::class,'status'])->name('size.status');


    // for color

    Route::get('/admin/color',[ColorController::class,'index']);
    Route::get('/admin/color/manage_color',[ColorController::class,'manage_color']);  
    Route::get('/admin/color/manage_color/{id}',[ColorController::class,'manage_color']);  
    Route::post('/admin/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('color.manage_color_process');
    Route::get('/admin/color/delete/{id}',[ColorController::class,'delete'])->name('color.delete');
    Route::get('/admin/color/status/{status}/{id}',[ColorController::class,'status'])->name('color.status');




   
   
   
});
Route::get('admin/logout',[AdminController::class,'logout']);
Route::get('/admin/updatepassword',[AdminController::class,'updatepass']);
