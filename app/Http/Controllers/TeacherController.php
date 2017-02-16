<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Controllers\Controller;

class TeacherController extends Controller {
	function index(Request $request) {
		$user = Auth::user();
		$classes = $user->myClasses()->get();
		return view('teacher.index', ['classes' => $classes]);
	}
}
