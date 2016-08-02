<?php

use Illuminate\Database\Seeder;
use App\Model\Role;
use App\Model\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$administrator = Role::where('name', 'like', 'administrator')->first();
        $teacher = Role::where('name', 'like', 'teacher')->first();

        $userAdmin = new User();
        $userAdmin->name = 'Bárbara Mancillas';
        $userAdmin->username = 'barbara';
        $userAdmin->email =  'barbara@udem.edu';
        $userAdmin->password = bcrypt('123456');
        $userAdmin->save();
        $userAdmin->roles()->attach($administrator);

        $userTeacher = new User();
        $userTeacher->name = 'Maestro';
        $userTeacher->username = 'maestro';
        $userTeacher->email =  'maestro@udem.edu';
        $userTeacher->password = bcrypt('123456');
        $userTeacher->save();
        $userTeacher->roles()->attach($teacher);
    }
}
