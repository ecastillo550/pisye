<?php

use Illuminate\Database\Seeder;
use App\Model\User;

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
        $admin->email = 'admin@hagane.io';
        $admin->password = bcrypt('123456');
        $admin->attachRole($adminRole);
        $admin->save();
    } 
}
