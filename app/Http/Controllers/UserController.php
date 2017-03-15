<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Model\User;
use App\Model\Role;

class UserController extends Controller {
	function index(Request $request) {
		$user  = Auth::user();
		if (!empty($user)) {
			if ($user->hasRole('administrator')) {
				return redirect()->route('administrator.index');
			} else if($user->hasRole('teacher')){
				return redirect()->route('teacher.index');
			}
		}
		return redirect()->route('auth.login');
	}

	function listUsers(Request $request) {
		$users = User::all();
		return view('users.index', ['users' => $users]);
	}

	function add(Request $request) {
		$input = $request->input();
		if (!empty($input)) {
			DB::transaction(function () use ($input) {
				$role = Role::find($input['roleId']);

				$user = new User();
				$user->name = $input['name'];
				$user->username = $input['username'];
				$user->password = bcrypt($input['password']);
				$user->save();

				$user->roles()->attach($role);
			});

			return redirect()->route('users.index');
		}
		$roles = Role::all();

		return view('users.add', [
			'roles' => $roles
		]);
	}
}
