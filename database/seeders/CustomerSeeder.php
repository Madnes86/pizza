<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::firstOrCreate(['name' => 'customer', 'guard_name' => 'web']);

        $permission = Permission::firstOrCreate(['name' => 'access to user panel', 'guard_name' => 'web']);

        $role->givePermissionTo($permission);

        User::create([
            'name' => 'Иван Иванов',
            'email' => 'ivan.ivanov@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'first_name' => 'Иван',
            'second_name' => 'Иванов',
        ])->assignRole($role);

        User::create([
            'name' => 'Мария Петрова',
            'email' => 'maria.petrov@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'first_name' => 'Мария',
            'second_name' => 'Петрова',
        ])->assignRole($role);
    }
}