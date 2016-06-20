<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests;
use Illuminate\Http\Request;


class SearchController extends Controller
{

	function searchForum(Request $request, $keyword='') {
		$user = $request->user();

		$userInfo = isset($user) ? getUserInfo($user->id) : getUserInfo(2);

		$kinkTies = $keyword ? $articles = DB::table('kinkTies')->where('title', 'like', '%' . $keyword . '%')->get()
			: DB::select("SELECT * FROM kinkTies ORDER BY createTime DESC");

		foreach ($kinkTies as $kinkTie) {
			$tail_user = isset($kinkTie->uid) ? DB::table('tail_users')->where('uid', $kinkTie->uid)->first() : DB::table('tail_users')->where('uid', 2)->first();
			$data[] = [
				'title' => $kinkTie->title,
				'writer' => $tail_user->name,
				'publishTime' => date('y-m-d', $kinkTie->createTime),
				'type' => $kinkTie->type,
				'icon'=>$tail_user->avatar,
				'commentCount' => $kinkTie->commentNum,
				'link'   => '/kinkTie/' . $kinkTie->kid
			];
		}

		$searchTar = $request->get('searchTar') ? $request->get('searchTar') : "";

		$params = [
			'user' => $userInfo,
		];

		if ($user) return view('tail.searchForum')->with('params', $params)->with('data', $data)->with('searchTar', $searchTar);
		else {
			return view('tail.searchForum')->with('params', $params)->with('data', $data)->with('searchTar', $searchTar);
		}
	}

	function searchArticle(Request $request, $keyword='') {
		$user = $request->user();

		$articles = $keyword ? $articles = DB::table('articles')->where('title', 'like', '%' . $keyword . '%')->get()
			: DB::select("SELECT * FROM articles ORDER BY createTime DESC");

		$userInfo = isset($user) ? getUserInfo($user->id) : getUserInfo(2);

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
			'articlesInfo' => $articlesInfo,
			'keyword'      => $keyword
		];

		return view('tail.searchArticle')->with('params', $params)->with('user', $user);
	}

	function searchTopic(Request $request, $keyword = '') {
		$user = $request->user();
		$userInfo = isset($user) ? getUserInfo($user->id) : getUserInfo(2);
		if (!$keyword) {
			$topics = DB::table('topics')->get();
		} else {
			$topics = DB::table('topics')->where('name', 'like', '%' . $keyword . '%')->get();
		}

		$topicInfo = [];
		foreach ($topics as $topic) {
			$postUser = DB::table('tail_users')->where('uid', $topic->uid)->first();
			$topicInfo[] = [
				'name' => $topic->name,
				'postName'  => $postUser->name,
				'avatar' => $postUser->avatar,
				'image'  => $topic->image,
				'link'   => '/topic/detail/' . $topic->id
			];
		}

		$params = [
			'user' => $userInfo,
			'topics' => $topicInfo,
			'keyword'      => $keyword
		];

		return view('tail.searchTopic')->with('params', $params);
	}

	function searchArticleWithKW(Request $request, $keyword) {
		$user = $request->user();
		$articles = DB::table('articles')->where('title', 'like', '%' . $keyword . '%')->get();
		var_dump($articles);
	}

	function getSearchTieResult() {

	}

 }
