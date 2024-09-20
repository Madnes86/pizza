<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создание прав доступа
        Permission::create(['name' => 'доступ к панели менеджера', 'guard_name' => 'web']);
        Permission::create(['name' => 'доступ к панели кухни', 'guard_name' => 'web']);
        Permission::create(['name' => 'доступ к панели курьера', 'guard_name' => 'web']);
        Permission::create(['name' => 'доступ к чату', 'guard_name' => 'web']);
        Permission::create(['name' => 'доступ к панели пользователя', 'guard_name' => 'web']);
    }
}