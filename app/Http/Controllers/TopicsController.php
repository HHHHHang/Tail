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

		$topics = DB::table('topics')->where('isPublished', 1)->get();

		$params = [
			'user' => $user,
			'topics' => $topics
		];

		return view('tail.topics')->with('params', $params);
	}

	public function detail(Request $request,$id)
	{
		$user = $request->user();

		$topic = DB::table('topics')->where('id', $id)->first();

		$params = [
			'user' => $user,
			'topic' => $topic
		];

		return view('tail.topicDetail')->with('params', $params); 
	}

	public function newTopic(Request $request)
	{
		$user = $request->user();


		$params = [
			'user' => $user,
		];

		return view('tail.newTopic')->with('params', $params);
	}

	public function newArticle(Request $request,$id)
	{
		$user = $request->user();
		$topic = DB::table('topics')->where('id', $id)->first();

		$params = [
			'user' => $user,
			'topic' => $topic
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