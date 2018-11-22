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

//halaman paling pertama
Route::get('/', function () {
    return view('home');
});

//Route::get('/login', function () {
//    return view('login');
//});

//Route::get('/register', function () {
//    return view('register');
//});
Route::post('/register', 'UserController@register');
Route::get('/register', 'UserController@register_get');
Route::post('/login', 'UserController@login');
Route::get('/login', 'UserController@login_get');
Route::get('/logout', 'UserController@logout');

Route::get('/manageUsers', 'UserController@manageUsers');
Route::get('/manageUsers/{id}', 'UserController@edit');
Route::put('/edituser', 'UserController@updateAdmin');

Route::get('/profile', 'UserController@userProfile');
Route::put('/profile', 'UserController@updateProfile');

