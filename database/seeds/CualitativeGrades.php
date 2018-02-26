<?php

use Illuminate\Database\Seeder;
use App\Model\Semester;
use App\Model\Level;
use App\Model\Partial;
use App\Model\Subject;
use App\Model\Group;

class CualitativeGrades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('cualitative_grades')->insert([
		    ['name' => 'No logrado', 'order' => 1],
		    ['name' => 'En proceso', 'order' => 2],
		    ['name' => 'Regular', 'order' => 3],
		    ['name' => 'Bien', 'order' => 4],
		    ['name' => 'Muy bien', 'order' => 5],
		    ['name' => 'Excelente', 'order' => 6]
		]);

		$semester = new Semester();
        $semester->name = 'PR 18';
        $semester->save();

        $partial = new Partial();
        $partial->name = '1 Parcial';
        $partial->order = 1;
        $partial->semester_id = $semester->id;
        $partial->save();

        $partial = new Partial();
        $partial->name = '2 Parcial';
        $partial->order = 2;
        $partial->semester_id = $semester->id;
        $partial->save();

        $partial = new Partial();
        $partial->name = '3 Parcial';
        $partial->order = 3;
        $partial->semester_id = $semester->id;
        $partial->save();

        $partial = new Partial();
        $partial->name = 'Final';
        $partial->order = 34;
        $partial->is_final = true;
        $partial->semester_id = $semester->id;
        $partial->save();

        $subject = new Subject();
        $subject->name = 'Computacion';
        $subject->save();

        $level = new Level();
        $level->name = 'A';
        $level->save();

        $group = new Group();
        $group->subject_id = $subject->id;
        $group->semester_id = $semester->id;
        $group->level_id = $level->id;
        $group->save();
    }
}
