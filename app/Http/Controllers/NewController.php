<?php
/**
 * Created by PhpStorm.
 * User: tina
 * Date: 16/5/27
 * Time: 上午10:41
 */

namespace App\Http\Controllers;

use DB;

use Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Request as Req;
use App\Http\Controllers\Controller;
use League\Flysystem\AdapterInterface;

class NewController extends Controller
{

    public function newForum(Request $request)
    {
        $user = $request->user();
        $data = new data();
		$params = [
			'user' =>  $user,
			'data' =>  $data,
            'isKinkTie' => false
		];

        return view('tail.newForum')->with('params', $params);
    }

    // 发布普通帖子
    public function postForum(Request $request)
    {
        $title = $request->get('title');
        $content = $request->get('contentHtml');
        $type = $request->get('type');

        $kinkTies = DB::select("SELECT * from kinkTies");
        $user = $request->user();
        $userid = isset($user) ?  $user['id'] : 2;
        $num = DB::table('kinkTies')->max('kid') + 1;
        $time = time();
        
        Db::insert('INSERT INTO kinkTies (kid, title, content, type, createTime, uid, commentNum, upNum, updateTime)  VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [$num, $title, $content, $type, $time, $userid, 0, 0, $time]);

        $array = array('data'=>'success');
        echo json_encode($array);

    }

    public function newKinkTie(Request $request)
    {
        $user = $request->user();
        $data = new data();
        $params = [
            'user' =>  $user,
            'data' =>  $data,
            'isKinkTie' => true
        ];

        return view('tail.newForum')->with('params', $params);
    }

    // 发布纠结帖子
    public function postKinkTie(Request $request)
    {
        $title = $request->get('title');
        $content = $request->get('contentHtml');
        $options = $request->get('options');
        $optionMaxNum = $request->get('optionMaxNum');
        if($optionMaxNum == 1)
        {
            $multi = 0;
        }else
        {
            $multi = 1;
        }
        $type = $request->get('type');

        $kinkTies = DB::select("SELECT * from kinkTies");
        $user = $request->user();
        $userid = isset($user) ?  $user['id'] : 2;
        $num = DB::table('kinkTies')->max('kid') + 1;
        $time = time();
        $vidNum = DB::table('voteOptions')->max('vid') + 1;
        Db::insert('INSERT INTO kinkTies (kid, title, content, type, createTime, uid, commentNum, upNum, updateTime)  VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [$num, $title, $content, $type, $time, $userid, 0, 0, $time]);
        foreach ($options as $option) {
            DB::table('voteOptions')->insert(
                ['vid' => $vidNum,'kid' => $num, 'content' => $option, 'voteCount' => 0, 'multi' => $multi, 'maxChoiceNum' => $optionMaxNum, 'introduction' => $content]
            );
            $vidNum++;
        }

        $array = array('data'=>'success');
        echo json_encode($array);

    }

    public function newArticle(Request $request)
    {
        $user = $request->user();
        $data = new data();
        $params = [
            'user' =>  $user,
            'data' =>  $data
        ];

        return view('tail.newArticle')->with('params', $params);
    }

    public function postArticle(Request $request)
    {

		$user = $request->user();

		if(!$request->hasFile('file')){
			$filename = 'http://115.28.180.158/topics/images/thumbs/1.jpg';
			echo "No!";
		} else {
			$file = $request->file('file');
			//判断文件上传过程中是否出错
			$destPath = realpath( public_path( 'images' ) );
			$filename = $file->getClientOriginalName();
		}

		$title = $request->get('title');
		$content = $request->get('contentHtml');
		$keywords = $request->get('keywords');
		$type = $request->get('type');

		$imageUrl = asset('images/' . time() . $filename);
		$aid = DB::table('articles')->insertGetId(
			['title' => $title, 'content' => $content, 'type' => $type,
			 'image' => $imageUrl, 'uid' => $user['id'], 'all_content' => $content]
		);
        $keywords = json_decode($keywords);

         var_dump($keywords);
        foreach($keywords as $keyword){
            $tag = DB::table('tag')->where('name',$keyword) -> first();
            if($tag){
                DB::table('tag')->where('name',$keyword) ->increment('num');
                DB::table('article_tag')->insert(
                    ['aid'=>$aid, 'tagId'=>$tag->tagId]

                );
            }else{
                $tagId = DB::table('tag')->insertGetId(
                    ['name'=>$keyword,'num'=>1]
                );
                DB::table('article_tag')->insert(
                    ['aid'=>$aid,'tagId'=>$tagId]
                );
            }
        }
		if(!$file->move($destPath, $imageUrl)){
//			exit('保存文件失败！');
		}

		return redirect('/forum/all');

    }
}

class data {
    public $type = array('全部', '手机', '电脑', '平板', '资讯', '摄影', '其它');
    public $choiceNum = 3;
}