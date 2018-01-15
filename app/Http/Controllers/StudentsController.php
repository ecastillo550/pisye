<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Model\User;
use App\Model\Role;
use App\Model\Student;
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
        $hotel = Student::find();

        return view('students.index', compact('hotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel = Student::find();

        return view('students.create', compact('hotel'));
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
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);

        DB::transaction(function() use ($request) {
            $studentRole = Role::where('name', 'like', 'student')->first();

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
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
        $student = Student::find($id);

        return view('students.edit', compact('student'));
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
            'email' => ['required', Rule::unique('users')->ignore($id), 'email'],
            'password' => 'confirmed'
        ]);

        DB::transaction(function() use ($request, $id) {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;

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
