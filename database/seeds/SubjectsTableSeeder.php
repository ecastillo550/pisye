<?php

use Illuminate\Database\Seeder;
use App\Model\Subject;
use App\Model\Semester;

class SubjectsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$class = new Subject();
		$class->name = 'Computación';
		$class->save();

		$class = new Subject();
		$class->name = 'Tutoría';
		$class->save();

		$class = new Subject();
		$class->name = 'Matemáticas';
		$class->save();

		$class = new Subject();
		$class->name = 'Lenguaje';
		$class->save();

		$class = new Subject();
		$class->name = 'Desarrollo Humano';
		$class->save();

		$class = new Subject();
		$class->name = 'Desarrollo de habilidades del pensamiento';
		$class->save();

		$class = new Subject();
		$class->name = 'Deportes';
		$class->save();

		$class = new Subject();
		$class->name = 'Artes';
		$class->save();

		$class = new Subject();
		$class->name = 'Desarrollo de habilidades laborales';
		$class->save();

		$class = new Subject();
		$class->name = 'Teatro';
		$class->save();

		$class = new Subject();
		$class->name = 'Vida Diaria';
		$class->save();

		$class = new Subject();
		$class->name = 'Taller de empleo';
		$class->save();

		$class = new Subject();
		$class->name = 'Oratoria';
		$class->save();
	}
}
