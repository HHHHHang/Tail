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

// 主页面
Route::get('/', 'IndexController@index');


// 登录注册功能注册路由
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');

Route::get('/logout', 'IndexController@logout');

// 登录界面
Route::get('/login', 'LoginController@index');

//文章界面模板
Route::get('/article', 'IndexController@article');
Route::post('/article', 'IndexController@articlePost'); 

// 论坛模板
Route::get('/forum', 'ForumController@index');
Route::get('/forum/Detail', 'ForumController@forum');

//搜索界面模板
Route::get('/search/forum', 'SearchController@searchForum');
Route::get('/search/article', 'SearchController@searchArticle');

//个人信息页模板
Route::get('/myinfo', 'MyInfoController@index');

//mysql接口测试
Route::get('/mongo', 'MongoController@testMongo');

// api接口
Route::get('/api/test/{id}', function ($id) {
	return App\Banner_img::findOrFail($id);
});

Route::get('/myinfo', 'MyInfoController@index');
Route::get('/new/forum', 'NewController@newForum');
Route::post('/new/forum', 'NewController@postForum');
