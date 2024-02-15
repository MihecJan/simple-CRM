<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only import seeds if DB is empty.
        if (Client::count() !== 0) {
            return;
        }

        Client::factory(10)->create();
    }
}
