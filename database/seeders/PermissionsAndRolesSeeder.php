<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionsAndRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'access to manager panel']);
        Permission::create(['name' => 'access to kitchen panel']);
        Permission::create(['name' => 'access to courier panel']);
        Permission::create(['name' => 'access to chat']);
        Permission::create(['name' => 'access to user panel']);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234567890'),
            'first_name' => 'Super',
            'second_name' => 'Admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'email_verified_at' => Carbon::now(),
        ]);

        $superAdminRole = Role::create([
            'name' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $permissions = Permission::pluck('name')->all();
        $superAdminRole->syncPermissions($permissions);
        $admin->assignRole('admin');


        $courier = User::create([
            'name' => 'courier',
            'email' => 'courier@gmail.com',
            'password' => Hash::make('1234567890'),
            'first_name' => 'Usain',
            'second_name' => 'Bolt',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'email_verified_at' => Carbon::now(),
        ]);

        $courierRole = Role::create([
            'name' => 'courier',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $courierRole->givePermissionTo('access to courier panel', 'access to chat');
        $courier->assignRole('courier');

        $kitchen = User::create([
            'name' => 'kitchen',
            'email' => 'kitchen@gmail.com',
            'password' => Hash::make('1234567890'),
            'first_name' => 'Gordon',
            'second_name' => 'Ramsay',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'email_verified_at' => Carbon::now(),
        ]);

        $kitchenRole = Role::create([
            'name' => 'kitchen',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $kitchenRole->givePermissionTo('access to kitchen panel');
        $kitchen->assignRole('kitchen');

        $manager = User::create([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('1234567890'),
            'first_name' => 'John',
            'second_name' => 'Smith',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'email_verified_at' => Carbon::now(),
        ]);

        $managerRole = Role::create([
            'name' => 'manager',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $managerRole->givePermissionTo('access to manager panel', 'access to chat');
        $manager->assignRole('manager');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('1234567890'),
            'first_name' => 'Ivan',
            'second_name' => 'Ivanovich',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'email_verified_at' => Carbon::now(),
        ]);

        $userRole = Role::create([
            'name' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $userRole->givePermissionTo('access to user panel');
        $user->assignRole('user');
    }

}
