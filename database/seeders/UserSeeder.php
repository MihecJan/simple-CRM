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
            'name' => 'Miha',
            'email' => 'mihyslo@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now()
        ]);
    }
}
