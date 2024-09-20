<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KitchenSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Kitchen User',
            'email' => 'kitchen@example.com',
            'password' => Hash::make('password'),
            'first_name' => 'Kitchen',
            'second_name' => 'User',
        ]);
    }
}