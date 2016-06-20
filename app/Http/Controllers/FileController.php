<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use League\Flysystem\AdapterInterface;

class FileController extends Controller{

	public function index(Request $request) {

		$file = $request->file('upload_file');

		$filename = $file->getClientOriginalName();

		$destPath = realpath(public_path( 'images/upload/' ));

		$imageUrl = asset('images/upload/' . time() . $filename);

		$file->move($destPath, $imageUrl);

		if (!isset($file)) return false;

		return json_encode([
			"success"    => true,
 			 "msg"       =>  "error message", # optional
		     "file_path" =>  $imageUrl
		]);
	}

}