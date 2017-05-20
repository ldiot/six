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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::any('admin/homepage', 'Admin\MainController@homepage');
Route::any('admin/content', 'Admin\MainController@content');
Route::any('admin/comment', 'Admin\MainController@comment');
Route::any('admin/register', 'Admin\MainController@register');
Route::any('admin/login', 'Admin\MainController@login');
Route::any('admin/logincontent', 'Admin\MainController@logincontent');
Route::group(['middleware' => ['web', 'admin.login']], function () {

});