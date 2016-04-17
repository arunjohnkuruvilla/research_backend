<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', array('uses' => 'UserController@index'));
Route::get('user', array('uses' => 'UserController@user'));
Route::get('user/login', array('uses' => 'UserController@login'));
Route::get('user/logout', array('uses' => 'UserController@logout'));
Route::post('user/linkedin_complete', array(
	'before' => 'csrf',
	'as' => 'linkedin_complete_post',
	'uses' => 'UserController@linkedinCompletePost'
));
Route::get('users', array('uses' => 'UserController@users'));