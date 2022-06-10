<?php

namespace Database\Seeders;

use App\Models\Role as ModelsRole;
use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $role = Role::where('name', 'admin')->firstOrFail();

            ModelsUser::factory()->create([
                // 'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);

            // $role = ModelsRole::where('name', 'teachingstaff')->firstOrFail();

            ModelsUser::factory()->create([
                // 'name'           => 'Admin',
                'email'          => 'teachingstaff@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);
            // $role = ModelsRole::where('name', 'nonteachingstaff')->firstOrFail();

            ModelsUser::factory()->create([
                // 'name'           => 'Admin',
                'email'          => 'nonteachingstaff@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);
            // $role = ModelsRole::where('name', 'developer')->firstOrFail();

            ModelsUser::factory()->create([
                // 'name'           => 'Admin',
                'email'          => 'developer@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);
            // $role = ModelsRole::where('name', 'student')->firstOrFail();

            ModelsUser::factory()->create([
                // 'name'           => 'Admin',
                'email'          => 'student@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);
            // $role = ModelsRole::where('name', 'studentunion')->firstOrFail();

            ModelsUser::factory()->create([
                // 'name'           => 'Admin',
                'email'          => 'studentunion@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);
        }
    }
}