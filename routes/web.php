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
    return redirect('stud/login');
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

Route::get('sub/{subject}/stud', 'StudentController@registerStudent')->name('stud.create');

Route::post('sub/stud', 'StudentController@storeStudent')->name('stud.store');

Route::get('stud/dashboard', 'StudentController@dashboard')->name('student.dashboard');

Route::get('stud/login', 'Student\LoginController@showLoginForm')->name('student.login');

Route::post('stud/login', 'Student\LoginController@login')->name('student.login');

//Scores routes

Route::resource('score', 'ScoreController');

//Admin routes

Route::resource('admin', 'AdminController');

//Instructor routes

Route::resource('instructor', 'InstructorController');

Route::get('inst/login', 'Instructor\LoginController@showLoginForm')->name('instructor.login');

Route::post('inst/login', 'Instructor\LoginController@login')->name('instructor.login');

Route::get('inst/dashboard', 'InstructorController@dashboard')->name('instructor.dashboard');

//Exam routes

Route::get('inst/exam', 'ExamController@index')->name('exam.index');

Route::get('inst/exam/create', 'ExamController@create')->name('exam.create');

Route::post('inst/exam', 'ExamController@store')->name('exam.store');

Route::delete('inst/{exam}/exam', 'ExamController@destroy')->name('exam.destroy');
