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

Route::resource('profile', 'ProfileController');

Route::get('/profiles', 'ProfileController@index')->name('index')->middleware('auth','role:Admin');

Route::get('/profiles/{id}', 'ProfileController@show2')->middleware('auth')->name('show');
Route::get('/edit', 'ProfileController@edit')->middleware('auth')->name('edit');


Route::resource('quiz', 'QuizController');

Route::get('/quiz', 'QuizController@index')->name('quiz');
Route::get('/quiz/show/{id}', 'QuizController@show')->name('showQuiz');

Route::get('/quiz/show2/{id}', 'QuizController@show2')->name('show2Quiz');
