<?php

use Illuminate\Support\Facades\Route;
//use Spatie\Permission\models\Role;
// creacion de roles con spatie
//$role = Role::create(['name'=>'admin']);
//$role = Role::create(['name'=>'client']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('welcome');
});
Route::get('/client', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('welcome');
});