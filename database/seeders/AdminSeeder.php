<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'gav',
            'email' => 'gav@example.com',
            'password' => Hash::make('password'),
            'first_name' => 'Aleksandr',
            'second_name' => 'G',
            'email_verified_at' => now(),
        ]);
    }
}