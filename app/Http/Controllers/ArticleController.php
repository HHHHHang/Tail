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
		$comments = DB::table('comments')->where('akid', $id)->get();
		$article = DB::table('articles')->where('id', $id)->first();
		$postUser = DB::table('tail_users')->where('uid', $article->uid)->first();
		$params = [
			'aid' => $id,
			'title' => $article->title,
			'content' => $article->all_content,
			'type' => $article->type,
			'commentNum' => $article->commentNum,
			'upNum'      => $article->upNum,
			'avatar' => $postUser->avatar,
			'postName' => $postUser->name,
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
			array('akid'=> $aid, 'uid'=> $uid, 'username' => $username, 'content'=>$content, 'createtime' => time())
		);
		DB::table('articles')->where('id', $aid)->increment('commentNum');
		$comments = DB::table('comments')->where('akid', $aid)->get();
		$params = [
			'aid' => $aid,
		];

		return redirect('/article/' . $aid);
	}
} 