<?php

use Illuminate\Database\Seeder;

class CualitativeGrades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
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
        $partial->name = 'Parcial 1';
        $partial->order = 1;
        $partial->semester_id = $semester->id;
        $partial->save();

        $partial = new Partial();
        $partial->name = 'Parcial 2';
        $partial->order = 2;
        $partial->semester_id = $semester->id;
        $partial->save();

        $partial = new Partial();
        $partial->name = 'Final';
        $partial->order = 3;
        $partial->is_final = true;
        $partial->semester_id = $semester->id;
        $partial->save();
    }
}
