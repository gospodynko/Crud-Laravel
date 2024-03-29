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


Auth::routes();


Route::get('/', "PostController@index");



Route::get('/post/create',"PostController@create");


Route::get('/post/{post}',"PostController@show");

Route::post('/post/',"PostController@store");

Route::get('/post/{post}/edit', "PostController@edit");

Route::patch('/post/{post}', "PostController@update");

Route::delete('/post/{post}', "PostController@destroy");



