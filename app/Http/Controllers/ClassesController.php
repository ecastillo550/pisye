<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Model\AClass;
use App\Model\Semester;
use App\Model\Student;
use App\Model\Level;
use App\Http\Controllers\Controller;

class ClassesController extends Controller {
	//Vistas
	function index(Request $request) {
		$classes = AClass::all();
		return view('classes.index', ['classes' => $classes]);
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
			DB::transaction(function () use ($input) {
				$class = new AClass();
				$class->subject_id = $input['subjectId'];
				$class->semester_id = $input['semesterId'];
				$class->level_id = $input['levelId'];
				$class->save();

				DB::table('user_class')->insert([
					'user_id' => $input['userId'],
					'class_id' => $class->id
				]);
			});

			return redirect()->route('classes.index');
		}
		$subjects = DB::table('subjects')->get();
		$users = DB::table('users')->get();
		$semesters = Semester::all();
		$levels = Level::all();

		return view('classes.add', [
			'subjects' => $subjects,
			'users' => $users,
			'semesters' => $semesters,
			'levels' => $levels
		]);
	}
}
