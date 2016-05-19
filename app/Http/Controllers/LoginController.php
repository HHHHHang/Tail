<?php
/**
 * Created by PhpStorm.
 * User: lyn
 * Date: 16/5/3
 * Time: 下午11:44
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class LoginController extends Controller{

	public function index()
	{
//		return "helloworld";
		return view('tail.login');
	}
} 