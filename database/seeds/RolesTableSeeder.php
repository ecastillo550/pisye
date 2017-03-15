<?php

use Illuminate\Database\Seeder;
use App\Model\Role;
use App\Model\Permission;

class RolesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$administrator = new Role();
		$administrator->name         = 'administrator';
		$administrator->display_name = 'Administrador';
		$administrator->save();

		$teacher = new Role();
		$teacher->name         = 'teacher';
		$teacher->display_name = 'Maestro';
		$teacher->save();

		$userManagement = Permission::create([
			'name' => 'user-management',
			'display_name' => 'Manejar usuarios'
		]);

		$seeUsers = Permission::create([
			'name' => 'see-users',
			'display_name' => 'Ver usuarios'
		]);

		$studentManagement = Permission::create([
			'name' => 'student-management',
			'display_name' => 'Manejar estudiantes'
		]);

		$seeStudents = Permission::create([
			'name' => 'see-students',
			'display_name' => 'Ver estudiantes'
		]);


		$classManagement = Permission::create([
			'name' => 'class-management',
			'display_name' => 'Manejar clases'
		]);

		$seeClasses = Permission::create([
			'name' => 'see-classes',
			'display_name' => 'Ver clases'
		]);

		$subjectManagement = Permission::create([
			'name' => 'subject-management',
			'display_name' => 'Manejar materias'
		]);

		$seeSubjects = Permission::create([
			'name' => 'see-subjects',
			'display_name' => 'Ver materias'
		]);

		$levelManagement = Permission::create([
			'name' => 'level-management',
			'display_name' => 'Manejar niveles'
		]);

		$seeLevels = Permission::create([
			'name' => 'see-levels',
			'display_name' => 'Ver niveles'
		]);

		$gradeStudent = Permission::create([
			'name' => 'grade-student',
			'display_name' => 'Calificar estudiantes'
		]);

		$administrator->attachPermissions([
			$userManagement,
			$studentManagement,
			$classManagement,
			$subjectManagement,
			$levelManagement,
			$seeUsers,
			$seeStudents,
			$seeClasses,
			$seeSubjects,
			$seeLevels,
			$gradeStudent
		]);

		$teacher->attachPermissions([
			$gradeStudent,
			$seeClasses
		]);
	}
}
