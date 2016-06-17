<?php
/**
 * Created by PhpStorm.
 * User: lyn
 * Date: 16/5/3
 * Time: 下午11:44
 */

namespace App\Http\Controllers;

use DB;
use App\Banner_img;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\AdapterInterface;

class TopicsController extends Controller{

	public function index(Request $request)
	{
		$user = $request->user();

		$params = [
			'user' => $user,
		];

		return view('tail.topics')->with('params', $params);
	}

	public function detail(Request $request)
	{
		$user = $request->user();

		$params = [
			'user' => $user,
		];

		return view('tail.topicDetail')->with('params', $params); 
	}

	public function newArticle(Request $request)
	{
		$user = $request->user();

		$params = [
			'user' => $user,
		]; 

		return view('tail.newTopicArticle')->with('params', $params);
	}

	public function postArticle(Request $request)
	{
		$title = $request->get('title');
		$content = $request->get('contentHtml');
		$topic = $request->get('topic');

  
		$array = array('data'=>'success');
		echo json_encode($array);

	}

}