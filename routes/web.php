<?php

Route::get('student', 'StudentController@index')->name('home');

Route::get('student/create', 'StudentController@create')->name('create');
Route::post('student/create', 'StudentController@create_form')->name('create_form');

Route::get('student/tsk/{id}', 'StudentController@tsk')->name('tsk');

Route::get('student/edit/{id}', 'StudentController@edit')->name('edit');
Route::post('student/edit/{id}', 'StudentController@update')->name('edit_form');

Route::get('student/delete/{id}', 'StudentController@del')->name('delete');

Route::get('student/completion', 'StudentController@comp')->name('comp');

Route::get('student/redata/{id}', 'StudentController@redata')->name('redata');

Route::get('student/tsk_create/{id}', 'LessonController@tsk_create')->name('tsk_create');
Route::post('student/tsk_create/{s_id}', 'LessonController@tsk_form')->name('tsk_form');


Route::get('student/tsk_edit/{id}', 'LessonController@tsk_edit')->name('tsk_edit');
Route::post('student/tsk_edit/{l_id}', 'LessonController@tsk_update')->name('tsk_update');

Route::get('student/tsk_delete/{id}', 'LessonController@tsk_delete')->name('tsk_delete');

Route::get('student/erase/{id}', 'LessonController@erase')->name('erase');
