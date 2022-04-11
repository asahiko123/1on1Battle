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
    return view('top');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('index','QuestionController@index')->name('questions.index');

/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin'],function(){
    Route::post('register','Admin\RegisterController@register')->name('admin.register');
    Route::get('register','Admin\RegisterController@index')->name('admin.login.index');

    Route::get('login','Admin\LoginController@index')->name('admin.login.index');
    Route::post('login','Admin\LoginController@login')->name('admin.login.login');
    Route::get('logout','Admin\LoginController@logout')->name('admin.login.logout');
});

/*
|--------------------------------------------------------------------------
|  Admin ログイン後
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'admin','middleware' => 'auth:admin'],function(){

    Route::get('index','Admin\HomeController@index')->name('admin.index');
    Route::get('show/{id}','QuestionController@show')->name('questions.show');
    Route::get('edit/{id}', 'QuestionController@edit')->name('questions.edit');
    Route::post('update/{id}', 'QuestionController@update')->name('questions.update');
    Route::post('logout','Admin\LoginController@logout')->name('admin.logout');

});




