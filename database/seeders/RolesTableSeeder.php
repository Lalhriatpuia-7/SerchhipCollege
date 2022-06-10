<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use TCG\Voyager\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()


    {
        Role::create([

            'name' => 'admin',
            'display_name' => 'Admin',
        ]);
        // Role::create([

        //     'name' => 'staff',
        //     'display_name' => 'Staff',
        // ]);
        Role::create([

            'name' => 'developer',
            'display_name' => 'Developer',
        ]);
        Role::create([

            'name' => 'student',
            'display_name' => 'Student',
        ]);

        // DB::table('roles')->insert([
        //     [
        //         'name' => 'admin',
        //         'display_name' => 'Admin',
        //     ],
        //     [
        //         'name' => 'teachingstaff',
        //         'display_name' => 'Teching Staff',
        //     ],
        //     [
        //         'name' => 'nonteachingstaff',
        //         'display_name' => 'Non-Teaching Staff',
        //     ],
        //     [
        //         'name' => 'developer',
        //         'display_name' => 'Developer',
        //     ],
        //     [
        //         'name' => 'student',
        //         'display_name' => 'Student',
        //     ],
        //     [
        //         'name' => 'studentunion',
        //         'display_name' => 'Student Union',
        //     ]
        // ]);



        $role = Role::firstOrNew(['name' => 'admin']);
        if (!$role->exists) {
            $role->fill([
                'name' => 'admin',
                'display_name' => 'admin',
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'techingstaff']);
        if (!$role->exists) {
            $role->fill([
                'name' => 'techingstaff',
                'display_name' => 'teachingstafadminf',
            ])->save();
        }
        $role = Role::firstOrNew(['name' => 'nonteachingstaff']);
        if (!$role->exists) {
            $role->fill([
                'name' => 'nonteachingstaff',
                'display_name' => 'nonteachingstaff',
            ])->save();
        }
        $role = Role::firstOrNew(['name' => 'developer']);
        if (!$role->exists) {
            $role->fill([
                'name' => 'developer',
                'display_name' => 'developer',
            ])->save();
        }
        $role = Role::firstOrNew(['name' => 'student']);
        if (!$role->exists) {
            $role->fill([
                'name' => 'student',
                'display_name' => 'student',
            ])->save();
        }
        $role = Role::firstOrNew(['name' => 'studentunion']);
        if (!$role->exists) {
            $role->fill([
                'name' => 'studentunion',
                'display_name' => 'studentunion',
            ])->save();
        }
    }
}