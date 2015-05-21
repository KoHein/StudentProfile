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

/** 
*	Frontend
**/
//home

Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@index']);

// Authoritation
Route::get('/login', [
	'as' => 'login', 
	'uses' => 'FrontendController@login'
	]);
Route::get('/register', [
	'as' => 'register',
	'uses' => 'FrontendController@register'
	]);
Route::post('/login', [
	'as' => 'loginPost', 
	'uses' => 'AuthController@login'
	]);
Route::post('/register', [
	'as' => 'registerPost', 
	'uses' => 'UserController@register'
	]);
Route::any('/editprofile', [
	'as' => 'editprofile',
	'uses' => 'FrontendController@editprofile'
	]);

Route::post('/contact', [
	'as' => 'contactForm',
	'uses' => 'FrontendController@contact'
	]);

Route::any('/addportfolio', [
	'as' => 'addportfolio',
	'uses' => 'PortfolioController@addportfolio'
	]);

/** 
*	Backend
**/ 

Route::group(['prefix' => 'admin', 'before' => 'auth.admin'], function(){

	Route::get('/', [
		'as' => 'backend', 
		'uses' => 'BackendController@index'
		]);

	Route::get('/students', [
		'as' => 'students', 
		'uses' => 'BackendController@students'
		]);
	Route::get('/activeduser', [
		'as' => 'activeduser', 
		'uses' => 'UserController@activeduser'
		]);
	Route::get('/viewstudent', [
		'as' => 'viewstudent', 
		'uses' => 'UserController@viewstudent'
		]);
	Route::any('/editstudent', [
		'as' => 'editstudent', 
		'uses' => 'UserController@editstudent'
		]);
	Route::delete('/deletstudent', [
		'as' => 'deletstudent', 
		'uses' => 'UserController@deletstudent'
		]);
	Route::any('/profile', [
		'as' => 'adminProfile', 
		'uses' => 'BackendController@profile'
		]);
	Route::get('/contacts', [
		'as' => 'contacts',
		'uses' => 'BackendController@contacts'
		]);
	Route::get('/portfolios', [
		'as' => 'portfolios',
		'uses' => 'BackendController@portfolios'
		]);
	Route::get('/contacts/detail', [
		'as' => 'contactDetail',
		'uses' => 'BackendController@contactDetail'
		]);
	Route::delete('/deleteContact', [
		'as' => 'deleteContact',
		'uses' => 'BackendController@deleteContact'
		]);
	
	Route::delete('/deleteportfolio', [
		'as' => 'deletePortfolio',
		'uses' => 'PortfolioController@deletePortfolio'
		]);

});

// Auth
Route::get('logout', [
	'as' => 'logout', 
	'uses'=> 'AuthController@logout'
	]);


