<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only import seeds if DB is empty.
        if (User::count() !== 0) {
            return;
        }

        User::create([
            'name' => 'demo',
            'email' => 'demo@demo',
            'password' => Hash::make('demo_password'),
            'email_verified_at' => now()
        ]);
    }
}
