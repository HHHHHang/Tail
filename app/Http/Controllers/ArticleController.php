<?php

namespace App\Http\Controllers;

use DB;
use App\Banner_img;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use League\Flysystem\AdapterInterface;

class ArticleController extends Controller{

	public function profile(Request $request)
	{
		$user = $request->user();
		echo $user['email'].'登录成功！';
	}

	public function index(Request $request)
	{
//		return "helloworld";
//		Auth::logout();
		$banner_imgs = DB::table('banner_imgs')->get();
		foreach ($banner_imgs as $banner_img) {
			$pics[] = $banner_img->file;
		}
		$user = $request->user();

		$picsArr = json_encode($pics);

		$articles = DB::select("SELECT * FROM articles ORDER BY createTime DESC");
//		var_dump($articles);
		$params = [
			'user' => $user,
			'picsArr' => $picsArr,
			'pics'    => $pics,
			'articles' => $articles
		];

		if ($user) return view('tail.welcome')->with('params', $params);
		return view('tail.welcome')->with('params', $params);
	}

	public function article(Request $request, $id) {
		$user = $request->user();
		$userInfo = getUserInfo(isset($user) ? $user['id'] : 2);
		$comments = DB::table('comments')->where('type', 'article')->where('akid', $id)->get();
		DB::table('articles')->where('id', $id)->increment('viewNum');
		$article = DB::table('articles')->where('id', $id)->first();
		$postUser = DB::table('tail_users')->where('uid', $article->uid)->first();
		//判断是否赞过
		$hasUp = count(DB::table('ups')->where('type', 'article')->where('upId', $id)->where('uid', $userInfo['id'])->first());
		//判断是否收藏
		$hasCollect = count(DB::table('collects')->where('type', 'article')->where('collectId', $id)->where('uid', $userInfo['id'])->first());
		$params = [
			'user' => $user,
			'userInfo' => $userInfo,
			'aid' => $id,
			'title' => $article->title,
			'content' => $article->all_content,
			'type' => $article->type,
			'createTime' => $article->createTime,
			'commentNum' => $article->commentNum,
			'upNum'      => $article->upNum,
			'avatar' => $postUser->avatar,
			'postName' => $postUser->name,
			'posterId' => $postUser->uid,
			'image' => $article->image,
			'hasUp' => $hasUp,
			'hasCollect' => $hasCollect,
			'viewNum'  => $article->viewNum
		];
		if ($user) return view('tail.article')->with('params', $params)->with('comments', $comments)->with('user', $user);
		return view('tail.article')->with('params', $params)->with('comments', $comments);
	}

	public function articlePost(Request $request) {
		$content = $request->get('content');
		$aid      = $request->get('id');
//		$comments = DB::table('comments')->;

		$user = $request->user();
		$username = isset($user) ?  $user['name'] : "游客";
		$uid      = isset($user) ?  $user['id'] : '0';

		DB::table('comments')->insertGetId(
			array('akid'=> $aid, 'type'=> 'article', 'uid'=> $uid, 'username' => $username, 'content'=>$content)
		);
		DB::table('articles')->where('id', $aid)->increment('commentNum');
		$comments = DB::table('comments')->where('akid', $aid)->get();
		$params = [
			'aid' => $aid,
		];

		return redirect('/article/' . $aid);
	}

	public function up(Request $request) {
		$id = $request->get('id');
		$type = $request->get('type');
		$uid  = $request->get('uid');
		if ($type == 'tie') {
			DB::table('kinkTies')->where('kid', $id)->increment('upNum');
			DB::table('ups')->insertGetId(
				['uid' => $uid, 'upId' => $id, 'type' => $type]
			);
		} elseif($type == 'article'){
			DB::table('articles')->where('id', $id)->increment('upNum');
			DB::table('ups')->insertGetId(
				['uid' => $uid, 'upId' => $id, 'type' => $type]
			);
		}else{
			DB::table('topic_articles')->where('id', $id)->increment('upNum');
			DB::table('ups')->insertGetId(
				['uid' => $uid, 'upId' => $id, 'type' => $type]
			);
		}
		return "!";
	}

	public function cancelUp(Request $request) {
		$id = $request->get('id');
		$type = $request->get('type');
		$uid  = $request->get('uid');
		if ($type == 'tie') {
			DB::table('kinkTies')->where('kid', $id)->decrement('upNum');
			DB::table('ups')->where('type', 'tie')->where('upId', $id)->where('uid', $uid)->delete();
		} elseif($type=='article') {
			DB::table('articles')->where('id', $id)->decrement('upNum');
			DB::table('ups')->where('type', 'topicArticle')->where('upId', $id)->where('uid', $uid)->delete();
			
		}else{
			DB::table('topic_articles')->where('id', $id)->decrement('upNum');
			DB::table('ups')->where('type', 'topicArticle')->where('upId', $id)->where('uid', $uid)->delete();
		}
		return "!";
	}

	public function collect(Request $request) {
		$id = $request->get('id');
		$type = $request->get('type');
		$uid  = $request->get('uid');
		if ($type == 'tie') {
			DB::table('kinkTies')->where('kid', $id)->increment('collectNum');
			DB::table('collects')->insertGetId(
				['uid' => $uid, 'collectId' => $id, 'type' => $type]
			);
		} elseif($type == 'article') {
			DB::table('articles')->where('id', $id)->increment('collectNum');
			DB::table('collects')->insertGetId(
				['uid' => $uid, 'collectId' => $id, 'type' => $type]
			);
		}else{
			DB::table('topic_articles')->where('id', $id)->increment('collectNum');
			DB::table('collects')->insertGetId(
				['uid' => $uid, 'collectId' => $id, 'type' => $type]
			);
		}
		return "!";
	}

	public function cancelCollect(Request $request) {
		$id = $request->get('id');
		$type = $request->get('type');
		$uid  = $request->get('uid');
		if ($type == 'tie') {
			DB::table('collects')->where('type', 'tie')->where('collectId', $id)->where('uid', $uid)->delete();
			DB::table('kinkTies')->where('kid', $id)->decrement('collectNum');
		} elseif($type == 'article') {
			DB::table('collects')->where('type', 'article')->where('collectId', $id)->where('uid', $uid)->delete();
			DB::table('articles')->where('id', $id)->decrement('collectNum');
		}else{
			DB::table('collects')->where('type', 'topicArticle')->where('collectId', $id)->where('uid', $uid)->delete();
			DB::table('topic_articles')->where('id', $id)->decrement('collectNum');
		}
		return "!";
	}

} 