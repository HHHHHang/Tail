<?php

namespace App\Http\Controllers;

use DB;
use App\Banner_img;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use League\Flysystem\AdapterInterface;

class KinkTieController extends Controller{


	public function index(Request $request, $kid) {

		$user = $request->user();
		$comments = DB::table('comments')->where('akid', $kid)->where('type', 'kinkTie')->get();
		$article = DB::table('kinkTies')->where('kid', $kid)->first();
		$postUser = DB::table('tail_users')->where('uid', $article->uid)->first();
		$params = [
			'user' => $user,
			'aid' => $kid,
			'title' => $article->title,
			'content' => $article->content,
			'type' => $article->type,
			'commentNum' => $article->commentNum,
			'upNum'      => $article->upNum,
			'avatar' => $postUser->avatar,
			'postName' => $postUser->name,
		];
		return view('tail.kinkTie')->with('params', $params)->with('comments', $comments);
	}

	public function tiePost(Request $request) {
		$content = $request->get('content');
		$kid      = $request->get('id');
//		$comments = DB::table('comments')->;

		$user = $request->user();
		$username = isset($user) ?  $user['name'] : "游客";
		$uid      = isset($user) ?  $user['id'] : '0';

		DB::table('comments')->insertGetId(
			array('akid'=> $kid, 'type'=>'kinkTie', 'uid'=> $uid, 'username' => $username, 'content'=>$content, 'createtime' => time())
		);
		DB::table('kinkTies')->where('kid', $kid)->increment('commentNum');

		return redirect('/kinkTie/' . $kid);
	}
} 