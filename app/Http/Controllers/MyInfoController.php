<?php
/**
 * Created by PhpStorm.
 * User: lyn
 * Date: 16/5/3
 * Time: 下午11:44
 */

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\AdapterInterface;

class MyInfoController extends Controller{


	public function index(Request $request)
	{
//		$username = $request->get('name');
//		var_dump($username);
		$user = $request->user();
		$userInfo = getUserInfo($user['id']);
		$articleComments = DB::table('comments')->where('type', 'article')->where('uid', $user['id'])->orderBy('createtime', 'desc')->get();
		$tieComments = DB::table('comments')->where('type','tie')->where('uid', $user['id'])->orderBy('createtime', 'desc')->get();
		$ties = DB::table('kinkTies')->where('uid', $user['id'])->orderBy('createTime', 'desc')->get();
		$articles = DB::table('articles')->where('uid', $user['id'])->orderBy('createTime', 'desc')->get();
		$ups = DB::table('ups')->where('uid', $user['id']);
		$collects = DB::table('collects')->where('uid', $user['id']);
		$params = [
			'user' => $userInfo,
			'articles' => $articles,
			'ties' => $ties,
			'articleComments' => $articleComments,
			'tieComments' => $tieComments,
			'ups' => $ups,
			'collects' => $collects,
		];
		if ($user) return view('tail.otherInfo')->with('user', $user)->with('params', $params);
		return view('tail.login');
	}

	public function otherInfo(Request $request, $uid)
	{
		$user = $request->user();
		$userInfo = getUserInfo($uid);
		$articleComments = DB::table('comments')->where('type', 'article')->where('uid', $uid)->orderBy('createtime', 'desc')->get();
		$tieComments = DB::table('comments')->where('type','tie')->where('uid', $uid)->orderBy('createtime', 'desc')->get();
		$ties = DB::table('kinkTies')->where('uid', $uid)->orderBy('createTime', 'desc')->get();
		$articles = DB::table('articles')->where('uid', $uid)->orderBy('createTime', 'desc')->get();
		$ups = DB::table('ups')->where('uid', $uid);
		$collects = DB::table('collects')->where('uid', $uid);
		$params = [
			'user' => $userInfo,
			'articles' => $articles,
			'ties' => $ties,
			'articleComments' => $articleComments,
			'tieComments' => $tieComments,
			'ups' => $ups,
			'collects' => $collects,
		];
		if ($user) return view('tail.otherInfo')->with('user', $user)->with('params', $params);
		return view('tail.login');
	}

} 