<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Role;
use App\Model\Group;

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

        $group = Group::first();

        // -------------- User creation -----------------
        $admin = new User();
        $admin->name = 'admin';
        $admin->username = 'admin';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->attachRole($adminRole);

        $group->teachers()->attach($admin->id);

        $teacher = new User();
        $teacher->name = 'teacher';
        $teacher->username = 'teacher';
        $teacher->password = bcrypt('123456');
        $teacher->save();
        $teacher->attachRole($teacherRole);

        $student = new User();
        $student->name = 'student';
        $student->username = 'student';
        $student->password = bcrypt('123456');
        $student->save();
        $student->attachRole($studentRole);

        $group->students()->attach($student->id);
    }
}
