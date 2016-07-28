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

Route::pattern('id','[1-9][0-9]*');

Route::get('/','FrontController@index');

Route::get('new','FrontController@newEvent');

Route::post('new','FrontController@createEvent');

Route::any('search','FrontController@search');

Route::get('search/{id}','FrontController@showApero');


Route::any('login','LoginController@login');

Route::get('logout','LoginController@logout');


Route::group(['prefix'=>'admin','middleware'=>'auth'],function ()
{
    Route::resource('Apero','AperoController');

});

