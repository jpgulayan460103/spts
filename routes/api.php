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
        Route::put('/{id}', 'ClassSectionController@update')->name('api.class-sections.update');
        Route::delete('/{id}', 'ClassSectionController@destroy')->name('api.class-sections.destroy');
    });
});