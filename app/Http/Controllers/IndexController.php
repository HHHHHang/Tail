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

class IndexController extends Controller{

	public function profile(Request $request)
	{
		$user = $request->user();
		echo $user['email'].'登录成功！';
	}

	public function index(Request $request)
	{
		$banner_imgs = DB::table('banner_imgs')->get();
		foreach ($banner_imgs as $banner_img) {
			$pics[] = $banner_img->file;
		}
		$user = $request->user();

		$picsArr = json_encode($pics);

		//首页推广位置
		$banners = DB::table('banners')->where('type', 'index')->get();
		$side_banners = DB::table('banners')->where('type', 'index_side')->get();
		$hot_ties  = DB::table("kinkTies")->where('viewNum', '>', 100)->get();

		$articles = DB::select("SELECT * FROM articles ORDER BY createTime DESC");

		foreach ($articles as $article) {
			$postUser = DB::table('tail_users')->where('uid', $article->uid)->first();
			$articlesInfo[] = [
				'article' => $article,
				'title' => $article->title,
				'name'  => $postUser->name,
				'publishTime' =>$article->createTime,
				'type'  => $article->type,
				'avatar' => $postUser->avatar,
				'commentNum' => $article->commentNum,
				'link'   => '/article/' . $article->id
			];
		}

		$params = [
			'user' => $user,
			'picsArr' => $picsArr,
			'pics'    => $banner_imgs,
			'articles' => $articles,
			'banner'   => $banners,
			'side_banner' => $side_banners,
			'hot'      => $hot_ties,
			'articleInfo' => $articlesInfo
		];

		return view('tail.welcome')->with('params', $params);
	}

	public function logout() {
		Auth::logout();
		return redirect('/');
	}

	public function article(Request $request) {

		$user = $request->user();
		$comments = DB::select("SELECT * from comments");
		if ($user) return view('tail.article')->with('comments', $comments)->with('user', $user);
		return view('tail.article')->with('comments', $comments);
	}

	public function articlePost(Request $request) {
		$content = $request->get('content');
		$comments = DB::select("SELECT * from comments");
		$user = $request->user();
		$username = isset($user) ?  $user['name'] : "游客";
		$num = count($comments);
		$time = time();
		Db::insert('INSERT INTO comments (id, username, content, createtime)  VALUE (?, ?, ?, ?)', [$num+1, $username, $content, $time]);
		$comments = DB::select("SELECT * from comments");
		if ($user) return view('tail.article')->with('comments', $comments)->with('user', $user);
		return view('tail.article')->with('comments', $comments);
	}
} 