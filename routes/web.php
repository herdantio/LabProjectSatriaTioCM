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


//Route::get('/', function () {
//    return view('home', 'PostImageController@homePosts');
//});

//Route::get('/login', function () {
//    return view('login');
//});

//Route::get('/register', function () {
//    return view('register');
//});

//home page
Route::get('/', 'PostImageController@home_getPage');

//accessible to all users
Route::post('/register', 'UserController@register');
Route::get('/register', 'UserController@register_getPage');
Route::post('/login', 'UserController@login');
Route::get('/login', 'UserController@login_getPage');
Route::get('/logout', 'UserController@logout');

Route::get('/profile', 'UserController@userProfile');
Route::put('/profile', 'UserController@updateProfile');

Route::get('/insertPost', 'Post_Image_Controller@insertPost_getPage');
Route::post('/insertPost', 'Post_Image_Controller@postImage');
//Route::get('/updatepost/{id}','Post_Image_Controller@edit');
//Route::put('/updatepost/{id}','Post_Image_Controller@updateImage');

Route::get('/postdetail/{id}', 'Post_Image_Controller@viewDetail');

//admin only pages
Route::get('/manageusers', 'UserController@manageUsers') -> middleware('admin');
Route::get('/manageusers/{id}', 'UserController@edit') -> middleware('admin');
Route::put('/edituser/{id}', 'UserController@updateByAdmin') -> middleware('admin');
Route::get('/deleteuser/{id}', 'UserController@deleteUser') -> middleware('admin');

Route::get('/managecategories', 'CategoryController@manage_getPage');
Route::get('/insertcategories', 'CategoryController@insert_getPage');
Route::post('/insertcategories', 'CategoryController@add');
Route::get('/updatecategories/{id}', 'CategoryController@edit');
Route::put('/updatecategories/{id}', 'CategoryController@update');
Route::get('/deletecategories/{id}', 'CategoryController@delete');
