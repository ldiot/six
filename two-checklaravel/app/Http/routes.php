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
    return view('welcome');
});



Route::group(['middleware' => ['web']], function () {
    //
    Route::any('admin/login',['uses' => 'Admin\LoginController@login'] );
    Route::any('admin/main', ['uses'=>'Admin\LoginController@main']);
    Route::any('admin/register', ['uses' => 'Admin\LoginController@register']);

});


Route::group(['middleware' => ['web', 'admin.login']], function () {
    //
    Route::any('admin/home',['uses' => 'Admin\LoginController@home'] );
    Route::any('admin/look',['uses' => 'Admin\AdminController@look'] );
    Route::any('admin/ueditor',['uses' => 'Admin\AdminController@ueditor'] );
    //Route::any('admin/login',['uses' => 'Admin\LoginController@login'] );
//    Route::any('admin/teacher',['uses' => 'Admin\LoginController@teacher'] );
//    Route::any('admin/changemyinformation',['uses' => 'Admin\MainController@changeMyInformation'] );
//    Route::any('admin/lookstudentinformation',['uses' => 'Admin\MainController@lookStudentInformation'] );
//    Route::any('admin/lookotherstable',['uses' => 'Admin\MainController@lookOthersTable'] );
//    Route::any('admin/timetable',['uses' => 'Admin\MainController@timetable'] );
//    Route::any('admin/info',['uses' => 'Admin\MainController@info'] );
//    Route::any('admin/cgmyinfo',['uses' => 'Admin\MainController@cgmyinfo'] );
//    Route::any('admin/student',['uses' => 'Admin\LoginController@student'] );

//    Route::any('admin/{id}/changeinformation',['uses' => 'Admin\TeacherController@changeInformation'] );
//    Route::any('admin/{id}/deleteinformation',['uses' => 'Admin\TeacherController@deleteInformation'] );
//    Route::any('admin/{id}/letoutinformation',['uses' => 'Admin\TeacherController@letoutInformation'] );
//    Route::any('admin/announce',['uses' => 'Admin\TeacherController@announce'] );
//    Route::any('admin/information',['uses' => 'Admin\TeacherController@information'] );
//    Route::any('admin/dochangeinformation',['uses' => 'Admin\TeacherController@dochangeInformation'] );
//    Route::any('admin/doannounce',['uses' => 'Admin\TeacherController@doAnnounce'] );


});


Route::group(['middleware' => ['web', 'teacher.login']], function () {
    Route::any('admin/teacher',['uses' => 'Admin\LoginController@teacher'] );
    Route::any('admin/{id}/changeinformation',['uses' => 'Admin\TeacherController@changeInformation'] );
    Route::any('admin/{id}/deleteinformation',['uses' => 'Admin\TeacherController@deleteInformation'] );
    Route::any('admin/{id}/letoutinformation',['uses' => 'Admin\TeacherController@letoutInformation'] );
    Route::any('admin/announce',['uses' => 'Admin\TeacherController@announce'] );
    Route::any('admin/information',['uses' => 'Admin\TeacherController@information'] );
    Route::any('admin/dochangeinformation',['uses' => 'Admin\TeacherController@dochangeInformation'] );
    Route::any('admin/doannounce',['uses' => 'Admin\TeacherController@doAnnounce'] );
});

Route::group(['middleware' => ['web', 'student.login']], function () {
    Route::any('admin/changemyinformation',['uses' => 'Admin\MainController@changeMyInformation'] );
    Route::any('admin/lookstudentinformation',['uses' => 'Admin\MainController@lookStudentInformation'] );
    Route::any('admin/lookotherstable',['uses' => 'Admin\MainController@lookOthersTable'] );
    Route::any('admin/timetable',['uses' => 'Admin\MainController@timetable'] );
    Route::any('admin/info',['uses' => 'Admin\MainController@info'] );
    Route::any('admin/cgmyinfo',['uses' => 'Admin\MainController@cgmyinfo'] );
    Route::any('admin/student',['uses' => 'Admin\LoginController@student'] );
});