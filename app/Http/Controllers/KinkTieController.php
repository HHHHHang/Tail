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
		$userInfo = getUserInfo(isset($user) ? $user['id'] : 2);
		$comments = DB::table('comments')->where('akid', $kid)->where('type', 'kinkTie')->get();
		DB::table('kinkTies')->where('kid', $kid)->increment('viewNum');
		$article = DB::table('kinkTies')->where('kid', $kid)->first();
		$postUser = DB::table('tail_users')->where('uid', $article->uid)->first();
		//判断是否赞过
		$hasUp = count(DB::table('ups')->where('type', 'tie')->where('upId', $kid)->where('uid', $userInfo['id'])->first());
		//判断是否收藏
		$hasCollect = count(DB::table('collects')->where('type', 'tie')->where('collectId', $kid)->where('uid', $userInfo['id'])->first());
		$params = [
			'user' => $userInfo,
			'aid' => $kid,
			'title' => $article->title,
			'content' => $article->content,
			'type' => $article->type,
			'commentNum' => $article->commentNum,
			'upNum'      => $article->upNum,
			'avatar' => $postUser->avatar,
			'postName' => $postUser->name,
			'postUserId'   => $postUser->uid,
			'hasUp' => $hasUp,
			'hasCollect' => $hasCollect,
			'viewNum'  => $article->viewNum
		];
		return view('tail.kinkTie')->with('params', $params)->with('comments', $comments);
	}

	public function tiePost(Request $request) {
		$content = $request->get('content');
		$kid      = $request->get('aid');
		$receiverId = $request->get('receiverId');
		$receiverName      = $request->get('receiverName');
		$receiverCommentId = $request->get('receiverCommentId');

		$user = $request->user();
		$username = isset($user) ?  $user['name'] : "游客";
		$uid      = isset($user) ?  $user['id'] : '0';

		$comment_id = DB::table('comments')->insertGetId(
			array('akid'=> $kid, 'type'=> 'kinkTie', 'content'=>$content,'uid'=> $uid, 'senderName' => $username,
				'receiverId' => $receiverId, 'receiverName' => $receiverName, 'receiverCommentId' => $receiverCommentId)
		);

		DB::table('kinkTies')->where('kid', $kid)->increment('commentNum');

		// 谁谁谁收到消息 todo
		DB::table('messages')->insertGetId(
			['type' => 'comment', 'uid' => $receiverId, 'sender_uid' => $uid, 'comment_id' => $comment_id]
		);

		return redirect('/kinkTie/' . $kid);
	}

	public function kinkTie(Request $request, $kid) {

		$kid = $kid == null ? 0 : $kid;
		$user = $request->user();
		$userInfo = getUserInfo(isset($user) ? $user['id'] : 2);

		$comments = DB::table('comments')->where('akid', $kid)->where('type', 'kinkTie')->get();
		DB::table('kinkTies')->where('kid', $kid)->increment('viewNum');
		$article = DB::table('kinkTies')->where('kid', $kid)->first();
		$postUser = DB::table('tail_users')->where('uid', $article->uid)->first();
		//判断是否投票
		$hasVote = count(DB::table('votes')->where('kid', $kid)->where('uid', $user['id'])->first());
		//判断是否赞过
		$hasUp = count(DB::table('ups')->where('type', 'article')->where('upId', $kid)->where('uid', $user['id'])->first());
		//判断是否收藏
		$hasCollect = count(DB::table('collects')->where('type', 'article')->where('collectId', $kid)->where('uid', $user['id'])->first());
		$voteInfo = DB::table('voteOptions')->where('kid', $kid)->first();

		$multi = $voteInfo->multi;
		$maxChoiceNum = $voteInfo->maxChoiceNum;
		$options = DB::table('voteOptions')->where('kid', $kid)->get();
		$voteCountSum = array_sum(DB::table('voteOptions')->where('kid', $kid)->pluck('voteCount'));
//		var_dump($voteCountSum);
//		die;
		$introduction = $voteInfo->introduction;
		$attendCount = count(DB::table('votes')->where('kid', $kid)->where('uid', $user['id'])->get());

		$params = [
			'user' => $user,
			'userInfo' => $userInfo,
			'kinkTie' => $article,
			'postUser' => $postUser,
			'hasUp' => $hasUp,
			'hasCollect' => $hasCollect,
			'hasVote' => $hasVote,
			'options' => $options,
			'introduction' => $introduction,
			'attendCount' => $attendCount,
			'maxChoiceNum' => $maxChoiceNum,
			'voteCountSum' => $voteCountSum,
			'aid' => $kid,
			'multi' => $multi
		];
//		die;

//		$kinkTie = array(
			//'title'=>'手机使用什么输入法?',
			//'type'=>'手机',
			//'publishTime'=>'2016-4-10 18:13',
			//'viewCount'=>1060,
			//'likeCount'=>2,
			//'commentCount'=>20,
			//'multi'=>1,
			//'maxChoiceNum'=>3,
			//'attendCount'=>131,
			//'options'=>array(
//				array('id'=> 1, 'content' => '搜狗输入法', 'voteCount' => 0, 'voteProportion' => 0),
//				array('id'=> 2, 'content' => '百度输入法', 'voteCount' => 0, 'voteProportion' => 0),
//				array('id'=> 3, 'content' => 'QQ输入法', 'voteCount' => 0, 'voteProportion' => 0),
//				array('id'=> 4, 'content' => '谷歌输入法', 'voteCount' => 1, 'voteProportion' => 50),
//				array('id'=> 5, 'content' => '手机自带输入法', 'voteCount' => 1, 'voteProportion' => 50),
//				array('id'=> 6, 'content' => '其他', 'voteCount' => 0, 'voteProportion' => 0)),
			//'introduction'=>'你们都用哪个手机打字输入法呢？');
//		$params = [
//			'user' => $userInfo,
//			'aid' => $kid,
//			'kinkTie' => $kinkTie,
//			'postUser' => $postUser,
//			'hasUp' => $hasUp,
//			'hasCollect' => $hasCollect,
//			'hasVote' => $hasVote,
//		];

		return view('tail.forumDetail')->with('params', $params)->with('comments', $comments);
	}

	public function kinkTiePost(Request $request) {
		$content = $request->get('content');
		$kid      = $request->get('aid');
		$receiverId = $request->get('receiverId');
		$receiverName      = $request->get('receiverName');
		$receiverCommentId = $request->get('receiverCommentId');

		$user = $request->user();
		$username = isset($user) ?  $user['name'] : "游客";
		$uid      = isset($user) ?  $user['id'] : '0';

		DB::table('comments')->insertGetId(
			array('akid'=> $kid, 'type'=> 'kinkTie', 'content'=>$content,'uid'=> $uid, 'senderName' => $username,
				'receiverId' => $receiverId, 'receiverName' => $receiverName, 'receiverCommentId' => $receiverCommentId)
		);

		DB::table('kinkTies')->where('kid', $kid)->increment('commentNum');

		return redirect('/kinkTie/' . $kid);
	}
} 