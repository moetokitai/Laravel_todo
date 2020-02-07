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

Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'],function (){

Route::get('/index','TodoController@index')->name('todos.index')->middleware('auth');
Route::delete('/delete-todos/{todo}','TodoController@delete')->name('todos.delete');
Route::get('/view-todos/{todo}','TodoController@show')->name('todos.show');
Route::get('/new-todo','TodoController@create')->name('todos.create');
Route::post('/store-todo','TodoController@store')->name('todos.store');
Route::get('/edit-todo/{todo}','TodoController@edit')->name('todos.edit');
Route::put('/update-todo/{todo}','TodoController@update')->name('todos.update');
Route::get('/update-done/{todo}','TodoController@done')->name('todos.completed');
Route::get('/update-not-done/{todo}','TodoController@not_done')->name('todos.not-completed');
}); 