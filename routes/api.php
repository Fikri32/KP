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

    //---- Setting Set ----//
    Route::get('setting','SettingController@index')->name('get_Setting');
    Route::post('setting/store','SettingController@store')->name('Setting-store');
    Route::put('setting/update/{id}','SettingController@update');
    Route::delete('setting/delete/{id}','SettingController@destroy');

    //---- setting set per prject ----//
    Route::put('project/set_setting/{id}','ProjectController@set_setting');

    //---- team setup Setting ----//
    Route::post('team/store','team@store')->name('store_team');

    //---- Steps Set ---//
    Route::get('steps/{id}','StepsController@index');
    Route::post('steps/store','StepsController@store');
    Route::put('steps/update/{id}','StepsController@update');
    Route::delete('steps/delete/{id}','StepsController@destroy');
    //set leader steps
    Route::put('steps/leader','StepsController@leaderSteps');

    //---- task Set ----//
    Route::get('task/{id}','TasksController@index');
    Route::get('taskdata/{id}','TasksController@get_task');
    Route::post('task/store','TasksController@store');
    Route::put('task/update/{id}','TasksController@update');

    #route task status 
    Route::put('task/status/{id}','TasksController@statusTask');
    Route::delete('task/delete/{id}','TasksController@destroy');

    //client management
    Route::get('client','ClientController@index');
    Route::post('client/store','ClientController@store');
    Route::put('client/update/{id}','ClientController@update');
    Route::delete('client/delete/{id}','ClientController@destroy');

    //currency main management
    Route::get('payment/{project}','PaymentsController@index');
    Route::post('payment/store','PaymentsController@store');
    Route::put('payment/update/{id}','PaymentsController@update');
    Route::delete('payment/delete/{id}','PaymentsController@destroy');

    //profile user & admin
    Route::get('profile/{userid}','Profile@index');
    Route::post('profile/store','Profile@store');
    Route::put('profile/update/{id}','Profile@update');
    Route::put('profile/photo/{id}','Profile@image_store');
    Route::delete('profile/delete/{id}','Profile@destroy');


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