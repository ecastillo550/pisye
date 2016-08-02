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

		// $userMgmt = Permission::create([
		// 	'name' => 'user-mgmt',
		// 	'display_name' => 'Manejar usuarios'
		// ]);

		// $administrator->attachPermissions([$userMgmt]);
	}
}
