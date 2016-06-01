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

	public function logout() {
		Auth::logout();
		$banner_imgs = DB::table('banner_imgs')->get();
		foreach ($banner_imgs as $banner_img) {
			$pics[] = $banner_img->file;
		}
		$articles = DB::select("SELECT * FROM articles ORDER BY createTime DESC");
		$picsArr = json_encode($pics);
		$params = [
			'picsArr' => $picsArr,
			'pics'    => $pics,
			'articles' => $articles
		];
		return view('tail.welcome')->with('params', $params);
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