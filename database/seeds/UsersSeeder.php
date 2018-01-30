<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// -------------- Role retrieval ----------------
        $adminRole = Role::where('name', 'like', 'admin')->first();
        $teacherRole = Role::where('name', 'like', 'teacher')->first();
        $studentRole = Role::where('name', 'like', 'student')->first();

        // -------------- User creation -----------------
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@udem.edu';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->attachRole($adminRole);

        $teacher = new User();
        $teacher->name = 'teacher';
        $teacher->email = 'teacher@udem.edu';
        $teacher->password = bcrypt('123456');
        $teacher->save();
        $teacher->attachRole($teacherRole);

        $student = new User();
        $student->name = 'student';
        $student->email = 'student@udem.edu';
        $student->password = bcrypt('123456');
        $student->save();
        $student->attachRole($studentRole);
    }
}
