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

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\AdapterInterface;

class IndexController extends Controller{

	public function profile(Request $request)
	{
		$user = $request->user();
		echo $user['email'].'登录成功！';
	}

	public function index(Request $request)
	{
//		return "helloworld";
//		Auth::logout();
		$banner_imgs = Banner_img::orderBy('seqNum', 'asc')->get();
		foreach ($banner_imgs as $banner_img) {
			$pics[] = $banner_img->file;
		}
		$user = $request->user();


//		$pics = array("http://s.dgtle.com/portal/201605/26/161829ngr9c6qoodrrgfr7.png?szhdl=imageview/2/w/1200",
//			"http://s.dgtle.com/portal/201605/20/210446ovppnnvbljyb0x22.jpg?szhdl=imageview/2/w/1200 " ,
//			"http://s.dgtle.com/portal/201605/20/175632kexko4k8yj6o9xik.jpg?szhdl=imageview/2/w/1200",
//			"http://s.dgtle.com/portal/201605/17/140154xv4ztjv67y72vbqb.jpg?szhdl=imageview/2/w/1200",
//			"http://s.dgtle.com/portal/201605/19/104358kimi38ti5z9m7s89.jpg?szhdl=imageview/2/w/1200",
//			"http://s.dgtle.com/portal/201605/19/113602kwwyh0m8x9o7z0os.png?szhdl=imageview/2/w/1200" ,
//			"http://s.dgtle.com/portal/201605/17/173346wssczbbeqycccehs.jpg?szhdl=imageview/2/w/1200",
//			"http://s.dgtle.com/portal/201605/13/111824g8r1td8vgttrr1cq.jpg?szhdl=imageview/2/w/1200s",
//			"http://s.dgtle.com/portal/201605/12/144107nowz1u1uu318lldo.jpg?szhdl=imageview/2/w/1200");
		$picsArr = json_encode($pics);
		
		if ($user) return view('tail.welcome')->with('user', $user)->with('picsArr',$picsArr)->with('pics',$pics);
		return view('tail.welcome')->with('picsArr',$picsArr)->with('pics',$pics);
	}

	public function logout() {
		Auth::logout();
		return view('tail.welcome');
	}

	public function article(Request $request) {

		$user = $request->user();
		$comments = DB::select("SELECT * from comments");
		if ($user) return view('tail.article')->with('comments', $comments)->with('user', $user);
		return view('tail.article')->with('comments', $comments);
	}

	public function articlePost(Request $request) {
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