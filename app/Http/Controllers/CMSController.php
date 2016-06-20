<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use League\Flysystem\AdapterInterface;

class CMSController extends Controller{

	public function index(Request $request) {
		return view('cms.index');
	}

	public function banner(Request $request, $type='') {

		if ($type == 'index') {
			$banner = DB::table( 'banners' )->where( 'type', 'index' )->orWhere( 'type', 'index_side' )->get();
		} elseif ($type == 'forum') {
			$banner = DB::table( 'banners' )->where( 'type', 'forum_new' )->orWhere( 'type', 'forum_test' )->get();
		} elseif ($type == 'slide') {
			$banner = DB::table('banner_imgs')->get();
		} elseif ($type == 'side') {
			$banner = DB::table('banners')->where('type', 'article_side')->get();
		}

		$params = [
			'length' => count($banner),
			'banner'  => $banner,
			'type'   => $type
		];
		if ($type == 'slide') return view('cms.slide')->with('params', $params);
		else return view('cms.banner')->with('params', $params);
	}

	public function article(Request $request, $type = '') {

		if ($type != '' && $type != 'all') {
			$articles = DB::table('articles')->where('type', $type)->get();
		} else {
			$articles = DB::table( 'articles' )->get();
		}
		$articleInfos = [];
		foreach ($articles as $article) {
			$postUser = DB::table('tail_users')->where('uid', $article->uid)->first();
			$articleInfos[] = [
				'id'    => $article->id,
				'title' => $article->title,
				'type'  => $article->type,
				'postName' => $postUser->name,
				'time'     => $article->createTime,
				'isPublished' => $article->isPublished,
				'userHref' => 'http://115.28.180.158/myinfo',
				'articleHref' => 'http://115.28.180.158/article/' . $article->id
			];
		}

		$params = [
			'articles' => $articleInfos,
			'length'   => count($articleInfos),
			'type'     => $type
		];

		return view('cms.article')->with('params', $params);
	}

	public function tie(Request $request, $type = '') {
		if ($type != '' && $type != 'all') {
			$ties = DB::table('kinkTies')->where('type', $type)->get();
		} else {
			$ties = DB::table('kinkTies')->get();
		}
		$articleInfos = [];
		foreach ($ties as $tie) {
			$postUser = DB::table('tail_users')->where('uid', $tie->uid)->first();
			$articleInfos[] = [
				'id'    => $tie->kid,
				'title' => $tie->title,
				'type'  => $tie->type,
				'postName' => $postUser->name,
				'time'     => date("y-m-d",$tie->createTime),
				'isPublished' => $tie->isPublished,
				'userHref' => 'http://115.28.180.158/myinfo',
				'articleHref' => 'http://115.28.180.158/kinkTie/' . $tie->kid
			];
		}
		$params = [
			'articles' => $articleInfos,
			'length'   => count($articleInfos),
			'type'     => $type
		];
		return view('cms.tie')->with('params', $params);
	}

	public function topic(Request $request) {
		$topics = DB::table('topics')->get();
		foreach ($topics as $topic) {
			$postUser = DB::table('tail_users')->where('uid', $topic->uid)->first();
			$topicInfo[] = [
				'id' => $topic->id,
				'title' => $topic->name,
				'postName' => $postUser->name,
				'isPublished' => $topic->isPublished,
				'userHref' => 'http://115.28.180.158/myinfo',
				'articleHref' => 'http://115.28.180.158/topic/detail/' . $topic->id
			];
		}
		$params = [
			'topics' => $topicInfo,
			'length'   => count($topicInfo)
		];

		return view('cms.topic')->with('params', $params);
	}

	public function deleteArticle(Request $request) {
		$id = $request->get('id');
		DB::table('articles')->where('id', $id)->update(['isPublished' => 0]);
		return "success";
	}

	public function publishArticle(Request $request) {
		$id = $request->get('id');
		DB::table('articles')->where('id', $id)->update(['isPublished' => 1]);
		return "success";
	}

	public function deleteTie(Request $request) {
		$id = $request->get('id');
		DB::table('kinkTies')->where('kid', $id)->update(['isPublished' => 0]);
		return "tie";
	}

	public function publishTie(Request $request) {
		$id = $request->get('id');
		DB::table('kinkTies')->where('kid', $id)->update(['isPublished' => 1]);
		return "tie";
	}

	public function deleteTopic(Request $request) {
		$id = $request->get('id');
		DB::table('topics')->where('id', $id)->update(['isPublished' => 0]);
		return "delete topic succeed!";
	}

	public function publishTopic(Request $request) {
		$id = $request->get('id');
		DB::table('topics')->where('id', $id)->update(['isPublished' => 1]);
		return "publish topic succeed!";
	}

	public function editBanner(Request $request) {
		$id      = $request->get('id');
		$title   = $request->get('title');
		$content = $request->get('content');
		$file   = $request->get('file');
		$href    = $request->get('href');
		DB::table('banners')->where('id', $id)
			->update(['title' => $title, 'content' => $content, 'file' => $file, 'href' => $href]);
		return [$id, $title, $content, $file, $href];
	}

	public function editSlider(Request $request) {
		$id      = $request->get('id');
		$file   = $request->get('file');
		$href    = $request->get('href');
		$type    = $request->get('type');
		if ($type == 'slide') {
			DB::table( "banner_imgs" )->where( 'id', $id )
			  ->update( [ 'file' => $file, 'href' => $href ] );
		} else {
			DB::table( "banners" )->where( 'id', $id )
			  ->update( [ 'file' => $file, 'href' => $href ] );
		}
		return "succeed";
	}

} 