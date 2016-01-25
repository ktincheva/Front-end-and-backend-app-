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

Route::any('/', 'HomeController@index');


Route::group(['middleware' => ['web']], function () {
 Route::resource('users', 'UsersController');
 Route::resource('cities', 'CitiesController');

 Route::get('/api/directions/{from_city}/{to_city}', 'APIController@getDirections');
 Route::get('/api/getcities', 'APIController@getCities');
 //Route::post('/api/directions', 'APIController@getDirections');
 //Route::any('api/directions', 'APIController@getDirections');
 Route::resource('/api', 'APIController');
 Route::resource('/home', 'HomeController');
 Route::post('getdata', 'HomeController@getData');
 Route::post('showresponce', 'HomeController@showResponceData');
 Route::post('getcities', 'HomeController@getCitiesData');
});
Event::listen('illuminate.query', function() {
    /* print_r("<pre>");
      debug_print_backtrace();
      print_r("</pre>"); */
});
