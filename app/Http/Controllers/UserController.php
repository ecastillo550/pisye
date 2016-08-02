<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Model\User;

class UserController extends Controller {
	function index(Request $request) {
		$user  = Auth::user();
		if (!empty($user)) {
			if ($user->hasRole('administrator')) {
				return redirect()->route('administrator::index');
			} else if($user->hasRole('teacher')){
				return redirect()->route('teacher::index');
			}
		}
		return redirect()->route('auth::login');
	}
}
