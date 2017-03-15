<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Model\AClass;
use App\Model\Semester;
use App\Http\Controllers\Controller;

class SemesterController extends Controller {
	function index(Request $request) {
		$semesters = DB::table('semesters')->get();
		return view('semesters.index', ['semesters' => $semesters]);
	}

	function add(Request $request) {
		$input = $request->input();
		if (!empty($input)) {
			$id = DB::table('semesters')->insertGetId(
				['name' => $input['name']]
			);

			if (!empty($id)) {
				return redirect()->route('semesters.index');
			}
		}
		return view('semesters.add');
	}
}
