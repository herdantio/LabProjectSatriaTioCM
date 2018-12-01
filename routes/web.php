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
Route::get('/login', 'UserController@login_getPage'); //guest can go this far only
Route::get('/logout', 'UserController@logout');

Route::get('/profile', 'UserController@userProfile');
Route::put('/profile', 'UserController@updateProfile');

Route::get('/insertpost', 'Post_Image_Controller@insertPost_getPage');
Route::post('/insertpost', 'Post_Image_Controller@postImage');
//Route::get('/updatepost/{id}','Post_Image_Controller@edit');
//Route::put('/updatepost/{id}','Post_Image_Controller@updateImage');

Route::get('/postdetail/{post_id}', 'Post_Image_Controller@viewDetail');
Route::get('/deletepost/{post_id}', 'Post_Image_Controller@deleteImage');
Route::post('/postdetail/{post_id}', 'CommentController@addComment');

//admin only pages
Route::get('/manageusers', 'UserController@manageUsers') -> middleware('admin');
Route::get('/manageusers/{id}', 'UserController@edit') -> middleware('admin');
Route::put('/edituser/{id}', 'UserController@updateByAdmin') -> middleware('admin');
Route::get('/deleteuser/{id}', 'UserController@deleteUser') -> middleware('admin');

Route::get('/managecategories', 'CategoryController@manage_getPage') -> middleware('admin');
Route::get('/insertcategories', 'CategoryController@insert_getPage') -> middleware('admin');
Route::post('/insertcategories', 'CategoryController@add') -> middleware('admin');
Route::get('/updatecategories/{id}', 'CategoryController@edit') -> middleware('admin');
Route::put('/updatecategories/{id}', 'CategoryController@update') -> middleware('admin');
Route::get('/deletecategories/{id}', 'CategoryController@delete') -> middleware('admin');
Route::get('/viewalltransactions', 'TransactionController@viewAll_getPage') -> middleware('admin');
