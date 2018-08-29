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
Route::get('/questionairs', 'HomeController@getQuestions')->name('getQuestions');
Route::get('/questionairs/create', 'HomeController@getQuestionsCreate')->name('getQuestionsCreate');
Route::post('/questionairs/create', 'Question\QuestionController@postQuestion')->name('postQuestion');
Route::get('/add-questions/{id}', 'Question\QuestionController@newQuestionsView')->name('addQuestionsView');
Route::get('/deleteQuestion/{id}', 'Question\QuestionController@delete')->name('deleteQuestion');

