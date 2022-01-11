<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\API\StudentAPIController;

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
Route::group(['middleware'=>['web']], function () {
// Students list resource route
Route::resource('students', StudentController::class);
});

Route::resource('resource', 'App\Http\Controllers\API\StudentAPIController');
//Route::resource('students', StudendAPIController::class);
Route::get('export', 'App\Http\Controllers\Student\StudentController@export')->name('export');
Route::get('import', 'App\Http\Controllers\Student\StudentController@showimport')->name('student.import');
Route::post('import', 'App\Http\Controllers\Student\StudentController@import')->name('student.import');
Route::get('search', 'App\Http\Controllers\Student\StudentController@search')->name('student.index');

//Route::get('editform', 'App\Http\Controllers\Student\StudentController@edit')->name('student.edit');
Route::post('/update/{id}', 'App\Http\Controllers\Student\StudentController@update')->name('students.update');


Route::get('/shows', function () {
    return view('student_api.shows');
});

Route::get('/update/{id}', function () {
    return view('student_api.update');
});

Route::get('/index', function () {
    return view('student_api.index')->name('index');
});


Route::get('/email', 'App\Http\Controllers\Student\StudentController@email')->name('student.emailform');

Route::post('/email', 'App\Http\Controllers\Student\StudentController@sendEmailForm')->name('sendEmailForm');
