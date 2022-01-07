<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;

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

// Redirect to student list
Route::get('/', function () {
    return redirect()->route('students.create');
});

// Students list resource route
Route::resource('students', StudentController::class);
Route::get('export','App\Http\Controllers\Student\StudentController@export')->name('export');
Route::get('import','App\Http\Controllers\Student\StudentController@showimport')->name('student.import');
Route::post('import','App\Http\Controllers\Student\StudentController@import')->name('student.import');
Route::get('search', 'App\Http\Controllers\Student\StudentController@search')->name('student.index');
//Route::get('search', 'App\Http\Controllers\Student\StudentController@searchs')->name('student.search');




