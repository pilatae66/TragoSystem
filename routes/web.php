<?php

use App\Http\Controllers\AdminController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect('stud/login/username');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Question routes

Route::resource('question', 'QuestionController');

Route::get('questions/{question}/dashboard', 'QuestionController@dashboard')->name('question.dashboard');

//Answer routes

Route::resource('answer', 'AnswerController');

Route::get('question/{question}/answer/create', 'AnswerController@create')->name('question.answer.create');

//Student routes

Route::resource('student', 'StudentController');

Route::post('sub/stud', 'StudentController@storeStudent')->name('stud.store');

Route::get('stud/dashboard', 'StudentController@dashboard')->name('student.dashboard');

Route::post('stud/login/passs', 'Student\LoginController@LoginForm')->name('student.loginpass');

Route::get('stud/{student}/login', 'Student\LoginController@showLoginForm')->name('student.showloginpass');

Route::get('stud/login/username', 'Student\LoginController@showUsernameForm')->name('student.username');

Route::get('stud/register', 'StudentController@create')->name('student.register');

Route::get('stud/{student}/register', 'Student\LoginController@createPassword')->name('student.registerPassword');

Route::post('stud/{student}/register', 'Student\LoginController@registerStudent')->name('student.registerStudent');

Route::post('stud/login', 'Student\LoginController@login')->name('student.login');

Route::get('stud/takeExam/{exam}', 'StudentController@takeExam')->name('student.takeExam');

Route::post('stud/takeExam/{exam}/submit', 'StudentController@submitExam')->name('student.submitExam');

//Scores routes

Route::resource('score', 'ScoreController');

//Admin routes

Route::resource('admin', 'AdminController');

Route::get('admins/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

Route::get('admins/instructor', 'AdminController@instructorIndex')->name('admin.instructorIndex');

Route::post('admins/instructor', 'AdminController@instructorStore')->name('admin.instructorStore');

Route::get('admins/instructor/{instructor}/edit', 'AdminController@instructorEdit')->name('admin.instructorEdit');

Route::patch('admins/instructor/{instructor}', 'AdminController@instructorUpdate')->name('admin.instructorUpdate');

Route::delete('admins/instructor/{instructor}', 'AdminController@instructorDestroy')->name('admin.instructorDestroy');

Route::get('admins/student', 'AdminController@studentIndex')->name('admin.studentIndex');

Route::post('admins/student', 'AdminController@studentStore')->name('admin.studentStore');

Route::get('admins/student/{student}/edit', 'AdminController@studentEdit')->name('admin.studentEdit');

Route::patch('admins/student/{student}', 'AdminController@studentUpdate')->name('admin.studentUpdate');

Route::delete('admins/student/{student}', 'AdminController@studentDestroy')->name('admin.studentDestroy');

//Instructor routes

Route::resource('instructor', 'InstructorController');

Route::get('inst/login/username', 'Instructor\LoginController@showLoginForm')->name('instructor.username');

Route::post('inst/login/passs', 'Instructor\LoginController@LoginForm')->name('instructor.loginpass');

Route::get('inst/{instructor}/login', 'Instructor\LoginController@showLoginForms')->name('instructor.showloginpass');

Route::get('inst/{instructor}/register', 'Instructor\LoginController@createPassword')->name('instructor.registerPassword');

Route::post('inst/{instructor}/register', 'Instructor\LoginController@registerInstructor')->name('instructor.registerInstructor');

Route::post('inst/login', 'Instructor\LoginController@login')->name('instructor.login');

Route::get('inst/dashboard', 'InstructorController@dashboard')->name('instructor.dashboard');

Route::get('inst/register', 'InstructorController@create')->name('inst.register');

Route::post('inst', 'InstructorController@store')->name('inst.store');

Route::get('inst/student', 'InstructorController@studentIndex')->name('inst.studentIndex');

//Exam routes

Route::get('inst/exam', 'ExamController@index')->name('exam.index');

Route::get('inst/exam/{exam}/examStats', 'ExamController@showExamStats')->name('exam.showExamStats');

Route::get('inst/exam/create', 'ExamController@create')->name('exam.create');

Route::post('inst/exam', 'ExamController@store')->name('exam.store');

Route::delete('inst/{exam}/exam', 'ExamController@destroy')->name('exam.destroy');

Route::get('exam/{id}/tos/step1', 'TOSController@tosForm1')->name('exam.showTosStep1');

Route::post('exam/tos/post1', 'TOSController@submitTos1')->name('tos.post1');

Route::get('exam/tos/step2', 'TOSController@tosForm2')->name('exam.showTosStep2');

Route::post('exam/tos/post2', 'TOSController@submitTos2')->name('tos.post2');

Route::get('exam/{id}/tos/step3', 'TOSController@tosForm3')->name('exam.showTosStep3');

Route::post('test', 'ExamController@test')->name('tos.test');
