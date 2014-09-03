<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::get('/home', function()
{
	return View::make('home');
});


# User Routes
Route::get('/list' , 'UserController@show');
Route::get('/register' , 'UserController@register');
Route::post('/register' , 'UserController@register');
Route::get('/register-success', function(){
		return View::make('register-success');
});
