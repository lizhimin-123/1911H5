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

Route::get('/test/aes1','TestController@aes1');

Route::get('/test/aesdec','TestController@aesdec');
Route::get('/test/sing1','TestController@sing1');
Route::get('/test/header1','TestController@header1');


Route::any('/user/login','User\IndexController@login');
Route::any('/user/reg','User\IndexController@reg');
Route::any('/user/index','User\IndexController@index');

