<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login','AuthController@login');
Route::get('/transmuted-grade', 'TransmutedGradeController@index')->name('api.transmuted-grade.index');

if(config('app.env') == "production"){
    $route_params = ['middleware' => 'api:auth'];
}else{
    $route_params = [];
}
Route::group($route_params, function () {
    Route::group(['prefix' => '/students'], function () {
        Route::get('/', 'StudentController@index')->name('api.students.index');
        Route::post('/', 'StudentController@store')->name('api.students.store');
        Route::get('/{id}', 'StudentController@show')->name('api.students.show');
        Route::put('/{id}', 'StudentController@update')->name('api.students.update');
        Route::delete('/{id}', 'StudentController@destroy')->name('api.students.destroy');
    });
    Route::group(['prefix' => '/class-sections'], function () {
        Route::get('/', 'ClassSectionController@index')->name('api.class-sections.index');
        Route::post('/', 'ClassSectionController@store')->name('api.class-sections.store');
        Route::get('/{id}', 'ClassSectionController@show')->name('api.class-sections.show');
        Route::get('/{id}/students', 'ClassSectionController@listStudents')->name('api.class-sections.list.students');
        Route::put('/{id}', 'ClassSectionController@update')->name('api.class-sections.update');
        Route::delete('/{id}', 'ClassSectionController@destroy')->name('api.class-sections.destroy');
    });
    Route::group(['prefix' => '/subjects'], function () {
        Route::get('/', 'SubjectController@index')->name('api.subjects.index');
        Route::post('/', 'SubjectController@store')->name('api.subjects.store');
        Route::get('/{id}', 'SubjectController@show')->name('api.subjects.show');
        Route::put('/{id}', 'SubjectController@update')->name('api.subjects.update');
        Route::delete('/{id}', 'SubjectController@destroy')->name('api.subjects.destroy');
    });
    Route::group(['prefix' => '/teachers'], function () {
        Route::get('/', 'TeacherController@index')->name('api.teachers.index');
        Route::post('/', 'TeacherController@store')->name('api.teachers.store');
        Route::get('/{id}', 'TeacherController@show')->name('api.teachers.show');
        Route::put('/{id}', 'TeacherController@update')->name('api.teachers.update');
        Route::delete('/{id}', 'TeacherController@destroy')->name('api.teachers.destroy');
    });
    Route::get('/tracks', 'TrackController@index')->name('api.tracks.index');
    Route::get('/quarters', 'QuarterController@index')->name('api.quarter.index');
    Route::get('/semesters', 'SemesterController@index')->name('api.semesters.index');
});