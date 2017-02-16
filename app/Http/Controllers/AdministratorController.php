<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Model\AClass;
use App\Model\Semester;
use App\Http\Controllers\Controller;

class AdministratorController extends Controller {
	function index(Request $request) {
		return view('administrator.index');
	}

	function students(Request $request) {
		$students = DB::table('students')->get();
		return view('administrator.students.index', ['students' => $students]);
	}

	function addStudent(Request $request) {
		$input = $request->input();
		if (!empty($input)) {
			$id = DB::table('students')->insertGetId(
				['name' => $input['name']]
			);

			if (!empty($id)) {
				return redirect()->route('administrator.students');
			}
		}
		return view('administrator.students.add');
	}

	function subjects(Request $request) {
		$subjects = DB::table('subjects')->get();
		return view('administrator.subjects.index', ['subjects' => $subjects]);
	}

	function addSubject(Request $request) {
		$input = $request->input();
		if (!empty($input)) {
			$id = DB::table('subjects')->insertGetId(
				['name' => $input['name']]
			);

			if (!empty($id)) {
				return redirect()->route('administrator.subjects');
			}
		}
		return view('administrator.subjects.add');
	}
}
