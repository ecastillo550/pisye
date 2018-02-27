<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Model\User;
use App\Model\Role;
use App\Model\CualitativeGrade;
use DB;

class CualitativeGradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cualitativeGrades = CualitativeGrade::all();

        return view('cualitative_grades.index', compact('cualitativeGrades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('cualitative_grades.create');
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
            'order' => 'required',
            'type' => 'required',
        ]);

        DB::transaction(function() use ($request) {
            $subject = new CualitativeGrade();
            $subject->name = $request->name;
            $subject->order = $request->order;
            $subject->type = $request->type;
            $subject->save();
        });

        return redirect()->route('cualitative_grades.index');
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
        $subject = CualitativeGrade::find($id);

        return view('cualitative_grades.edit', compact('subject'));
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
            'order' => 'required',
            'type' => 'required',
        ]);

        DB::transaction(function() use ($request, $id) {
            $subject = CualitativeGrade::find($id);
            $subject->name = $request->name;
            $subject->order = $request->order;
            $subject->type = $request->type;

            $subject->save();
        });

        return redirect()->route('cualitative_grades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = CualitativeGrade::find($id);
        $subject->delete();

        return redirect()->route('cualitative_grades.index');
    }
}
