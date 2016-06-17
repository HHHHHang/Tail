<?php
/**
 * Created by PhpStorm.
 * User: lyn
 * Date: 16/5/3
 * Time: 下午11:44
 */

namespace App\Http\Controllers;

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

		$params = [
			'user' => $userInfo
		];

		if ($user) return view('tail.myinfo')->with('user', $user)->with('params', $params);
		return view('tail.login');
	}

} 