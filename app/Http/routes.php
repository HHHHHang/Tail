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
Route::get('/article/{aid}', 'ArticleController@article');
Route::post('/article/{aid}', 'ArticleController@articlePost');

// 论坛模板
Route::get('/forum', 'ForumController@index');
Route::get('/forum/tie', 'ForumController@tie');
Route::get('/forum/tie/{type}', 'ForumController@tie');
Route::get('/forum/Detail', 'ForumController@forum');
Route::get('/forum/{type}', 'ForumController@index');
// 发布帖子界面
Route::get('/new/forum', 'NewController@newForum');
Route::post('/new/forum', 'NewController@postForum');
// 纠结帖子页面
Route::get('/kinkTie/{kid}', 'KinkTieController@index');
Route::post('/kinkTie/{kid}', 'KinkTieController@tiePost');

// 搜索界面模板
Route::get('/search/forum', 'SearchController@searchForum');
Route::get('/search/forum/{keyword}', 'SearchController@searchForum');
Route::get('/search/article', 'SearchController@searchArticle');
Route::get('/search/article/{keyword}', 'SearchController@searchArticle');
 
// 个人信息页模板
Route::get('/myinfo', 'MyInfoController@index');
Route::get('/myinfo', 'MyInfoController@index');

//mysql接口测试
Route::get('/mongo', 'MongoController@testMongo');

//话题广场
Route::get('/topic', 'TopicsController@index');
Route::get('/topic/detail','TopicsController@detail');
Route::get('/new/topicArticle','TopicsController@newArticle');
 
// test接口
Route::get('/api/test/{id}', function ($id) {
	var_dump( (getTieByUid($id)) );
});

