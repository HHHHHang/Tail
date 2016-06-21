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

//给某文章收藏接口
Route::post('/article/collect', 'ArticleController@collect');
Route::post('/article/cancelCollect', 'ArticleController@cancelCollect');

//给某文章点赞接口
Route::post('/article/up', 'ArticleController@up');
Route::post('/article/cancelUp', 'ArticleController@cancelUp');
Route::post('/topicArticle/up','TopicArticlesController@up');
Route::post('/topicArticle/cancelUp','TopicArticlesController@cancelUp');

//关注接口
Route::post('/personInfo/follow', 'MyInfoController@follow');
Route::post('/personInfo/cancelFollow', 'MyInfoController@cancelFollow');

//文章界面模板
Route::get('/article/{aid}', 'ArticleController@article');
Route::post('/article/{aid}', 'ArticleController@articlePost');

// 论坛模板
Route::get('/forum/tie', 'ForumController@tie');
Route::get('/forum/tie/{type}', 'ForumController@tie');
Route::get('/forum/kinkTie', 'ForumController@kinkTie');
Route::get('/forum/kinkTie/{type}', 'ForumController@kinkTie');
Route::get('/forum/Detail/{kid}',  'KinkTieController@kinkTie');
Route::post('/forum/Detail/{kid}',  'KinkTieController@kinkTiePost');
Route::get('/forum/all', 'ForumController@index');
Route::get('/forum/{type}', 'ForumController@index');
Route::post('/forum/{type}/filter', 'ForumController@filter');

// 发布界面
Route::get('/new/tie', 'NewController@newForum');
Route::post('/new/tie', 'NewController@postForum');
Route::get('/new/kinkTie', 'NewController@newKinkTie');
Route::post('/new/kinkTie', 'NewController@postKinkTie');
Route::get('/new/article', 'NewController@newArticle');
Route::post('/new/article', 'NewController@postArticle');
// 纠结帖子页面
Route::get('/kinkTie/{kid}', 'KinkTieController@index');
Route::post('/kinkTie/{kid}', 'KinkTieController@tiePost');
Route::post('/choice/{kid}', 'KinkTieController@postChoice');

// 搜索界面模板
Route::get('/search/topic', 'SearchController@searchTopic');
Route::get('/search/topic/{keyword}', 'SearchController@searchTopic');
Route::get('/search/forum', 'SearchController@searchForum');
Route::get('/search/forum/{keyword}', 'SearchController@searchForum');
Route::get('/search/article', 'SearchController@searchArticle');
Route::get('/search/article/{keyword}', 'SearchController@searchArticle');
 
// 个人信息页模板
Route::get('/myinfo', 'MyInfoController@index');
Route::get('/myinfo/{msg}', 'MyInfoController@index');
Route::get('/otherInfo/{uid}', 'MyInfoController@otherInfo');
Route::post('/myinfo/avatar', 'MyInfoController@postAvatar');

//mysql接口测试
Route::get('/mongo', 'MongoController@testMongo');

//话题广场
Route::get('/topic', 'TopicsController@index');
Route::get('/topic/detail/{id}','TopicsController@detail');
Route::get('/new/topicArticle/{id}','TopicsController@newArticle');
Route::post('/new/topicArticle/{id}','TopicsController@postArticle');
Route::post('/new/topic','TopicsController@postTopic');
Route::get('/topic/article/{id}','TopicArticlesController@article');
Route::post('/topic/article/{id}','TopicArticlesController@commentPost');
Route::get('/topic/noPicTopicArticle/{id}','TopicArticlesController@noPicTopicArticle');
Route::post('/topicArticle/comment/{id}','TopicArticlesController@comment');


// test接口
Route::get('/api/test/{id}', function ($id) {
	var_dump( (getTieByUid($id)) );
});

//editor文件上传接口
Route::get('/api/file','FileController@index');
Route::post('/api/file','FileController@index');

//CMS 后台内容管理系统

Route::get('/cms/index', 'CMSController@index');
Route::get('/cms/article', 'CMSController@article');
Route::get('/cms/article/{type}', 'CMSController@article');
Route::get('/cms/tie', 'CMSController@tie');
Route::get('/cms/tie/{type}', 'CMSController@tie');
Route::get('/cms/topic', 'CMSController@topic');
Route::get('/cms/banner/{type}', 'CMSController@banner');
Route::post('/deleteArticle', 'CMSController@deleteArticle');
Route::post('/editBanner', 'CMSController@editBanner');
Route::post('/editSlider', 'CMSController@editSlider');
Route::post('/publishArticle', 'CMSController@publishArticle');
Route::post('/deleteTie', 'CMSController@deleteTie');
Route::post('/publishTie', 'CMSController@publishTie');
Route::post('/deleteTopic', 'CMSController@deleteTopic');
Route::post('/publishTopic', 'CMSController@publishTopic');

