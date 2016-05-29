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

    public function newArticle(Request $request)
    {
        $user = $request->user();
        $data = new data();

        return view('tail.new_article')->with('data', $data);
    }
}

class data {
    public $type = array('选择分类', '手机', '摄影', '电脑', '平板', '资讯', '视频', '影音', '数码', '周边', '生活', '文具', '游戏', '其它');
    public $choiceNum = 3;
}