<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Model\AClass;
use App\Model\Semester;
use App\Http\Controllers\Controller;

class ClassesController extends Controller {
	//Vistas
	function index(Request $request) {
		$classes = AClass::all();
		return view('administrator.classes.index', ['classes' => $classes]);
	}

	function byTeacher($id, Request $request) {
		$class = AClass::find($id);
		$students = $class->students;
		return view('teacher.class', ['class' => $class]);
	}

	function byStudent($id, Request $request) {
		$student = Student::find($id);
		return view('students.classes', ['student' => $student]);
	}

	//Operaciones
	function addClass(Request $request) {
		$input = $request->input();
		if (!empty($input)) {
			$id = DB::table('classes')->insertGetId([
				'subject_id' => $input['subjectId'],
				'user_id' => $input['userId'],
				'semester_id' => $input['semesterId'],
				'level_id' => $input['levelId'],
				'name' => $input['name']
			]);

			if (!empty($id)) {
				return redirect()->route('administrator.classes');
			}
		}
		$subjects = DB::table('subjects')->get();
		$users = DB::table('users')->get();
		$semesters = Semester::all();

		return view('administrator.classes.add', ['subjects' => $subjects, 'users' => $users, 'semesters' => $semesters]);
	}
}
