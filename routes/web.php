<?php

Route::get('/', 'TodoController@index');
Route::post('add/todo', 'TodoController@storeTodo');

Route::get('edit/{id}', 'TodoController@editTodo');
Route::post('edit/todo/{id}', 'TodoController@updateToDo');
Route::get('delete/{id}', 'TodoController@deleteTodo');
