<?php

use Illuminate\Database\Seeder;
use App\Model\Student;

class StudentsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{	
		//Nivel A
		$student = new Student();
		$student->name = 'José Ángel Lara García';
		$student->type = 1;
		$student->save();
		$student = new Student();
		$student->name = 'Martha Yazmín Lozano Pérez';
		$student->type = 1;
		$student->save();
		$student = new Student();
		$student->name = 'Blanca Leticia Treviño García';
		$student->type = 1;
		$student->save();
		$student = new Student();
		$student->name = 'María Cristina Villarreal García';
		$student->type = 1;
		$student->save();
		$student = new Student();
		$student->name = 'César Eugeio Gaehd Salinas';
		$student->type = 1;
		$student->save();
		$student = new Student();
		$student->name = 'Diego Elizondo Guevara';
		$student->type = 1;
		$student->save();
		$student = new Student();
		$student->name = 'Ángel ReyCarlos Díaz Vizcaya';
		$student->type = 1;
		$student->save();
		$student = new Student();
		$student->name = 'Marcelo Chávez del castillo';
		$student->type = 1;
		$student->save();
		$student = new Student();
		$student->name = 'Taurina Zamora Maldonado';
		$student->type = 1;
		$student->save();
		$student = new Student();
		$student->name = 'Martín Gerardo Reyes Gómez';
		$student->type = 1;
		$student->save();

		//Nivel B
		$student = new Student();
		$student->name = 'Brandon Israel Ornelas Manjarrez';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Manuel Juárez Andrade';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Celia Denis Ramos Tijerina';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Juan Armando Romero Guerra';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Juan Pablo Liborio Garza';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Sergio Enrique Chávez Hernández';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Jair Alejandro Rangel Díaz';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Liza Fernanda Gernández Serna';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Abril Maite Mass Castillo';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Patricio Alejandro Galindo Trejo';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Everardo Chapa Villanueva';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Carla Andrea Galves';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Alberto Eduardo Zambrano Ramírez';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Andrés Treivño Gastelum';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'María de los Ángeles Ortiz';
		$student->type = 2;
		$student->save();
		$student = new Student();
		$student->name = 'Juan Pablo Yamallel García';
		$student->type = 2;
		$student->save();
	}
}
