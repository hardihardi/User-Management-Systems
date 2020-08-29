<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

// route resource roles
Route::resource('roles', 'RoleController')->except('create', 'edit', 'show');

// route menu
Route::get('menu', 'MenuController@index')->name('menu.index');
Route::post('menu/store', 'MenuController@store')->name('menu.store');
Route::put('menu/{menu:slug}', 'MenuController@update')->name('menu.update');
Route::delete('menu/{menu:slug}', 'MenuController@destroy')->name('menu.destroy');

// route submenu
Route::get('submenu', 'SubmenuController@index')->name('submenu.index');
Route::get('submenu/create', 'SubmenuController@create')->name('submenu.create');
Route::post('submenu/store', 'SubmenuController@store')->name('submenu.store');
Route::get('submenu/{submenu:slug}/edit', 'SubmenuController@edit')->name('submenu.edit');
Route::put('submenu/{submenu:slug}', 'SubmenuController@update')->name('submenu.update');
Route::delete('submenu/{submenu:slug}', 'SubmenuController@destroy')->name('submenu.destroy');
Route::get('password', 'UserController@change')->name('password.edit');
Route::get('users/edit/{user}', 'UserController@edit')->name('users.edit');
Route::get('users', 'UserController@index')->name('users.index');
Route::put('users/{user}', 'UserController@update')->name('users.update');
