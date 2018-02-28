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

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function() {

   CRUD::resource('student', 'StudentCrudController');

   CRUD::resource('academic_year', 'AcademicYearCrudController');

   CRUD::resource('course', 'CourseCrudController');

   CRUD::resource('subject', 'SubjectCrudController');

   CRUD::resource('fee', 'FeeCrudController');

});