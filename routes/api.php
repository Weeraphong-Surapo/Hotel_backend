<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'auth','namespace'=>'Auth'],function(){
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);

    Route::get('me',[AuthController::class,'me']);
});

Route::get('category',[CategoryController::class,'index']);
Route::post('category', [CategoryController::class, 'store']);
Route::get('category/edit/{id}', [CategoryController::class, 'edit']);
Route::put('category/update/{id}', [CategoryController::class, 'update']);
Route::delete('category/delete/{id}', [CategoryController::class, 'delete']);
