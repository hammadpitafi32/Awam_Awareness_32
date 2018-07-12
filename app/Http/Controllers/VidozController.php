<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class VidozController extends Controller
{
	public function welcome() {

		$getComments=Comment::with('user','likes','Dislikes','CurrentUserlikes','CurrentUserDislikes')->get();
		// $currentUserLike=Comment::with('user','CurrentUserlikes','CurrentUserDislikes')->get();
		// $array=$getComments->toArray();
		// echo "<pre>";
		// print_r(count($array[0]['current_userlikes']));
		// die();
		return view('welcome',compact('getComments'));
	}
}
