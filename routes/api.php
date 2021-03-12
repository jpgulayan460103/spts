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

if(config('app.env') == "production"){
    $route_params = ['middleware' => 'auth:api'];
}else{
    $route_params = [];
}
Route::group($route_params, function () {
    Route::group(['prefix' => '/users'], function () {
        Route::get('/', 'UserController@index')->name('api.users.index');
        Route::post('/', 'UserController@store')->name('api.users.store');
        Route::get('/{id}', 'UserController@show')->name('api.users.show');
        Route::put('/{id}', 'UserController@update')->name('api.users.update');
        Route::delete('/{id}', 'UserController@destroy')->name('api.users.destroy');
    });
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
        Route::put('/{id}', 'ClassSectionController@update')->name('api.class-sections.update');
        Route::delete('/{id}', 'ClassSectionController@destroy')->name('api.class-sections.destroy');

        Route::get('/{class_section_id}/students', 'ClassSectionController@listStudents')->name('api.class-sections.students.list');
        Route::post('/{class_section_id}/students', 'ClassSectionController@addStudent')->name('api.class-sections.students.add');
        Route::put('/{class_section_id}/students/{student_id}', 'ClassSectionController@removeStudent')->name('api.class-sections.students.remove');
        
        Route::get('/{class_section_id}/subjects', 'ClassSectionController@listSubjects')->name('api.class-sections.subjects.list');
        Route::get('/{class_section_id}/subjects/{subject_id}/score-items', 'ScoreItemController@index')->name('api.class-sections.subjects.score-items.list');
        Route::post('/{class_section_id}/subjects/{subject_id}/score-items', 'ScoreItemController@store')->name('api.class-sections.subjects.score-items.add');
        Route::delete('/{class_section_id}/subjects/{subject_id}/score-items/{score_item_id}', 'ScoreItemController@destroy')->name('api.class-sections.subjects.score-items.delete');

        Route::post('/{class_section_id}/subjects/{subject_id}/score-items/{score_item_id}/score', 'ScoreController@store')->name('api.class-sections.subjects.score.store');
        Route::post('/{class_section_id}/subjects/{subject_id}/score-items/{score_item_id}/score-multiple', 'ScoreController@storeMultiple')->name('api.class-sections.subjects.score.store-multiple');
    });
    Route::group(['prefix' => '/subjects'], function () {
        Route::get('/', 'SubjectController@index')->name('api.subjects.index');
        Route::post('/', 'SubjectController@store')->name('api.subjects.store');\
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
    Route::group(['prefix' => '/score-items'], function () {
        Route::get('/', 'ScoreItemController@index')->name('api.score-items.index');
        Route::post('/', 'ScoreItemController@store')->name('api.score-items.store');
        Route::get('/{id}', 'ScoreItemController@show')->name('api.score-items.show');
        Route::put('/{id}', 'ScoreItemController@update')->name('api.score-items.update');
        Route::delete('/{id}', 'ScoreItemController@destroy')->name('api.score-items.destroy');
    });

    Route::group(['prefix' => '/units'], function () {
        Route::get('/', 'UnitController@index')->name('api.units.index');
        Route::post('/', 'UnitController@store')->name('api.units.store');
        Route::get('/{id}', 'UnitController@show')->name('api.units.show');
        Route::put('/{id}', 'UnitController@update')->name('api.units.update');
        Route::delete('/{id}', 'UnitController@destroy')->name('api.units.destroy');
    });

    Route::get('/tracks', 'TrackController@index')->name('api.tracks.index');
    Route::get('/quarters', 'QuarterController@index')->name('api.quarter.index');
    Route::get('/semesters', 'SemesterController@index')->name('api.semesters.index');
    Route::get('/transmuted-grades', 'TransmutedGradeController@index')->name('api.transmuted-grade.index');
    Route::get('/subject-categories', 'SubjectController@categories')->name('api.subject-categories.index');
});