<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'Auth\LoginController@showFormLogin')->name('login');
Route::get('register', 'Auth\RegisterController@showFormRegister')->name('register');
Route::get('/dashboard', 'DashboardController@index');
Route::resource('roles', 'RoleController');
