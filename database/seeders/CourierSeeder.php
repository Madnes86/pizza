<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CourierSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Courier',
            'email' => 'courier@example.com',
            'password' => Hash::make('password'),
            'first_name' => 'Fast',
            'second_name' => 'Delivery',
            'email_verified_at' => now(),
        ]);
    }
}