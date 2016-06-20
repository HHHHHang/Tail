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

use Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Request as Req;
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
		$articles = DB::table('topic_articles')->where('tid',$id)->get();
		$articleInfo = [];
		foreach ($articles as $article) {
			$author = DB::table('tail_users')->where('uid', $article->uid)->first();
			$articleInfo[]=[
				'author' => $author,
				'article' => $article
			];
		}
		$params = [
			'user' => $user,
			'topic' => $topic,
			'articlesInfo' => $articleInfo
		];

		return view('tail.topicDetail')->with('params', $params); 
	}

	

	public function postTopic(Request $request)
	{
		$user = $request->user();
		$topicName = $request->get('topicName');
		$topicIntro = $request->get('topicIntro');
		$topicDes = $request->get('topicDes');
		$file = $request->get('file');
		if(!$request->hasFile('file')){
			$filename = 'http://115.28.180.158/topics/images/thumbs/1.jpg';
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
		DB::table('topics')->insertGetId(
			['name' => $topicName, 'description' => $topicIntro, 'content' => $topicDes,
			 'image' => $imageUrl, 'uid' => $user['id'], 'isPublished' => 0]
		);
		if(!$file->move($destPath, $imageUrl)){
//			exit('保存文件失败！');
		}
//		exit('文件上传成功！');
		return redirect('/topic');
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

	public function postArticle(Request $request, $id)
	{
		$user = $request->user();

		if(!$request->hasFile('file')){
			$filename = '/thumbs/1.jpg';
		} else {
			$file = $request->file('file');
			//判断文件上传过程中是否出错
			$destPath = realpath( public_path( 'images' ) );
			$filename = $file->getClientOriginalName();
		}

		$title = $request->get('title');
		$content = $request->get('contentHtml');
		$imageUrl = asset('images/' . time() . $filename);

		if(!$file->move($destPath, $imageUrl)){
//			exit('保存文件失败！');
		}

		DB::table('topic_articles')->insertGetId(
			[
				'title' => $title,
				'content' => $content,
				'image' => $imageUrl,
				'uid' => $user['id'],
				'tid' => $id,
				'viewNum' => 0,
				'commentNum' => 0,
				'upNum' => 0

			]
		);

		return redirect('/topic/detail/' . $id);
	}

	public function avatarUpload(Request $request) {

	}



}