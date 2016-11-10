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
	return View::make('hello');
});


Route::post('users', 'UsersController@store');
Route::post('users/login', 'UsersController@doLogin');
Route::post('users/confirmation', 'PaymentsController@confirm');

Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');

Route::get('users/logout', 'UsersController@logout');
Route::get('users/show', 'UsersController@show');

Route::post('payments/create', 'PaymentsController@store');
