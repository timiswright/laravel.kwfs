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


Route::get('/', function () {
    return view('home');
});

Route::resource('locations', 'LocationController');
Route::get('fullscreen', 'LocationController@fullscreen');



// Protected routes
Route::group(['middleware' => 'auth'], function () { 
        Route::resource('home', 'HomeController');
        Route::get('customers/locations', 'CustomerController@showall');
        Route::get('customers/quotes', 'CustomerController@showallsales');

        Route::get('machines/search', ['as' => 'machine.search', 'uses' => 'MachineController@search']);
        Route::get('customers/search', ['as' => 'customer.search', 'uses' => 'CustomerController@search']);
        
        Route::resource('customers', 'CustomerController'); 
        Route::get('customers/locations/fullscreen', 'CustomerController@showallfull');
        Route::get('customers/quotes/fullscreen', 'CustomerController@showallsalesfull'); 
        Route::resource('augers', 'AugerController');
        Route::resource('brackets', 'BracketController');
        Route::resource('motors', 'MotorController');
        
   
        Route::resource('machines', 'MachineController');
        
        Route::resource('buckets', 'BucketController');
        Route::resource('extras', 'ExtraController');

        // Only a Registered user can create user...
        Route::get('auth/register', 'Auth\AuthController@getRegister');
        Route::post('auth/register', 'Auth\AuthController@postRegister');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');



// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

