<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['middleware'=>['web']], function () {
Route::get('/create', 'App\Http\Controllers\API\StudentAPIController@create');
Route::post('/store', 'App\Http\Controllers\API\StudentAPIController@store')->name('savestudent');
Route::post('indexs', 'App\Http\Controllers\API]StudentAPICOntroller@accept');
Route::post('/index', 'App\Http\Controllers\API\StudentAPIController@indexs')->name('student_api.shows');
});
Route::delete('/delete/{id}', 'App\Http\Controllers\API\StudentAPIController@customdestroy');
Route::get('/getdata', 'App\Http\Controllers\API\StudentAPIController@index');


Route::get('/index', 'App\Http\Controllers\API\StudentAPIController@indexs');
Route::get('students/{student}/edit','App\Http\Controllers\API\StudentAPIController@edit');
Route::post('studentsupdate/{id}', 'App\Http\Controllers\API\StudentAPIController@update')->name('update');


