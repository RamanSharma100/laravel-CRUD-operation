<?php

use Illuminate\Support\Facades\Route;

// home 

Route::get('/', 'studentController@index')->name('home');

// add student

Route::get('/add', function () {
    return view('pages.add_students');
});
Route::post('/add', 'studentController@add_student')->name('add_student');

// edit student 

Route::get('/edit/{id}', 'studentController@edit_student')->where('id', '[0-9]+')->name('edit_student');

// update student 

Route::post('/update/{id}', 'studentController@update_student')->where('id', '[0-9]+')->name('update_student');

// delete student

Route::get('/delete/{id}', 'studentController@delete_student')->where('id', '[0-9]+')->name('delete_student');