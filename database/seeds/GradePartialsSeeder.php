<?php

use Illuminate\Database\Seeder;
use App\Model\Semester;
use App\Model\Partial;

class GradePartialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semester = new Semester();
        $semester->name = 'OT 16';
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
        $partial->name = 'Parcial 3';
        $partial->order = 3;
        $partial->semester_id = $semester->id;
        $partial->save();

        $partial = new Partial();
        $partial->name = 'Final';
        $partial->order = 0;
        $partial->is_final = true;
        $partial->semester_id = $semester->id;
        $partial->save();
    }
}
