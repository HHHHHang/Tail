<?php
/**
 * Created by PhpStorm.
 * User: lyn
 * Date: 16/5/3
 * Time: 下午11:44
 */

namespace App\Http\Controllers;

use DB;
use App\Banner_img;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\AdapterInterface;

class TopicsController extends Controller{

	public function index(Request $request)
	{
		$user = $request->user();

		$topics = DB::table('topics')->where('isPublished', 1)->get();

		$params = [
			'user' => $user,
			'topics' => $topics
		];

		return view('tail.topics')->with('params', $params);
	}

	public function detail(Request $request,$id)
	{
		$user = $request->user();

		$topic = DB::table('topics')->where('id', $id)->first();
		$articles = DB::table('topic_articles')->where('tid',$id)->get();
		$articleInfo = [];
		foreach ($articles as $article) {
			$author = DB::table('tail_users')->where('uid', $article->uid)->first();
			$articleInfo[]=[
				'author' => $author,
				'article' => $article
			];
		}
		$params = [
			'user' => $user,
			'topic' => $topic,
			'articlesInfo' => $articleInfo
		];

		return view('tail.topicDetail')->with('params', $params); 
	}

	public function article(Request $request,$aid)
	{
		$user = $request->user();

		$article = DB::table('topic_articles')->where('id',$aid)->first();
//		$currentUser = DB::table('tail_users')->where('uid',$user->id)->first();
		$currentUser = getUserInfo(isset($user) ? $user['id'] : 2);
		$author =getUserInfo($article->uid);

		$params = [
			'user' => $user,
			'currentUserInfo' => $currentUser,
			'article' => $article,
			'author' => $author
		];

		return view('tail.topicArticle')->with('params', $params);
	}

	public function noPicTopicArticle(Request $request,$aid)
	{
		$user = $request->user();

		$article = DB::table('topic_articles')->where('id',$aid)->first();
//		$currentUser = DB::table('tail_users')->where('uid',$user->id)->first();
		$currentUser = getUserInfo(isset($user) ? $user['id'] : 2);
		$author =getUserInfo($article->uid);

		$params = [
			'user' => $user,
			'currentUserInfo' => $currentUser,
			'article' => $article,
			'author' => $author
		];

		return view('tail.noPicTopicArticle')->with('params', $params);
	}

	public function postTopic(Request $request)
	{
		$user = $request->user();
		$topicName = $request->get('topicName');
		$topicIntro = $request->get('topicIntro');
		$topicDes = $request->get('topicDes');
		DB::table('topics')->insertGetId(
			['name' => $topicName, 'description' => $topicIntro, 'content' => $topicDes,
			 'image' => 'http://115.28.180.158/topics/images/thumbs/1.jpg', 'uid' => $user['id'], 'isPublished' => 0]
		);

		$array = array('data'=>'success');
		echo json_encode($array);
	}

	public function newArticle(Request $request,$id)
	{
		$user = $request->user();
		$topic = DB::table('topics')->where('id', $id)->first();

		$params = [
			'user' => $user,
			'topic' => $topic
		]; 

		return view('tail.newTopicArticle')->with('params', $params);
	}

	public function postArticle(Request $request)
	{
		$user = $request->user();
		$title = $request->get('title');
		$content = $request->get('contentHtml');
		$topic = $request->get('topic');
		DB::insert('insert into topic_articles value(0,?,?,?,?,?,?,?,?,?)',[$title,$content,null,$user->id,$topic->id,time(),0,0,0]);

  
		$array = array('data'=>'success');
		echo json_encode($array);

	}

}