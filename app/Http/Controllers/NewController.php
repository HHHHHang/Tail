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
			'data' =>  $data
		];

        return view('tail.newForum')->with('params', $params);
    }

    public function postForum(Request $request)
    {
        $title = $request->get('title');
        $content = $request->get('contentHtml');
        $keywords = $request->get('keywords');
        $options = $request->get('options');
        $optionMaxNum = $request->get('optionMaxNum');
        $type = $request->get('type');

        $kinkTies = DB::select("SELECT * from kinkTies");
        $user = $request->user();
        $userid = isset($user) ?  $user['id'] : 2;
        $num = count($kinkTies);
        $time = time();
        Db::insert('INSERT INTO kinkTies (kid, title, content, type, createTime, uid, commentNum, upNum, updateTime)  VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [$num+1, $title, $content, $type, $time, $userid, 0, 0, $time]);

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
			echo $file;
			//判断文件上传过程中是否出错
			$destPath = realpath( public_path( 'images' ) );
			$filename = $file->getClientOriginalName();
		}

		$title = $request->get('title');
		$content = $request->get('contentHtml');
		$keywords = $request->get('keywords');
		$type = $request->get('type');

		$imageUrl = asset('images/' . time() . $filename);
		DB::table('articles')->insertGetId(
			['title' => $title, 'content' => $content, 'type' => $type,
			 'image' => $imageUrl, 'uid' => $user['id']]
		);
		if(!$file->move($destPath, $imageUrl)){
//			exit('保存文件失败！');
		}

		return redirect('/forum');

    }
}

class data {
    public $type = array('选择分类', '手机', '电脑', '平板', '资讯', '周边', '其它');
    public $choiceNum = 3;
}