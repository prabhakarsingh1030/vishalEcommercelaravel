<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('admin/index', function(){
//     return view('admin.index');
// });
// login routes

Route::get('/login',[AdminController::class,'index']);
Route::post('/admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'], function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin/category',[CategoryController::class,'index']);
    Route::get('/admin/manage_category',[CategoryController::class,'manage_category']);
    Route::get('/admin/updatepassword',[AdminController::class,'updatepass']);
   
});
Route::get('admin/logout',[AdminController::class,'logout']);
