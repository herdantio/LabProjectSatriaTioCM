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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/login', function () {
//    return view('login');
//});
Route::post('/login', 'UserController@login');
Route::get('/login', 'UserController@login_get');


Route::get('/register', function () {
    return view('register');
});

Route::post('/logout', 'UserController@logout');