<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Model\User;
use App\Model\Level;
use App\Model\Role;
use DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::withRole('student')->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();

        return view('students.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        DB::transaction(function() use ($request) {
            $studentRole = Role::where('name', 'like', 'student')->first();
            $level = Level::find($request->level_id);

            $user = new User();
            $user->enrollment = $request->enrollment;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->semester = $request->semester;
            $user->password = bcrypt($request->password);
            $user->level()->associate($level);
            $user->save();
            $user->attachRole($studentRole);
        });

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::find($id);
        $levels = Level::all();

        return view('students.edit', compact('student', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => ['required', Rule::unique('users')->ignore($id)],
            'password' => 'confirmed'
        ]);

        DB::transaction(function() use ($request, $id) {
            $level = Level::find($request->level_id);

            $user = User::find($id);
            $user->enrollment = $request->enrollment;
            $user->name = $request->name;
            $user->semester = $request->semester;
            $user->username = $request->username;
            $user->level()->associate($level);

            if(!empty($request->password)) {
                $user->password = bcrypt($request->password);
            }

            $user->save();
        });

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('students.index');
    }
}
