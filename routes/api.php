<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketsController;

Route::post('register',[AuthController::class,'register']);

Route::post('login',[AuthController::class,'login']);

Route::group([
    'middleware' => 'auth:sanctum'
],function(){
    Route::get('/user',[UserController::class,'index']);

    Route::post('logout',[AuthController::class, 'logout']);

    Route::post('ticket/create',[TicketsController::class,'createTicket'])->name('ticket.create');

    Route::delete('ticket/{id}/delete',[TicketsController::class,'deleteTicket'])->name('ticket.delete');

    Route::post('ticket/send-message',[TicketsController::class,'sendMessage'])->name('ticket.send-message');

});

Route::get('/test', function () {
    return response()->json(["message" => "API is working fine"]);
});

