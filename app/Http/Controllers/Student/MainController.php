<?php

namespace App\Http\Controllers\Student;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Model\Student;
use App\Model\AClass;
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
				return redirect()->route('students.index');
			}
		}
		return view('students.add');
	}

	function classes($id, Request $request) {
		$student = Student::find($id);
		return view('students.classes', ['student' => $student]);
	}

	function enroll($id, Request $request) {
		$student = Student::find($id);
		$classes = AClass::all();

		//si es post, debe venir el id de clase a inscribir
		if ($request->isMethod('post')) {
			$classId = !empty($request->input('classId')) ? $request->input('classId') : null;

			if (!empty($classId)) {
				$class = AClass::find($classId);

				//ver si no estaba soft deleted
				if ($student->grades()->onlyTrashed()->where('class_id', $classId)->get()->isEmpty()) {
					$student->classes()->save($class);
				} else {
					$student->grades()->onlyTrashed()->where('class_id', $classId)->restore();
				}
			} 
		}
		return view('students.enroll', ['student' => $student, 'classes' => $classes]);
	}

	function disenroll($id, Request $request) {
		if ($request->isMethod('post')) {
			$student = Student::find($id);
			$classId = !empty($request->input('classId')) ? $request->input('classId') : null;

			if (!empty($classId)) {
				$class = AClass::find($classId);
				$student->grades()->delete($class);
			} 
		}
		return redirect()->back();
	}
}
