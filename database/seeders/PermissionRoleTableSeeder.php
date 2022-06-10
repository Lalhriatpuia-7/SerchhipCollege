<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {

        $adminRole = Role::where('id', '1')->firstOrFail();
        $staffRole = Role::where('id', '2')->firstOrFail();
        $studentRole = Role::where('id', '3')->firstOrFail();
        $developerRole = Role::where('id', '4')->firstOrFail();
        // $role = Role::where('name', 'admin')->firstOrFail();

        $allPermissions = Permission::all();

        $adminRole->permissions()->sync(
            $allPermissions->pluck('id')->all()
        );
        $staffRole->permissions()->sync(
            $allPermissions->pluck('id')->all()
        );
        if ($studentRole) {
            $studentpermissionFiltered = $allPermissions->filter(function ($studentpermission, $key) {

                return in_array($studentpermission->key, [
                    //General
                    'browse_database',
                    'browse_media',
                    'browse_bread',
                    'browse_compass',
                    'browse_menus',

                    //Pages
                    'edit_pages',
                    'add_pages',
                    'delete_pages',

                    //Roles
                    'edit_roles',
                    'add_roles',
                    'delete_roles',

                    //Users
                    'edit_users',
                    'add_users',
                    'delete_users',

                    //Posts
                    'edit_posts',
                    'add_posts',
                    'delete_posts',

                    //Categories
                    'edit_categories',
                    'add_categories',
                    'delete_categories',

                    //Settings
                    'browse_settings',
                    'read_settings',
                    'edit_settings',
                    'add_settings',
                    'delete_settings',

                    //Tools
                    'browse_tools',
                    'read_tools',
                    'edit_tools',
                    'add_tools',
                    'delete_tools',

                    //Permissions
                    'browse_permissions',
                    'read_permissions',
                    'edit_permissions',
                    'add_permissions',
                    'delete_permissions',


                ]);
            });
            $studentRole->permissions()->sync(
                $studentpermissionFiltered->pluck('id')->all()
            );
        }


        if ($developerRole) {
            $developerPermissionFiltered = $allPermissions->filter(function ($developerPermission, $key) {
                return in_array($developerPermission->key, [
                    //General
                    'browse_database',
                    'browse_media',
                    'browse_bread',
                    'browse_compass',
                    'browse_menus',

                    //Pages
                    'edit_pages',
                    'add_pages',
                    'delete_pages',

                    //Roles
                    'edit_roles',
                    'add_roles',
                    'delete_roles',

                    //Users
                    'edit_users',
                    'add_users',
                    'delete_users',

                    //Posts
                    'edit_posts',
                    'add_posts',
                    'delete_posts',

                    //Categories
                    'edit_categories',
                    'add_categories',
                    'delete_categories',

                    //Settings
                    'browse_settings',
                    'read_settings',
                    'edit_settings',
                    'add_settings',
                    'delete_settings',

                    //Tools
                    'browse_tools',
                    'read_tools',
                    'edit_tools',
                    'add_tools',
                    'delete_tools',

                    //Permissions
                    'edit_permissions',
                    'add_permissions',
                    'delete_permissions',


                ]);
            });
            $developerRole->permissions()->sync(
                $developerPermissionFiltered->pluck('id')->all()
            );
        }
    }
}