<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Section
Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@store');

Route::get('/login', function () {
    return view('login.signin');
});

// Management Section
Route::get('/management', 'ManagementController@management');
Route::get('/management/dashboard', 'ManagementController@management');