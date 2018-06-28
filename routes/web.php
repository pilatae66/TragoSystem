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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Subject routes

Route::resource('subject', 'SubjectController');

//Question routes

Route::resource('question', 'QuestionController');

//Answer routes

Route::resource('answer', 'AnswerController');

//Student routes

Route::resource('student', 'StudentController');

//Scores routes

Route::resource('score', 'ScoreController');

//Admin routes

Route::resource('admin', 'AdminController');

//Instructor routes

Route::resource('instructor', 'InstructorController');
