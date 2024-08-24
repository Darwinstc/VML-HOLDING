<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\DetallePrestamoController;

// RUTAS PUBLICAS AUTH
Route::post('/auth/register',[AuthController::class,'register']);
Route::post('/auth/login',[AuthController::class,'login']);
Route::apiResource('libro', LibroController::class);


Route::group(['middleware'=> 'auth:sanctum'],function () {

    ///////////////////logout//////////////////////////////
    Route::post('/auth/logout',[AuthController::class,'logout']);
    ////////////////////rutas privadas//////////////////////

    Route::apiResource('user', UserController::class);
    Route::apiResource('prestamo', PrestamoController::class);
    Route::get('prestamo/{idPrestamo}/detalleprestamo', [DetallePrestamoController::class, 'index']);
    Route::apiResource('detalleprestamo', DetallePrestamoController::class)->except(['index']);

});



