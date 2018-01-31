<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->orderBy('id', 'DESC')->paginate(20);
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        $user = new user();

        $roles = Role::all();

        return view('users.create', ['roles' => $roles, 'user' => $user]);
    }

    public function store(Request $request)
    {
        DB::transaction(function () use (&$request) {
            $userRole = Role::where('id', $request->role_id)->first();

            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);

            $user->save();
            $user->roles()->attach($userRole);

        });

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
         DB::transaction(function () use (&$request, &$user) {
            $userRole = Role::where('id', $request->role_id)->first();

            $user->name = $request->name;
            $user->username = $request->username;
            if($request->password) {
                $user->password = bcrypt($request->password);
            }

            $user->save();
            $user->roles()->detach($user->roles()->first());
            $user->roles()->attach($userRole);
        });

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        if ($user->deleted_at == null) {
            $user->delete();
        } else {
            $user->forceDelete();
        }

        return redirect()->route('users.index');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->restore();

        $role = Role::where('name', 'like', 'medic')->first();
        $user->roles()->attach($role);

        return redirect()->route('users.index');
    }
}
