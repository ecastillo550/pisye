<?php

use Illuminate\Database\Seeder;
use App\Model\Student;
use App\Model\Level;

class StudentsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$level = new Level();
		$level->name = 'Nivel A';
		$level->save();
		$levelA = $level->id;

		$level = new Level();
		$level->name = 'Nivel B';
		$level->save();
		$levelB = $level->id;

		//Nivel A
		$student = new Student();
		$student->name = 'José Ángel Lara García';
		$student->level_id = $levelA;
		$student->save();
		$student = new Student();
		$student->name = 'Martha Yazmín Lozano Pérez';
		$student->level_id = $levelA;
		$student->save();
		$student = new Student();
		$student->name = 'Blanca Leticia Treviño García';
		$student->level_id = $levelA;
		$student->save();
		$student = new Student();
		$student->name = 'María Cristina Villarreal García';
		$student->level_id = $levelA;
		$student->save();
		$student = new Student();
		$student->name = 'César Eugeio Gaehd Salinas';
		$student->level_id = $levelA;
		$student->save();
		$student = new Student();
		$student->name = 'Diego Elizondo Guevara';
		$student->level_id = $levelA;
		$student->save();
		$student = new Student();
		$student->name = 'Ángel ReyCarlos Díaz Vizcaya';
		$student->level_id = $levelA;
		$student->save();
		$student = new Student();
		$student->name = 'Marcelo Chávez del castillo';
		$student->level_id = $levelA;
		$student->save();
		$student = new Student();
		$student->name = 'Taurina Zamora Maldonado';
		$student->level_id = $levelA;
		$student->save();
		$student = new Student();
		$student->name = 'Martín Gerardo Reyes Gómez';
		$student->level_id = $levelA;
		$student->save();

		//Nivel B
		$student = new Student();
		$student->name = 'Brandon Israel Ornelas Manjarrez';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Manuel Juárez Andrade';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Celia Denis Ramos Tijerina';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Juan Armando Romero Guerra';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Juan Pablo Liborio Garza';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Sergio Enrique Chávez Hernández';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Jair Alejandro Rangel Díaz';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Liza Fernanda Gernández Serna';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Abril Maite Mass Castillo';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Patricio Alejandro Galindo Trejo';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Everardo Chapa Villanueva';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Carla Andrea Galves';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Alberto Eduardo Zambrano Ramírez';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Andrés Treivño Gastelum';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'María de los Ángeles Ortiz';
		$student->level_id = $levelB;
		$student->save();
		$student = new Student();
		$student->name = 'Juan Pablo Yamallel García';
		$student->level_id = $levelB;
		$student->save();
	}
}
