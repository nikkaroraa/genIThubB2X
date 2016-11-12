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

    return view('login');

});
Route::post('submit',[
	'uses'=>'MainController@login',
	'as'=> 'submit'
  ]);
Route::get('enquiry',function() {
  return view('enquiry');
});
Route::get('info',function() {
	return view('info');
});