<?php

namespace App\Http\Controllers\Student;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class MainController extends Controller {
	function index(Request $request) {
		$students = DB::table('student')->get();
		return view('students.index', ['students' => $students]);
	}

	function addStudent(Request $request) {
		$input = $request->input();
		if (!empty($input)) {
			$id = DB::table('student')->insertGetId(
				['name' => $input['name']]
			);

			if (!empty($id)) {
				return redirect()->route('students');
			}
		}
		return view('students.add');
	}

	function classes(Request $request) {
		$students = DB::table('student')->get();
		//return view('students.index', ['students' => $students]);
	}
}
