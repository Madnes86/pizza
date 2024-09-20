<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            AdminSeeder::class,
            CourierSeeder::class,
            IngredientSeeder::class,
            KitchenSeeder::class,
            ManagerSeeder::class,
            PermissionSeeder::class,
            StatusSeeder::class,
            CustomerSeeder::class,
        ]);
    }
}