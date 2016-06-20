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
		$upArticles = DB::table('ups')->join('articles', function($join){$join->on('articles.id', '=', 'ups.upId');})->where('ups.type','article')->where('ups.uid', $user['id'])->orderBy('createTime', 'desc')->get();
		$upTies = DB::table('ups')->join('kinkTies', function($join){$join->on('kinkTies.kid', '=', 'ups.upId');})->where('ups.type','tie')->where('ups.uid', $user['id'])->orderBy('createTime', 'desc')->get();
		$collectArticles = DB::table('collects')->join('articles', function($join){$join->on('articles.id', '=', 'collects.collectId');})->where('collects.type','article')->where('collects.uid', $user['id'])->orderBy('createTime', 'desc')->get();
		$collectTies = DB::table('collects')->join('kinkTies', function($join){$join->on('kinkTies.kid', '=', 'collects.collectId');})->where('collects.type','tie')->where('collects.uid', $user['id'])->orderBy('createTime', 'desc')->get();
		$myFollows = DB::table('follows')->where('uid', $user['id'])->get();
		$myFollowsInfos = [];
		foreach ($myFollows as $myFollow)
		{
			$myFollowsInfos = DB::table('tail_users')->where('uid', $myFollow->followUid)->get();
		}
		$params = [
			'user' => $user,
			'userInfo' => $userInfo,
			'articles' => $articles,
			'ties' => $ties,
			'articleComments' => $articleComments,
			'tieComments' => $tieComments,
			'ups' => $ups,
			'collects' => $collects,
			'upArticles' => $upArticles,
			'upTies' => $upTies,
			'collectArticles' => $collectArticles,
			'collectTies' => $collectTies,
			'myFollowsInfos' => $myFollowsInfos,
		];
		if ($user) return view('tail.myinfo')->with('user', $user)->with('params', $params);
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
		$upArticles = DB::table('ups')->join('articles', function($join){$join->on('articles.id', '=', 'ups.upId');})->where('ups.type','article')->where('ups.uid', $uid)->orderBy('createTime', 'desc')->get();
		$upTies = DB::table('ups')->join('kinkTies', function($join){$join->on('kinkTies.kid', '=', 'ups.upId');})->where('ups.type','tie')->where('ups.uid', $uid)->orderBy('createTime', 'desc')->get();
		$collectArticles = DB::table('collects')->join('articles', function($join){$join->on('articles.id', '=', 'collects.collectId');})->where('collects.type','article')->where('collects.uid', $uid)->orderBy('createTime', 'desc')->get();
		$collectTies = DB::table('collects')->join('kinkTies', function($join){$join->on('kinkTies.kid', '=', 'collects.collectId');})->where('collects.type','tie')->where('collects.uid', $uid)->orderBy('createTime', 'desc')->get();
		//判断是否关注
		$hasFollow = count(DB::table('follows')->where('followUid', $uid)->where('uid', $user['id'])->first());
		$params = [
			'user' => $user,
			'userInfo' => $userInfo,
			'articles' => $articles,
			'ties' => $ties,
			'articleComments' => $articleComments,
			'tieComments' => $tieComments,
			'ups' => $ups,
			'collects' => $collects,
			'upArticles' => $upArticles,
			'upTies' => $upTies,
			'collectArticles' => $collectArticles,
			'collectTies' => $collectTies,
			'hasFollow' => $hasFollow
		];
//		var_dump($params['userInfo']);
//		die;
		if ($user) return view('tail.otherInfo')->with('user', $user)->with('params', $params);
		return view('tail.login');
	}

	public function follow(Request $request) {
		$id = $request->get('id');//other's id
		$uid  = $request->get('uid');//user id
		DB::table('tail_users')->where('uid', $uid)->increment('followNum');
		DB::table('tail_users')->where('uid', $id)->increment('fans');
		DB::table('follows')->insertGetId(
			['uid' => $uid, 'followUid' => $id,]
		);
		return "!";
	}

	public function cancelFollow(Request $request) {
		$id = $request->get('id');
		$uid  = $request->get('uid');
		DB::table('follows')->where('followUid', $id)->where('uid', $uid)->delete();
		DB::table('tail_users')->where('uid', $uid)->decrement('followNum');
		DB::table('tail_users')->where('uid', $id)->decrement('fans');
		return "!";
	}

	public function postAvatar(Request $request)
	{
		$user = $request->user();
		$userInfo = getUserInfo($user['id']);
		$file = $request->get('file');
		if(!$request->hasFile('file')){
			$filename = $userInfo['avatar'];
			DB::table('tail_users')->where('uid', $user['id'])->update(['avatar' => $filename]);
			return redirect('/myinfo');
		} else {
			$file = $request->file('file');
			//判断文件上传过程中是否出错
			if ( ! $file->isValid() ) {
				exit( '文件上传出错！' );
			}
			$destPath = realpath( public_path( 'images' ) );
			$filename = $file->getClientOriginalName();
		}
		$imageUrl = asset('images/' . time() . $filename);
		DB::table('tail_users')->where('uid', $user['id'])->update(['avatar' => $imageUrl]);
		if(!$file->move($destPath, $imageUrl)){
//			exit('保存文件失败！');
		}
//		exit('文件上传成功！');
		return redirect('/myinfo');
	}


} 