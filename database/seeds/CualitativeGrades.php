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
            ['name' => 'Exceso de faltas', 'order' => 1, 'type' => 1],
            ['name' => 'No Aplica', 'order' => 2, 'type' => 1],
		    ['name' => 'No logrado', 'order' => 3, 'type' => 1],
		    ['name' => 'En proceso', 'order' => 4, 'type' => 1],
		    ['name' => 'Regular', 'order' => 5, 'type' => 1],
		    ['name' => 'Bien', 'order' => 6, 'type' => 1],
		    ['name' => 'Muy bien', 'order' => 7, 'type' => 1],

            ['name' => 'Exceso de faltas', 'order' => 1, 'type' => 2],
            ['name' => 'No Aplica', 'order' => 2, 'type' => 2],
            ['name' => 'Bien Logrado', 'order' => 3, 'type' => 2],
            ['name' => 'Logrado', 'order' => 4, 'type' => 2],
            ['name' => 'Logrado con dificultad', 'order' => 5, 'type' => 2],
            ['name' => 'En proceso', 'order' => 6, 'type' => 2],
            ['name' => 'No Logrado', 'order' => 7, 'type' => 2],
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
