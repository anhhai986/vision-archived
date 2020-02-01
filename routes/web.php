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

Auth::routes();
Route::get('integrate/{provider}', 'Auth\IntegrationController@redirectToProvider');
Route::get('integrate/{provider}/callback', 'Auth\IntegrationController@handleProviderCallback');

Route::get('/', 'WelcomeController@welcome')->name('welcome');
Route::middleware('auth')->group(function () {
    Route::resource('/assignee', 'AssigneeController');
    Route::get('/board', 'BoardController@index');
    Route::get('/board/{board}', 'BoardController@show');
    Route::get('/friendship/list', 'FriendshipController@list')->name('friend.list');
    Route::get('/friendship/{user}/list', 'FriendshipController@showList')->name('friend.user.list');
    Route::resource('/friendship', 'FriendshipController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('integration', 'Auth\IntegrationController@integration')->name('home');
    Route::get('integration/list', 'Auth\IntegrationController@integrationList')->name('home');
//    Route::resource('/project', 'ProjectController');
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('status', 'StatusController@index');
    Route::get('/task/list', 'TaskController@list')->name('task.list');
    Route::resource('/task', 'TaskController');
    Route::put('/task/{task}/status', 'TaskController@status');
    Route::get('/user/list', 'UserController@list')->name('user.list');
    Route::resource('/user', 'UserController');
});
