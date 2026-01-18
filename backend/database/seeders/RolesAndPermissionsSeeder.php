<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            ['name' => 'view_dashboard', 'display_name' => 'View Dashboard', 'description' => 'Access to dashboard'],
            ['name' => 'manage_users', 'display_name' => 'Manage Users', 'description' => 'Create, edit, delete users'],
            ['name' => 'manage_roles', 'display_name' => 'Manage Roles', 'description' => 'Create, edit, delete roles'],
            ['name' => 'view_files', 'display_name' => 'View Files', 'description' => 'Access to files module'],
            ['name' => 'manage_files', 'display_name' => 'Manage Files', 'description' => 'Upload, delete files'],
            ['name' => 'view_messages', 'display_name' => 'View Messages', 'description' => 'Access to messages'],
            ['name' => 'send_messages', 'display_name' => 'Send Messages', 'description' => 'Send messages'],
            ['name' => 'view_tasks', 'display_name' => 'View Tasks', 'description' => 'Access to tasks'],
            ['name' => 'manage_tasks', 'display_name' => 'Manage Tasks', 'description' => 'Create, edit, delete tasks'],
            ['name' => 'view_meetings', 'display_name' => 'View Meetings', 'description' => 'Access to meetings'],
            ['name' => 'manage_meetings', 'display_name' => 'Manage Meetings', 'description' => 'Create, edit, delete meetings'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission['name']],
                $permission
            );
        }

        // Create roles
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin'],
            [
                'display_name' => 'Administrator',
                'description' => 'Full system access',
            ]
        );

        $userRole = Role::firstOrCreate(
            ['name' => 'user'],
            [
                'display_name' => 'User',
                'description' => 'Standard user access',
            ]
        );

        // Assign all permissions to admin role
        $adminRole->permissions()->sync(Permission::all());

        // Assign basic permissions to user role
        $userRole->permissions()->sync(
            Permission::whereIn('name', [
                'view_dashboard',
                'view_files',
                'view_messages',
                'send_messages',
                'view_tasks',
                'view_meetings',
            ])->get()
        );

        // Create admin user
        $adminUser = User::firstOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@ihhcrm.local')],
            [
                'name' => env('ADMIN_NAME', 'System Administrator'),
                'password' => Hash::make(env('ADMIN_PASSWORD', 'Admin@123456')),
                'email_verified_at' => now(),
            ]
        );

        // Assign admin role to admin user
        $adminUser->roles()->sync([$adminRole->id]);
    }
}
