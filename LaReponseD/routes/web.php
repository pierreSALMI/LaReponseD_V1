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

Route::post('quiz/results', 'QuizController@verify')->name('verify');

Route::post('role.setRole','RoleController@setRole')->name('setRole')->middleware('auth','role:Admin');

Route::get('/profiles', 'ProfileController@index')->name('index')->middleware('auth','role:Admin'); // check


Route::get('/quiz', 'QuizController@index')->name('quiz'); //check
Route::get('/quiz/show/{id}', 'QuizController@show')->name('showQuiz'); // faire un if

Route::get('/quiz/createQuest', 'QuestionController@create')->name('createQuest'); // Interdit public
Route::post('/quiz/edit/{id}', 'QuizController@update'); //what
Route::get('/quiz/createQuiz', 'QuizController@create')->name('createQuiz'); // what
Route::get('/quiz/deleteQuest/{id}', 'QuizController@destroy')->name('destroyQuiz'); // Interdit public

Route::get('/quiz/categorie/{theme}', 'QuizController@categorie')->name('categorieQuiz'); // check

Route::group(['middleware' => ['auth']], function () {
    Route::get('/profiles/{id}', 'ProfileController@show2');
    Route::get('/edit', 'ProfileController@edit');
    Route::get('quiz/edit/{id}', 'QuizController@edit')->name('editQuiz');
});
Route::get('/quiz/categorie/{theme}', 'QuizController@categorie')->name('categorieQuiz');

Route::resource('profile', 'ProfileController');
Route::resource('quiz', 'QuizController');
Route::resource('question', 'QuestionController');
Route::resource('choix', 'ChoixController');
