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
    public function index(Request $request, $type='')
    {
        $user = $request->user();
		$tail_user = isset($user) ? DB::table('tail_users')->where('uid', $user->id)->first() : DB::table('tail_users')->where('uid', 2)->first();
		$userInfo  = getUserInfo($tail_user->uid);
		$articles = $type ? DB::table('articles')->where('type', $type)->get() :
			DB::table('articles')->orderBy('createTime', 'desc')->get();

		$articlesInfo = [];
		foreach ($articles as $article) {
			$postUser = DB::table('tail_users')->where('uid', $article->uid)->first();
			$articlesInfo[] = [
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
			'test'     => $testBanner
		];

        if ($user) return view('tail.forum')->with('params', $params);
        else {
            return view('tail.forum')->with('params', $params);
        }
    }

    public function forum(Request $request) {

        $user = $request->user();
        $comments = DB::select("SELECT * from comments");
        $data = array('title'=>'手机使用什么输入法?', 'type'=>'手机', 'publishTime'=>'2016-4-10 18:13','viewerCount'=>1060, 'zanCount'=>2, 'commentCount'=>20, 'multi'=>false, 'attendCount'=>131, 'options'=>array('搜狗输入法', '百度输入法', 'QQ输入法', '谷歌输入法', '手机自带输入法', '其他'),'introduction'=>'你们都用哪个手机打字输入法呢？');

        $user1 = array('icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'name'=>'用户名', 'level'=>'初级', 'forumCount'=>0, 'commentCount'=>0, 'followCount'=>0);

        if ($user) return view('tail.forumDetail')->with('comments', $comments)->with('user', $user)->with('data', $data)->with('user1', $user1);
        else {
            return view('tail.forumDetail')->with('comments', $comments)->with('user1', $user1)->with('data', $data);
        }
    }

	// 普通帖子界面
	public function tie(Request $request, $type='') {
		$user = $request->user();
		$userInfo = getUserInfo(isset($user) ? $user['id'] : 2);
		$articles = $type ? DB::table('kinkTies')->where('type', $type)->get() :
			DB::table('kinkTies')->orderBy('createTime', 'desc')->get();
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
			'hot'	=> $hot_ties
		];

		if ($user) return view('tail.ties')->with('params', $params);
		else {
			return view('tail.ties')->with('params', $params);
		}
	}

	// 纠结帖子界面
	public function kinkTie(Request $request, $type='') {
		$user = $request->user();
		$userInfo = getUserInfo(isset($user) ? $user['id'] : 2);
		$articles = $type ? DB::table('kinkTies')->where('type', $type)->get() :
			DB::table('kinkTies')->orderBy('createTime', 'desc')->get();
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
			'isKinkTie'    => 0,
			'hot'	=> $hot_ties
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