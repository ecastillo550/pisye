<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Model\Role;
use App\Model\Grade;
use DB;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grade = Grade::find();

        return view('grades.index', compact('grade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grade = Grade::find();

        return view('grades.create', compact('grade'));
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
        ]);

        DB::transaction(function() use ($request) {
            $user = new Grade();
            $user->name = $request->name;
            $user->semester_id = $request->semester_id;
            $user->level_id = $request->level_id;
            $user->save();
            $user->attachRole($studentRole);
        });

        return redirect()->route('grades.index');
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
        $student = Grade::find($id);

        return view('grades.edit', compact('student'));
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
        ]);

        DB::transaction(function() use ($request, $id) {
            $user = grade::find($id);
            $user->name = $request->name;
            $user->semester_id = $request->semester_id;
            $user->level_id = $request->level_id;

            $user->save();
        });

        return redirect()->route('grades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = grade::find($id);
        $user->delete();

        return redirect()->route('grades.index');
    }
}
