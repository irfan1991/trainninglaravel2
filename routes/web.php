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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/helo', function(){
		return "Hello World";
});
Route::get('test', function(){
	return view('halaman');
});

Route::get('user/{id}', function($id){
	return "User :".$id;
});

Route::get('user/{id}/{nama}', function($id,$nama){
	return view('halaman', compact('id','nama'));
});

Route::resource('shares', 'ShareController');
