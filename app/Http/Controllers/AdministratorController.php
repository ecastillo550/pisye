<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class AdministratorController extends Controller {
    function students(Request $request) {
        $students = DB::table('student')->get();
        return view('administrator.students.index', ['students' => $students]);
    }

    function addStudent(Request $request) {
    	$input = $request->input();
    	if (!empty($input)) {
	    	$id = DB::table('student')->insertGetId(
				['name' => $input['name']]
			);

			if (!empty($id)) {
				return redirect()->route('administrator.students');
			}
		}
        return view('administrator.students.add');
    }

    function subjects(Request $request) {
        $subjects = DB::table('subject')->get();
        return view('administrator.subjects.index', ['subjects' => $subjects]);
    }

    function addSubject(Request $request) {
    	$input = $request->input();
    	if (!empty($input)) {
	    	$id = DB::table('subject')->insertGetId(
				['name' => $input['name']]
			);

			if (!empty($id)) {
				return redirect()->route('administrator.subjects');
			}
		}
        return view('administrator.subjects.add');
    }

    function classes(Request $request) {
        $classes = DB::table('class')->get();
        return view('administrator.classes.index', ['classes' => $classes]);
    }

    function addClass(Request $request) {
    	$input = $request->input();
    	if (!empty($input)) {
	    	$id = DB::table('class')->insertGetId([
                'subject_id' => $input['subjectId'],
                'user_id' => $input['userId'],
                'name' => $input['name']
            ]);

			if (!empty($id)) {
				return redirect()->route('administrator.classes');
			}
		}
        $subjects = DB::table('subject')->get();
        $users = DB::table('users')->get();

        return view('administrator.classes.add', ['subjects' => $subjects, 'users' => $users]);
    }
}
