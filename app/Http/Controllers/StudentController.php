<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Model\Student;
use App\Model\AClass;
use App\Model\Grade;
use App\Model\Partial;
use App\Http\Controllers\Controller;
use Auth;

class StudentController extends Controller {
	function index(Request $request) {
		$students = DB::table('students')->orderBy('id', 'asc')->get();
		return view('students.index', ['students' => $students]);
	}

	function add(Request $request) {
		$input = $request->input();
		if (!empty($input)) {
			$id = DB::table('students')->insertGetId(
				['name' => $input['name']]
			);

			if (!empty($id)) {
				return redirect()->route('students.index');
			}
		}
		return view('students.add');
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
				$student->classes()->detach($class);
			}
		}
		return redirect()->back();
	}

	function grade($id, $class, Request $request) {
		$student = Student::find($id);
		$class = AClass::find($class);

		//si es post, debe venir el id de clase a inscribir
		if ($request->isMethod('post')) {
			$data = array();

			if (!empty($request->input('grade1'))) {
				$data['grade1'] = $request->input('grade1');
			}

			if (!empty($request->input('grade2'))) {
				$data['grade2'] = $request->input('grade2');
			}

			if (!empty($request->input('comments'))) {
				$data['comments'] = $request->input('comments');
			}

			try {
				$student->classes()->updateExistingPivot($class->id, $data);
			} catch (\Exception $error) {
				return redirect()->back()->withInput();
			}
			return redirect()->route('teacher.class', $class->id);
		}
		return view('students.grade', ['student' => $student, 'class' => $class]);
	}

	function gradePartial($id, $class, $partial, Request $request) {
		$student = Student::find($id);
		$class = AClass::find($class);
		$partial = Partial::find($partial);
		$grade = Grade::where('class_id', $class->id)->where('student_id', $student->id)->where('partial_id', $partial->id)->first();

		//si es post, debe venir el id de clase a inscribir
		if ($request->isMethod('post')) {
			var_dump($request->input());
			if (empty($grade)) {
				$grade = new Grade();
				$grade->class_id = $class->id;
				$grade->student_id = $student->id;
				$grade->partial_id = $partial->id;
				$grade->user_id = Auth::user()->id;
			}

			if (!empty($request->input('cuantitative'))) {
				$grade->cuantitative = $request->input('cuantitative');
			}

			if (!empty($request->input('participation'))) {
				$grade->participation = $request->input('participation');
			}

			if (!empty($request->input('punctuality'))) {
				$grade->punctuality = $request->input('punctuality');
			}

			if (!empty($request->input('working_disposition'))) {
				$grade->working_disposition = $request->input('working_disposition');
			}

			if (!empty($request->input('homework'))) {
				$grade->homework = $request->input('homework');
			}

			if (!empty($request->input('comments'))) {
				$grade->comments = $request->input('comments');
			}

			$grade->save();

			// try {

			// } catch (\Exception $error) {
			// 	return redirect()->back()->withInput();
			// }
			return redirect()->route('teacher.class', $class->id);
		}
		return view('students.grade', ['student' => $student, 'class' => $class, 'partial' => $partial, 'grade' => $grade]);
	}
}
