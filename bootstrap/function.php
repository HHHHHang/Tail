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

