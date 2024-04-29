<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register',[AuthController::class,'register']);

Route::post('login',[AuthController::class,'login']);

Route::get('/user',[UserController::class,'index'])->middleware('auth:sanctum');

Route::post('logout',[AuthController::class, 'logout'])->middleware('auth:sanctum');
