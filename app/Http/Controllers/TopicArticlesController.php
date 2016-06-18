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

class TopicArticlesController extends Controller{
    public function article(Request $request,$aid)
    {
        $user = $request->user();
        $comments = DB::table('comments')->where('akid', $aid)->where('type', 'topicArticle')->get();

        DB::table('topic_articles')->where('id', $aid)->increment('viewNum');

        $article = DB::table('topic_articles')->where('id',$aid)->first();
//		$currentUser = DB::table('tail_users')->where('uid',$user->id)->first();
        $currentUser = getUserInfo(isset($user) ? $user['id'] : 2);
        $author =getUserInfo($article->uid);

        $params = [
            'user' => $user,
            'currentUserInfo' => $currentUser,
            'article' => $article,
            'author' => $author,
            'comments' => $comments
        ];

        return view('tail.topicArticle')->with('params', $params);
    }

    public function noPicTopicArticle(Request $request,$aid)
    {
        $user = $request->user();

        $comments = DB::table('comments')->where('akid', $aid)->where('type', 'topicArticle')->get();

        DB::table('topic_articles')->where('id', $aid)->increment('viewNum');
        $article = DB::table('topic_articles')->where('id',$aid)->first();
//		$currentUser = DB::table('tail_users')->where('uid',$user->id)->first();
        $currentUser = getUserInfo(isset($user) ? $user['id'] : 2);
        $author =getUserInfo($article->uid);

        $params = [
            'user' => $user,
            'currentUserInfo' => $currentUser,
            'article' => $article,
            'author' => $author,
            'comments' => $comments
        ];

        return view('tail.noPicTopicArticle')->with('params', $params);
    }

    public function comment(Request $request,$id) {

        $user = $request->user();
        $username = isset($user) ?  $user['name'] : "游客";
        $uid      = isset($user) ?  $user['id'] : '0';
        $content = $request->get('content');
//
        DB::table('comments')->insertGetId(
            array('akid'=> $id, 'type'=>'topicArticle', 'uid'=> $uid, 'username' => $username, 'content'=>$content)
        );
        DB::table('topic_articles')->where('id', $id)->increment('commentNum');

        $array = array('data'=>'success');
        echo json_encode($array);	}
}