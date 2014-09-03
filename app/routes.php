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
Route::get('/register', function(){
		return View::make('register');
});
Route::post('/register' , 'UserController@register');
Route::get('/remove/{id}' , 'UserController@remove');
Route::get('/edit/{id}' , 'UserController@edit');
Route::post('/edit/{id}' , 'UserController@edit');

# Admin Routes
Route::get('admin/register', function(){
		return View::make('admin-register');
});
Route::post('admin/register' , 'AdminController@register');