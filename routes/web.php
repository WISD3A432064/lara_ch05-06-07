<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');



Route::pattern('student_no','s[0-9]{10}');

Route::group(['prefix' => 'student'],function(){

    Route::get('{student_no}',['as' => 'student', 'uses' => 'StudentController@getStudentData']);

    Route::get('{student_no}/score/{subject?}',[
        'as' => 'student.score',
        'uses' => 'StudentController@getStudentScore'])->where(['subject' => '(chinese|english|math)']);
});