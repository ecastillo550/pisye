<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Model\Role;
use App\Model\Grade;
use App\Model\Group;
use App\Model\User;
use App\Model\Partial;
use App\Model\CualitativeGrade;
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
    public function create(Request $request)
    {
        $group = Group::find($request->group);
        $student = User::find($request->student);
        $partial = Partial::find($request->partial);
        if ($group->subject->type == 1 || $group->subject->type == 5) {
            $cualitativeGrades = CualitativeGrade::where('type', 1)->orderBy('order', 'asc')->get();
        } else {
            $cualitativeGrades = CualitativeGrade::where('type', 2)->orderBy('order', 'asc')->get();
        }

        $grade = Grade::where('group_id', $group->id)
                    ->where('partial_id', $partial->id)
                    ->where('student_id', $request->student)
                    ->first();

        return view('grades.create', compact('group', 'student', 'partial', 'cualitativeGrades', 'grade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        // ]);

        DB::beginTransaction();
        try {
            $student = User::find($request->student);
            $group = Group::find($request->group);
            $partial = Partial::find($request->partial);
            $grade = Grade::where('group_id', $group->id)->where('student_id', $student->id)->where('partial_id', $partial->id)->first();

            if (empty($grade)) {
                $grade = new Grade();
                $grade->group_id = $group->id;
                $grade->student_id = $student->id;
                $grade->partial_id = $partial->id;
                // $grade->user_id = \Auth::user()->id;
            }

            if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                if ($group->subject->type == 1 || $group->subject->type == 5) {
                    $overAbsence = CualitativeGrade::where('type', 1)->where('code', 'EF')->first();
                } else {
                    $overAbsence = CualitativeGrade::where('type', 2)->where('code', 'EF')->first();
                }
            }

            if ($group->subject->type == 1) {
                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->cuantitative = -1;
                } else if (!empty($request->input('cuantitative'))) {
                    $grade->cuantitative = $request->input('cuantitative');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->participation = $overAbsence->id;
                } else if (!empty($request->input('participation'))) {
                    $grade->participation = $request->input('participation');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->punctuality = $overAbsence->id;
                } else if (!empty($request->input('punctuality'))) {
                    $grade->punctuality = $request->input('punctuality');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->working_disposition = $overAbsence->id;
                } else if (!empty($request->input('working_disposition'))) {
                    $grade->working_disposition = $request->input('working_disposition');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->homework = $overAbsence->id;
                } else if (!empty($request->input('homework'))) {
                    $grade->homework = $request->input('homework');
                }
            }

            // type 2
            if ($group->subject->type == 2) {
                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->hygiene = $overAbsence->id;
                } else if (!empty($request->input('hygiene'))) {
                    $grade->hygiene = $request->input('hygiene');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->presentation = $overAbsence->id;
                } else if (!empty($request->input('presentation'))) {
                    $grade->presentation = $request->input('presentation');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->cleanliness = $overAbsence->id;
                } else if (!empty($request->input('cleanliness'))) {
                    $grade->cleanliness = $request->input('cleanliness');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->integration = $overAbsence->id;
                } else if (!empty($request->input('integration'))) {
                    $grade->integration = $request->input('integration');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->absence = -1;
                } else if (!empty($request->input('absence'))) {
                    $grade->absence = $request->input('absence');
                }
            }

            // type 3
            if ($group->subject->type == 3) {
                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->manual_dexterity = $overAbsence->id;
                } else if (!empty($request->input('manual_dexterity'))) {
                    $grade->manual_dexterity = $request->input('manual_dexterity');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->material_selection = $overAbsence->id;
                } else if (!empty($request->input('material_selection'))) {
                    $grade->material_selection = $request->input('material_selection');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->instructions = $overAbsence->id;
                } else if (!empty($request->input('instructions'))) {
                    $grade->instructions = $request->input('instructions');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->concentration = $overAbsence->id;
                } else if (!empty($request->input('concentration'))) {
                    $grade->concentration = $request->input('concentration');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->problem_resolution = $overAbsence->id;
                } else if (!empty($request->input('problem_resolution'))) {
                    $grade->problem_resolution = $request->input('problem_resolution');
                }
            }

            // type 4
            if ($group->subject->type == 4) {
                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->working_disposition = $overAbsence->id;
                } else if (!empty($request->input('working_disposition'))) {
                    $grade->working_disposition = $request->input('working_disposition');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->teamwork = $overAbsence->id;
                } else if (!empty($request->input('teamwork'))) {
                    $grade->teamwork = $request->input('teamwork');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->initiative = $overAbsence->id;
                } else if (!empty($request->input('initiative'))) {
                    $grade->initiative = $request->input('initiative');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->decision_making = $overAbsence->id;
                } else if (!empty($request->input('decision_making'))) {
                    $grade->decision_making = $request->input('decision_making');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->punctuality = $overAbsence->id;
                } else if (!empty($request->input('punctuality'))) {
                    $grade->punctuality = $request->input('punctuality');
                }
            }

            // type 5
            if ($group->subject->type == 5) {
                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->absence = -1;
                } else if (!empty($request->input('absence'))) {
                    $grade->absence = $request->input('absence');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->conduct = $overAbsence->id;
                } else if (!empty($request->input('conduct'))) {
                    $grade->conduct = $request->input('conduct');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->hygiene = $overAbsence->id;
                } else if (!empty($request->input('hygiene'))) {
                    $grade->hygiene = $request->input('hygiene');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->presentation = $overAbsence->id;
                } else if (!empty($request->input('presentation'))) {
                    $grade->presentation = $request->input('presentation');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->integration_pisye = $overAbsence->id;
                } else if (!empty($request->input('integration_pisye'))) {
                    $grade->integration_pisye = $request->input('integration_pisye');
                }

                if(!empty($request->input('over_absence')) && $request->input('over_absence') == true) {
                    $grade->integration_college = $overAbsence->id;
                } else if (!empty($request->input('integration_college'))) {
                    $grade->integration_college = $request->input('integration_college');
                }
            }

            if (!empty($request->input('comments'))) {
                $grade->comments = $request->input('comments');
            }


            $grade->save();

            // try {

            // } catch (\Exception $error) {
            //  return redirect()->back()->withInput();
            // }
            DB::commit();
        }
        catch(\Exception $e) {
            DB::rollback();

            return response($e, 500);
        }
        return redirect()->route('groups.student_list', $group->id);
        // return view('students.grade', ['student' => $student, 'group' => $group, 'partial' => $partial, 'grade' => $grade]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = User::find($id);

        // return redirect()->route('grades.index');
        return view('grades.show', compact('student'));
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
        // $user = grade::find($id);
        // $user->delete();

        // return redirect()->route('grades.index');
    }

    /**
     * Print the grades for a user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $student = User::find($id);

        $template = view('grades.partials.print_template', [ 'student' => $student ]);
        $footer = view('grades.partials.print_footer');
        $header = view('grades.partials.print_header');
        $stylesheet = view('grades.partials.print_style', [ 'student' => $student ]);

        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path() . '/fonts',
            ]),
            'fontdata' => $fontData + [
                'neosanspro' => [
                    'R' => '/neosans/NeoSansPro-Regular.ttf',
                    'I' => '/neosans/NeoSansPro-Italic.ttf',
                    'B' => '/neosans/NeoSansPro-Bold.ttf',
                ],
                'newjune' => [
                    'R' => '/newjune/NewJune-Medium.ttf',
                    'B' => '/newjune/NewJune-Bold.ttf',
                ]
            ],
            'default_font' => 'neosanspro'
        ]);
        $mpdf->setBasePath(public_path());
        $mpdf->SetHTMLHeader($header);
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($template, 2);
        $mpdf->SetHTMLFooter($footer);
        $mpdf->Output();
    }
}
