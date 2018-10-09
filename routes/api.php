<?php

use Illuminate\Http\Request;

Route::post('register','Auth\APIControllerAuth@register')->name('register');
Route::post('login','Auth\APIControllerAuth@login')->name('login');

Route::get('divisi','UserController@get_so')->name('get_SO');

Route::middleware('auth:api')->group(function(){
    //Admin
    //User Management
    Route::get('user','UserController@index')->name('user-index');
    Route::post('user/store','UserController@store')->name('user-store');
    Route::get('user/{id}','UserController@show')->name('user-show');
    Route::put('user/update/{id}','UserController@update')->name('user-update');
    Route::delete('user/delete/{id}','UserController@destroy')->name('user-delete');
    //project Management
    Route::get('project','ProjectController@index')->name('project-index');
    Route::post('project/store','ProjectController@store')->name('project-store');
    Route::get('project/{id}','ProjectController@show')->name('project-show');
    Route::put('project/update/{id}','ProjectController@update')->name('project-update');
    Route::delete('project/delete/{id}','ProjectController@destroy')->name('project-delete');
});

Route::middleware('auth:oauth')->group(function(){
    //for testing
    Route::get('oauth/test', function (Request $request) {
        return $request->user();
    });

    //Admin
    //User Management
    Route::get('oauth/user','UserController@index')->name('user-index');
    Route::post('oauth/user/store','UserController@store')->name('user-store');
    Route::get('oauth/user/{id}','UserController@show')->name('user-show');
    Route::put('oauth/user/update/{id}','UserController@update')->name('user-update');
    Route::delete('oauth/user/delete/{id}','UserController@destroy')->name('user-delete');

    //project Management
    Route::get('oauth/project','ProjectController@index')->name('project-index');
    Route::post('oauth/project/store','ProjectController@store')->name('project-store');
    Route::get('oauth/project/{id}','ProjectController@show')->name('project-show');
    Route::put('oauth/project/update/{id}','ProjectController@update')->name('project-update');
    Route::delete('oauth/project/delete/{id}','ProjectController@destroy')->name('project-delete');
});