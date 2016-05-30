<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'IndexController@index');

Route::get('/search', 'SearchController@index');
Route::post('/search', 'SearchController@index');
Route::get('/api', 'SearchController@getData');

Route::get('/lin', function(){
	return view('phone');
});
Route::get('/table', function(){
	return view('test');
});

Route::get('/test', 'SearchController@test');
Route::post('/test', 'SearchController@testResult');

Route::get('/searchTest', function(){
	return view('tail.search');
});

Route::get('/frank',function(){
	return "frank~";
});

Route::get('profile','UserController@profile');

// Tail Project /myinfo



Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');

Route::get('/login', 'LoginController@index');
Route::get('/logout', 'IndexController@logout');
Route::get('/article', 'IndexController@article');
Route::post('/article', 'IndexController@articlePost'); 

Route::get('/forum', 'ForumController@index');
Route::get('/forum/Detail', 'ForumController@forum');

Route::get('/search/forum', 'SearchController@searchForum');
Route::get('/search/article', 'SearchController@searchArticle');

Route::get('/myinfo', 'MyInfoController@index');
Route::get('/new/article', 'NewController@newArticle');