<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ManagerSeeder extends Seeder
{
    public function run(): void
    {
        // Create Manager user
        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => Hash::make('managerpassword'),
            'first_name' => 'Manager',
            'second_name' => 'User',
        ]);

        // Create "Manager" role if it doesn't exist
        $role = Role::firstOrCreate(['name' => 'Manager']);

        // Assign Permissions to "Manager" Role (Modify these as per your needs)
        $permissions = [
            'view orders',
            'add dishes',
            'edit dishes',
            'delete dishes',
            'manage ingredients',
            'accept orders',
            // Add more permissions as required
        ];

        // Create permissions if they don't exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign all permissions to the Manager role
        $role->syncPermissions($permissions);

        // Assign "Manager" role to the created user
        $manager->assignRole($role);
    }
}