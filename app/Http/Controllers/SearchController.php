<?php

namespace App\Http\Controllers;

use App\modal\PhoneInfo;
use DB;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests;
use Illuminate\Http\Request;


class SearchController extends Controller
{

	function searchForum(Request $request) {
		$user = $request->user();
		$data = array(
			array('title'=>'深夜俱乐部 | 晒晒你喜欢的那款播放器', 'writer'=>'测试用户', 'publishTime'=>'昨天', 'type'=>'影音', 'icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'commentCount'=>1),
			array('title'=>'深夜俱乐部 | 晒晒你喜欢的那款播放器晒晒你喜欢的那款播放器', 'writer'=>'测试用户', 'publishTime'=>'昨天', 'type'=>'影音', 'icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'commentCount'=>2),
			array('title'=>'深夜俱乐部 | 晒晒你喜欢的那款播放器', 'writer'=>'测试用户', 'publishTime'=>'昨天', 'type'=>'影音', 'icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'commentCount'=>3),
			array('title'=>'深夜俱乐部 | 晒晒你喜欢的那款播放器', 'writer'=>'测试用户', 'publishTime'=>'昨天', 'type'=>'影音', 'icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'commentCount'=>4),
			array('title'=>'深夜俱乐部 | 晒晒你喜欢的那款播放器晒晒你喜欢的那款播放器晒晒你喜欢的那款播放器', 'writer'=>'测试用户', 'publishTime'=>'昨天', 'type'=>'影音', 'icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'commentCount'=>5),
			array('title'=>'深夜俱乐部 | 晒晒你喜欢的那款播放器', 'writer'=>'测试用户', 'publishTime'=>'昨天', 'type'=>'影音', 'icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'commentCount'=>6)
		);

		$user1 = array('icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'name'=>'用户名', 'level'=>'初级', 'forumCount'=>0, 'commentCount'=>0, 'followCount'=>0);

		$searchTar = $request->get('searchTar') ? $request->get('searchTar') : ""; 
		
		if ($user) return view('tail.searchForum')->with('user', $user)->with('data', $data)->with('user1', $user1)->with('searchTar', $searchTar);
		else {
			return view('tail.searchForum')->with('user1', $user1)->with('data', $data)->with('searchTar', $searchTar);
		}
	}
	function searchArticle(Request $request, $keyword='') {
		$user = $request->user();

		$articles = $keyword ? $articles = DB::table('articles')->where('title', 'like', '%' . $keyword . '%')->get()
			: DB::select("SELECT * FROM articles ORDER BY createTime DESC");



		$tail_user = isset($user) ? DB::table('tail_users')->where('uid', $user->id)->first() : DB::table('tail_users')->where('uid', 2)->first();
		$userInfo = [
			'avatar' => $tail_user->avatar,
			'name'   => $tail_user->name,
			'level'  => '初级',
			'commentNum' => $tail_user->commentNum,
			'postNum'    => $tail_user->postNum,
			'followNum'     => $tail_user->followNum,
			'fans'       => $tail_user->fans
		];

		$articlesInfo = [];

		foreach ($articles as $article) {
			$postUser = DB::table('tail_users')->where('uid', $article->uid)->first();
			$articlesInfo[] = [
				'title' => $article->title,
				'name'  => $postUser->name,
				'publishTime' =>$article->createTime,
				'type'  => $article->type,
				'avatar' => $postUser->avatar,
				'content' => $article->content,
				'commentNum' => $article->commentNum,
				'image'  => $article->image,
				'upNum'  => $article->upNum,
				'link'   => '/article/' . $article->id
			];
		}

		$params = [
			'user' => $userInfo,
			'articlesInfo' => $articlesInfo
		];
		$user1 = array('icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'name'=>'用户名', 'level'=>'初级', 'forumCount'=>0, 'commentCount'=>0, 'followCount'=>0);

		$searchTar = $request->get('searchTar') ? $request->get('searchTar') : "";
		
		if ($user) return view('tail.searchArticle')->with('params', $params)->with('user', $user)->with('user1', $user1)->with('searchTar', $searchTar);
		else {
			return view('tail.searchArticle')->with('params', $params)->with('user1', $user1)->with('searchTar', $searchTar);
		}
	}

	function searchArticleWithKW(Request $request, $keyword) {
		$user = $request->user();
		$articles = DB::table('articles')->where('title', 'like', '%' . $keyword . '%')->get();
		var_dump($articles);
	}

 }
