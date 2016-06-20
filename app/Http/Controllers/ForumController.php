<?php
/**
 * Created by PhpStorm.
 * User: tina
 * Date: 16/5/23
 * Time: 下午3:11
 */
namespace App\Http\Controllers;

use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\AdapterInterface;

class ForumController extends Controller{

	// 文章界面
    public function index(Request $request, $type='all')
    {
        $user = $request->user();
		$tail_user = isset($user) ? DB::table('tail_users')->where('uid', $user->id)->first() : DB::table('tail_users')->where('uid', 2)->first();
		$userInfo  = getUserInfo($tail_user->uid);
		$articles = $type !="all"? DB::table('articles')->where('type', $type)->get() :
			DB::table('articles')->orderBy('createTime', 'desc')->get();
		$hotTags = DB::table('tag')->orderBy('num','desc')->take(4)->get();
		$articlesInfo = [];
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

		//forum推广位置
		$banners = DB::table('banners')->where('type', 'forum_new')->get();
		$testBanner = DB::table('banners')->where('type', 'forum_test')->get();
		$side_banners = DB::table('banners')->where('type', 'index_side')->get();

		$params = [
			'user' => $userInfo,
			'articlesInfo' => $articlesInfo,
			'articles' => $articles,
			'banner'   => $banners,
			'side_banner' => $side_banners,
			'test'     => $testBanner,
			'type' => $type,
			'hotTags'=>$hotTags,

		];

        if ($user) return view('tail.forum')->with('params', $params);
        else {
            return view('tail.forum')->with('params', $params);
        }
    }

	public function filter(Request $request, $type='all')
	{
		$user = $request->user();
		$keywords = $request->get("keywords");
		$tail_user = isset($user) ? DB::table('tail_users')->where('uid', $user->id)->first() : DB::table('tail_users')->where('uid', 2)->first();
		$userInfo  = getUserInfo($tail_user->uid);
		$articles = $type!="all" ? DB::table('articles')->where('type', $type)->get() :
			DB::table('articles')->orderBy('createTime', 'desc')->get();
		$aids = [];
		$result = [];
		$keywords = json_decode($keywords);
		$hotTags = DB::table('tag')->orderBy('num','desc')->take(4)->get();

		$have = [];

		if($keywords){
			foreach ($keywords as $keyword){
				$temp = DB::table('article_tag')
					-> join('tag','article_tag.tagId','=','tag.tagId')
					->select('aid')
					->where('tag.name',$keyword)
					->get();

				foreach ($temp as $aid) {
//					$aids[] = $aid;
					if ($type != 'all' && !isset($have[$aid->aid])) {
						$have[$aid->aid] = 1;
						$temp_result = DB::table('articles')->where('id', $aid->aid)->where('type', $type)->first();
						if ($temp_result) $result[] = $temp_result;
					} elseif (!isset($have[$aid->aid])) {
						$have[$aid->aid] = 1;
						if (DB::table('articles')->where('id', $aid->aid)->first())
						$result[] = DB::table('articles')->where('id', $aid->aid)->first();
					}
				}
//				$aids[]= DB::select('select aid from tag nature join article_tag where tag.tagId = article_tag.tagId and tag.name = ?', $keyword);

			}
//			$articlesKeywords = DB::select('select * from articles where id in ?',$aids);
		}

		$articlesInfo = [];
		foreach ($result as $article) {
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

		//forum推广位置
		$banners = DB::table('banners')->where('type', 'forum_new')->get();
		$testBanner = DB::table('banners')->where('type', 'forum_test')->get();
		$side_banners = DB::table('banners')->where('type', 'index_side')->get();

		$params = [
			'user' => $userInfo,
			'articlesInfo' => $articlesInfo,
			'articles' => $result,
			'banner'   => $banners,
			'side_banner' => $side_banners,
			'test'     => $testBanner,
			'type' => $type,
			'hotTags'=>$hotTags,
			'keywords'=>$keywords
		];


		if ($user) return view('tail.forum')->with('params', $params);
		else {
			return view('tail.forum')->with('params', $params);
		}
	}

	// 普通帖子界面
	public function tie(Request $request, $type='all') {
		$user = $request->user();
		$userInfo = getUserInfo(isset($user) ? $user['id'] : 2);
		$articles_type = $type!="all" ? DB::table('kinkTies')->where('type', $type)->get() :
			DB::table('kinkTies')->orderBy('createTime', 'desc')->get();

		$articles = [];
		foreach($articles_type as $article) {
			if (!DB::table('voteOptions')->where('kid', $article->kid)->first())
				$articles[] = $article;
		}


		$articlesInfo = [];
		foreach ($articles as $article) {
			$postUser = DB::table('tail_users')->where('uid', $article->uid)->first();
			$articlesInfo[] = [
				'title' => $article->title,
				'name'  => $postUser->name,
				'publishTime' => date('y-m-d h:m:s',$article->createTime),
				'type'  => $article->type,
				'avatar' => $postUser->avatar,
				'commentNum' => $article->commentNum,
				'link'   => '/kinkTie/' . $article->kid
			];
		}

		$hot_ties  = DB::table("kinkTies")->where('viewNum', '>', 100)->get();
		$params = [
			'user' => $userInfo,
			'articlesInfo' => $articlesInfo,
			'isKinkTie'    => 1,
			'hot'	=> $hot_ties,
			'type'	=> $type
		];

		if ($user) return view('tail.ties')->with('params', $params);
		else {
			return view('tail.ties')->with('params', $params);
		}
	}

	// 纠结帖子界面
	public function kinkTie(Request $request, $type='all') {
		$user = $request->user();
		$userInfo = getUserInfo(isset($user) ? $user['id'] : 2);
		$articles_type = $type!="all" ? DB::table('kinkTies')->where('type', $type)->get() :
			DB::table('kinkTies')->orderBy('createTime', 'desc')->get();

		$articles = [];
		foreach($articles_type as $article) {
			if (DB::table('voteOptions')->where('kid', $article->kid)->first())
				$articles[] = $article;
		}

		$articlesInfo = [];
		foreach ($articles as $article) {
			$postUser = DB::table('tail_users')->where('uid', $article->uid)->first();
			$articlesInfo[] = [
				'title' => $article->title,
				'name'  => $postUser->name,
				'publishTime' => date('y-m-d h:m:s',$article->createTime),
				'type'  => $article->type,
				'avatar' => $postUser->avatar,
				'commentNum' => $article->commentNum,
				'link'   => '/forum/Detail/' . $article->kid
			];
		}
		$hot_ties  = DB::table("kinkTies")->where('viewNum', '>', 100)->get();
		$params = [
			'user' => $userInfo,
			'articlesInfo' => $articlesInfo,
			'isKinkTie'    => 0,
			'hot'	=> $hot_ties,
			'type'	=> $type
		];

		if ($user) return view('tail.ties')->with('params', $params);
		else {
			return view('tail.ties')->with('params', $params);
		}
	}


    public function forumN(Request $request) {
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