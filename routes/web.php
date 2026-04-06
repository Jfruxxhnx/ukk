<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FashionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {

    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    return view('user.index');
});

Route::get('/login',[AuthController::class,'loginForm']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);

Route::middleware(['role:admin'])->group(function(){

    Route::get('/admin/dashboard', function(){
        return view('admin.dashboard.index');
    });

    Route::resource('admin/fashion', FashionController::class);
    Route::resource('admin/category', CategoryController::class);
    Route::resource('admin/pesanan', Ordercontroller::class);
    Route::resource('admin/laporan', ReportController::class);
    Route::resource('admin/user', UserController::class);

    Route::get('admin/fashion/{slug}', [FashionController::class, 'show']);
    Route::get('admin/fashion/edit/{slug}', [FashionController::class, 'edit']);
    Route::get('admin/fashion/update/{slug}', [FashionController::class, 'update']);

});
