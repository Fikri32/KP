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
    return view('auth/login');
});

Auth::routes();

Route::middleware(['web'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    //admin area
    Route::get('/project', 'HomeController@project')->name('project');
    Route::get('/employe','HomeController@employe')->name('user');

    //staff area
    Route::get('project/{id}','HomeController@action_page')->name('action');
});


