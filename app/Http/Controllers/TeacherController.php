<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class TeacherController extends Controller {
	function classIndex(Request $request) {
		$students = DB::table('student')->get();
		return view('teacher.class', ['students' => $students]);
	}
}
