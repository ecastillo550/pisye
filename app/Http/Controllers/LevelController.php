<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Model\AClass;
use App\Model\Semester;
use App\Http\Controllers\Controller;

class LevelController extends Controller {
	function index(Request $request) {
		$levels = DB::table('levels')->get();
		return view('levels.index', ['levels' => $levels]);
	}

	function add(Request $request) {
		$input = $request->input();
		if (!empty($input)) {
			$id = DB::table('levels')->insertGetId(
				['name' => $input['name']]
			);

			if (!empty($id)) {
				return redirect()->route('levels.index');
			}
		}
		return view('levels.add');
	}
}
