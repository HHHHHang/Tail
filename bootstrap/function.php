<?php

function getUserInfo($uid) {
	$tail_user = DB::table('tail_users')->where('uid', $uid)->first();
	$userInfo = [
		'id'     => $tail_user->uid,
		'avatar' => $tail_user->avatar,
		'name'   => $tail_user->name,
		'level'  => '初级',
		'commentNum' => $tail_user->commentNum,
		'postNum'    => $tail_user->postNum,
		'followNum'     => $tail_user->followNum,
		'fans'       => $tail_user->fans
	];
	return $userInfo;
}

function getIndexBanner() {
	$banner_img = DB::table('banners')->where('type', 'index')->get();
	return $banner_img;
}

function getACommentById($id) {
	$comments = DB::table('comments')->where('type', 'kinkTie')->where('akid', $id)->get();
	return $comments;
}

function getCommentByUid($uid) {
	$comments = DB::table('comments')->where('uid', $uid)->get();
	return $comments;
}

function getArticleByUid($uid) {
	$articles = DB::table('articles')->where('uid', $uid)->get();
	return $articles;
}

function getTieByUid($uid) {
	$ties = DB::table('kinkTies')->where('uid', $uid)->get();
	return $ties;
}