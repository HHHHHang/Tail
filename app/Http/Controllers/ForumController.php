<?php
/**
 * Created by PhpStorm.
 * User: tina
 * Date: 16/5/23
 * Time: 下午3:11
 */
namespace App\Http\Controllers;

use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\AdapterInterface;

class ForumController extends Controller{

    public function index(Request $request)
    {
        $user = $request->user();
        $data = array(
            array('title'=>'深夜俱乐部 | 晒晒你喜欢的那款播放器', 'writer'=>'测试用户', 'publishTime'=>'昨天', 'type'=>'影音', 'icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'commentCount'=>1),
            array('title'=>'深夜俱乐部 | 晒晒你喜欢的那款播放器晒晒你喜欢的那款播放器', 'writer'=>'测试用户', 'publishTime'=>'昨天', 'type'=>'影音', 'icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'commentCount'=>2),
            array('title'=>'深夜俱乐部 | 晒晒你喜欢的那款播放器', 'writer'=>'测试用户', 'publishTime'=>'昨天', 'type'=>'影音', 'icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'commentCount'=>3),
            array('title'=>'深夜俱乐部 | 晒晒你喜欢的那款播放器', 'writer'=>'测试用户', 'publishTime'=>'昨天', 'type'=>'影音', 'icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'commentCount'=>4),
            array('title'=>'深夜俱乐部 | 晒晒你喜欢的那款播放器晒晒你喜欢的那款播放器晒晒你喜欢的那款播放器', 'writer'=>'测试用户', 'publishTime'=>'昨天', 'type'=>'影音', 'icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'commentCount'=>5),
            array('title'=>'深夜俱乐部 | 晒晒你喜欢的那款播放器', 'writer'=>'测试用户', 'publishTime'=>'昨天', 'type'=>'影音', 'icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'commentCount'=>6)
        );

        $user1 = array('icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'name'=>'用户名', 'level'=>'初级', 'forumCount'=>0, 'commentCount'=>0, 'followCount'=>0);

        if ($user) return view('tail.forum')->with('user', $user)->with('data', $data)->with('user1', $user1);
        else {
            return view('tail.forum')->with('user1', $user1)->with('data', $data);
        }
    }

    public function forum(Request $request) {

        $user = $request->user();
        $comments = DB::select("SELECT * from comments");
        $data = array('title'=>'手机使用什么输入法?', 'type'=>'手机', 'publishTime'=>'2016-4-10 18:13','viewerCount'=>1060, 'zanCount'=>2, 'commentCount'=>20, 'multi'=>false, 'attendCount'=>131, 'options'=>array('搜狗输入法', '百度输入法', 'QQ输入法', '谷歌输入法', '手机自带输入法', '其他'),'introduction'=>'你们都用哪个手机打字输入法呢？');

        $user1 = array('icon'=>'http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png', 'name'=>'用户名', 'level'=>'初级', 'forumCount'=>0, 'commentCount'=>0, 'followCount'=>0);

        if ($user) return view('tail.forumDetail')->with('comments', $comments)->with('user', $user)->with('data', $data)->with('user1', $user1);
        else {
            return view('tail.forumDetail')->with('comments', $comments)->with('user1', $user1)->with('data', $data);
        }
    }

    public function forumN(Request $request) {
        $content = $request->get('content');
        $comments = DB::select("SELECT * from comments");
        $user = $request->user();
        $username = isset($user) ?  $user['name'] : "游客";
        $num = count($comments);
        $time = time();
        Db::insert('INSERT INTO comments (id, username, content, createtime)  VALUE (?, ?, ?, ?)', [$num+1, $username, $content, $time]);
        $comments = DB::select("SELECT * from comments");
        if ($user) return view('tail.article')->with('comments', $comments)->with('user', $user);
        return view('tail.article')->with('comments', $comments);
    }
}