<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Model\User;
use App\Model\Role;
use App\Model\Group;
use App\Model\Subject;
use App\Model\Level;
use App\Model\Semester;
use DB;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();

        return view('groups.index', compact('groups'));
    }

    public function myGroups()
    {
        $user = \Auth::user();
        $groups = $user->groups;

        if ($user->hasRole('admin')) {
            $groups = Group::all();
        }

        return view('groups.my_groups', compact('groups'));
    }

    public function listGroups(Request $request, $id)
    {
        $group = Group::find($id);
        $students = $group->students;

        return view('groups.student_list', compact('group', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $levels = Level::all();
        $semesters = Semester::all();
        $teachers = User::withRole('teacher')->get();
        $group = new Group();

        return view('groups.create', compact('group', 'subjects', 'levels', 'semesters', 'teachers'));
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
            'subject_id' => 'required',
            'semester_id' => 'required',
            'level_id' => 'required',
            'teacher_id' => 'required',
        ]);

        DB::transaction(function() use ($request) {
            $group = new Group();
            $group->subject_id = $request->subject_id;
            $group->semester_id = $request->semester_id;
            $group->level_id = $request->level_id;
            $group->save();

            $group->teachers()->attach($request->teacher_id);
        });

        return redirect()->route('groups.index');
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
        $group = Group::find($id);
        $subjects = Subject::all();
        $levels = Level::all();
        $semesters = Semester::all();
        $teachers = User::withRole('teacher')->get();

        return view('groups.edit', compact('group', 'subjects', 'levels', 'semesters', 'teachers'));
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
            'subject_id' => 'required',
            'semester_id' => 'required',
            'level_id' => 'required',
            'teacher_id' => 'required',
        ]);

        DB::transaction(function() use ($id, $request) {
            $group = Group::find($id);
            $group->subject_id = $request->subject_id;
            $group->semester_id = $request->semester_id;
            $group->level_id = $request->level_id;
            $group->save();

            $group->teachers()->detach($group->teachers->first()->id);
            $group->teachers()->attach($request->teacher_id);
        });


        return redirect()->route('groups.index');
    }

    /**
     * Get the groups of a student
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function enrolled($id)
    {
        $student = User::find($id);
        $groups = $student->enrolled;
        $semesters = Semester::all();

        return view('groups.enrolled', compact('student', 'groups', 'semesters'));
    }

    /**
     * Enroll a student into a level's set of groups in a semester
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function enrollLevel(Request $request, $id)
    {
        DB::transaction(function() use ($request, $id) {
            $student = User::find($id);
            $groups = $student->level->groups()->where('semester_id', $request->semester_id)->get();

            $student->enrolled()->syncWithoutDetaching($groups);
        });

        return redirect()->route('groups.enrolled', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();

        return redirect()->route('groups.index');
    }
}
