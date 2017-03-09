<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Model\AClass;
use App\Model\Semester;
use App\Http\Controllers\Controller;

class SubjectController extends Controller {
	function index(Request $request) {
		$subjects = DB::table('subjects')->get();
		return view('subjects.index', ['subjects' => $subjects]);
	}

	function add(Request $request) {
		$input = $request->input();
		if (!empty($input)) {
			$id = DB::table('subjects')->insertGetId(
				['name' => $input['name']]
			);

			if (!empty($id)) {
				return redirect()->route('subjects.index');
			}
		}
		return view('subjects.add');
	}
}
