<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Model\AClass;
use App\Http\Controllers\Controller;

class ClassController extends Controller {
	function index($id, Request $request) {
		//$user = Auth::user();
		$class = AClass::find($id);
		$students = $class->students;
		return view('teacher.class', ['class' => $class]);
	}
}
