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

// route to show the login form

Route::get('home', array('uses' => 'HomeController@showHome'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('dashboard', array('uses' => 'HomeController@showDashboard'));

Route::get('category', array('uses' => 'HomeController@showCategory'));

Route::get('payment', array('uses' => 'HomeController@showPayment'));
Route::post('payment', array('uses' => 'HomeController@showPayment'));

Route::get('admin', array('uses' => 'HomeController@showAdmin'));

Route::get('download', array('uses' => 'HomeController@showDownload'));
Route::post('download', array('uses' => 'HomeController@showDownload'));

Route::get('test', array('uses' => 'HomeController@showTest'));
Route::post('test', array('uses' => 'HomeController@showTest'));

Route::get('merge', array('uses' => 'HomeController@merge'));
Route::post('merge', array('uses' => 'HomeController@merge'));
