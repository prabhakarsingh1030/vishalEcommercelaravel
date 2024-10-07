<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/index', function(){
    return view('admin.index');
});
// login routes
Route::get('/login',[AdminController::class,'index']);
Route::post('/admin/auth',[AdminController::class,'auth'])->name('admin.auth');