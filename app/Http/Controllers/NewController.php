<?php
/**
 * Created by PhpStorm.
 * User: tina
 * Date: 16/5/27
 * Time: 上午10:41
 */

namespace App\Http\Controllers;

use App\modal\PhoneInfo;
use DB;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests;
use Illuminate\Http\Request;

class NewController extends Controller
{

    public function newForum(Request $request)
    {
        $user = $request->user();
        $data = new data();

        return view('tail.newForum')->with('data', $data);
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
        $userid = isset($user) ?  $user['id'] : null;
        $num = count($kinkTies);
        $time = time();
        Db::insert('INSERT INTO kinkTies (kid, title, content, type, createTime, uid, commentNum, upNum, updateTime)  VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [$num+1, $title, $content, $type, $time, $userid, 0, 0, $time]);

        $array = array('data'=>'success');
        echo json_encode($array);

    }
}

class data {
    public $type = array('选择分类', '手机', '摄影', '电脑', '平板', '资讯', '视频', '影音', '数码', '周边', '生活', '文具', '游戏', '其它');
    public $choiceNum = 3;
}